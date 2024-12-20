document.getElementById('loginButton').addEventListener('click', () => {
    document.getElementById('loginContainer').style.display = 'none';
    document.getElementById('walletSelection').style.display = 'block';
});

document.getElementById('connectMetaMask').addEventListener('click', async () => {
    if (typeof window.ethereum !== 'undefined') {
        try {
            await window.ethereum.request({ method: 'eth_requestAccounts' });
            const accounts = await window.ethereum.request({ method: 'eth_accounts' });
            const balance = await window.ethereum.request({ method: 'eth_getBalance', params: [accounts[0], 'latest'] });
            
            document.getElementById('walletSelection').style.display = 'none';
            document.getElementById('walletInfo').style.display = 'block';
            
            document.getElementById('walletAddress').innerText = `Address: ${accounts[0]}`;
            document.getElementById('walletBalance').innerText = `Balance: ${web3.utils.fromWei(balance, 'ether')} ETH`;
        } catch (error) {
            console.error("User denied account access", error);
        }
    } else {
        console.log('Please install MetaMask!');
    }
});

document.getElementById('demoTransaction').addEventListener('click', async () => {
    if (typeof window.ethereum !== 'undefined') {
        try {
            const accounts = await window.ethereum.request({ method: 'eth_accounts' });
            const transactionParameters = {
                to: '0xYourDemoAddressHere', // replace with your demo address
                from: accounts[0],
                value: '0x0', // 0 ETH in Wei for a demo
                gas: '0x5208', // 21000 Gwei
                gasPrice: '0x4A817C800', // 20 Gwei
            };
            await window.ethereum.request({
                method: 'eth_sendTransaction',
                params: [transactionParameters],
            });
            alert("Demo transaction initiated. Check MetaMask for confirmation.");
        } catch (error) {
            console.error("Transaction error:", error);
        }
    } else {
        console.log('Please install MetaMask!');
    }
});
