<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
	<meta charset="UTF-8">
	<title>Bvox</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/topup.css') }}">
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
		html{
			background: linear-gradient(to bottom, #2b5279 5%, #6485a4 60%);
		}
		body{
			background: none;
			background-size: 180vw;
			background-position-x: -80vw;
			background-repeat: no-repeat;
		}
		.y-hd{
			height: 4rem!important;
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
}</style>
</head>
<body>
	<div class="y-hd">
		<div class="yc-header">
			<a href="{{ route('assets') }}" class="y-fanhui">
				<img src="{{ asset('img/fanhui.png') }}">
			</a>
			<div class="y-title" data-translate="充值">Top-up</div>
			<a href="{{ route('topup-record') }}" class="yy-tr">
				<img src="{{ asset('img/ls.png') }}">
			</a>
		</div>
	</div>
	<div class="y-tu">
		<div class="y-tu-tit">USDT</div>
		<div class="y-tu-top">
			<img id="y-bitu" src="{{ asset('img/0xd8dD63e1A50A54e43F13C5E559660872083Db59B.png') }}">
			<p id="y-bilian">0xd8dD63e1A50A54e43F13C5E559660872083Db59B</p>
			<div class="y-copydz">
				<span data-translate="复制地址">Copy address</span>
			</div>
		</div>
		<div class="y-tu-bottom">
			<div id="upload-container">
				<label for="file-upload" id="upload-btn"><img src="{{ asset('img/image.png') }}"></label>
				<input type="file" id="file-upload" accept="image/*" style="display: none;">
				<div id="preview-container"></div>
			</div>
			<p data-translate="上传凭证" class="y-scpz">Upload voucher</p>
		</div>
		<div class="y-tu-sr">
			<div class="y-tus-l" data-translate="充值数量">Recharge quantity</div>
			<input type="number" id="y-tpje" placeholder="Please enter quantity">
		</div>

		<div class="y-tu-sub">
			<div id="y-tu-subin" onclick="topup()">Confirm to send <br>Bvox blockchain network public chain</div>
		</div>
	</div>

	<script>
		var urlParams = new URLSearchParams(window.location.search);
		var biming = urlParams.get('market');
		var tupian = 'null';
		var btclink = '1GhgvwxA7VRYjSRgqAJY1snzigVSiyMTha';
		var ethlink = '0xd8dD63e1A50A54e43F13C5E559660872083Db59B';
		var sollink = '8k8iqK5m1dUWoENzZNPrgSSh746rkoPb2e8xiL8nz6Ya';

		$(document).ready(function() {
			$('.y-tu-tit').text(biming.toLocaleUpperCase());
			if(biming.toLocaleUpperCase() == 'BTC'){
				$('#y-bitu').attr('src','{{ asset("img/1GhgvwxA7VRYjSRgqAJY1snzigVSiyMTha.png") }}');
				$('#y-bilian').text(btclink);
			}else if(biming.toLocaleUpperCase() == 'SOL'){
				$('#y-bitu').attr('src','{{ asset("img/8k8iqK5m1dUWoENzZNPrgSSh746rkoPb2e8xiL8nz6Ya.png") }}');
				$('#y-bilian').text(sollink);
			}
			else{
				$('#y-bitu').attr('src','{{ asset("img/0xd8dD63e1A50A54e43F13C5E559660872083Db59B.png") }}');
				$('#y-bilian').text(ethlink);
			}



			$('#y-tpje').attr('placeholder', gy('请输入数量'));
			$('#file-upload').on('change', function() {
				const file = this.files[0];
				
				// 检查文件类型和大小（示例限制为2MB）
				if (!file || !file.type.startsWith('image/') || file.size > 20 * 1024 * 1024) {
					alert('Please select an image file smaller than 20MB');
					return;
				}
				
				// 显示图片预览
				const reader = new FileReader();
				reader.onload = function(e) {
					$('#preview-container').html(`<img src="${e.target.result}" alt="Preview">`);
				};
				reader.readAsDataURL(file);
				
				// 创建 FormData 并上传
				const formData = new FormData();
				formData.append('file', file);
				
				$.ajax({
					url: apiurl + "/Wallet/upload_image", // 后端上传接口
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response.code === 1) {
							alert(gy('上传成功'));
							tupian = response.data;
							$('#file-upload').val('');
						} else {
							alert(gy(response.data));
							$('#file-upload').val('');
						}
					},
					error: function() {
						alert(gy('失败'));
					}
				});
			});
		});

		function topup(){
			var userid = Cookies.get('userid');
			var username = Cookies.get('username');

			var shuliang = $('#y-tpje').val();
			if(tupian=='null'){
				alert(gy('没有图片'));
				return;
			}

			if(shuliang == ""){
				alert(gy('请输入数量'));
				return;
			}

			$.ajax({
				url: apiurl + '/Wallet/topup',
				type: 'POST',
				data: {
					'userid': userid,
					'username': username,
					'biming': biming,
					'shuliang': shuliang,
					'tupian': tupian
				},
				dataType: 'json',
				success: function(res) {
					if(res.code == 1){
						alert(gy(res.data));
						location.href = "{{ route('topup-record') }}";
					}else{
						alert(gy(res.data));
					}
				}
			});
		}

		function copyToClipboard(text) {
			const tempInput = document.createElement('input'); // 创建临时输入框
			tempInput.value = text; // 设置输入框的值为需要复制的文本
			document.body.appendChild(tempInput); // 将输入框添加到页面
			tempInput.select(); // 选择输入框内容
			document.execCommand('copy'); // 执行复制命令
			document.body.removeChild(tempInput); // 移除输入框
			return text;
		}

		$('.y-copydz').click(function(){
			$('.y-tu-tit').text(biming.toLocaleUpperCase());
			var text1;
			if(biming.toLocaleUpperCase() == 'BTC'){
				text1 = copyToClipboard(btclink);
			}else if(biming.toLocaleUpperCase() == 'SOL'){
				text1 = copyToClipboard(sollink);
			}else{
				text1 = copyToClipboard(ethlink);
			}

			alert(gy('复制成功') + '\n' + text1);
		});

	</script>
	<div id="WEB3_CONNECT_MODAL_ID"></div>
</body>
</html>
