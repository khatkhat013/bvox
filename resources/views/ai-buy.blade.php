<!DOCTYPE html>
<html lang="en" style="font-size: 17.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/ai-buy.css">
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
            overflow-y: hidden;
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
            <a href="{{ route('ai-arbitrage') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="量化">Arbitrage</div>
        </div>
    </div>
    <div class="y-aib" style="height: 100rem;">
        <div class="y-aib-top">
            <div class="y-aib-tl">
                <div class="y-aib-tit" data-translate="加入人工智能套利">Join AI arbitrage</div>
                <div class="y-aib-p" data-translate="在全球200+交易所进行智能交易">Smart trading on 200+ exchanges around the world</div>
            </div>
            <img src="/img/aitl1.png">
        </div>
        <div class="y-aib-center">
            <div class="y-aib-ctop">
                <div class="y-aib-ctl">
                    <span class="y-aib-ctl-1">
                        <img src="/img/tl1.jpg">
                        <p>Smart Plan A</p>
                    </span>
                    <span class="y-aib-ctl-2">Quantity</span>
                    <span class="y-aib-ctl-3">$<b>500.00-5000.00</b></span>
                </div>
                <div class="y-aib-ctr">
                    <span class="y-aib-ctr-1">1 <b>DAY</b></span>
                    <span class="y-aib-ctr-2">Daily income</span>
                    <span class="y-aib-ctr-3">1.60-1.80%</span>
                </div>
            </div>
            <div class="y-aib-ccent">
                <div class="y-aib-ptt">Arbitrage type</div>
                <div class="y-aib-type">
                    <img src="/img/bz/8.png"><img src="/img/bz/9.png"><img src="/img/bz/12.png"><img src="/img/bz/4.png"><img src="/img/bz/7.png">
                </div>
            </div>
            <div class="y-aib-bottom">
                <div class="y-aib-ptt">Escrow quantity</div>
                <div class="y-aib-bsl">
                    <div class="y-aib-bsll">
                        <img src="/img/coin/usdt.png">
                        <span>Quantity</span>
                    </div>
                    <input type="number" id="y-aib-jine" class="y-aib-bslr" placeholder="Please enter quantity">
                </div>
            </div>
            <div class="y-aib-submit" onclick="aisubmit()">Now hosting</div>
            <div class="y-aib-dbts">
                <img src="/img/dui.png">
                <span>Daily income sent to your USDT wallet</span>
            </div>
            <div class="y-aib-dbts">
                <img src="/img/dui.png">
                <span>Artificial intelligence works 24 hours a day</span>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');
            $.post(apiurl + "/Ai/getaiidcp",{
                'aiid':id
            },function(res){
                if(res.code == 1){
                    var data = res.data[0]; // 获取返回的产品信息

                    // 更新HTML节点内容
                    $('.y-aib-center').html(`
                        <div class="y-aib-ctop">
                            <div class="y-aib-ctl">
                                <span class="y-aib-ctl-1">
                                    <img src="/img/${data.tubiao}"/>
                                    <p>${data.biaoti}</p>
                                </span>
                                <span class="y-aib-ctl-2">${gy('数量')}</span>
                                <span class="y-aib-ctl-3">$<b>${data.buyxiao}-${data.buyda}</b></span>
                            </div>
                            <div class="y-aib-ctr">
                                <span class="y-aib-ctr-1">${data.zhouqi} <b>${gy('天')}</b></span>
                                <span class="y-aib-ctr-2">${gy('每日收入')}</span>
                                <span class="y-aib-ctr-3">${data.bilixiao}-${data.bilida}%</span>
                            </div>
                        </div>
                        <div class="y-aib-ccent">
                            <div class="y-aib-ptt">${gy('套利种类')}</div>
                            <div class="y-aib-type">
                                ${data.tupian.split(',').map(num => `<img src="/img/bz/${num}.png">`).join('')}
                            </div>
                        </div>
                        <div class="y-aib-bottom">
                            <div class="y-aib-ptt">${gy('托管数量')}</div>
                            <div class="y-aib-bsl">
                                <div class="y-aib-bsll">
                                    <img src="/img/coin/usdt.png"/>
                                    <span>${gy('数量')}</span>
                                </div>
                                <input type="number" id="y-aib-jine" class="y-aib-bslr" placeholder="${gy('请输入数量')}"/>
                            </div>
                        </div>
                        <div class="y-aib-submit" onclick="aisubmit()">${gy('现在持仓')}</div>
                        <div class="y-aib-dbts">
                            <img src="/img/dui.png"/>
                            <span>${gy('每日收入发送到您的 USDT 钱包')}</span>
                        </div>
                        <div class="y-aib-dbts">
                            <img src="/img/dui.png"/>
                            <span>${gy('人工智能每天24小时工作')}</span>
                        </div>
                    `);
                } else {
                    alert('Load Fail!');
                }
            });
        });

        function aisubmit(){
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');
            var jine = $('#y-aib-jine').val();
            var userid = Cookies.get('userid');
            var username = Cookies.get('username');

            $.post(apiurl + "/Ai/setneworder",{
                'id':id,
                'jine':jine,
                'userid':userid,
                'username':username
            },function(res){
                if(res.code == 1){
                    alert(gy(res.data));
                    location.href = "{{ route('ai-record') }}";
                }else{
                    alert(gy(res.data));
                }
            });
        }
    </script>
    <div id="WEB3_CONNECT_MODAL_ID"></div>
</body>
</html>
