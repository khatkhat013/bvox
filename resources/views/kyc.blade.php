<!DOCTYPE html>
<html lang="en" style="font-size: 11.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/kyc.css">
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
            <a href="{{ route('index') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="身份认证">Identity Authentication</div>
        </div>
    </div>

    <div class="y-kyc" style="height: 100rem;">
        <a href="{{ route('kyc1') }}" class="y-kyc-box">
            <img src="/img/kyc1.png">
            <span data-translate="初级认证">Primary certification</span>
        </a>
        <a href="{{ route('kyc2') }}" class="y-kyc-box">
            <img src="/img/kyc2.png">
            <span data-translate="高级认证">Advanced certification</span>
        </a>
    </div>

    <script>
    </script>

</body>
</html>
