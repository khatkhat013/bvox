<!DOCTYPE html>
<html lang="en" style="font-size: 12.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/record.css">
    <script src="/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/config.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/pako.min.js"></script>
    <script src="/js/js.cookie.min.js"></script>
    <script src="/js/web3.min.js"></script>
    <script src="/js/web3model.min.js"></script>
    <script src="/js/web3provider.js"></script>
    <script src="/js/fp.min.js"></script>
    <link rel="shortcut icon" href="https://www.bvoxf.com/favicon.ico">
    <meta property="og:image" content="/favicon.png">

    <style>
        html{
            background: linear-gradient(to bottom, #2b5279 5%, #6485a4 60%);
        }
        body{
            background: url(/img/leaf-bg.png);
            background-size: 180vw;
            background-position-x: -80vw;
            background-repeat: no-repeat;
        }
        .y-hd{
            height: 4rem!important;
        }
    </style>
</head>
<body>
    <div class="y-hd">
        <div class="yc-header">
            <a href="{{ route('assets') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="资金记录">Financial Records</div>
            <div class="y-re-r">
                <div class="custom-select" id="custom-select">
                    <div class="select-trigger" data-translate="请选择">Select</div>
                    <div class="select-options">
                        <div class="select-option" data-value="0" data-translate="所有">All</div>
                        <div class="select-option" data-value="1" data-translate="购买合约">Seconds contract order</div>
                        <div class="select-option" data-value="2" data-translate="合约盈利">Seconds settlement</div>
                        <div class="select-option" data-value="3" data-translate="充值">Top-up</div>
                        <div class="select-option" data-value="4" data-translate="提现">Withdrawal</div>
                        <div class="select-option" data-value="5" data-translate="购买量化">Buy AI arbitrage</div>
                        <div class="select-option" data-value="6" data-translate="量化收益">AI arbitrage income</div>
                        <div class="select-option" data-value="7" data-translate="量化本金返回">AI set recycling</div>
                        <div class="select-option" data-value="8" data-translate="兑换扣除">Cash out</div>
                        <div class="select-option" data-value="9" data-translate="兑换兑入">Cash in</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="y-re" style="min-height: 938px;"><div class="y-re-load" onclick="loadmore()">Load More</div></div>

    <script>
        document.querySelector('.y-re').style.minHeight = window.innerHeight + 'px';
        let page = 1; // 当前页数
        const userId = Cookies.get('userid'); // 获取用户ID
        const xsw = { btc: 8, usdc: 2, eth: 8, pyusd: 2, usdt: 2 }; // 小数位数配置

        var urlParams = new URLSearchParams(window.location.search);
        var type = urlParams.get('type');

        $(document).ready(function() {
            loadTransactions();

            $(window).scroll(function() {
                let currentScrollTop = window.scrollY || document.documentElement.scrollTop;
                if (currentScrollTop > 0) {
                    $('.y-hd').addClass('y-huadong');
                } else {
                    $('.y-hd').removeClass('y-huadong');
                }
            });
        });

        function loadTransactions() {
            $.ajax({
                url: apiurl + '/Record/getTransactions', // 后端接口URL
                type: 'POST',
                data: {
                    userid: userId,
                    page: page,
                    type: type // 传入交易类型
                },
                success: function(res) {
                    if (res.code === 1) {
                        $('.y-re-load').remove();
                        const transactions = res.data;
                        
                        transactions.forEach(transaction => {
                            const date = new Date(transaction.shijian * 1000);
                            const formattedDate = date.toLocaleString();

                            const decimalPlaces = xsw[transaction.bizhong.toLowerCase()] || 2;
                            const formattedAmount = parseFloat(transaction.jine).toFixed(decimalPlaces);
                            
                            const transactionHtml = `
                                <div class="y-re-box">
                                    <div class="y-re-bl">
                                        <img src="/img/coin/${transaction.bizhong.toLowerCase()}.png" />
                                        <div class="y-re-blr">
                                            <span>${translateGaibian(transaction.gaibian)}</span>
                                            <div class="y-re-bim">${transaction.bizhong.toLocaleUpperCase()}</div>
                                            <div>${formattedDate}</div>
                                        </div>
                                    </div>
                                    <div class="y-re-br">
                                        <span class="y-re-je">${transaction.gaibian === 3 || transaction.gaibian === 6 || transaction.gaibian === 9 || transaction.gaibian === 21|| transaction.gaibian === 23|| transaction.gaibian === 25 ? '+' : '-'}${formattedAmount}</span>
                                    </div>
                                </div>`;
                            $('.y-re').append(transactionHtml);
                        });
                        const jzgd = `<div class="y-re-load" onclick="loadmore()">${gy('加载更多')}</div>`;
                        $('.y-re').append(jzgd);
                        page++;
                    }
                },
                error: function() {
                    alert(gy('失败'));
                }
            });
        }

        function loadmore(){
            loadTransactions();
        }

        $('.select-trigger').click(function() {
            $('.select-options').toggle(); // 切换显示状态
        });

        // 点击选项
        $('.select-option').click(function() {
            const selectedText = $(this).text();
            const selectedValue = $(this).data('value');
            
            // 关闭下拉选项
            $('.select-options').hide();

            type = selectedValue;
            page = 1; // 重置页数
            $('.y-re').empty(); // 清空当前内容
            loadTransactions(); // 重新加载数据
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('#custom-select').length) {
                $('.select-options').hide();
            }
        });

    </script>

</body>
</html>
