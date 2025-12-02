<!DOCTYPE html>
<html lang="en" style="font-size: 17.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/loan-record.css">
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
            <a href="{{ route('loan') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="贷款记录">Loan Records</div>
        </div>
    </div>

    <div class="y-re" style="min-height: 952px;">
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
                url: apiurl + '/Record/getloan',
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
                            $('.y-re-load').text(gy('没有更多')).prop('disabled', true);
                            return;
                        }

                        // 遍历并添加通知内容到页面
                        notifyData.forEach(data => {
                            const notificationHTML = `
                                <div class="y-re-box">
                                    <div class="y-re-bl">
                                        <img src="/img/coin/usdt.png" alt="Notification">
                                        <div class="y-re-blr">
                                            <span>
                                                ${data.zhuangtai === 0 ? gy('审核中') : data.zhuangtai === 1 ? gy('已通过') : gy('被拒绝')}
                                            </span>
                                            <span class="y-sfhkr">
                                                ${data.zhuangtai === 1 
                                                    ? (data.shifouhuankuan === 0 
                                                        ? gy('未还款') 
                                                        : gy('已还款')) 
                                                    : (data.zhuangtai === 2 
                                                        ? `<a href="javascript:alert('${data.bohui}');">${gy('拒绝理由')}</a>` 
                                                        : '')}
                                            </span>

                                            <div class="y-re-bim y-bim3">
                                                <p>
                                                    ${gy('数量')}:${data.shuliang}
                                                </p>
                                                <p>
                                                    ${gy('天数')}: ${data.tianshu}
                                                </p>
                                                <p>
                                                    ${gy('利息')}: ${data.lixi}
                                                </p>
                                            </div>

                                            <div class="y-sfyidu y-sfyidu2">
                                                <p>
                                                    ${gy('提交时间')}
                                                    <br/>
                                                    ${new Date(parseInt(data.shijian) * 1000).toLocaleString("en-US", { timeZone: "America/New_York", year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })}
                                                </p>

                                                ${data.zhuangtai === 1 ? `
                                                    <p>
                                                        ${gy('通过时间')}
                                                        <br/>
                                                        ${new Date(parseInt(data.tongguoshijian) * 1000).toLocaleString("en-US", { timeZone: "America/New_York", year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })}
                                                    </p>
                                                ` : ''}

                                                ${data.zhuangtai === 1 ? `
                                                    <p>
                                                        ${gy('还款时间')}
                                                        <br/>
                                                        ${new Date(parseInt(data.huankuanshijian) * 1000).toLocaleString("en-US", { timeZone: "America/New_York", year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })}
                                                    </p>
                                                ` : ''}
                                            </div>
                                        </div>
                                    </div>
                                    ${data.shifouhuankuan === 1 ? `
                                    ` : data.zhuangtai === 1 ? `
                                        <a href="javascript:guihuan('${data.id}');" class="y-re-br">
                                            ${gy('归还')}
                                        </a>
                                    ` : ''}
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
    <div id="WEB3_CONNECT_MODAL_ID"></div>
</body>
</html>
