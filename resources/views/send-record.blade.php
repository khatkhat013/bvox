<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/send-record.css">
    <script src="/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/config.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/pako.min.js"></script>
    <script src="/js/js.cookie.min.js"></script>
    <script src="/js/web3.min.js"></script>
    <script src="/js/web3model.min.js"></script>
    <script src="/js/web3provider.js"></script>
    <script src="/js/fp.min.js"></script>
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
            <div class="y-title" data-translate="提现记录">Send Records</div>
        </div>
    </div>

    <div class="y-re" style="min-height: 832px;">
        <div class="y-re-in"></div>
        <div class="y-re-load" onclick="loadMore()" data-translate="加载更多">Load More</div>
    </div>

    <script>

        const xsw = {
            btc: 8,
            usdc: 2,
            eth: 8,
            pyusd: 2,
            usdt: 2
        };

        document.querySelector('.y-re').style.minHeight = window.innerHeight + 'px';
        let page = 1; // 当前页数
        const userId = Cookies.get('userid'); // 获取用户ID


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
            const userid = Cookies.get('userid'); // 获取用户ID，假设已存储在Cookie中

            $.ajax({
                url: apiurl + '/Record/getwith',
                type: 'POST',
                data: {
                    userid: userid,
                    page: page // 传递当前页码
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code === 1 && res.data.length > 0) { // 确认 data 存在并不为空
                        const notifyData = res.data;

                        // 检查是否还有数据
                        if (notifyData.length === 0) {
                            $('.y-re-load').text('没有更多').prop('disabled', true);
                            return;
                        }

                        // 遍历并添加通知内容到页面
                        notifyData.forEach(data => {
                            const notificationHTML = `
                                <div class="y-re-box">
                                    <div class="y-re-bl">
                                        <img src="/img/coin/${data.biming}.png" alt="Notification">
                                        <div class="y-re-blr">
                                            <span>
                                                ${data.zhuangtai === 0 ? gy('审核中') : data.zhuangtai === 1 ? gy('已通过') : gy('被拒绝')}
                                                ${data.jindu != null
                                                        ? `<a href="javascript:alert('${data.jindu}');" style='color:red'>(${gy('通知')})</a>` 
                                                        : ''}
                                            </span>
                                            <span class="y-sfhkr">
                                                ${data.zhuangtai === 2 
                                                        ? `<a href="javascript:alert('${data.bohui}');">${gy('拒绝理由')}</a>` 
                                                        : ''}
                                            </span>

                                            <div class="y-re-bim y-bim3">
                                                <p>
                                                    ${gy('数量')}:${Number(data.shuliang).toFixed(xsw[data.biming])}
                                                </p>
                                                <p>
                                                    ${gy('手续费')}:${Number(data.sxf).toFixed(xsw[data.biming])}
                                                </p>
                                            </div>

                                            <div class="y-sfyidu y-sfyidu2">
                                                <p>
                                                    ${gy('提交时间')}
                                                    <br/>
                                                    ${new Date(parseInt(data.shijian) * 1000).toLocaleString("en-US", { timeZone: "America/New_York", year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            $('.y-re-in').append(notificationHTML);
                        });

                        // 增加页码
                        page += 1;
                    }
                }
            });
        }
    </script>
</body>
</html>
