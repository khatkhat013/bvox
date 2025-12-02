<!DOCTYPE html>
<html lang="en" style="font-size: 11.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/notify.css">
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
    <link rel="manifest" href="https://www.bvoxf.com/manifest.json">
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
            <a href="{{ route('index') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="通知">Notify</div>
        </div>
    </div>

    <div class="y-re" style="min-height: 938px;">
        <div class="y-re-in"></div>
        <div class="y-re-load" onclick="loadMore()" data-translate="加载更多">Load More</div>
    </div>

    <script>
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
                url: apiurl + '/User/getNotify',
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
                            $('.y-re-load').text(gy('没有更多通知')).prop('disabled', true);
                            return;
                        }

                        // 遍历并添加通知内容到页面
                        notifyData.forEach(data => {
                            const notificationHTML = `
                                <a href="{{ route('index') }}?notify_id=${data.id}" class="y-re-box y-sf2">
                                    <div class="y-re-bl y-re-bl2">
                                        <img src="/img/coin/usdt.png" alt="Notification">
                                        <div class="y-re-blr y-blr2">
                                            <span>${gy(data.biaoti)}</span>
                                            <div class="y-re-bim y-bim2">${gy(data.neirong)}</div>
                                            <div class="y-sfyidu">
                                                ${new Date(parseInt(data.shijian) * 1000).toLocaleString("en-US", { timeZone: "America/New_York" })}
                                                <span class="y-read-status ${data.sfyidu === 0 ? 'y-read-show' : ''}">
                                                    ${data.sfyidu === 0 ? gy('未读') : gy('已读')}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
