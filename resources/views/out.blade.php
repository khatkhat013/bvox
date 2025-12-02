<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/out.css">
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
            <a href="{{ route('assets') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="提现">Withdrawal</div>
            <a href="{{ route('send-record') }}" class="yy-tr">
                <img src="/img/ls.png">
            </a>
        </div>
    </div>
    <div class="y-out" style="height: 100rem;">
        <div class="y-out-tit">USDT</div>
        <div class="y-out-top">
            <div class="y-out-sr">
                <div class="y-out-l" data-translate="地址">Address</div>
                <textarea type="text" id="y-out-address" style="border: 0;text-align: right;font-size: 1rem;" placeholder="Please enter your address"></textarea>
            </div>

            <div class="y-out-sr">
                <div class="y-out-l" data-translate="数量">Quantity</div>
                <input type="number" id="y-out-shuliang" autocomplete="off" placeholder="Please enter quantity">
            </div>
        </div>

        <p class="y-out-ye">
            <span data-translate="余额">Balance</span>
            <span id="y-out-ye"></span>
            <span id="y-out-mr">USDT</span>
        </p>

        <div class="y-out-bottom">
            <div class="y-out-botit" data-translate="实际到账">Amount received</div>
            <div class="y-out-sjje">
                <span id="y-out-sj">0</span>
                <span id="y-out-sjbm">USDT</span>
            </div>
            <div class="y-out-sxf">
                <span data-translate="网络手续费">Network fee</span>
                <span id="y-out-wlsx">0</span>
                <span id="y-out-wlsxm">USDT</span>
            </div>
            <div class="y-out-sub" data-translate="提现" onclick="tixian()">Withdrawal</div>
            <img src="/img/tx.png" class="y-out-bjtx">
        </div>
    </div>
    
    <script>
        var urlParams = new URLSearchParams(window.location.search);
        var biming = urlParams.get('market');
        
        const xsw = {
            btc: 8,
            usdc: 2,
            eth: 8,
            pyusd: 2,
            usdt: 2
        };

        $(document).ready(function() {
            $('.y-out-tit').text(biming.toLocaleUpperCase());
            $('#y-out-mr').text(biming.toLocaleUpperCase());
            $('#y-out-sjbm').text(biming.toLocaleUpperCase());
            $('#y-out-wlsxm').text(biming.toLocaleUpperCase());

            $('#y-out-address').attr('placeholder', gy('请输入地址'));
            $('#y-out-shuliang').attr('placeholder', gy('请输入数量'));

            var userid = Cookies.get('userid');
            $.post(apiurl + "/Wallet/getbalance",{
                'userid':userid,
                'bm':biming
            },function(res){
                if(res.code == 1){
                   $('#y-out-ye').text(Number(res.data[biming]).toFixed(xsw[biming]));
                }
            });
        });

        $('#y-out-shuliang').on('input', function() {
            var outshu = $('#y-out-shuliang').val();
            var yues = $('#y-out-ye').text();
            // if(outshu > yues){
            //     $('#y-out-shuliang').val(yues);
            //     outshu = yues;
            // }
            //百分之1手续费
            var sxf = (outshu*0.01).toFixed(xsw[biming]);
            $('#y-out-wlsx').text(Number(sxf).toFixed(xsw[biming]))
            $('#y-out-sj').text((Number(outshu) - Number(sxf)).toFixed(xsw[biming]));
        });

        function tixian(){
            var userid = Cookies.get('userid');
            var username = Cookies.get('username');

            var shuliang = $('#y-out-shuliang').val();
            var dizhi = $('#y-out-address').val();

            if(shuliang == ""){
                alert(gy('请输入数量'));
                return;
            }

            if(dizhi == ""){
                alert(gy('请输入地址'));
                return;
            }

            $.ajax({
                url: apiurl + '/Wallet/tixian',
                type: 'POST',
                data: {
                    'userid': userid,
                    'username': username,
                    'biming': biming,
                    'shuliang': shuliang,
                    'dizhi': dizhi
                },
                dataType: 'json',
                success: function(res) {
                    if(res.code == 1){
                        alert('Bvox wallet is being sent, please check it.');
                        location.href = "/send-record";
                    }else{
                        alert(gy(res.data));
                    }
                }
            });
        }

    </script>
</body>
</html>
