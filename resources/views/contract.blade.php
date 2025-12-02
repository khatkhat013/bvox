<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bvox</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/contract.css">
	<script src="/js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/config.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/pako.min.js"></script>
	<script src="/js/js.cookie.min.js"></script>
	<script src="/js/web3.min.js"></script>
	<script src="/js/web3model.min.js"></script>
	<script src="/js/web3provider.js"></script>
	<script src="/js/fp.min.js"></script>
	<script src="/js/layer.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/klinecharts.min.js"></script>
	<script src="/js/kline.min.js"></script>
	<script src="/js/ws-deedfeeds.js"></script>
	<link rel="stylesheet" href="/css/layer.css" id="layuicss-layer">
	<link rel="shortcut icon" href="/img/favicon.ico">
	<meta property="og:image" content="/img/banner4.png">
	<style>
		html{
			background: linear-gradient(to bottom, #2b5279 5%, #6485a4 60%);
		}
		body{
			background-size: 180vw;
			background-position-x: -80vw;
			background-repeat: no-repeat;
		}
	</style>
	<style data-styled="active" data-styled-version="5.2.0"></style>
	<style id="walletconnect-style-sheet">:root {
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
}</style>
</head>
<body>
	<div class="y-hd" id="y-hd">
		<div class="yc-header">
			<a href="{{ route('index') }}" class="y-fanhui">
				<img src="/img/fanhui.png">
			</a>
			<div class="y-title" data-translate="合约">Contract</div>
			<a href="{{ route('contract-record') }}" class="yy-tr">
				<img src="/img/ls.png">
			</a>
		</div>
		<div class="y-bzxz">
			<div class="y-bzxz-left">
				<div class="y-bzxz-ll">
					<img id="y-coinimg" src="/img/btc.png">
				</div>
				<div class="y-bzxz-lr">
					<span class="y-bzxz-lrt">
						<span id="y-coinming">BTC</span>
						<b></b>
					</span>
					<span class="y-bzxz-lrb">USDT</span>
				</div>
			</div>
			<div class="y-bzxz-right">
				<div class="y-bzxz-rt">
					<span>US$ </span>
					<span id="y-dqbj">90900.36</span>
				</div>
				<div class="y-bzxz-rb">
					<span data-translate="24小时交易量">24-hour volume</span>
					<span id="y-24">722.898806</span>
				</div>
			</div>
		</div>
	</div>

	<div class="y-xiala">
		<div class="y-xiala-in">

		</div>
	</div>
	
	<div class="y-kline">
		<iframe id="iframeid" width="100%" scrolling="no" height="540" noresize="noresize" frameborder="0" src="https://www.bvoxf.com/views/contract/kline.html">No IFRAME</iframe>
	</div>

	<div class="y-gongneng">
		<div class="y-tfx-t">
			<span data-translate="功能">Function</span>
		</div>
		
		<div class="y-tfx-tit">
			<div>
				<span data-translate="时间" class="y-tfx y-tfx-left">Time</span>
			</div>
			<div>
				<span data-translate="方向" class="y-tfx y-tfx-right">Direction</span>
			</div>
			<div>
				<span data-translate="价格" class="y-tfx y-tfx-left">Price</span>
			</div>
			<div>
				<span data-translate="数量" class="y-tfx y-tfx-right">Quantity</span>
			</div>
		</div>
		<div id="tradbox">
			<div class="y-tfx y-tfx-left">08:11:26</div>
			<div class="y-tfx y-tfx-right y-shang y-tfx-b1">Upward</div>
			<div class="y-tfx y-tfx-left y-tfx-b2">90900.3600</div>
			<div class="y-tfx y-tfx-right">0.0005</div>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="y-tfx-button" id="y-xia">
		<div data-translate="立即委托">Immediate entrustment</div>
	</div>

	<div class="y-xdan" id="y-xdan">
		<div class="y-xdan-in">
			<div class="y-xdan-top">
				<div class="y-xdan-top-left">
					<div class="y-xdan-tl-img">
						<img id="y-xiazhubm" src="/img/btc.png">
					</div>
					<div class="y-xdan-tl-txt">
						<span class="y-xdan-tl-txt-top">BTC</span>
						<div class="y-xdan-tl-txt-bottom">
							<span data-translate="购买">Buy</span>
							<span> </span>
							<span data-translate="向上" id="y-gmkdfx">Upward</span>
						</div>
					</div>
				</div>
				<div class="y-xdan-right">
					<div class="y-xdan-right-top" onclick="shuaxin()">
						<img src="/img/close.png">
					</div>
					<div class="y-xdan-right-bottom">
						<span id="y-dqjg">90900.36</span>
						<span> USDT</span>
					</div>
				</div>
			</div>
			<div class="y-xdan-sx">
				<div class="y-xdan-sx-left y-xdan-xzl" onclick="fx(1)">
					<span data-translate="向上">Upward</span>
				</div>
				<div class="y-xdan-sx-right" onclick="fx(2)">
					<span data-translate="向下">Down</span>
				</div>
			</div>
			<div class="y-xdan-ss">
				<div class="y-xdan-ss-tit">
					<span data-translate="交货时间">Delivery time</span>
					<img src="/img/time.png">
				</div>
				<div class="y-xdan-ss-bo">
					<div class="y-xdan-ss-box y-xdan-s" onclick="ms(this,60,40)">
						<div class="y-xdan-ss-box-t">
							<span>60</span>
							<span>S</span>
						</div>
						<div class="y-xdan-ss-box-b">
							<span>40</span>
							<span>%</span>
						</div>
					</div>

					<div class="y-xdan-ss-box" onclick="ms(this,120,50)">
						<div class="y-xdan-ss-box-t">
							<span>120</span>
							<span>S</span>
						</div>
						<div class="y-xdan-ss-box-b">
							<span>50</span>
							<span>%</span>
						</div>
					</div>

					<div class="y-xdan-ss-box" onclick="ms(this,180,70)">
						<div class="y-xdan-ss-box-t">
							<span>180</span>
							<span>S</span>
						</div>
						<div class="y-xdan-ss-box-b">
							<span>70</span>
							<span>%</span>
						</div>
					</div>

					<div class="y-xdan-ss-box y-last" onclick="ms(this,300,100)">
						<div class="y-xdan-ss-box-t">
							<span>300</span>
							<span>S</span>
						</div>
						<div class="y-xdan-ss-box-b">
							<span>100</span>
							<span>%</span>
						</div>
					</div>
					<div style="clear:both"></div>
				</div>
			</div>
			<div class="y-xdan-jg-tit">
				<span data-translate="购买价格">Purchase Price</span>
			</div>
			<div class="y-xdan-num">
				<div class="y-xdan-num-left">
					<img src="/img/usdt.png">
					<span data-translate="数量">Quantity</span>
				</div>
				<div class="y-xdan-num-right">
					<input type="number" id="y-buynum">
					<span>USDT</span>
				</div>
			</div>
			<div class="y-xdan-fy">
				<div class="y-xdan-fy-left">
					<span data-translate="手续费">Fees</span>
					<span>:<b id="y-sxf">0</b></span>
				</div>
			</div>
		</div>
		<div class="y-tfx-button" onclick="xdan()">
			<div data-translate="立即委托">Immediate entrustment</div>
		</div>

		<div class="y-djs" style="display: none;">
			<div class="y-countdown-container">
				<div class="y-countdown">
					<span id="y-countdown-number"></span>
					<svg>
						<circle class="bg" r="3.6rem" cx="4rem" cy="4rem"></circle>
						<circle class="progress" r="3.6rem" cx="4rem" cy="4rem"></circle>
					</svg>
				</div>
			</div>
			<div class="y-dangqian">
				<span id="y-zzjg"><b data-translate="现在" id="y-now">Now</b></span>
				<span id="y-ssjg">0.00</span>
			</div>
			<div class="y-load" style="display: none;">
				<div class="y-loading"></div>
				<span class="y-load-wen" data-translate="资金结算中...">Funds settlement in progress...</span>
			</div>
			<div class="y-hyh" style="display: none;">
				<span data-translate="很遗憾，您损失了这笔交易。">Unfortunately, you lost this trade.</span>
			</div>
			<div class="y-hyy" style="display: none;">
				<span class="y-hyy-top"></span>
				<span class="y-hyy-bottom" data-translate="您的利润已存入您的账户。">Your profit has been credited to your account.</span>
			</div>
			<div class="y-djs-z">
				<div class="y-djs-zbox">
					<span data-translate="购买价">Purchase price</span>
					<span id="y-gmj"></span>
				</div>
				<div class="y-djs-zbox">
					<span data-translate="购买数量">Purchase quantity</span>
					<span id="y-gmsl"></span>
				</div>
				<div class="y-djs-zbox">
					<span data-translate="购买方向">Purchase direction</span>
					<span id="y-gmfx"></span>
				</div>
				<div class="y-djs-zbox">
					<span data-translate="合约时长">Contract duration</span>
					<span id="y-hysc"></span>
				</div>
				<div class="y-djs-zbox">
					<span data-translate="到期收益">Matured Proceeds</span>
					<span id="y-dqsy"></span>
				</div>
			</div>
		</div>
	</div>

	<div class="y-czxz y-czxz-co" style="display: none;">
		<div class="y-wa-tit" data-translate="选择币种">Select currency</div>

		<a href="{{ route('contract') }}?market=btc" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/btc.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>BTC</p>
					<p>BTC Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=eth" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/eth.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>ETH</p>
					<p>ETH Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=doge" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/doge.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>DOGE</p>
					<p>DOGE Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=xrp" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/xrp.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>XRP</p>
					<p>XRP Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=trx" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/trx.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>TRX</p>
					<p>TRX Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=sol" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/sol.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>SOL</p>
					<p>SOL Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=ada" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/ada.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>ADA</p>
					<p>ADA Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=bsv" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/bsv.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>BSV</p>
					<p>BSV Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=link" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/link.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>LINK</p>
					<p>LINK Coin</p>
				</div>
			</div>
		</a>
		<a href="{{ route('contract') }}?market=bch" class="y-wa-box y-wa-box-co">
			<div class="y-wa-bl">
				<img src="/img/bch.png">
				<div class="y-wa-blr y-wa-blr-co">
					<p>BCH</p>
					<p>BCH Coin</p>
				</div>
			</div>
		</a>
	</div>

	<div class="y-xdan-zz" id="y-zhe"></div>
	<div class="y-xdan-zz" id="y-zhe2"></div>
	<div class="y-xdan-zz2" id="y-zhe3"></div>
	<input id="y-fx" type="hidden" value="1">
	<input id="y-ms" type="hidden" value="60">
	<input id="y-syl" type="hidden" value="40">

	<script>
		const xsw = {
			btc: 2,
			eth: 2,
			doge: 6,
			xrp: 5,
			trx: 6,
			sol: 3,
			ada: 6,
			ltc: 1,
			bsv: 4,
			bch: 2,
			link: 3
		};

		var urlParams = new URLSearchParams(window.location.search);
		var coinname = urlParams.get('market') || 'btc';
		
		function gettradlist(){
			$.post(apiurl + "/Trade/gettradelist",{
				'coinname':coinname
			},function(data){
				if(data.code == 1){
					$("#tradbox").empty();
					var html = '';
					if(data.data == '' || data.data == null){
						html = '<div><span>No data</span></div>';
						$("#tradbox").append(html);
					}else{
						$.each(data.data,function(key,val){
							if(val.strtype =="向上"){
								html += '<div class="y-tfx y-tfx-left">'+ val.ts +'</div>'+
									'<div class="y-tfx y-tfx-right y-shang y-tfx-b1">'+ gy(val.strtype) +'</div>'+
									'<div class="y-tfx y-tfx-left y-tfx-b2">' + val.price + '</div>'+
									'<div class="y-tfx y-tfx-right">' + val.amount + '</div>';
							}else{
								html += '<div class="y-tfx y-tfx-left">'+ val.ts +'</div>'+
									'<div class="y-tfx y-tfx-right y-xia y-tfx-b1">'+ gy(val.strtype) +'</div>'+
									'<div class="y-tfx y-tfx-left y-tfx-b2">' + val.price + '</div>'+
									'<div class="y-tfx y-tfx-right">' + val.amount + '</div>';
							}
						});
						html += "<div style='clear:both'></div>";
						$("#tradbox").append(html);
					}
				}
			});
		}

		function getcoin_data(){
			$.post(apiurl + "/Trade/getcoin_data",{
				'coinname':coinname
			},function(data){
				if(data.code == 1){
					$('#y-24').text(data.data.amount);
					$('#y-dqbj').text(Number(data.data.close).toFixed(xsw[coinname]));
					$('#y-dqjg').text(Number(data.data.close).toFixed(xsw[coinname]));
				}
			});
		}

		let coin_data;
		$(document).ready(function() {
			$('#y-coinimg').attr('src', '/img/' + coinname + '.png');
			$('#y-xiazhubm').attr('src', '/img/' + coinname + '.png');
			$('.y-xdan-tl-txt-top').text(coinname.toLocaleUpperCase());
			$('#y-coinming').text(coinname.toLocaleUpperCase());
			$('#iframeid').attr('src','https://www.bvoxf.com/views/contract/kline.html?market='+coinname+'usdt');
			gettradlist();
			getcoin_data();
          	setTimestampInterval("gettradlist()",3000);
			coin_data = setTimestampInterval("getcoin_data()",2000);

			$("#y-xia").click(function() {
			    $('#y-buynum').attr('placeholder', gy('请输入数量'));
				$("#y-xdan").slideToggle(50);
				$("#y-zhe").show();
				document.body.style.overflow = 'hidden';
			});

			$("#y-zhe").click(function() {
				$("#y-xdan").slideToggle(50);
				$("#y-zhe").hide();
				document.body.style.overflow = 'auto';
			});

			$("#y-zhe2").click(function() {
				location.reload();
			});

    	});

		function fx(fx){
			if(fx==1){
				$('.y-xdan-sx-right').removeClass('y-xdan-xzl');
				$('.y-xdan-sx-left').addClass('y-xdan-xzl');
				$('#y-gmkdfx').text(gy('向上'));
			}else if(fx==2){
				$('.y-xdan-sx-left').removeClass('y-xdan-xzl');
				$('.y-xdan-sx-right').addClass('y-xdan-xzl');
				$('#y-gmkdfx').text(gy('向下'));
			}
			$('#y-fx').val(fx);
		}

		function ms(element,ms,syl){
			$('.y-xdan-ss-box').removeClass('y-xdan-s');
			$(element).addClass('y-xdan-s');
			$('#y-ms').val(ms);
			$('#y-syl').val(syl);
		}

		$('#y-buynum').on('input', function() {
			$('#y-sxf').text(($('#y-buynum').val()*0.01).toFixed(2));
		});

		let originalValue = 0;
		let increaseTarget, decreaseTarget;
		let currentTarget;
		let currentValue = originalValue;
		let totalTime = 0;
		let elapsedTime = 0;
		let intervalId;
		let dqid;
		let orderjs;

		function xdan(){
		    layer.confirm(gy('确定？'), {
		        title: gy('确定？'),
                btn: [gy('确认')]
            }, function(index) {
                var urlParams = new URLSearchParams(window.location.search);
    			var biming = urlParams.get('market') || 'btc';
    			var username = Cookies.get('username');
        		var userid = Cookies.get('userid');
    			var fangxiang = $('#y-fx').val();
    			var miaoshu = $('#y-ms').val();
    			var num = $('#y-buynum').val();
    			var buyprice = $('#y-dqjg').text();
    
    			$('#y-gmj').text(buyprice);
    			$('#y-gmsl').text(num);
    			if(fangxiang == 1){
    				$('#y-gmfx').text(gy('向上'));
    			}else{
    				$('#y-gmfx').text(gy('向下'));
    			}
    			$('#y-hysc').text(miaoshu);
    			$('#y-dqsy').text($('#y-syl').val() + '%');
    			
    			originalValue = buyprice;
    			currentValue = Number(originalValue);
    
    			totalTime = miaoshu;
    			generateTargets();
    
    			$.ajax({
                    url: apiurl + '/trade/buy',
                    type: 'POST',
                    data: {
                        'userid': userid,
    					'username': username,
    					'fangxiang': fangxiang,
    					'miaoshu': miaoshu,
    					'biming': biming,
    					'num': num,
    					'buyprice': buyprice,
    					'zengjia': increaseTarget,
    					'jianshao': decreaseTarget
                    },
                    dataType: 'json',
                    success: function(res) {
                        if(res.code == 1){
    						dqid = res.data;
    						jiesuan(miaoshu,res.data,fangxiang);
    					}else{
    						alert(gy(res.data));
    					}
                    }
                });
                
                layer.close(index);
            });
		}

		var id1;
		var miaoshu1;
		var fangxiang1;
		let orderst;

		function jiesuan(miaoshu,id,fangxiang){
			$('.y-xdan-sx').hide();
			$('.y-xdan-ss').hide();
			$('.y-xdan-jg-tit').hide();
			$('.y-xdan-num').hide();
			$('.y-xdan-fy').hide();
			$('.y-tfx-button').hide();
			$('.y-countdown-container').show();
			$('.y-djs').show();
			$('#y-zhe2').show();
			$('#y-zhe').hide();

			shizhong(miaoshu);

			id1 = id;
			miaoshu1 = miaoshu;
			fangxiang1 = fangxiang;
			orderst = setTimestampInterval(() => getorder(id1, miaoshu1, fangxiang1), 1000);
		}

		var sfyks = 0;
		var kongzhi = 3;
		var suiji12 = Math.floor(Math.random() * 2) + 1;
		let shengyutime;

		function getorder(id,miaoshu,fangxiang){
			$.ajax({
                url: apiurl + '/trade/getorder',
                type: 'POST',
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code == 1) {
						if (sfyks == 0) {
							sfyks = 1;
							if (res.data != kongzhi) {
								kongzhi = res.data;

								if (res.data == 0) {
									if (fangxiang == 1) {
										setTarget(suiji12 == 1, miaoshu);
										if(suiji12 == 1){
											setordersy(id,1);
										}else{
											setordersy(id,2);
										}
									} else if (fangxiang == 2) {
										setTarget(suiji12 == 2, miaoshu);
										if(suiji12 == 2){
											setordersy(id,1);
										}else{
											setordersy(id,2);
										}
									}
								} else if (res.data == 1) {
									if (fangxiang == 1) {
										setTarget(true, miaoshu);
										setordersy(id,1);
									} else if (fangxiang == 2) {
										setTarget(false, miaoshu);
										setordersy(id,1);
									}
								} else if (res.data == 2) {
									if (fangxiang == 1) {
										setTarget(false, miaoshu);
										setordersy(id,2);
									} else if (fangxiang == 2) {
										setTarget(true, miaoshu);
										setordersy(id,2);
									}
								}
							}
						} else if (sfyks == 1) {
							if (res.data != kongzhi) {
								kongzhi = res.data;

								if (res.data == 0) {
									if (fangxiang == 1) {
										setTarget(suiji12 == 1, shengyutime);
										if(suiji12 == 1){
											setordersy(id,1);
										}else{
											setordersy(id,2);
										}
									} else if (fangxiang == 2) {
										setTarget(suiji12 == 2, shengyutime);
										if(suiji12 == 1){
											setordersy(id,1);
										}else{
											setordersy(id,2);
										}
									}
								} else if (res.data == 1) {
									if (fangxiang == 1) {
										setTarget(true, shengyutime);
										setordersy(id,1);
									} else if (fangxiang == 2) {
										setTarget(false, shengyutime);
										setordersy(id,1);
									}
								} else if (res.data == 2) {
									if (fangxiang == 1) {
										setTarget(false, shengyutime);
										setordersy(id,2);
									} else if (fangxiang == 2) {
										setTarget(true, shengyutime);
										setordersy(id,2);
									}
								}
							}
						}
					}
                }
            });
		}

		function setordersy(id,shuying){
			$.ajax({
                url: apiurl + '/trade/setordersy',
                type: 'POST',
                data: {
                    'id': id,
					'shuying': shuying
                },
                dataType: 'json',
                success: function(res) {}
            });
		}

		function getorderjs(){
			$.ajax({
                url: apiurl + '/trade/getorderjs',
                type: 'POST',
                data: {
                    'id': dqid,
                },
                dataType: 'json',
                success: function(res) {
                    if(res.code == 1){
						if(res.data != 'wjs'){
							if(res.data < 0){
								$('.y-load').hide();
								$('.y-hyh').show();
								clearTimestampInterval(orderjs);
							}else{
								$('.y-load').hide();
								$('.y-hyy-top').text('+ $' + Number(res.data).toFixed(2));
								$('.y-hyy').show();
								clearTimestampInterval(orderjs);
							}
						}
					}
				}
            });
		}

		window.addEventListener('scroll', function() {
			let currentScrollTop = window.scrollY || document.documentElement.scrollTop;
			if (currentScrollTop > 0) {
				$('#y-hd').addClass('y-huadong');
			} else {
				$('#y-hd').removeClass('y-huadong');
			}
		});

		function generateTargets() {
			let increasePercentage = Math.random() * 0.0005;
			let decreasePercentage = Math.random() * 0.0005;
			increaseTarget = originalValue * (1 + increasePercentage);
			decreaseTarget = originalValue * (1 - decreasePercentage);
		}

		function generateRandomValue() {
			elapsedTime++;
			let remainingTime = totalTime - elapsedTime;
			shengyutime = Number(remainingTime);
			if (remainingTime <= 0) {
				currentValue = currentTarget;
				clearTimestampInterval(intervalId);
				clearTimestampInterval(orderst);
				$('#y-dqbj').text(currentValue.toFixed(xsw[coinname]));
				$('#y-dqjg').text(currentValue.toFixed(xsw[coinname]));
				coin_data = setTimestampInterval("getcoin_data()",2000);

				$('#y-now').text(gy('最终结果'));
				$('#y-zzjg').css('display', 'block');

				orderjs = setTimestampInterval("getorderjs()",1000);
				return;
			}

			let progressRatio = remainingTime / totalTime;
			let randomPercentage = (Math.random() * 0.0005) * (Math.random() < 0.5 ? -1 : 1);

			currentValue += originalValue * randomPercentage * progressRatio;

			if (currentTarget > currentValue) {
				currentValue += Math.abs(currentTarget - currentValue) * (1 / remainingTime);
			} else if (currentTarget < currentValue) {
				currentValue -= Math.abs(currentTarget - currentValue) * (1 / remainingTime);
			}

			$('#y-ssjg').text(currentValue.toFixed(xsw[coinname]));
			$('#y-dqbj').text(currentValue.toFixed(xsw[coinname]));
			$('#y-dqjg').text(currentValue.toFixed(xsw[coinname]));
		}

		function setTarget(increase, seconds) {
			currentTarget = increase ? increaseTarget : decreaseTarget;
			totalTime = seconds;
			elapsedTime = 0;

			if (intervalId) {
				clearTimestampInterval(intervalId);
			}

			clearTimestampInterval(coin_data);
			intervalId = setTimestampInterval(generateRandomValue, 1000);
		}

		function shizhong(miaoshu){
			let countdownNumberEl = document.getElementById('y-countdown-number');
			let countdownCircle = document.querySelector('.progress');
			let countdownTime = miaoshu;
			let totalTime1 = countdownTime;

			let circumference = 2 * Math.PI * 3.6;
			countdownCircle.style.strokeDasharray = `${circumference}rem`;
			countdownCircle.style.strokeDashoffset = `${circumference}rem`;

			countdownNumberEl.textContent = countdownTime;

			let countdownInterval = setTimestampInterval(function() {
				countdownTime--;
				countdownNumberEl.textContent = countdownTime;

				let percentage = countdownTime / totalTime1;
				let dashoffset = circumference * (1 - percentage);
				countdownCircle.style.strokeDashoffset = `${dashoffset}rem`;

				if (countdownTime <= 0) {
					clearTimestampInterval(countdownInterval);
					countdownNumberEl.textContent = "Time's up!";
					$('.y-countdown-container').hide();
					$('.y-load').show();
				}
			}, 1000);
		}

		let timestampIntervals = new Map();

		function setTimestampInterval(callback, interval) {
			if (typeof callback !== 'function') {
				callback = new Function(callback);
			}

			let expectedTime = Date.now() + interval;
			let timerId = Symbol("timestampInterval");

			function intervalLoop() {
				if (!timestampIntervals.has(timerId)) return;

				const drift = Date.now() - expectedTime;
				expectedTime += interval;

				callback();

				setTimeout(intervalLoop, Math.max(0, interval - drift));
			}

			timestampIntervals.set(timerId, intervalLoop);
			setTimeout(intervalLoop, interval);

			return timerId;
		}

		function clearTimestampInterval(timerId) {
			timestampIntervals.delete(timerId);
		}

		$('.y-bzxz-left').click(function(){
			$('.y-czxz-co').show();
			$('#y-zhe3').show();
		});

		$('#y-zhe3').click(function(){
			$('.y-czxz-co').hide();
			$('#y-zhe3').hide();
		});
		
		function shuaxin(){
		    location.reload();
		}
	</script>
</body>
</html>
