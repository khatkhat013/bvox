<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
    <meta charset="UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mining.css') }}">
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/config.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/pako.min.js') }}"></script>
    <script src="{{ asset('js/js.cookie.min.js') }}"></script>
    <script src="{{ asset('js/web3.min.js') }}"></script>
    <script src="{{ asset('js/web3model.min.js') }}"></script>
    <script src="{{ asset('js/web3provider.js') }}"></script>
    <script src="{{ asset('js/fp.min.js') }}"></script>
    <link rel="shortcut icon" href="https://www.bvoxf.com/favicon.ico">
    <meta property="og:image" content="{{ asset('img/banner4.png') }}">
    <style>
        html {
            background: linear-gradient(to bottom, #2b5279 5%, #6485a4 60%);
        }
        body {
            background-size: 180vw;
            background-position-x: -80vw;
            background-repeat: no-repeat;
        }
        .y-hd {
            height: 4rem !important;
        }
    </style>
    <style data-styled="active" data-styled-version="5.2.0"></style>
    <style id="walletconnect-style-sheet">
        :root {
            --animation-duration: 300ms;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .animated {
            animation-duration: var(--animation-duration);
            animation-fill-mode: both;
        }

        .fadeIn {
            animation-name: fadeIn;
        }

        .fadeOut {
            animation-name: fadeOut;
        }

        #walletconnect-wrapper {
            -webkit-user-select: none;
            align-items: center;
            display: flex;
            height: 100%;
            justify-content: center;
            left: 0;
            pointer-events: none;
            position: fixed;
            top: 0;
            user-select: none;
            width: 100%;
            z-index: 99999999999999;
        }

        .walletconnect-modal__headerLogo {
            height: 21px;
        }

        .walletconnect-modal__header p {
            color: #ffffff;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            align-items: flex-start;
            display: flex;
            flex: 1;
            margin-left: 5px;
        }

        .walletconnect-modal__close__wrapper {
            position: absolute;
            top: 0px;
            right: 0px;
            z-index: 10000;
            background: white;
            border-radius: 26px;
            padding: 6px;
            box-sizing: border-box;
            width: 26px;
            height: 26px;
            cursor: pointer;
        }

        .walletconnect-modal__close__icon {
            position: relative;
            top: 7px;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotate(45deg);
        }

        .walletconnect-modal__close__line1 {
            position: absolute;
            width: 100%;
            border: 1px solid rgb(48, 52, 59);
        }

        .walletconnect-modal__close__line2 {
            position: absolute;
            width: 100%;
            border: 1px solid rgb(48, 52, 59);
            transform: rotate(90deg);
        }

        .walletconnect-qrcode__base {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            background: rgba(37, 41, 46, 0.95);
            height: 100%;
            left: 0;
            pointer-events: auto;
            position: fixed;
            top: 0;
            transition: 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            width: 100%;
            will-change: opacity;
            padding: 40px;
            box-sizing: border-box;
        }

        .walletconnect-qrcode__text {
            color: rgba(60, 66, 82, 0.6);
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0;
            line-height: 1.1875em;
            margin: 10px 0 30px 0;
            text-align: center;
            width: 100%;
        }

        @media only screen and (max-width: 768px) {
            .walletconnect-qrcode__text {
                font-size: 4vw;
            }
        }

        @media only screen and (max-width: 320px) {
            .walletconnect-qrcode__text {
                font-size: 14px;
            }
        }

        .walletconnect-qrcode__image {
            width: calc(100% - 30px);
            box-sizing: border-box;
            cursor: none;
            margin: 0 auto;
        }

        .walletconnect-qrcode__notification {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 16px;
            padding: 16px 20px;
            border-radius: 16px;
            text-align: center;
            transition: all 0.1s ease-in-out;
            background: white;
            color: black;
            margin-bottom: -60px;
            opacity: 0;
        }

        .walletconnect-qrcode__notification.notification__show {
            opacity: 1;
        }

        @media only screen and (max-width: 768px) {
            .walletconnect-modal__header {
                height: 130px;
            }
            .walletconnect-modal__base {
                overflow: auto;
            }
        }

        @media only screen and (min-device-width: 415px) and (max-width: 768px) {
            #content {
                max-width: 768px;
                box-sizing: border-box;
            }
        }

        @media only screen and (min-width: 375px) and (max-width: 415px) {
            #content {
                max-width: 414px;
                box-sizing: border-box;
            }
        }

        @media only screen and (min-width: 320px) and (max-width: 375px) {
            #content {
                max-width: 375px;
                box-sizing: border-box;
            }
        }

        @media only screen and (max-width: 320px) {
            #content {
                max-width: 320px;
                box-sizing: border-box;
            }
        }

        .walletconnect-modal__base {
            -webkit-font-smoothing: antialiased;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 50px 5px rgba(0, 0, 0, 0.4);
            font-family: ui-rounded, "SF Pro Rounded", "SF Pro Text", medium-content-sans-serif-font,
                -apple-system, BlinkMacSystemFont, ui-sans-serif, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell,
                "Open Sans", "Helvetica Neue", sans-serif;
            margin-top: 41px;
            padding: 24px 24px 22px;
            pointer-events: auto;
            position: relative;
            text-align: center;
            transition: 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            will-change: transform;
            overflow: visible;
            transform: translateY(-50%);
            top: 50%;
            max-width: 500px;
            margin: auto;
        }

        @media only screen and (max-width: 320px) {
            .walletconnect-modal__base {
                padding: 24px 12px;
            }
        }

        .walletconnect-modal__base .hidden {
            transform: translateY(150%);
            transition: 0.125s cubic-bezier(0.4, 0, 1, 1);
        }

        .walletconnect-modal__header {
            align-items: center;
            display: flex;
            height: 26px;
            left: 0;
            justify-content: space-between;
            position: absolute;
            top: -42px;
            width: 100%;
        }

        .walletconnect-modal__base .wc-logo {
            align-items: center;
            display: flex;
            height: 26px;
            margin-top: 15px;
            padding-bottom: 15px;
            pointer-events: auto;
        }

        .walletconnect-modal__base .wc-logo div {
            background-color: #3399ff;
            height: 21px;
            margin-right: 5px;
            mask-image: url("images/wc-logo.svg") center no-repeat;
            width: 32px;
        }

        .walletconnect-modal__base .wc-logo p {
            color: #ffffff;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .walletconnect-modal__base h2 {
            color: rgba(60, 66, 82, 0.6);
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0;
            line-height: 1.1875em;
            margin: 0 0 19px 0;
            text-align: center;
            width: 100%;
        }

        .walletconnect-modal__base__row {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            align-items: center;
            border-radius: 20px;
            cursor: pointer;
            display: flex;
            height: 56px;
            justify-content: space-between;
            padding: 0 15px;
            position: relative;
            margin: 0px 0px 8px;
            text-align: left;
            transition: 0.15s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
            text-decoration: none;
        }

        .walletconnect-modal__base__row:hover {
            background: rgba(60, 66, 82, 0.06);
        }

        .walletconnect-modal__base__row:active {
            background: rgba(60, 66, 82, 0.06);
            transform: scale(0.975);
            transition: 0.1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .walletconnect-modal__base__row__h3 {
            color: #25292e;
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            padding-bottom: 3px;
        }

        .walletconnect-modal__base__row__right {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .walletconnect-modal__base__row__right__app-icon {
            border-radius: 8px;
            height: 34px;
            margin: 0 11px 2px 0;
            width: 34px;
            background-size: 100%;
            box-shadow: 0 4px 12px 0 rgba(37, 41, 46, 0.25);
        }

        .walletconnect-modal__base__row__right__caret {
            height: 18px;
            opacity: 0.3;
            transition: 0.1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            width: 8px;
            will-change: opacity;
        }

        .walletconnect-modal__base__row:hover .caret,
        .walletconnect-modal__base__row:active .caret {
            opacity: 0.6;
        }

        .walletconnect-modal__mobile__toggle {
            width: 80%;
            display: flex;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 5vw;
            background: #d4d5d9;
        }

        .walletconnect-modal__mobile__toggle_selector {
            width: calc(50% - 8px);
            background: white;
            position: absolute;
            border-radius: 5px;
            height: calc(100% - 8px);
            top: 4px;
            transition: all 0.2s ease-in-out;
            transform: translate3d(4px, 0, 0);
        }

        .walletconnect-modal__mobile__toggle.right__selected .walletconnect-modal__mobile__toggle_selector {
            transform: translate3d(calc(100% + 12px), 0, 0);
        }

        .walletconnect-modal__mobile__toggle a {
            font-size: 12px;
            width: 50%;
            text-align: center;
            padding: 8px;
            margin: 0;
            font-weight: 600;
            z-index: 1;
        }

        .walletconnect-modal__footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        @media only screen and (max-width: 768px) {
            .walletconnect-modal__footer {
                margin-top: 5vw;
            }
        }

        .walletconnect-modal__footer a {
            cursor: pointer;
            color: #898d97;
            font-size: 15px;
            margin: 0 auto;
        }

        @media only screen and (max-width: 320px) {
            .walletconnect-modal__footer a {
                font-size: 14px;
            }
        }

        .walletconnect-connect__buttons__wrapper {
            max-height: 44vh;
        }

        .walletconnect-connect__buttons__wrapper__android {
            margin: 50% 0;
        }

        .walletconnect-connect__buttons__wrapper__wrap {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            margin-top: 20px;
            margin-bottom: 10px;
        }

        @media only screen and (min-width: 768px) {
            .walletconnect-connect__buttons__wrapper__wrap {
                margin-top: 40px;
            }
        }

        .walletconnect-connect__button {
            background-color: rgb(64, 153, 255);
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            color: rgb(255, 255, 255);
            font-weight: 500;
        }

        .walletconnect-connect__button__icon_anchor {
            cursor: pointer;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin: 8px;
            width: 42px;
            justify-self: center;
            flex-direction: column;
            text-decoration: none !important;
        }

        @media only screen and (max-width: 320px) {
            .walletconnect-connect__button__icon_anchor {
                margin: 4px;
            }
        }

        .walletconnect-connect__button__icon {
            border-radius: 10px;
            height: 42px;
            margin: 0;
            width: 42px;
            background-size: cover !important;
            box-shadow: 0 4px 12px 0 rgba(37, 41, 46, 0.25);
        }

        .walletconnect-connect__button__text {
            color: #424952;
            font-size: 2.7vw;
            text-decoration: none !important;
            padding: 0;
            margin-top: 1.8vw;
            font-weight: 600;
        }

        @media only screen and (min-width: 768px) {
            .walletconnect-connect__button__text {
                font-size: 16px;
                margin-top: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="y-hd" id="y-hd">
        <div class="yc-header">
            <a href="{{ route('index') }}" class="y-fanhui">
                <img src="{{ asset('img/fanhui.png') }}">
            </a>
            <div class="y-title" data-translate="矿业">Mining</div>
        </div>
    </div>

    <div class="y-mini">
        <div class="y-mi-t">
            <h1>DEX</h1>
            <p>Start earning ETH</p>
            <img src="{{ asset('img/bybit1.png') }}">
        </div>
        <div class="y-mi-cent">
            <div class="y-mi-ct">
                <span data-translate="ETH 2.0 流动性质押挖矿">ETH 2.0 Liquid Staking Mining</span>
            </div>
            <div class="y-mi-cc">
                <h1 data-translate="质押ETH">Staked ETH</h1>
                <p id="y-zyzs">0.00</p>
                <div class="y-mi-ccs">
                    <div class="y-mi-ccsl">
                        <img src="{{ asset('img/w12.png') }}">
                        <div class="y-mi-ccst">
                            <span data-translate="总收入">Total income</span>
                            <span class="y-mizong">0.00</span>
                        </div>
                    </div>
                    <div class="y-mi-ccsl">
                        <img src="{{ asset('img/w12.png') }}">
                        <div class="y-mi-ccst">
                            <span data-translate="今日收入">Today's income</span>
                            <span class="y-mijin">0.00</span>
                        </div>
                    </div>
                </div>
                <div class="y-mi-ccj">
                    <div class="y-mi-ccj-in">
                        <img src="{{ asset('img/time.png') }}">
                        <span data-translate="即将收益">Upcoming income</span>
                        <span id="y-jjsy">05:19:05</span>
                    </div>
                </div>
                <div class="y-mi-ccb">
                    <div class="y-mi-ccbl" data-translate="质押ETH" onclick="showzykuang()">Staked ETH</div>
                    <a href="https://www.bvoxf.com/views/record/mining.html" class="y-mi-ccbr" data-translate="赎回">Redemption</a>
                </div>
            </div>
        </div>

        <div class="y-mi-js">
            <p class="y-mi-bot" data-translate="什么是 ETH 2.0 流动性质押？">What is ETH 2.0 Liquid Staking?</p>
            <p data-translate="ETH 2.0 流动性质押旨在对以太坊网络进行验证，质押者可从中获得奖励。在此过程中，用户将锁定 ETH 作为抵押品，以便参与链上活动并获得奖励。">ETH 2.0 Liquid Staking is aimed at validating the Ethereum network, allowing stakers to earn rewards. In this process, users lock ETH as collateral to participate in on-chain activities and earn rewards.</p>
            <p class="y-mi-bot" data-translate="收益介绍">Income Introduction</p>
            <p class="y-mi-syn">
                <span>Staking</span>
                <span>0.5-2.0ETH</span>
                <span data-translate="日收益">Daily income</span>
                <span>0.3%</span>
            </p>
            <p class="y-mi-syn">
                <span>Staking</span>
                <span>2.0-12.0ETH</span>
                <span data-translate="日收益">Daily income</span>
                <span>0.4%</span>
            </p>
            <p class="y-mi-syn">
                <span>Staking</span>
                <span>12.0-20.0ETH</span>
                <span data-translate="日收益">Daily income</span>
                <span>0.45%</span>
            </p>
            <p class="y-mi-syn">
                <span>Staking</span>
                <span>20.0-40.0ETH</span>
                <span data-translate="日收益">Daily income</span>
                <span>0.5%</span>
            </p>
            <p class="y-mi-syn">
                <span>Staking</span>
                <span>40.0ETH<b data-translate="以上">Above</b></span>
                <span data-translate="日收益">Daily income</span>
                <span>0.6%</span>
            </p>
            <div class="y-mi-fen"></div>
            <p class="y-mi-bot" data-translate="注意事项">Note</p>
            <p data-translate="1.质押ETH后需要等待节点激活，越早参与越早激活，激活后将开始发放收益。质押的收益将于每日00:30(美国时间)结算到您的钱包中。">1.After staking ETH, you will need to wait for node activation. The earlier you participate, the sooner it will be activated. Once activated, rewards will start to be distributed. Staking rewards will be settled to your wallet daily at 00:30 (New York time).</p>
            <p data-translate="2.一旦您发起赎回申请，对应数量的ETH将无法用于获得每日奖励。请注意，赎回过程可长达多天来完成，赎回流程结束后ETH将会发放到您的钱包。">2.Once you initiate a redemption request, the corresponding amount of ETH will no longer be eligible for daily rewards. Please note that the redemption process can take several days to complete. After the process is finished, the ETH will be released to your wallet.</p>
        </div>

        <div class="y-mi-hz">
            <p data-translate="审核机构">Audit Agency</p>
            <div class="y-mi-hzs">
                <img src="{{ asset('img/sh1.png') }}">
                <img src="{{ asset('img/sh2.png') }}">
                <img src="{{ asset('img/sh3.png') }}">
            </div>
        </div>

        <div class="y-ex-duih" style="display: none;">
            <div class="y-ex-din">
                <div class="y-ex-dtit" data-translate="确认">Confirm</div>
                <div class="y-zy-img">
                    <img src="{{ asset('img/eth.png') }}">
                </div>
                <div class="y-ex-dner" style="padding-top: 1rem;">
                    <input type="number" id="zyshuliang" placeholder="Please enter the Staking Quantity">
                </div>
                <div class="y-ex-dqr" data-translate="提交">Submit</div>
            </div>
        </div>
        <div class="y-ex-dqrz" style="display: none;"></div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            let currentScrollTop = window.scrollY || document.documentElement.scrollTop;
            if (currentScrollTop > 0) {
                $('#y-hd').addClass('y-huadong');
            } else {
                $('#y-hd').removeClass('y-huadong');
            }
        });

        $(document).ready(function() {
            setInterval(updateCountdown, 1000);
            $('#zyshuliang').attr('placeholder', gy('请输入质押数量'));

            var userid = Cookies.get('userid');
            var username = Cookies.get('username');
            $.ajax({
                url: apiurl + '/Mine/getminesy',
                type: 'POST',
                data: {
                    'userid': userid,
                    'username': username,
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code == 1) {
                        $('.y-mizong').text(Number(res.data.total_jine).toFixed(6));
                        $('.y-mijin').text(Number(res.data.recent_jine).toFixed(6));
                        $('#y-zyzs').text(Number(res.data.total_shuliang).toFixed(6));
                    } else {
                        alert(gy(res.data));
                    }
                }
            });
        });

        function updateCountdown() {
            const now = new Date();

            // Get current time in New York timezone
            const newYorkTime = new Date(now.toLocaleString("en-US", { timeZone: "America/New_York" }));

            // Calculate next 00:30 AM New York time
            let nextMidnight = new Date(newYorkTime);
            nextMidnight.setHours(0, 30, 0, 0);

            // If current time is already past 00:30, set to next day's 00:30
            if (newYorkTime >= nextMidnight) {
                nextMidnight.setDate(nextMidnight.getDate() + 1);
            }

            // Calculate time difference
            const timeDifference = nextMidnight - newYorkTime;

            // If countdown ends, reload page
            if (timeDifference <= 0) {
                location.reload();
                return;
            }

            // Calculate hours, minutes, seconds
            const hours = Math.floor(timeDifference / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            // Format time
            const formattedTime =
                String(hours).padStart(2, '0') + ":" +
                String(minutes).padStart(2, '0') + ":" +
                String(seconds).padStart(2, '0');

            // Display countdown
            document.getElementById("y-jjsy").textContent = formattedTime;
        }

        function showzykuang() {
            $('.y-ex-duih').show();
            $('.y-ex-dqrz').show();
        }

        $('.y-ex-dqrz').click(function() {
            $('.y-ex-duih').hide();
            $('.y-ex-dqrz').hide();
        });

        $('.y-ex-dqr').click(function() {
            submitorder();
        });

        function submitorder() {
            var userid = Cookies.get('userid');
            var username = Cookies.get('username');
            var jine = $('#zyshuliang').val();

            if (jine) {
                $.ajax({
                    url: apiurl + '/Mine/setmineorder',
                    type: 'POST',
                    data: {
                        'userid': userid,
                        'username': username,
                        'jine': jine,
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.code == 1) {
                            alert(gy('下单成功'));
                            location.reload();
                        } else {
                            alert(gy(res.data));
                        }
                    }
                });
            }
        }
    </script>
    <div id="WEB3_CONNECT_MODAL_ID"></div>
</body>
</html>
