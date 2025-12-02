# Web3 Login System Setup Guide

## Overview
This is a complete Web3 authentication system using WalletConnect v2 + Ethers.js v6 + Sign Message Authentication with Laravel backend and Sanctum token-based authentication.

## Architecture

### Frontend Flow
1. User visits `/web3-login`
2. "Connect Web3 Wallet" button opens modal
3. Modal shows wallet options: MetaMask, WalletConnect, Coinbase Wallet
4. After selecting and connecting wallet:
   - Frontend gets nonce from backend `/api/web3/nonce`
   - User signs the nonce with their wallet (EIP-191)
   - Frontend sends signature to `/api/web3/verify`
   - Backend verifies signature and returns Sanctum token
5. Token stored in localStorage
6. User redirected to `/dashboard`
7. Dashboard shows wallet info and allows logout

### Backend Flow
1. **getNonce()** - Generates random nonce, caches with 15-min TTL
2. **verify()** - Validates signature, recovers address, creates/finds user, issues token
3. **me()** - Returns authenticated user (requires Sanctum token)
4. **logout()** - Revokes all user tokens

## Setup Instructions

### Step 1: Install Dependencies

```bash
# Install Composer dependencies (including signature recovery library)
composer require kornrunner/ethereum-signer

# Install NPM dependencies
npm install @walletconnect/modal @walletconnect/ethereum-provider ethers
```

### Step 2: Configure WalletConnect Project ID

1. Go to https://cloud.walletconnect.com
2. Create a new project
3. Copy your Project ID
4. In `/resources/views/web3-login.blade.php`, replace:
   ```javascript
   PROJECT_ID: 'YOUR_WALLETCONNECT_PROJECT_ID',
   ```
   with your actual Project ID

### Step 3: Run Database Migrations

```bash
php artisan migrate
```

This will create the new `wallet_address` and `login_nonce` fields in the users table.

### Step 4: Setup CSRF Token

Make sure your Blade template includes CSRF token (already included in web3-login.blade.php):

```html
<meta name="csrf-token" content="{{ csrf_token() }}">
```

### Step 5: Configure Laravel Sanctum

Check `config/sanctum.php` to ensure API token configuration:

```php
'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', localhost:3000)),
'middleware' => [
    'verify_csrf_token' => \App\Http\Middleware\VerifyCsrfToken::class,
    'encrypt_cookies' => \App\Http\Middleware\EncryptCookies::class,
],
```

### Step 6: Test the System

1. Start Laravel server: `php artisan serve`
2. Visit `http://localhost:8000/web3-login`
3. Click "Connect Web3 Wallet"
4. Select wallet option
5. Follow connection flow
6. Sign message when prompted
7. Should redirect to `/dashboard`

## File Structure

```
c:/project/bvox/
├── app/Http/Controllers/
│   └── Web3AuthController.php          # Main authentication logic
├── app/Models/
│   └── User.php                        # Updated with fillable fields
├── database/migrations/
│   └── 2024_01_01_000003_add_web3_to_users_table.php  # User table updates
├── resources/views/
│   ├── web3-login.blade.php           # Login page with modal
│   └── dashboard.blade.php            # Authenticated user dashboard
└── routes/
    └── web.php                         # API routes added
```

## API Endpoints

### POST /api/web3/nonce
Get a signing nonce for a wallet address.

**Request:**
```json
{
  "wallet_address": "0x..."
}
```

**Response:**
```json
{
  "nonce": "random32charstring"
}
```

**Error (401):**
```json
{
  "success": false,
  "message": "Invalid wallet address format"
}
```

---

### POST /api/web3/verify
Verify signature and get authentication token.

**Request:**
```json
{
  "wallet_address": "0x...",
  "signature": "0x...",
  "nonce": "random32charstring"
}
```

**Response:**
```json
{
  "success": true,
  "token": "sanctum_token_here",
  "user": {
    "id": 1,
    "wallet_address": "0x...",
    "created_at": "2024-01-01T00:00:00Z"
  }
}
```

**Errors (401):**
- Invalid wallet address format
- Invalid signature format
- Nonce expired or invalid
- Signature verification failed

---

### GET /api/web3/me
Get authenticated user info.

**Headers:**
```
Authorization: Bearer {token}
```

**Response:**
```json
{
  "id": 1,
  "wallet_address": "0x...",
  "name": null,
  "email": null,
  "created_at": "2024-01-01T00:00:00Z"
}
```

---

### POST /api/web3/logout
Revoke all authentication tokens.

