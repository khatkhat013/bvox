<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/license.css">
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
            background: #FFF;
        }
        body{
            background: #FFF;
        }
        .y-hd{
            height: 4rem!important;
            background: #2b5279 url(/img/leaf-bg.png)!important;
        }
    </style>
</head>
<body>
    <div class="y-hd">
        <div class="yc-header">
            <a href="{{ route('index') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="监管许可">Regulatory License</div>
        </div>
    </div>

    <div class="y-article" style="padding-top: 4rem; min-height: 952px;">
        <img src="/img/license2.jpg">
    </div>

    <script>
        document.querySelector('.y-article').style.minHeight = window.innerHeight + 'px';
    </script>

</body>
</html>
