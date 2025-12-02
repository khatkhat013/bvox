<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/lang.css">
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

</head>
<body>
    <div class="y-hd">
        <div class="yc-header">
            <a href="{{ route('index') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="选择语言">Language selection</div>
        </div>
    </div>
    
    <div class="y-lang" style="padding-top: 4rem;">
        <div class="y-lang-box" data-lang="en">
            <img src="/img/en.png">
            <p>English</p>
        </div>
        <div class="y-lang-box" data-lang="fr">
            <img src="/img/fr.png">
            <p>Français</p>
        </div>
        <div class="y-lang-box" data-lang="it">
            <img src="/img/it.png">
            <p>Italiano</p>
        </div>
        <div class="y-lang-box" data-lang="de">
            <img src="/img/de.png">
            <p>Deutsch</p>
        </div>
        <div class="y-lang-box" data-lang="kr">
            <img src="/img/kr.png">
            <p>한국인</p>
        </div>
        <div class="y-lang-box" data-lang="cn">
            <img src="/img/cn.png">
            <p>中文</p>
        </div>
        <div class="y-lang-box" data-lang="in">
            <img src="/img/in.png">
            <p>हिंदी</p>
        </div>
        <div class="y-lang-box" data-lang="nl">
            <img src="/img/nl.png">
            <p>Nederlands</p>
        </div>
        <div class="y-lang-box" data-lang="es">
            <img src="/img/es.png">
            <p>español</p>
        </div>
        <div class="y-lang-box" data-lang="pt">
            <img src="/img/pt.png">
            <p>Português</p>
        </div>
        <div class="y-lang-box" data-lang="jp">
            <img src="/img/jp.png">
            <p>日本語</p>
        </div>
    </div>
    
    <script>
        $('.y-lang-box').click(function(){
            Cookies.set('ylang', $(this).data('lang') ,{expires: 30});
            location.href = '/';
        });
    </script>

</body>
</html>
