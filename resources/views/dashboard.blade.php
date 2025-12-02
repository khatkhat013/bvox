<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BVOX</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .logout-btn {
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .info-group {
            margin-bottom: 20px;
        }

        .info-label {
            color: #999;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .info-value {
            color: #333;
            font-size: 14px;
            font-family: 'Courier New', monospace;
            background: #f8f9ff;
            padding: 12px;
            border-radius: 8px;
            word-break: break-all;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            background: #d4edda;
            color: #155724;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .loading {
            text-align: center;
            color: white;
            font-size: 18px;
            padding: 40px;
        }

        .spinner {
            display: inline-block;
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🔐 BVOX Dashboard</div>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>

        <div id="loading" class="loading">
            <span class="spinner"></span>Loading your profile...
        </div>

        <div id="content" style="display: none;">
            <div class="card">
                <h2>Welcome to BVOX!</h2>
                <div style="color: #666; margin-bottom: 20px;">
                    You have successfully authenticated with your Web3 wallet.
                </div>
                <div class="status">✓ Authenticated</div>
            </div>

            <div class="card">
                <h2>Account Information</h2>
                
                <div class="info-group">
                    <div class="info-label">Wallet Address</div>
                    <div class="info-value" id="walletAddress">Loading...</div>
                </div>

                <div class="info-group">
                    <div class="info-label">User ID</div>
                    <div class="info-value" id="userId">Loading...</div>
                </div>

                <div class="info-group">
                    <div class="info-label">Auth Token</div>
                    <div class="info-value" id="authToken" style="font-size: 11px;">Loading...</div>
                </div>
            </div>

            <div class="card">
                <h2>Quick Actions</h2>
                <button class="logout-btn" onclick="logout()" style="background: #667eea; width: 100%; padding: 15px; font-size: 14px;">
                    Disconnect Wallet & Logout
                </button>
            </div>
        </div>

        <div id="error" class="error" style="display: none; margin-top: 20px;"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ethers/6.10.0/ethers.umd.min.js"></script>
    <script>
        async function loadUserProfile() {
            try {
                const token = localStorage.getItem('auth_token');
                if (!token) {
                    window.location.href = '/web3-login';
                    return;
                }

                const response = await fetch('/api/web3/me', {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to load profile');
                }

                const data = await response.json();

                // Display user data
                document.getElementById('walletAddress').textContent = data.wallet_address || 'N/A';
                document.getElementById('userId').textContent = data.id || 'N/A';
                document.getElementById('authToken').textContent = token;

                // Hide loading, show content
                document.getElementById('loading').style.display = 'none';
                document.getElementById('content').style.display = 'block';

            } catch (error) {
                console.error('Error loading profile:', error);
                document.getElementById('error').style.display = 'block';
                document.getElementById('error').textContent = '❌ ' + error.message + '. Redirecting to login...';
                
                setTimeout(() => {
                    localStorage.removeItem('auth_token');
                    localStorage.removeItem('user_address');
                    window.location.href = '/web3-login';
                }, 2000);
            }
        }

        async function logout() {
            try {
                const token = localStorage.getItem('auth_token');
                if (token) {
                    await fetch('/api/web3/logout', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]')?.content || ''
                        }
                    });
                }
            } catch (error) {
                console.error('Logout error:', error);
            }

            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_address');
            window.location.href = '/web3-login';
        }

        // Load profile on page load
        document.addEventListener('DOMContentLoaded', loadUserProfile);
    </script>
</body>
</html>
