<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Connect DApp</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="https://unpkg.com/ethers@6.7.0/dist/ethers.umd.min.js"></script>
<script type="module">
import { WalletConnectModal } from "https://unpkg.com/@walletconnect/modal@2.6.2/dist/index.js";
import { EthereumProvider } from "https://unpkg.com/@walletconnect/ethereum-provider@2.11.2/dist/index.es.js";

// -------------------------------------------
// CONFIG
// -------------------------------------------
const projectId = "YOUR_WALLETCONNECT_PROJECT_ID";  // <<<<< CHANGE THIS

let provider;
let walletAddress;

// auto open modal after page load
window.onload = () => openConnectModal();

// -------------------------------------------
// OPEN WALLETCONNECT MODAL
// -------------------------------------------
async function openConnectModal() {
    const modal = new WalletConnectModal({
        projectId: projectId,
        themeMode: "dark"
    });

    provider = await EthereumProvider.init({
        projectId,
        chains: [1],
        showQrModal: true
    });

    await provider.connect();

    const accounts = provider.accounts;
    walletAddress = accounts[0];

    document.getElementById("walletText").innerText = walletAddress;

    // after connect -> sign login nonce
    startLogin();
}

// -------------------------------------------
// SIGN MESSAGE LOGIN
// -------------------------------------------
async function startLogin() {
    const req = await fetch("/api/web3/nonce", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ wallet_address: walletAddress })
    });

    const json = await req.json();
    const nonce = json.nonce;

    // sign message
    const signer = new ethers.BrowserProvider(provider).getSigner();
    const signature = await (await signer).signMessage(nonce);

    // send to backend
    const verifyReq = await fetch("/api/web3/verify", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            wallet_address: walletAddress,
            signature: signature
        })
    });

    const verifyRes = await verifyReq.json();

    if (verifyRes.token) {
        localStorage.setItem("token", verifyRes.token);
        window.location.href = "/dashboard"; // redirect
    } else {
        alert("Login failed!");
    }
}
</script>

<style>
body {
    background: #111;
    color: #fff;
    font-family: Arial;
    text-align: center;
    padding-top: 80px;
}
.card {
    background: #181818;
    padding: 30px;
    margin: auto;
    width: 90%;
    max-width: 380px;
    border-radius: 16px;
    box-shadow: 0 0 20px #000;
}
h2 {
    margin-bottom: 10px;
    font-size: 26px;
}
.network-box {
    padding: 14px;
    margin-top: 20px;
    border-radius: 12px;
    background: #222;
}
.buttonRow {
    margin-top: 25px;
    display: flex;
    gap: 10px;
}
.btn {
    flex: 1;
    padding: 14px;
    border-radius: 12px;
    border: none;
    font-size: 17px;
    cursor: pointer;
}
.cancelBtn {
    background: #444;
}
.connectBtn {
    background: #2d57ff;
    color: #fff;
}
</style>
</head>

<body>

<div class="card">
    <h2>Connect DApp</h2>
    <p>Website wants to connect to your wallet</p>

    <div class="network-box">
        <strong>Ethereum</strong><br />
        <small id="walletText">Waiting for connection…</small>
    </div>

    <div class="buttonRow">
        <button class="btn cancelBtn" onclick="location.reload()">Cancel</button>
        <button class="btn connectBtn" onclick="openConnectModal()">Connect</button>
    </div>
</div>

</body>
</html>
