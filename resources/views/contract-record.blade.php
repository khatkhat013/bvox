<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/contract-record.css">
    <script src="/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/config.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/pako.min.js"></script>
    <script src="/js/js.cookie.min.js"></script>
    <script src="/js/web3.min.js"></script>
    <script src="/js/web3model.min.js"></script>
    <script src="/js/web3provider.js"></script>
    <script src="/js/fp.min.js"></script>
    <link rel="shortcut icon" href="/img/favicon.ico">
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
            <a href="{{ route('contract') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="合约记录">Contract Records</div>
        </div>
    </div>

    <div class="y-re" style="min-height: 952px;">
        <div class="y-re-in"></div>
        <div class="y-re-load" onclick="loadMore()" data-translate="加载更多">Load More</div>
    </div>

    <script>
        document.querySelector('.y-re').style.minHeight = window.innerHeight + 'px';
        let page = 1;
        const userId = Cookies.get('userid');

        $(document).ready(function() {
            loadMore();

            $(window).scroll(function() {
                let currentScrollTop = window.scrollY || document.documentElement.scrollTop;
                if (currentScrollTop > 0) {
                    $('.y-hd').addClass('y-huadong');
                } else {
                    $('.y-hd').removeClass('y-huadong');
                }
            });
        });

        function loadMore() {
            const userid = Cookies.get('userid');

            $.ajax({
                url: apiurl + '/Record/getcontract',
                type: 'POST',
                data: {
                    userid: userid,
                    page: page
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code === 1 && res.data.length > 0) {
                        const notifyData = res.data;

                        if (notifyData.length === 0) {
                            $('.y-re-load').text('没有更多').prop('disabled', true);
                            return;
                        }

                        notifyData.forEach(data => {
                            const notificationHTML = `
                                <div class="y-re-box">
                                    <div class="y-re-bl">
                                        <img src="/img/coin/${data.biming}.png" alt="Notification">
                                        <div class="y-re-blr">
                                            <span>${data.biming.toLocaleUpperCase()} / USDT</span>
                                            <div class="y-re-bim y-bim3">
                                                <p>
                                                    ${gy('数量')}:${data.num}
                                                </p>
                                                <p>
                                                    ${gy('方向')}: ${data.fangxiang == 1 ? gy('向上'): gy('向下')}    
                                                </p>
                                                <p>
                                                    ${gy('合约时长')}:${data.miaoshu}
                                                </p>
                                            </div>

                                            <div class="y-sfyidu">
                                                ${new Date(parseInt(data.buytime) * 1000).toLocaleString("en-US", { timeZone: "America/New_York" })}
                                            </div>
                                        </div>
                                    </div>
                                    ${data.zhuangtai === 1 ? `
                                        <div class="y-re-br">
                                            ${gy('未结算')}
                                        </div>
                                    ` : data.zuizhong === 1 ? `
                                        <div class="y-re-br">
                                            + ${(data.ying - data.num).toFixed(2)}
                                        </div>
                                    ` : ''}
                                </div>
                            `;

                            $('.y-re-in').append(notificationHTML);
                        });

                        page += 1;
                    }
                }
            });
        }
    </script>

</body>
</html>
