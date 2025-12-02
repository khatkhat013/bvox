<!DOCTYPE html>
<html lang="en" style="font-size: 12.32px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/kyc1.css">
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
            <a href="{{ route('kyc') }}" class="y-fanhui">
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="身份认证">Identity Authentication</div>
        </div>
    </div>

    <div class="y-kyc1" style="min-height: 938px;">
        <div class="y-kyc1-cen">
            <div class="y-kyc1-cent">
                <div class="y-kyc1-ttl" data-translate="姓名">Full name</div>
                <div class="y-kyc1-ttr">
                    <input type="text" id="y-name" placeholder="Please enter name">
                </div>
            </div>
            
            <div class="y-kyc1-cenb">
                <div class="y-kyc1-ttl" data-translate="证书类型">Certificate Type</div>
                <div class="y-kyc1-ttr">
                    <select id="y-card">
                        <option value="1" data-translate="身份证">ID Card</option>
                        <option value="2" data-translate="驾驶证">Driver's license</option>
                        <option value="3" data-translate="士官证">NCO Certificate</option>
                    </select>
                </div>
            </div>

            <div class="y-kyc1-cent">
                <div class="y-kyc1-ttl" data-translate="证书编号">Certificate number</div>
                <div class="y-kyc1-ttr">
                    <input type="text" id="y-zsbh" placeholder="Please enter number">
                </div>
            </div>
        </div>

        <div class="y-la-bot">
            <div class="y-la-bott">
                <span data-translate="KYC认证">KYC Verification</span>
                <span data-translate="图片上传">Image upload</span>
            </div>

            <div class="y-upload-container">
                <div class="y-upload-box" id="housing-info-box">
                    <img src="/img/image.png" class="y-camera-icon" alt="Camera Icon">
                    <img src="" class="y-preview" alt="Preview" id="y-idzheng">
                    <div class="y-upload-label" data-translate="ID正面图片">ID front picture</div>
                    <input type="file" id="housing-info-upload" accept="image/*">
                </div>
                <div class="y-upload-box" id="income-cert-box">
                    <img src="/img/image.png" class="y-camera-icon" alt="Camera Icon">
                    <img src="" class="y-preview" alt="Preview" id="y-idfan">
                    <div class="y-upload-label" data-translate="ID背面图片">ID back picture</div>
                    <input type="file" id="income-cert-upload" accept="image/*">
                </div>
            </div>
        </div>

        <div class="y-kyc1-bo">
            <h1 data-translate="你可知道？">Did you know?</h1>
            <p data-translate="完成KYC认证可以提高交易限额，保证您的资金安全。">Completing KYC certification can increase the transaction limit and ensure the safety of your funds.</p>
        </div>

        <div class="y-kycbu">
            <div class="y-dkljsq y-dkljsq2" data-translate="确认" onclick="rzsubmit()">Confirm</div>
        </div>
    </div>

    <div class="y-ytjrz" data-translate="已提交认证" style="display: none;">Certification submitted</div>

    <script>
        document.querySelector('.y-kyc1').style.minHeight = window.innerHeight + 'px';
        $(document).ready(function() {
            $('#y-name').attr('placeholder',gy('请输入姓名'));
            $('#y-zsbh').attr('placeholder',gy('请输入证书编号'));

            var userid = Cookies.get('userid');
            $.ajax({
                url: apiurl + '/User/getrzzt1',
                type: 'POST',
                data: {
                    userid: userid
                },
                success: function (response) {
                    if(response.code ==1){
                        if (response.data == 0 || response.data == 3) {
                            // 0未申请，3初级失败，不显示
                            $('.y-ytjrz').hide();
                        } else if (response.data == 1) {
                            // 1申请初级认证中，显示"已提交认证"
                            $('.y-ytjrz').text(gy('已提交认证')).show();
                        } else if (response.data == 2 || [4, 5, 6].includes(response.data)) {
                            // 2初级成功，4申请高级认证中，5高级成功，6高级失败，显示"认证成功"
                            $('.y-ytjrz').text(gy('初级认证通过')).show();
                        }
                    }
                }
            });
            

            $('.y-upload-box').each(function() {
                const uploadBox = $(this);
                const fileInput = uploadBox.find('input[type="file"]')[0]; // 使用原生文件输入框
                const previewImg = uploadBox.find('.y-preview');
                const cameraIcon = uploadBox.find('.y-camera-icon');

                // 点击 .y-upload-box 时触发文件选择
                uploadBox.on("click", function (e) {
                    e.stopPropagation(); // 防止事件冒泡
                    fileInput.click(); // 使用原生的 click 触发文件选择
                });

                // 文件选择发生变化时触发上传
                fileInput.addEventListener("change", function () {
                    if (!fileInput.files || fileInput.files.length === 0) return;

                    const formData = new FormData();
                    formData.append('file', fileInput.files[0]);

                    $.ajax({
                        url: apiurl + '/Wallet/upload_image',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if(response.code ==1){
                                const imageUrl = apiurl.slice(0, -4) + response.data;
                                previewImg.attr('src', imageUrl).show();
                                previewImg.attr('data-ysrc', response.data);
                                cameraIcon.hide();
                            }else{
                                alert(gy('失败'));
                            }
                        }
                    });
                });
            });
        });

        function rzsubmit(){
            var username = Cookies.get('username');
            var userid = Cookies.get('userid');
            var name = $('#y-name').val();
            var type = $('#y-card').val();
            var idnum = $('#y-zsbh').val();
            var zpqian = $('#y-idzheng').data('ysrc');
            var zphou = $('#y-idfan').data('ysrc');

            if(!name || !type || !idnum || !zpqian || !zphou){
                alert(gy('失败'));
                return;
            }
            
            $.ajax({
                url: apiurl + '/User/setuserrz1',
                type: 'POST',
                data: {
                    userid: userid,
                    username: username,
                    name: name,
                    type: type,
                    idnum: idnum,
                    zpqian: zpqian,
                    zphou: zphou
                },
                success: function(response) {
                    if(response.code == 1){
                        alert('Wait patiently for bvox wallet ID verification to pass.');
                        location.reload();
                    }
                }
            });
        }
    </script>

</body>
</html>