**Headers:**
```
Authorization: Bearer {token}
```

**Response:**
```json
{
  "success": true,
  "message": "Logged out successfully"
}
```

## Security Features

1. **Message Signing (EIP-191)** - Uses Ethereum standard signing format
2. **Nonce Validation** - Single-use nonces with 15-minute expiry
3. **Signature Recovery** - Validates wallet address ownership
4. **Sanctum Tokens** - Secure API authentication
5. **CSRF Protection** - Included in all POST requests
6. **Unique Wallet Addresses** - Prevents duplicate wallet registrations

## Troubleshooting

### "MetaMask not installed"
- User needs to install MetaMask browser extension
- Supported chains: Ethereum, Polygon, Binance Smart Chain, etc.

### "WalletConnect connection failed"
- Verify WalletConnect Project ID is correct
- Check CORS configuration

### "Signature verification failed"
- Ensure wallet is connected to supported network
- Check message format matches backend
- Verify signature format is 0x + 130 hex characters

### "Nonce expired"
- Nonce expires after 15 minutes
- Get a new nonce by calling `/api/web3/nonce` again

### Token not working
- Check token is properly stored in localStorage
- Verify Authorization header format: `Bearer {token}`
- Check token hasn't been revoked

## Wallet Support

### MetaMask
- ✅ Primary browser extension
- ✅ Supports all EVM chains
- ✅ Direct integration

### WalletConnect v2
- ✅ Mobile wallet bridge
- ✅ QR code scanning
- ✅ Requires Project ID

### Coinbase Wallet
- ✅ Browser extension support
- ✅ Mobile app integration

## Environment Variables

Add to `.env`:
```
SANCTUM_STATEFUL_DOMAINS=localhost:8000,127.0.0.1:8000
SESSION_DOMAIN=.localhost
```

## Database Schema

### users table changes
```sql
ALTER TABLE users ADD COLUMN wallet_address VARCHAR(255) UNIQUE NULLABLE;
ALTER TABLE users ADD COLUMN login_nonce TEXT NULLABLE;
ALTER TABLE users MODIFY COLUMN email VARCHAR(255) NULLABLE;
```

## Frontend Integration

The web3-login.blade.php automatically:
- ✅ Detects user's installed wallets
- ✅ Handles connection errors gracefully
- ✅ Shows loading states
- ✅ Manages signature status
- ✅ Stores token in localStorage
- ✅ Redirects to dashboard on success

## Customization

### Change Redirect URL
In `web3-login.blade.php`, line with `window.location.href`:
```javascript
window.location.href = '/your-custom-dashboard';
```

### Custom Wallet Icons
Modify WALLETS object in `web3-login.blade.php`:
```javascript
WALLETS: {
    metamask: {
        icon: '🦊', // Change emoji or use image URL
        // ...
    }
}
```

### Modify Nonce Format
In `Web3AuthController.php`:
```php
$nonce = Str::random(64); // Change length as needed
```

### Change Cache TTL
In `Web3AuthController.php`:
```php
Cache::put('web3_nonce_' . $address, $nonce, now()->addMinutes(30)); // Change 30 to desired minutes
```

## Testing with cURL

### Get Nonce
```bash
curl -X POST http://localhost:8000/api/web3/nonce \
  -H "Content-Type: application/json" \
  -d '{"wallet_address":"0x742d35Cc6634C0532925a3b844Bc9e7595f42bE0"}'
```

### Verify Signature
```bash
curl -X POST http://localhost:8000/api/web3/verify \
  -H "Content-Type: application/json" \
  -d '{
    "wallet_address":"0x742d35Cc6634C0532925a3b844Bc9e7595f42bE0",
    "signature":"0x...",
    "nonce":"randomnonce"
  }'
```

## Production Considerations

1. **HTTPS Only** - Always use HTTPS in production
2. **CORS Configuration** - Configure CORS for your domain
3. **Rate Limiting** - Add rate limiting to `/api/web3/nonce`
4. **Monitoring** - Log all authentication attempts
5. **Security Audit** - Review signature verification code
6. **Token Expiry** - Configure Sanctum token lifetime
7. **Database Backup** - Backup user wallet data regularly

## Support

For issues or questions:
1. Check troubleshooting section above
2. Review server logs: `storage/logs/laravel.log`
3. Check browser console for errors
4. Verify all dependencies are installed

---

**Version:** 1.0.0
**Last Updated:** 2024-01-01
**Compatible with:** Laravel 11, Sanctum, WalletConnect v2, Ethers.js v6
