<!DOCTYPE html>
<html lang="en" style="font-size: 11.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/service.css">
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
            <div class="y-title" data-translate="服务">Service</div>
        </div>
    </div>

    <div class="y-kf" style="min-height: 938px;">
        <div class="y-kf-top">
            <div class="y-kf-tin">
                <h1 data-translate="客服">Online customer service</h1>
                <p data-translate="24小时在线服务">24-hour online meticulous service</p>
            </div>
            <img src="/img/kf.png">
        </div>
        <div class="y-kf-bottom">
            <a href="https://t.me/BVOX_service" class="y-kf-bbox">
                <img src="/img/telegram.jpg">
                <span>Telegram</span>
            </a>
            <!-- <a href="https://wa.me/14754477277" class="y-kf-bbox">
                <img src="/img/whatsapp.jpg"/>
                <span>Whatsapp</span>
            </a> -->
        </div>
    </div>

    <script>
        document.querySelector('.y-kf').style.minHeight = window.innerHeight + 'px';
    </script>

</body>
</html>
