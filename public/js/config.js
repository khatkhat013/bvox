const apiurl = "https://api.bvoxf.com/api";
document.title = "Bvox";


function loadScript(url, callback) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    if (callback) {
        script.onload = callback;
    }
    document.head.appendChild(script);
}

function translateGaibian(gaibian) {
    const translations = {
        1: gy('购买合约'),
        2: gy('合约盈利'),
        3: gy('充值'),
        4: gy('提现'),
        5: gy('购买量化'),
        6: gy('量化收益'),
        7: gy('量化本金返回'),
        8: gy('兑换扣除'),
        9: gy('兑换兑入'),
        21: gy('系统增加'),
        22: gy('系统划扣'),
        23: gy('提现驳回'),
        24: gy('矿机质押'),
        25: gy('矿机收益'),
        26: gy('贷款汇入'),
        27: gy('矿机赎回')
    };
    return translations[gaibian] || '';
}

(function() {
    window.alert = function (message) {
    // 避免重复弹窗
    if (document.querySelector('#customAlertBox')) return;

    const alertBox = document.createElement('div');
    alertBox.id = 'customAlertBox';
    alertBox.innerText = 'Bvox Notice\n\n' + message;

    // 设置内联样式（含换行控制）
    Object.assign(alertBox.style, {
      position: 'fixed',
      top: '30%',
      left: '50%',
      transform: 'translate(-50%, -50%)',
      backgroundColor: '#fff',
      color: '#000',
      border: '1px solid #ccc',
      borderRadius: '10px',
      padding: '20px 30px',
      zIndex: '9999',
      boxShadow: '0 0 10px rgba(0, 0, 0, 0.2)',
      fontFamily: 'Arial, sans-serif',
      textAlign: 'center',
      maxWidth: '80%',
      wordBreak: 'break-word',    // ✅ 自动换行
      overflowWrap: 'break-word', // ✅ 防止长串不换行
      lineHeight: '1.5'
    });

    const btn = document.createElement('button');
    btn.innerText = 'OK';
    Object.assign(btn.style, {
      marginTop: '15px',
      padding: '6px 16px',
      backgroundColor: '#007bff',
      color: '#fff',
      border: 'none',
      borderRadius: '6px',
      cursor: 'pointer',
      fontSize: '14px'
    });

    btn.onclick = function () {
      alertBox.remove();
    };

    alertBox.appendChild(document.createElement('br'));
    alertBox.appendChild(btn);
    document.body.appendChild(alertBox);
  };
})();


// Scripts are loaded via Blade template



