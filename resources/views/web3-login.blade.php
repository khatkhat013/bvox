<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web3 Login - BVOX</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 420px;
            width: 100%;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .logo p {
            color: #888;
            font-size: 13px;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            padding: 30px;
            max-width: 400px;
            width: 90%;
            animation: modalSlide 0.3s ease-out;
        }

        @keyframes modalSlide {
            from {
                transform: scale(0.95);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-header {
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .modal-subtitle {
            font-size: 13px;
            color: #999;
        }

        .wallet-options {
            margin: 20px 0;
        }

        .wallet-option {
            padding: 15px;
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .wallet-option:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .wallet-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .wallet-info h3 {
            font-size: 14px;
            color: #333;
            margin-bottom: 2px;
        }

        .wallet-info p {
            font-size: 12px;
            color: #999;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel {
            background: #f0f0f0;
            color: #333;
        }

        .btn-cancel:hover {
            background: #e0e0e0;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover:not(:disabled) {
            background: #5568d3;
        }

        .btn-primary:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .status {
            padding: 15px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            display: none;
        }

        .status.show {
            display: block;
        }

        .status.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .status.info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .loading {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid #667eea;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .qr-container {
            text-align: center;
            margin: 20px 0;
        }

        .qr-container img {
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid #e8e8e8;
        }

        .hidden {
            display: none !important;
        }

        .connect-button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .connect-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .user-info {
            background: #f8f9ff;
            padding: 15px;
            border-radius: 12px;
            margin-top: 20px;
            display: none;
        }

        .user-info.show {
            display: block;
        }

        .user-address {
            font-size: 12px;
            color: #666;
            word-break: break-all;
            font-family: 'Courier New', monospace;
            background: white;
            padding: 8px;
            border-radius: 6px;
            margin-top: 8px;
        }

        .spinner {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid #667eea;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>🔐 BVOX Login</h1>
            <p>Connect with Web3 Wallet</p>
        </div>

        <div class="status" id="status"></div>

        <div id="notConnected">
            <p style="color: #666; font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                Connect your Web3 wallet to access BVOX. Sign a message to authenticate securely.
            </p>
            <button class="connect-button" id="connectBtn" onclick="openConnectModal()">
                🔗 Connect Web3 Wallet
            </button>
        </div>

        <div class="user-info" id="userInfo">
            <div style="color: #666; font-size: 13px; margin-bottom: 10px;">
                Connected Wallet:
            </div>
            <div class="user-address" id="userAddress"></div>
            <button class="connect-button" style="background: #e74c3c; margin-top: 15px;" onclick="logout()">
                Logout
            </button>
        </div>
    </div>

    <!-- Connect Wallet Modal -->
    <div class="modal" id="connectModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Connect DApp</div>
                <div class="modal-subtitle">{{ request()->getHost() }}</div>
            </div>

            <div class="status" id="modalStatus"></div>

            <div id="walletSelection">
                <div class="wallet-options" id="walletOptions"></div>
            </div>

            <div id="signingView" class="hidden">
                <div style="text-align: center; padding: 20px 0;">
                    <div style="font-size: 12px; color: #666; line-height: 1.6;">
                        <div style="margin-bottom: 15px;">
                            <span class="spinner"></span>Waiting for signature...
                        </div>
                        <div style="background: #f0f0f0; padding: 10px; border-radius: 6px; font-family: monospace; font-size: 11px; word-break: break-all;">
                            Sign this message to verify ownership
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-buttons">
                <button class="btn btn-cancel" onclick="closeConnectModal()">Cancel</button>
                <button class="btn btn-primary" id="connectWalletBtn" onclick="connectWallet()" style="display: none;">
                    Connect
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/WalletConnect/web3modal@3/dist/index.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ethers/6.10.0/ethers.umd.min.js"></script>

    <script>
        // Configuration
        const CONFIG = {
            PROJECT_ID: 'YOUR_WALLETCONNECT_PROJECT_ID', // Replace with your WalletConnect Project ID
            APP_NAME: 'BVOX',
            APP_DESCRIPTION: 'Web3 Login System',
            APP_URL: window.location.origin,
            APP_ICON: 'https://via.placeholder.com/150'
        };

        const WALLETS = {
            metamask: {
                name: 'MetaMask',
                icon: '🦊',
                connect: connectMetaMask
            },
            walletconnect: {
                name: 'WalletConnect',
                icon: '📱',
                connect: connectWalletConnect
            },
            coinbase: {
                name: 'Coinbase Wallet',
                icon: '🪙',
                connect: connectCoinbaseWallet
            }
        };

        let selectedWallet = null;
        let provider = null;
        let signer = null;
        let userAddress = null;

        // Initialize modal on page load
        document.addEventListener('DOMContentLoaded', () => {
            checkAuthStatus();
            initializeWalletOptions();
        });

        function initializeWalletOptions() {
            const container = document.getElementById('walletOptions');
            container.innerHTML = '';
            
            Object.entries(WALLETS).forEach(([key, wallet]) => {
                const div = document.createElement('div');
                div.className = 'wallet-option';
                div.onclick = () => selectWallet(key);
                div.innerHTML = `
                    <div class="wallet-icon">${wallet.icon}</div>
                    <div class="wallet-info">
                        <h3>${wallet.name}</h3>
                        <p>${key === 'metamask' ? 'Browser Extension' : 'Mobile & Desktop'}</p>
                    </div>
                `;
                container.appendChild(div);
            });
        }

        function openConnectModal() {
            document.getElementById('connectModal').classList.add('show');
            document.getElementById('walletSelection').classList.remove('hidden');
            document.getElementById('signingView').classList.add('hidden');
            document.getElementById('connectWalletBtn').style.display = 'none';
            clearStatus('modalStatus');
        }

        function closeConnectModal() {
            document.getElementById('connectModal').classList.remove('show');
            selectedWallet = null;
        }

        function selectWallet(walletKey) {
            selectedWallet = walletKey;
            document.getElementById('connectWalletBtn').style.display = 'block';
            
            // Update wallet option styles
            document.querySelectorAll('.wallet-option').forEach(el => {
                el.style.borderColor = '#e8e8e8';
                el.style.background = 'transparent';
            });
            event.currentTarget.style.borderColor = '#667eea';
            event.currentTarget.style.background = '#f8f9ff';
        }

        async function connectWallet() {
            if (!selectedWallet) return;

            try {
                document.getElementById('walletSelection').classList.add('hidden');
                document.getElementById('signingView').classList.remove('hidden');
                document.getElementById('connectWalletBtn').style.display = 'none';

                const wallet = WALLETS[selectedWallet];
                await wallet.connect();

                showStatus('✓ Wallet connected successfully!', 'success', 'modalStatus');
                
                // Close modal after short delay
                setTimeout(() => {
                    closeConnectModal();
                }, 1000);
            } catch (error) {
                console.error('Connection error:', error);
                showStatus('❌ ' + (error.message || 'Connection failed'), 'error', 'modalStatus');
                document.getElementById('walletSelection').classList.remove('hidden');
                document.getElementById('signingView').classList.add('hidden');
                document.getElementById('connectWalletBtn').style.display = 'block';
                selectedWallet = null;
            }
        }

        async function connectMetaMask() {
            if (!window.ethereum) {
                throw new Error('MetaMask not installed. Please install MetaMask extension.');
            }

            try {
                const accounts = await window.ethereum.request({
                    method: 'eth_requestAccounts'
                });
                
                userAddress = accounts[0];
                provider = new ethers.BrowserProvider(window.ethereum);
                signer = await provider.getSigner();

                await authenticateUser(userAddress);
            } catch (error) {
                throw error;
            }
        }

        async function connectWalletConnect() {
            try {
                // Initialize WalletConnect Web3Modal
                const modalOptions = {
                    projectId: CONFIG.PROJECT_ID,
                    metadata: {
                        name: CONFIG.APP_NAME,
                        description: CONFIG.APP_DESCRIPTION,
                        url: CONFIG.APP_URL,
                        icons: [CONFIG.APP_ICON]
                    }
                };

                const ethersConfig = EthereumProvider.createWeb3Modal(modalOptions);
                await ethersConfig.connect();

                const provider = new ethers.BrowserProvider(ethersConfig);
                signer = await provider.getSigner();
                userAddress = await signer.getAddress();

                await authenticateUser(userAddress);
            } catch (error) {
                throw new Error('WalletConnect connection failed: ' + error.message);
            }
        }

        async function connectCoinbaseWallet() {
            try {
                if (!window.coinbaseWalletExtension) {
                    throw new Error('Coinbase Wallet not installed');
                }

                const provider = window.coinbaseWalletExtension.providers[0];
                const accounts = await provider.request({
                    method: 'eth_requestAccounts'
                });

                userAddress = accounts[0];
                const ethProvider = new ethers.BrowserProvider(provider);
                signer = await ethProvider.getSigner();

                await authenticateUser(userAddress);
            } catch (error) {
                throw new Error('Coinbase Wallet connection failed: ' + error.message);
            }
        }

        async function authenticateUser(address) {
            try {
                showStatus('📝 Getting message to sign...', 'info');

                // Step 1: Get nonce from backend
                const nonceResponse = await fetch('/api/web3/nonce', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify({ wallet_address: address })
                });

                if (!nonceResponse.ok) {
                    throw new Error('Failed to get nonce');
                }

                const nonceData = await nonceResponse.json();
                const nonce = nonceData.nonce;
                const message = `Sign this message to login to BVOX:\n\nNonce: ${nonce}`;

                showStatus('✍️ Please sign the message in your wallet...', 'info');

                // Step 2: Sign message
                const signature = await signer.signMessage(message);

                showStatus('✓ Message signed! Verifying...', 'info');

                // Step 3: Verify signature on backend
                const verifyResponse = await fetch('/api/web3/verify', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify({
                        wallet_address: address,
                        signature: signature,
                        nonce: nonce
                    })
                });

                if (!verifyResponse.ok) {
                    const error = await verifyResponse.json();
                    throw new Error(error.message || 'Verification failed');
                }

                const verifyData = await verifyResponse.json();
                
                // Step 4: Store token and redirect
                localStorage.setItem('auth_token', verifyData.token);
                localStorage.setItem('user_address', address);

                showStatus('✓ Login successful! Redirecting...', 'success');

                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 1500);

            } catch (error) {
                console.error('Authentication error:', error);
                showStatus('❌ ' + error.message, 'error');
                
                // Reset UI
                userAddress = null;
                provider = null;
                signer = null;
                selectedWallet = null;
            }
        }

        function checkAuthStatus() {
            const token = localStorage.getItem('auth_token');
            const address = localStorage.getItem('user_address');

            if (token && address) {
                document.getElementById('notConnected').style.display = 'none';
                document.getElementById('userInfo').classList.add('show');
                document.getElementById('userAddress').textContent = address;
            }
        }

        function logout() {
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_address');
            document.getElementById('userInfo').classList.remove('show');
            document.getElementById('notConnected').style.display = 'block';
            showStatus('✓ Logged out successfully', 'success');
        }

        function showStatus(message, type = 'info', elementId = 'status') {
            const statusEl = document.getElementById(elementId);
            statusEl.textContent = message;
            statusEl.className = 'status show ' + type;
        }

        function clearStatus(elementId = 'status') {
            const statusEl = document.getElementById(elementId);
            statusEl.className = 'status';
            statusEl.textContent = '';
        }

        // Prevent accidental page navigation when modal is open
        window.addEventListener('beforeunload', (e) => {
            if (document.getElementById('connectModal').classList.contains('show')) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>
