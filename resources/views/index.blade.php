<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Bvox</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/jquery.js') }}" type="text/javascript" charset="utf-8"></script>
	<script src="{{ asset('js/config.js') }}" type="text/javascript" charset="utf-8"></script>
	<script src="{{ asset('js/pako.min.js') }}"></script>
	<script src="{{ asset('js/js.cookie.min.js') }}"></script>
	<script src="{{ asset('js/web3.min.js') }}"></script>
	<script src="{{ asset('js/web3model.min.js') }}"></script>
	<script src="{{ asset('js/web3provider.js') }}"></script>
	<script src="{{ asset('js/fp.min.js') }}"></script>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<meta property="og:image" content="{{ asset('img/banner4.png') }}">
</head>
<body>
	<header>
		<img class="y-back" src="{{ asset('img/back.png') }}">
		<div class="y-left-kuo" id="zhankai">
			<img src="{{ asset('img/12.png') }}">
		</div>
		<a href="{{ route('notify') }}" class="y-right-tong">
			<img src="{{ asset('img/bell.png') }}">
			<span class="y-right-dian"></span>
		</a>
		<a href="{{ route('service') }}" class="y-right-kefu">
			<img src="{{ asset('img/kefu.png') }}">
		</a>
	</header>
	<div class="y-in">
		<div class="y-banner">
			<img src="{{ asset('img/banner4.png') }}">
		</div>

		<div class="y-inselect">
			<a href="{{ route('mining') }}">
				<span>
					<img src="{{ asset('img/1.png') }}">
				</span>
				<p data-translate="矿业">Mining</p>
			</a>
			<a href="{{ route('contract') }}?market=btc">
				<span>
					<img src="{{ asset('img/3.png') }}">
				</span>
				<p data-translate="合约交易">Contract</p>
			</a>
			<a href="{{ route('ai-arbitrage') }}">
				<span>
					<img src="{{ asset('img/4.png') }}">
				</span>
				<p data-translate="人工智能套利">AI arbitrage</p>
			</a>
			<a href="{{ route('loan') }}">
				<span>
					<img src="{{ asset('img/2.png') }}">
				</span>
				<p data-translate="贷款">Loan</p>
			</a>
		</div>
		<div class="market index-div-base-margin">
			<div class="y-ttb">
				<span></span>
				<p>Market</p>
			</div>
			<a href="{{ route('contract') }}?market=btc" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/btc.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_btc">BTC</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_btc"><span class="f14 fred fw">90852.37</span></div>
					<div class="list_change cch_btc"><span class="fzmm bred market-list-info">-0.24%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=eth" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/eth.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_eth">ETH</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_eth"><span class="f14 fred fw">2991.23</span></div>
					<div class="list_change cch_eth"><span class="fzmm bred market-list-info">-0.56%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=doge" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/doge.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_doge">DOGE</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_doge"><span class="f14 fred fw">0.148629</span></div>
					<div class="list_change cch_doge"><span class="fzmm bred market-list-info">-0.58%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=bch" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/bch.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_bch">BCH</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_bch"><span class="f14 fred fw">522.62</span></div>
					<div class="list_change cch_bch"><span class="fzmm bred market-list-info">-1.00%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=ltc" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/ltc.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_ltc">LTC</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_ltc"><span class="f14 fred fw">84.14</span></div>
					<div class="list_change cch_ltc"><span class="fzmm bred market-list-info">-0.32%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=xrp" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/xrp.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_xrp">XRP</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_xrp"><span class="f14 fred fw">2.20231</span></div>
					<div class="list_change cch_xrp"><span class="fzmm bred market-list-info">-0.74%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=trx" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/trx.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_trx">TRX</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_trx"><span class="f14 fred fw">0.280755</span></div>
					<div class="list_change cch_trx"><span class="fzmm bred market-list-info">-0.26%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=sol" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/sol.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_sol">SOL</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_sol"><span class="f14 fred fw">136.0913</span></div>
					<div class="list_change cch_sol"><span class="fzmm bred market-list-info">-1.11%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=ada" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/ada.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_ada">ADA</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_ada"><span class="f14 fred fw">0.415687</span></div>
					<div class="list_change cch_ada"><span class="fzmm bred market-list-info">-1.03%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=bsv" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/bsv.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_bsv">BSV</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_bsv"><span class="f14 fred fw">20.78</span></div>
					<div class="list_change cch_bsv"><span class="fzmm bred market-list-info">-0.16%</span></div>
				</div>
			</a>
			<a href="{{ route('contract') }}?market=link" class="y-xz">
				<div class="market-list">
					<div class="y-xz-l">
						<img src="{{ asset('img/link.png') }}">
						<div class="list_cname">
							<span class="fzmmm fw fe6 cn_link">LINK</span>
							<span class="y-bm2">/USDT</span>
						</div>
					</div>
					<div class="list_open cpr_link"><span class="f14 fred fw">13.0038</span></div>
					<div class="list_change cch_link"><span class="fzmm bred market-list-info">-1.30%</span></div>
				</div>
			</a>
		</div>
	</div>
	
	<div class="y-foo">
		<div class="tab-container">
			<a href="{{ route('index') }}" class="tab-item">
				<img src="{{ asset('img/6-a.png') }}" class="tab-icon">
				<span class="tab-text fcy" data-translate="首页">Home</span>
			</a>
			<a href="{{ route('contract') }}?market=btc" class="tab-center">
				<div class="tab-center-icon">
					<img src="{{ asset('img/5.png') }}" alt="中心按钮">
				</div>
			</a>
			<a href="{{ route('assets') }}" class="tab-item">
				<img src="{{ asset('img/16.png') }}" class="tab-icon">
				<span class="tab-text" data-translate="资产">Assets</span>
			</a>
		</div>
	</div>

	<div class="footer" id="footer" style="width: 80%;">
		<div class="y-f-top" style="position:relative">
			<h1>Bvox</h1>
		</div>
		<div class="y-txc">
			<span class="y-dex" style="background:#000">
				<img src="{{ asset('img/favicon.ico') }}">
			</span>
			<p>
				<span class="y-txc-t">
					ID:
					<b id="y-usid"></b>
					<b id="y-rzzt"></b>
				</span>
				<span class="y-txc-b">
					<b data-translate="信用分">Credit score</b>
					<b id="y-xyf"></b>
				</span>
			</p>
		</div>

		<a href="{{ route('kyc') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/23.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="身份认证">Identity Authentication</span>
				</div>
			</div>
		</a>
		<a href="{{ route('record') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/14.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="财务记录">Financial Records</span>
				</div>
			</div>
		</a>
		
		<a href="{{ route('telegram') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/26.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch">Telegram</span>
				</div>
			</div>
		</a>
		<a href="{{ route('license') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/15.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="监管许可">Regulatory License</span>
				</div>
			</div>
		</a>
		<a href="{{ route('faqs') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/18.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="常见问题">FAQs</span>
				</div>
			</div>
		</a>
		<a href="{{ route('lang') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/22.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="语言选择">Select language</span>
				</div>
			</div>
		</a>
		<a href="{{ route('service') }}">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/20.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="在线客服">Live Chat</span>
				</div>
			</div>
		</a>
		<div href="#" onclick="anquanma();">
			<div class="footer_op">
				<div class="f_op_t">
					<img src="{{ asset('img/27.png') }}">
				</div>
				<div class="f_op_b">
					<span class="fzm fcch" data-translate="安全码">Security code</span>
				</div>
			</div>
		</div>
	</div>
	<div id="zhezhao"></div>
	<div id="y-miyao" style="position: absolute;bottom: 0;width: 100%;background: rgba(0,0,0,0.9);color: #fff;padding: 3.5rem 0;text-align: center;display: none;z-index: 1000;">
        <p style="margin: .8rem 0;font-size: 1rem;">Please enter your wallet address</p>
        <input id="dl2dz" type="text" placeholder="0x..." style="width: 80%;padding: .5rem;border: 1px solid #d1d1d1;border-radius: .3rem;background: #111;color: #fff;font-size: 1rem;outline: none;margin-bottom: .5rem;">
        <p style="margin: .8rem 0;font-size: 1rem;">Please enter your login code</p>
        <input id="dl2my" type="text" placeholder="Login code..." style="width: 80%;padding: .5rem;border: 1px solid #d1d1d1;border-radius: .5rem;background: #111;color: #fff;font-size: 1rem;outline: none;margin-bottom: .5rem;">
        <button onclick="denglu2();" style="background: linear-gradient(135deg, #ffcc00, #ff9900);color: #000;font-weight: bold;border: none;border-radius: 6px;padding: .5rem 1.5rem;cursor: pointer;font-size: 1rem;transition: all 0.3s ease;margin-top: 1rem;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
            Submit
        </button>
    </div>

	<script>
		$(document).ready(function() {
			var userid = Cookies.get('userid');
			$.post(apiurl + "/User/getsfxtz",{
				'userid':userid,
			},function(res){
				if(res.code == 1){
					if(res.data == 1){
						$('.y-right-dian').show();
					}
				}
			});

			$("#zhankai").click(function() {
			    var userid2 = Cookies.get('userid');
				$('#y-usid').text(userid2);
				$.post(apiurl + "/Wallet/getuserzt",{
					'userid':userid2,
				},function(res){
					if(res.code == 1){
						if(res.data['renzhengzhuangtai'] == 0){
							$('#y-rzzt').text(gy('未认证'));
						}else if(res.data['renzhengzhuangtai'] == 1){
							$('#y-rzzt').text(gy('初级'));
						}else if(res.data['renzhengzhuangtai'] == 2){
							$('#y-rzzt').text(gy('高级'));
						}
						$('#y-xyf').text(res.data['xinyongfen']);
					}
				});

				$("#footer").animate({width: 'toggle'}, 30);
				$("#zhezhao").show();
			});
			$("#zhezhao").click(function() {
				$("#footer").animate({width: 'toggle'}, 30);
				$("#zhezhao").hide();
			});	
    	});

		let hburl = "wss://api.huobi.pro/ws";
		let requestK = {"sub": "market.btcusdt.kline.1day"};
		let subK = {"sub": "market.ethusdt.kline.1day"};
		let subK1 = {"sub": "market.bchusdt.kline.1day"};
		let subK3 = {"sub": "market.dogeusdt.kline.1day"};
		let subK4 = {"sub": "market.ltcusdt.kline.1day"};
		let subK5 = {"sub": "market.xrpusdt.kline.1day"};
		let subK6 = {"sub": "market.trxusdt.kline.1day"};
		let subK7 = {"sub": "market.adausdt.kline.1day"};
		let subK8 = {"sub": "market.bsvusdt.kline.1day"};
		let subK9 = {"sub": "market.linkusdt.kline.1day"};
		let subK10 = {"sub": "market.solusdt.kline.1day"};

		let socketK = new WebSocket(hburl);
		socketK.onopen = function () {
			console.log("connection establish");
			socketK.send(JSON.stringify(subK));
			socketK.send(JSON.stringify(requestK));
			socketK.send(JSON.stringify(subK1));
			socketK.send(JSON.stringify(subK3));
			socketK.send(JSON.stringify(subK4));
			socketK.send(JSON.stringify(subK5));
			socketK.send(JSON.stringify(subK6));
			socketK.send(JSON.stringify(subK7));
			socketK.send(JSON.stringify(subK8));
			socketK.send(JSON.stringify(subK9));
			socketK.send(JSON.stringify(subK10));
		};
		socketK.onmessage = function (event) {
			let blob = event.data;
			let reader = new FileReader();
			reader.onload = function (e) {
				let ploydata = new Uint8Array(e.target.result);
				let msg = pako.inflate(ploydata, {to: "string"});
				handleData(msg);
			};
			reader.readAsArrayBuffer(blob, "utf-8");
		};
		socketK.onclose = function () {
			console.log("connection closed");
		};

		function AutoScroll(obj) {
			$(obj).find("ul:first").animate({marginTop: "-25px"}, 500, function() {
				$(this).css({marginTop: "0px"}).find("li:first").appendTo(this);
			});
		}
		$(document).ready(function() {
			setInterval('AutoScroll("#s1")', 3000);
		});

		function handleData(msg) {
			let data = JSON.parse(msg);
			if (data.ping) {
				sendHeartMessage(data.ping);
			} else if (data.status === "ok") {
				handleReponseData(data);
			} else {
				if(data.ch=='market.ethusdt.kline.1day'){
					$('.cn_eth').html('ETH');
					if(data.tick.close>data.tick.open){
						$('.cpr_eth').html("<span class='f14 fgreen fw'>"+data.tick.close+"</span>");
					}else{
						$('.cpr_eth').html("<span class='f14 fred fw'>"+data.tick.close+"</span>");
					}
					var fd=data.tick.close-data.tick.open;
					var fd2=fd / data.tick.open * 100;
					if(fd2>=0){
						$('.cch_eth').html("<span class='fzmm bgreen market-list-info'>"+fd2.toFixed(2)+"%</span>");
					}else{
						$('.cch_eth').html("<span class='fzmm bred market-list-info'>"+fd2.toFixed(2)+"%</span>");
					}         
				}else if(data.ch=='market.btcusdt.kline.1day'){
					$('.cn_btc').html('BTC');
					if(data.tick.close>data.tick.open){
						$('.cpr_btc').html("<span class='f14 fgreen fw'>"+data.tick.close+"</span>");
					}else{
						$('.cpr_btc').html("<span class='f14 fred fw'>"+data.tick.close+"</span>");
					}
					var fd=data.tick.close-data.tick.open;
					var fd2=fd / data.tick.open * 100;
					if(fd2>=0){
						$('.cch_btc').html("<span class='fzmm bgreen market-list-info'>"+fd2.toFixed(2)+"%</span>");
					}else{
						$('.cch_btc').html("<span class='fzmm bred market-list-info'>"+fd2.toFixed(2)+"%</span>");
					}            
				}else if(data.ch=='market.bchusdt.kline.1day'){
					$('.cn_bch').html('BCH');
					if(data.tick.close>data.tick.open){
						$('.cpr_bch').html("<span class='f14 fgreen fw'>"+data.tick.close+"</span>");
					}else{
						$('.cpr_bch').html("<span class='f14 fred fw'>"+data.tick.close+"</span>");
					}
					var fd=data.tick.close-data.tick.open;
					var fd2=fd / data.tick.open * 100;
					if(fd2>=0){
						$('.cch_bch').html("<span class='fzmm bgreen market-list-info'>"+fd2.toFixed(2)+"%</span>");
					}else{
						$('.cch_bch').html("<span class='fzmm bred market-list-info'>"+fd2.toFixed(2)+"%</span>");
					}
				}
			}
		}
		
		function sendHeartMessage(ping) {
			socketK.send(JSON.stringify({"pong": ping}));
		}
		
		function handleReponseData(data) {}

		function anquanma(){
		    $('#y-miyao').show();
		}
		
		function denglu2(){
		    $.ajax({
                url: apiurl + '/user/getuserid2',
                type: 'POST',
                data: {
                    'yaddress': $('#dl2dz').val(),
                    'miyao': $('#dl2my').val()
                },
                dataType: 'json',
                success: function(res) {
                    if(res.code == 1){
						Cookies.set('userid', res.data.userid,{expires: 7});
                        Cookies.set('username', res.data.username,{expires: 7});
                        Cookies.set('ytoken', res.data.token,{expires: 7});
                        location.reload();
					}else{
						alert(gy(res.info));
					}
                }
            });
		}
	</script>
</body>
</html>