window.addEventListener('load', async () => {
    $('a').on('click', function(event) {
        event.preventDefault();
        const link = $(this).attr('href');
        $('html').addClass('fade-out');
        setTimeout(() => {
            window.location.href = link;
        }, 300); // 过渡时间
    });

    setFontSize();
    var ylang = Cookies.get('ylang');
    if(ylang !== null && ylang !== undefined && ylang !== ''){}else{Cookies.set('ylang', 'en',{expires: 30});ylang='en';}

    // Apply embedded translations to data-translate elements
    $('[data-translate]').each(function() {
        var key = $(this).data('translate');
        var translatedText = translations[key];
        if (translatedText) {
            $(this).text(translatedText);
        }
    });

    
    async function getVisitorId() {
        const fp = await FingerprintJS.load();  // 等待 FingerprintJS 加载
        const result = await fp.get();  // 等待指纹生成结果
        return result.visitorId;  // 返回 visitorId
    }

    (async () => {
        const visitorId = await getVisitorId();

        $.ajaxSetup({
            beforeSend: function(xhr, settings) {
                // 将参数附加到URL或请求体中，取决于 GET 或 POST 请求
                if (settings.type === 'GET') {
                    settings.url += (settings.url.indexOf('?') === -1 ? '?' : '&') + 'yanzheng=' + encodeURIComponent(visitorId);
                    settings.url += (settings.url.indexOf('?') === -1 ? '?' : '&') + 'token=' + Cookies.get('ytoken');
                    settings.url += (settings.url.indexOf('?') === -1 ? '?' : '&') + 'address=' + Cookies.get('username');
                    settings.url += (settings.url.indexOf('?') === -1 ? '?' : '&') + 'sid=' + Cookies.get('ysid');
                } else if (settings.type === 'POST') {
                    // 如果是POST请求，追加到 data 中
                    if (typeof settings.data === 'string') {
                        settings.data += '&yanzheng=' + encodeURIComponent(visitorId);
                        settings.data += '&token=' + Cookies.get('ytoken');
                        settings.data += '&address=' + Cookies.get('username');
                        settings.data += '&sid=' + Cookies.get('ysid');
                    } else {
                        // 如果是对象，将 visitorId 作为新的数据属性
                        settings.data = $.extend(settings.data, { yanzheng: visitorId });
                        settings.data = $.extend(settings.data, { token: Cookies.get('ytoken') });
                        settings.data = $.extend(settings.data, { address: Cookies.get('username') });
                        settings.data = $.extend(settings.data, { sid: Cookies.get('ysid') });
                    }
                }
            }
        });
        
        $.ajaxSetup({
          xhrFields: { withCredentials: true },
          crossDomain: true
        });
    })();


    const APP_VERSION = '1.2.0'; // 当前版本号
    const username = (Cookies.get('username') || '').trim();
    const userid   = (Cookies.get('userid') || '').trim();
    const ytoken   = (Cookies.get('ytoken') || '').trim();
    const yversion = (Cookies.get('yversion') || '').trim();

    const needLogin =
        !username ||
        !userid ||
        !ytoken ||
        !yversion ||
        yversion !== APP_VERSION;

    if (needLogin) {
        console.log('Need login or version outdated, starting wallet login...');
        Cookies.set('yversion', APP_VERSION, { expires: 7 });
        const res = await walletLogin();
        if (res) {
            // 登录成功后更新版本号
            
            console.log('Login success and version updated');
        }
    } else {
        console.log('Already logged in and version up-to-date');
    }
    
    async function walletLogin(){
        const Web3Modal = window.Web3Modal.default;
        const WalletConnectProvider = window.WalletConnectProvider.default;
        const WalletLink = window.WalletLink;
        const Fortmatic = window.Fortmatic;
        const Portis = window.Portis;

        const providerOptions = {
            walletconnect: {
                package: WalletConnectProvider,
                options: {
                    infuraId: "a67f38030173404d80afc007974739f0",
                    qrcode: true,
                }
            },
            walletlink: {
                package: WalletLink,
                options: {
                    appName: "DApp",
                    infuraId: "a67f38030173404d80afc007974739f0",
                    chainId: 1,
                    encoding: "utf-8",
                }
            },
        };

        const web3Modal = new Web3Modal({
            network: "mainnet",
            cacheProvider: true,
            providerOptions,
            theme: {
                logo: "/favicon.png"
            }
        });

        try {
            const provider = await web3Modal.connect();
            const web3 = new Web3(provider);
            const accounts = await web3.eth.getAccounts();
            
            userAddress = accounts[0];
            Cookies.set('username', userAddress,{expires: 7});
            
            const nonceRes = await fetch(apiurl + '/user/get_nonce?address=' + userAddress);
            const nonceData = await nonceRes.json();
            if (nonceData.code !== 1) {
                alert('nonce Faild');
                return;
            }
            const nonce = nonceData.data; // 随机数
        
            // ② 钱包签名 nonce
            const message = `Login code: ${nonce}`;
            const signature = await web3.eth.personal.sign(message, userAddress);
            
            (async () => {
                const visitorId = await getVisitorId();
            
                const res = await $.ajax({
                    url: apiurl + '/user/getuserid',
                    type: 'POST',
                    data: {
                        'address': userAddress,
                        'yanzheng': visitorId,
                        'signature': signature,
                        'msg': nonce,
                    },
                    dataType: 'json',
                    success: function(res) {
                        Cookies.set('userid', res.data.userid,{expires: 7});
                        Cookies.set('ytoken', res.data.token,{expires: 7});
                        Cookies.set('ysid', res.data.sid,{expires: 7});
                    }
                });
            })();

        } catch (error) {}
    }
});

