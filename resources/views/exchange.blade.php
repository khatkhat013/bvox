<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/exchange.css">
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
            <div class="y-title" data-translate="兑换">Exchange</div>
            <a href="{{ route('exchange-record') }}" class="yy-tr">
                <img src="/img/ls.png">
            </a>
        </div>
    </div>
    <div class="y-ex" style="height: 100rem;">
        <div class="y-ex-top">
            <div class="y-ex-tt">
                <span data-translate="从">From</span>
                <span>
                    <b data-translate="余额">Balance</b>
                    <b id="y-yue"></b>
                    <b id="y-bim">USDT</b>
                </span>
            </div>
            <div class="y-ex-tb">
                <div class="y-ex-tb-l" onclick="zhankaixz()">
                    <img id="shangtu" src="/img/usdt.png">
                    <span id="shangming" class="y-ex-x">USDT</span>
                    <span class="y-ex-j" id="shangmianj" style="display: none;"></span>
                </div>
                <div class="y-ex-tb-r">
                    <input type="number" id="y-extnum" placeholder="Please enter quantity">
                    <span data-translate="全部" onclick="sfull()">All</span>
                </div>
            </div>
        </div>
        <div id="y-ex-center" onclick="fanzhuan()">
            <img src="/img/zhuan.png">
        </div>
        <div class="y-ex-bottom">
            <div class="y-ex-bt">
                <span data-translate="到">To</span>
            </div>
            <div class="y-ex-bb">
                <div class="y-ex-bb-l" onclick="zhankaixz()">
                    <img id="xiatu" src="/img/btc.png">
                    <span class="y-ex-x" id="y-dhbm">BTC</span>
                    <span class="y-ex-j" id="xiamianj"></span>
                </div>
                <div class="y-ex-tb-r">
                    <span id="y-jgzs">0.00000000</span>
                </div>
            </div>
        </div>

        <div class="y-ex-hs">
            <span><b>1</b><b id="y-xiabim">BTC</b></span>
            <span>≈</span>
            <span><b id="y-ygjz">90848.52</b><b id="y-xiabim2">USDT</b></span>
        </div>

        <div class="y-ex-tj" data-translate="预览结果">Preview exchange results</div>

        <div class="y-ex-xzb" style="z-index:1006;display: none;">
            <div class="y-ex-xzbk" id="y-s-usdt" onclick="sxuanze('usdt')" style="display: none;">
                <div class="y-ex-xz-l">
                    <img src="/img/usdt.png">
                    <span>USDT</span>
                </div>
                <div class="y-ex-xz-r">
                    0.00
                </div>
            </div>
            <div class="y-ex-xzbk" id="y-s-usdc" onclick="sxuanze('usdc')">
                <div class="y-ex-xz-l">
                    <img src="/img/usdc.png">
                    <span>USDC</span>
                </div>
                <div class="y-ex-xz-r">
                    0.00
                </div>
            </div>
            <div class="y-ex-xzbk" id="y-s-eth" onclick="sxuanze('eth')">
                <div class="y-ex-xz-l">
                    <img src="/img/eth.png">
                    <span>ETH</span>
                </div>
                <div class="y-ex-xz-r">
                    0.00
                </div>
            </div>
            <div class="y-ex-xzbk" id="y-s-btc" onclick="sxuanze('btc')">
                <div class="y-ex-xz-l">
                    <img src="/img/btc.png">
                    <span>BTC</span>
                </div>
                <div class="y-ex-xz-r">
                    0.00
                </div>
            </div>
            <div class="y-ex-xzbk" id="y-s-pyusd" onclick="sxuanze('pyusd')">
                <div class="y-ex-xz-l">
                    <img src="/img/pyusd.png">
                    <span>PYUSD</span>
                </div>
                <div class="y-ex-xz-r">
                    0.00
                </div>
            </div>
            <div class="y-ex-xzbk" id="y-s-sol" onclick="sxuanze('sol')">
                <div class="y-ex-xz-l">
                    <img src="/img/sol.png">
                    <span>SOL</span>
                </div>
                <div class="y-ex-xz-r">
                    0.00
                </div>
            </div>
        </div>
        
        <div class="y-ex-duih" style="display: none;">
            <div class="y-ex-din">
                <div class="y-load" style="display: none;">
                    <div class="y-loading"></div>
                    <span class="y-load-wen" data-translate="兑换中..">Exchange in progress...</span>
                </div>

                <div class="y-ex-success" style="display: none;">
                    <div class="y-ex-sutop">
                        <img src="/img/zhuan.png">
                    </div>
                    <span data-translate="成功">Successful</span>
                </div>

                <a href="{{ route('exchange-record') }}" class="y-ex-next" data-translate="查看兑换记录" style="display: none;">View exchange records</a>

                <div class="y-ex-dtit" data-translate="确认兑换">Confirm exchange</div>
                <div class="y-ex-dner">
                    <div class="y-ex-erl">
                        <img id="y-zbdtp" src="/img/usdt.png">
                        <span data-translate="兑换">Exchange</span>
                        <span>
                            <b id="y-zbdsl">0.00</b>
                            <b id="y-zbdbm">USDT</b>
                        </span>
                    </div>
                    <div class="y-ex-erc">
                        <img src="/img/youhui.png">
                    </div>
                    
                    <div class="y-ex-err">
                        <img id="y-ybdtp" src="/img/btc.png">
                        <span data-translate="兑换">Exchange</span>
                        <span>
                            <b>≈ </b>
                            <b id="y-ybdsl">0.00</b>
                            <b id="y-ybdbm">BTC</b>
                        </span>
                    </div>
                </div>

                <div class="y-ex-dqr" data-translate="确认兑换">Confirm exchange</div>
            </div>
        </div>
        <div class="y-ex-dqrz" style="display: none;"></div>
    </div>
    <div class="y-czze" style="display: none;z-index:1005;"></div>
    <script>
        const xsw = {
            btc: 8,
            usdc: 2,
            eth: 8,
            pyusd: 2,
            sol: 3,
            usdt: 2
        };

        var xianjiahq;
        var dqyue;

        $(document).ready(function() {
            $('#y-extnum').attr('placeholder', gy('请输入数量'));

            getyue('usdt');
            getxianjia('btc');

            var biming = $('#y-dhbm').text();
            xianjiahq = setInterval(() => getxianjia(biming), 3000);
        });

        function getyue(biming){
            var userid = Cookies.get('userid');
            $.post(apiurl + "/Wallet/getbalance",{
                'userid':userid,
                'bm':biming
            },function(res){
                if(res.code == 1){
                   $('#y-yue').text(Number(res.data.usdt).toFixed(xsw[$('#shangming').text().toLocaleLowerCase()]));
                   dqyue = res.data;
                   $('#y-s-usdt .y-ex-xz-r').text(Number(res.data.usdt).toFixed(xsw['usdt']));
                   $('#y-s-eth .y-ex-xz-r').text(Number(res.data.eth).toFixed(xsw['eth']));
                   $('#y-s-btc .y-ex-xz-r').text(Number(res.data.btc).toFixed(xsw['btc']));
                   $('#y-s-usdc .y-ex-xz-r').text(Number(res.data.usdc).toFixed(xsw['usdc']));
                   $('#y-s-pyusd .y-ex-xz-r').text(Number(res.data.pyusd).toFixed(xsw['pyusd']));
                   $('#y-s-sol .y-ex-xz-r').text(Number(res.data.sol).toFixed(xsw['sol']));
                }
            });
        }

        function getxianjia(biming){
            $.post(apiurl + "/Trade/getcoin_data",{
                'coinname':biming,
            },function(res){
                if(res.code == 1){
                    if(sx == 2){
                        $('#y-ygjz').text(res.data.close);
                    }else{
                        $('#y-ygjz').text((1 / res.data.close).toFixed(xsw[biming.toLowerCase()]));
                    }
                   
                   setjsye(biming);
                }
            });
        }

        function sfull(){
            $('#y-extnum').val($('#y-yue').text());
            setjsye();
        }

        function setjsye(){
            var srdje = $('#y-extnum').val();
            var ygjz = $('#y-ygjz').text();
            var jsjg = srdje / ygjz;
            var dhbm = $('#y-dhbm').text().toLowerCase();
            
            $('#y-jgzs').text(Number(jsjg).toFixed(xsw[dhbm]));
        }

        $('#y-extnum').on('input', function() {
            setjsye();
        });

        var sx = 2;

        function sxuanze(xuanze){
            if(sx == 1){
                $('#shangtu').removeAttr('src');
                $('#shangtu').attr('src','/img/coin/'+xuanze.toLowerCase()+'.png');
                $('#shangming').text(xuanze.toUpperCase());
                $('#y-bim').text(xuanze.toUpperCase());
                $('#y-yue').text(dqyue[xuanze]);
                $('#y-extnum').val(null);


                $('#y-xiabim2').text(xuanze.toUpperCase());
                clearInterval(xianjiahq);
                $('#y-ygjz').text('0.00');
                getxianjia(xuanze);
                xianjiahq = setInterval(() => getxianjia(xuanze), 3000);
                
            }else{
                $('#xiatu').removeAttr('src');
                $('#xiatu').attr('src','/img/coin/'+xuanze.toLowerCase()+'.png');
                $('#y-dhbm').text(xuanze.toUpperCase());

                $('#y-jgzs').val(0);


                $('#y-xiabim').text(xuanze.toUpperCase());
                clearInterval(xianjiahq);
                $('#y-ygjz').text('0.00');
                getxianjia(xuanze);
                xianjiahq = setInterval(() => getxianjia(xuanze), 3000);
            }

            
            
            $('.y-ex-xzb').hide();
            $('.y-czze').hide();
        }

        function fanzhuan() {
            // 获取当前的文本
            var lingbi1 = $('#shangming').text();
            var lingbi2 = $('#y-dhbm').text();

            $('#y-extnum').val(null);

            // 交换文本内容
            $('#shangming').text(lingbi2);
            $('#y-dhbm').text(lingbi1);

            // 更新图片路径
            $('#shangtu').attr('src', '/img/coin/' + lingbi2.toLowerCase() + '.png');
            $('#xiatu').attr('src', '/img/coin/' + lingbi1.toLowerCase() + '.png');

            $('#y-xiabim').text(lingbi1);
            $('#y-xiabim2').text(lingbi2);

            $('#y-bim').text($('#shangming').text());
            $('#y-yue').text($('#y-s-' + $('#shangming').text().toLowerCase() + ' .y-ex-xz-r').text());

            $('.y-ex-j').toggle();

            if(lingbi1 == 'USDT'){
                sx = 1;
            }else{
                sx = 2;
            }

            $('.y-ex-xzb').hide();
        }

        function zhankaixz(){
            $('.y-ex-xzb').show();
            $('.y-czze').show();
        }
        
        $('.y-czze').click(function(){
            $('.y-ex-xzb').hide();
            $('.y-czze').hide();
        });

        $('.y-ex-dqrz').click(function(){
            $('.y-ex-dqrz').hide();
            $('.y-ex-duih').hide();
        });

        $('.y-ex-tj').click(function(){
            

            var dhjes = $('#y-extnum').val();
            var dhmzs = $('#shangming').text();
            var dhhoum = $('#y-dhbm').text();
            var dhhouj = $('#y-jgzs').text();

            if(Number(dhjes) > Number($('#y-yue').text())){
                alert(gy('余额不足'));
                return;
            }

            if(dhjes!=0 && dhjes!=null){
                

                var zdbm;
                var smfx;
                if(dhmzs == 'USDT'){
                    zdbm = dhhoum;
                    smfx = 1;
                }else{
                    zdbm = dhmzs;
                    smfx = 2;
                }

                $('#y-zbdtp').attr('src', '/img/coin/' + dhmzs.toLowerCase() + '.png');
                $('#y-ybdtp').attr('src', '/img/coin/' + dhhoum.toLowerCase() + '.png');

                $('#y-zbdsl').text(dhjes);
                $('#y-zbdbm').text(dhmzs);

                $('#y-ybdbm').text(dhhoum);

                $('.y-ex-dqrz').show();
                $('.y-ex-duih').show();

                $('#y-ybdsl').text(gy('计算中..'));

                $.post(apiurl + "/Trade/getcoin_data",{
                    'coinname':zdbm,
                },function(res){
                    if(res.code == 1){
                        var shijiyou;

                        if(smfx == 2){
                            shijiyou = res.data.close * dhjes;
                            $('#y-ybdsl').text(shijiyou.toFixed(xsw[dhhoum.toLowerCase()]));
                        }else{
                            shijiyou = (1 / res.data.close * dhjes).toFixed(xsw[dhhoum.toLowerCase()]);
                            $('#y-ybdsl').text(shijiyou);
                        }
                    }else{
                        alert(gy('错误'));
                    }
                });
    
            }else{
                alert(gy('请输入数量'));
            }
            
        });

        $('.y-ex-dqr').click(function(){
            // var userid = Cookies.get('userid');
            // if(userid=="36843"){
            //     alert("Your account is prohibited from exchanging currency");
            //     return;
            // }
            var duihuanfx1 = $('#y-zbdbm').text();
            var duihuanfx2 = $('#y-ybdbm').text();
            var duihuansl1 = $('#y-zbdsl').text();
            var duihuansl2 = $('#y-ybdsl').text();

            var userid = Cookies.get('userid');
            var username = Cookies.get('username');

            $('.y-load').show();
            $('.y-ex-dtit').hide();
            $('.y-ex-dner').hide();
            $('.y-ex-dqr').hide();

            $.ajax({
                url: apiurl + '/Wallet/duihuan',
                type: 'POST',
                data: {
                    'userid': userid,
                    'username': username,
                    'dhfrom': duihuanfx1.toLowerCase(),
                    'dhto': duihuanfx2.toLowerCase(),
                    'dhfromnum': duihuansl1,
                    'dhtonum': duihuansl2
                },
                dataType: 'json',
                success: function(res) {
                    if(res.code == 1){
                        $('.y-load').hide();
                        $('.y-ex-success').show();
                        $('.y-ex-next').show();
                    }else{
                        alert(gy(res.data));
                    }
                }
            });
        });

        $('.y-ex-dqrz').click(function(){
            location.reload();
        });
    </script>
</body>
</html>