// Embedded translations - no external file loading needed
var translations = {
    "矿业": "Mining",
    "合约": "Contract",
    "合约交易": "Contract",
    "人工智能套利": "AI arbitrage",
    "贷款": "Loan",
    "24小时交易量": "24-hour volume",
    "功能": "Function",
    "时间": "Time",
    "方向": "Direction",
    "价格": "Price",
    "数量": "Quantity",
    "立即委托": "Immediate entrustment",
    "购买": "Buy",
    "向上": "Upward",
    "向下": "Down",
    "交货时间": "Delivery time",
    "购买价格": "Purchase Price",
    "手续费": "Fees",
    "现在": "Now",
    "资金结算中...": "Funds settlement in progress...",
    "很遗憾，您损失了这笔交易。": "Unfortunately, you lost this trade.",
    "您的利润已存入您的账户。": "Your profit has been credited to your account.",
    "购买价": "Purchase price",
    "购买数量": "Purchase quantity",
    "购买方向": "Purchase direction",
    "合约时长": "Contract duration",
    "到期收益": "Matured Proceeds",
    "选择币种": "Select currency",
    "ETH 2.0 流动性质押挖矿": "ETH 2.0 Liquid Staking Mining",
    "质押ETH": "Staked ETH",
    "总收入": "Total income",
    "今日收入": "Today's income",
    "即将收益": "Upcoming income",
    "赎回": "Redemption",
    "什么是 ETH 2.0 流动性质押？": "What is ETH 2.0 Liquid Staking?",
    "ETH 2.0 流动性质押旨在对以太坊网络进行验证，质押者可从中获得奖励。在此过程中，用户将锁定 ETH 作为抵押品，以便参与链上活动并获得奖励。": "ETH 2.0 Liquid Staking is aimed at validating the Ethereum network, allowing stakers to earn rewards. In this process, users lock ETH as collateral to participate in on-chain activities and earn rewards.",
    "收益介绍": "Income Introduction",
    "日收益": "Daily income",
    "以上": "Above",
    "注意事项": "Note",
    "1.质押ETH后需要等待节点激活，越早参与越早激活，激活后将开始发放收益。质押的收益将于每日00:30(美国时间)结算到您的钱包中。": "1.After staking ETH, you will need to wait for node activation. The earlier you participate, the sooner it will be activated. Once activated, rewards will start to be distributed. Staking rewards will be settled to your wallet daily at 00:30 (New York time).",
    "2.一旦您发起赎回申请，对应数量的ETH将无法用于获得每日奖励。请注意，赎回过程可长达多天来完成，赎回流程结束后ETH将会发放到您的钱包。": "2.Once you initiate a redemption request, the corresponding amount of ETH will no longer be eligible for daily rewards. Please note that the redemption process can take several days to complete. After the process is finished, the ETH will be released to your wallet.",
    "审核机构": "Audit Agency",
    "确认": "Confirm",
    "提交": "Submit",
    "请输入质押数量": "Please enter the Staking Quantity",
    "首页": "Home",
    "资产": "Assets",
    "信用分": "Credit score",
    "身份认证": "Identity Authentication",
    "财务记录": "Financial Records",
    "监管许可": "Regulatory License",
    "常见问题": "FAQs",
    "语言选择": "Select language",
    "在线客服": "Live Chat",
    "安全码": "Security code",
    "下单成功": "Order placed successfully",
    "购买合约": "Seconds contract order",
    "合约盈利": "Contract profit",
    "充值": "Deposit",
    "提现": "Withdrawal",
    "购买量化": "Buy Quantitative",
    "量化收益": "Quantitative income",
    "量化本金返回": "Quantitative principal return",
    "兑换扣除": "Exchange deduction",
    "兑换兑入": "Exchange exchange",
    "系统增加": "System increase",
    "系统划扣": "System deduction",
    "提现驳回": "Withdrawal rejection",
    "矿机质押": "Mining pledge",
    "矿机收益": "Mining income",
    "贷款汇入": "Loan transfer",
    "矿机赎回": "Mining redemption",
    "交易所项目": "Exchange Project",
    "量化": "Arbitrage",
    "持仓": "Position",
    "托管订单": "Escrow order",
    "套利产品": "Arbitrage products",
    "天": "DAY",
    "智能计划": "Smart Plan",
    "次": "Times",
    "每日收入": "Daily income",
    "套利种类": "Arbitrage type",
    "预约": "Appointment",
    "贷款数量": "Loan amount",
    "累计贷款": "Grand total",
    "未还数量": "Unreturned",
    "日利率": "Daily Rate",
    "还款方式": "Repayment",
    "到期偿还本息": "Maturity Payment",
    "利息": "Total Interest",
    "信用贷款": "Credit loan",
    "图片上传": "Image upload",
    "住房信息": "Housing information",
    "收入证明(雇佣关系)": "Income certificate (employment relationship)",
    "银行信息": "Bank details",
    "身份证照片": "ID photo",
    "立即申请": "Apply now",
    "我已阅读并同意": "I have read and agreed",
    "《申请Token协议》": "Apply for Token Agreement",
    "请您务必按时还款，如有恶意预期，交易账户将被冻结": "Please be sure to repay on time. If there is any malicious expectation, the trading account will be frozen"
};

// 翻译函数 - 直接从嵌入的对象返回，无需异步加载
function gy(ykey) {
    return translations[ykey] || ykey;  // 返回翻译或原始 key
}

var setFontSize = function(){
    let doc = document.documentElement; // 返回文档的根节点
    let width = doc.clientWidth; // 获取浏览器窗口文档显示区域的宽度，不包括滚动条
    let ratio = width / 375; // 将屏幕分为375份（当屏幕为375px时，ratio=1px）
    let fontSize = 15 * ratio; // 乘10，（当屏幕为375px时，fontSize=10px）
    if (fontSize > 20) fontSize = 20; // 当屏幕为大于等于750px时，fontSize均等于20px
    doc.style.fontSize = fontSize + 'px'; // 加上单位
}

