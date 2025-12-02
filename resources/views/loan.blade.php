<!DOCTYPE html>
<html lang="en" style="font-size: 20px;">
<head>
    <meta charset="UTF-8">
    <title>Bvox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/loan.css">
    <script src="/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/config.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/pako.min.js"></script>
    <script src="/js/js.cookie.min.js"></script>
    <script src="/js/web3.min.js"></script>
    <script src="/js/web3model.min.js"></script>
    <script src="/js/web3provider.js"></script>
    <script src="/js/fp.min.js"></script>
    <link rel="shortcut icon" href="https://www.bvoxf.com/favicon.ico">
    <meta property="og:image" content="/img/banner4.png">
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
                <img src="/img/fanhui.png">
            </a>
            <div class="y-title" data-translate="贷款">Loan</div>
            <a href="{{ route('loan-record') }}" class="yy-tr">
                <img src="/img/ls.png">
            </a>
        </div>
    </div>
    <div class="y-loan">
        <div class="y-la-top">
            <div class="y-la-tt">
                <span data-translate="贷款数量">Loan amount</span>
                <span id="y-dksl">0.00</span>
            </div>
            <div class="y-la-tb">
                <div class="y-la-tbl">
                    <span data-translate="累计贷款">Grand total</span>
                    <span id="y-ljdk">0.00</span>
                </div>
                <div class="y-la-tbr">
                    <span data-translate="未还数量">Unreturned</span>
                    <span id="y-whsl">0.00</span>
                </div>
            </div>
            <img src="/img/dktp.png">
        </div>
        <div class="y-la-cen">
            <div class="y-la-cent">
                <div class="y-la-ttl" data-translate="贷款数量">Loan amount</div>
                <div class="y-la-ttr">
                    <input type="number" id="y-dkslsr" placeholder="Please enter quantity">
                    <span class="y-usdtcolor">USDT</span>
                </div>
            </div>
            <div class="y-la-cenb">
                <div class="y-la-ttl" data-translate="贷款周期(天)">Credit cycle(days)</div>
                <div class="y-la-ttr">
                    <select id="y-tianshu">
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="y-la-cen">
            <div class="y-la-cent">
                <div class="y-la-ttl" data-translate="日利率">Daily Rate</div>
                <div class="y-la-ttr">
                    <span><b id="y-lilv">2.00</b>%</span>
                </div>
            </div>
            <div class="y-la-cenb">
                <div class="y-la-ttl" data-translate="还款方式">Repayment</div>
                <div class="y-la-ttr">
                    <span data-translate="到期偿还本息">Maturity Payment</span>
                </div>
            </div>
            <div class="y-la-cenb">
                <div class="y-la-ttl" data-translate="利息">Total Interest</div>
                <div class="y-la-ttr">
                    <span id="y-lixi">0.00</span>
                </div>
            </div>
        </div>

        <div class="y-la-bot">
            <div class="y-la-bott">
                <span data-translate="信用贷款">Credit loan</span>
                <span data-translate="图片上传">Image upload</span>
            </div>

            <div class="y-upload-container">
                <div class="y-upload-box" id="housing-info-box">
                    <img src="/img/image.png" class="y-camera-icon" alt="Camera Icon">
                    <img src="" class="y-preview" alt="Preview" id="y-zfxx">
                    <div class="y-upload-label" data-translate="住房信息">Housing information</div>
                    <input type="file" id="housing-info-upload" accept="image/*">
                </div>
                <div class="y-upload-box" id="income-cert-box">
                    <img src="/img/image.png" class="y-camera-icon" alt="Camera Icon">
                    <img src="" class="y-preview" alt="Preview" id="y-srzm">
                    <div class="y-upload-label" data-translate="收入证明(雇佣关系)">Income certificate (employment relationship)</div>
                    <input type="file" id="income-cert-upload" accept="image/*">
                </div>
                <div class="y-upload-box" id="bank-details-box">
                    <img src="/img/image.png" class="y-camera-icon" alt="Camera Icon">
                    <img src="" class="y-preview" alt="Preview" id="y-yhxx">
                    <div class="y-upload-label" data-translate="银行信息">Bank details</div>
                    <input type="file" id="bank-details-upload" accept="image/*">
                </div>
                <div class="y-upload-box" id="id-photo-box">
                    <img src="/img/image.png" class="y-camera-icon" alt="Camera Icon">
                    <img src="" class="y-preview" alt="Preview" id="y-sfz">
                    <div class="y-upload-label" data-translate="身份证照片">ID photo</div>
                    <input type="file" id="id-photo-upload" accept="image/*">
                </div>
            </div>
        </div>

        <div class="y-dkdbu">
            <div class="y-dkljsq" data-translate="立即申请" onclick="dksubmit()">Apply now</div>
            <div class="y-yuedu">
                <input type="checkbox" id="y-checkgx">
                <span data-translate="我已阅读并同意">I have read and agreed</span>
                <span data-translate="《申请Token协议》" class="y-htchakan">'Apply for Token Agreement'</span>
            </div>
            <div class="y-daiktx" data-translate="请您务必按时还款，如有恶意预期，交易账户将被冻结">Please be sure to repay on time. If there is any malicious expectation, the trading account will be frozen</div>
        </div>
    </div>

    <div class="y-xy-ze"></div>
    <div class="y-xy y-xy-en">
        <p>The general terms of this C2C lending agreement (hereinafter referred to as "this agreement") are signed by digital asset lenders and lenders on the basis of voluntariness, equality, fairness, good faith and credit, placing orders on this platform. (hereinafter referred to as the "Platform") matches borrowers through lenders. Both parties signed to confirm compliance.<br><br>Article 1 General Provisions<br><br><br>1. This agreement is concluded in accordance with the relevant rules of the platform. If the platform rules are modified, changed or terminated, the corresponding provisions of this agreement will be automatically modified, changed or terminated to be consistent with the platform rules.<br><br>2. This agreement is signed by both parties in the form of an electronic agreement through the platform, and it takes effect after both parties click the "Agree" button on the platform.<br><br>3. As a general clause, once this agreement is signed, it will be effective for both the lender and the borrower for a long time and is applicable to any party's digital asset lending situation.<br><br>Article 2 Lender's Guarantee<br><br><br>1. The lender is a natural or legal person with full capacity for civil conduct and has the right to sign this agreement and exercise and perform the rights and obligations under this agreement;<br><br>2. The signing and performance of this agreement is the borrower's true intention, and its obligations under this agreement are legal, valid and enforceable;<br><br>3. The signing and performance of this agreement does not violate the contract between the lender and the third party, relevant laws and regulations, as well as the approval, authorization, consent, license or court order, order or others of the relevant competent authorities;<br><br>4. The lender has complete, legal and effective ownership of the loaned assets, and there is no dispute over the ownership of the loaned assets. There is no pledge or other security rights for any third party, and there are no trusts or restrictions. Use or other encumbrances, are not seized, frozen, attached or held in escrow, and are free from any right of recourse to suit, execution, enforcement action or other legal process.<br><br><br>Article 3 Borrower Guarantee<br><br>1. The borrower is a natural or legal person with full capacity for civil conduct and has the right to sign this agreement and exercise and perform the rights and obligations under this agreement;<br><br>2. The signing and performance of this agreement is the borrower's true intention, and its obligations under this agreement are legal, valid and enforceable;<br><br>3. The borrower's signing and performance of this agreement does not violate or conflict with the contract between the borrower and the third party, relevant laws and regulations, the approval, authorization, consent, license of the relevant competent authorities, or the court's judgment or order;<br><br>4. The borrower has complied with and performed all relevant obligations stipulated by applicable laws, and complied with all authorizations and licenses of applicable laws. There is no violation of relevant laws, regulations or rules that may have a significant adverse impact on the borrower. The legality, validity, performance and enforceability of this agreement;<br><br>5. Ensure that the borrowed assets are used according to the agreed purposes, and the borrowed digital assets must not be used for any projects prohibited by laws, regulations, regulatory requirements, or national policies.<br><br>6. Guarantee to pay interest and fees on borrowed digital assets in accordance with the agreement, and repay borrowed assets on time and in full.<br><br><br>Article 4 Delivery of Lending Digital Assets<br><br><br>1. Prerequisites for the lender to deliver digital asset lending to the borrower: Both parties have confirmed their agreement to the terms of this agreement.<br><br>2. Delivery method of lending digital assets: The platform assists in transferring funds to complete the delivery.<br><br>Article 5 Repayment of Lending Digital Assets<br><br><br>1. Unless otherwise explicitly agreed, the borrower should return all borrowed digital assets and the agreed currency interest.<br><br>2. Before the expiration of the loan period, the lender shall not require the borrower to repay the loan in advance; however, the borrower can apply for early repayment of part or all of the loan assets through the platform settings. The interest on early repayment of some digital asset currencies will be settled in accordance with product rules.<br><br><br>Article 6 Digital Asset Lending Fees<br><br>1. After applying for a loan. The user recharges the deposit (pledge amount) to the platform account. After the deposit (pledge amount) arrives, the platform will automatically review and complete the delivery. Users can apply for a loan within the maximum loan amount allowed on this website.<br><br><br>Article 7 Special Agreement<br><br><br>1. During the loan period, any appreciation or income of the digital assets under this agreement that is not due to the borrower's actions, including but not limited to due rewards, airdrops and other appreciation or income, shall belong to the borrower and the lender;<br><br>2. If any dispute arises between the two parties due to the signing, performance, cancellation or termination of this Agreement, both parties hereby irrevocably authorize the platform to have the right to submit their personal information to the other party based on the other party's application, including their registered UID account, name, Personal information necessary for dispute resolution such as ID number and email address.<br><br>3. The other party shall be responsible for the confidentiality of the contents of this agreement and related agreements, as well as the information provided to the other party due to the signing, modification, performance, termination or cancellation of the signed documents. Without the written consent of the other party, or unless disclosure is required in accordance with legal procedures or regulatory requirements, the information recipient shall not provide or disclose the aforementioned confidential information to the media, the public or any other party in any direct or indirect manner, or indirectly, to any other third party.<br><br><br>Article 8 Assignment of Obligations and Debts<br><br><br>1. Neither party may transfer its rights and obligations under this Agreement to a third party without the prior written consent of the other party.<br><br><br>Article 9 Liability for breach of contract<br><br><br>1 Any violation of this Agreement and related terms by any party shall be deemed as a breach of contract.<br><br>2. If either party breaches the contract and causes losses to the other party, it shall pay liquidated damages as agreed, and the liquidated damages will be recharged to the user platform account; if the liquidated damages are insufficient to cover all direct losses, the liquidated damages will be recharged to the user platform account. If it causes economic losses to the other party, the difference shall be made up; if the liquidated damages clause does not apply, one party shall be responsible for fully compensating the other party's direct economic losses. The above-mentioned direct economic losses include attorney fees, litigation and arbitration fees, judicial appraisal fees, and reasonable expenses such as reducing existing property and seeking to reduce rights.<br><br>3 If the penalty is not paid within the specified time, the platform will generate a certain proportion of late payment fees based on your loan amount.<br><br><br>Article 10 Law Application and Dispute Resolution<br><br><br>1. This Agreement shall be governed by and construed in accordance with the laws of the United States, without regard to conflict of law rules.<br><br>2. All disputes arising from the conclusion, interpretation and performance of this agreement shall be resolved through friendly negotiation between the two parties after the dispute occurs. If negotiation fails, both parties agree to submit the dispute to the American International Arbitration Center for arbitration in accordance with the then-effective arbitration rules of the American International Arbitration Center. The arbitration result is final and binding on both parties to the dispute.<br><br><br>Article 11 Others<br><br><br>1. This Agreement constitutes the entire agreement between the parties and replaces all previous discussions, negotiations, agreements and oral agreements on matters involved in this Agreement or other arrangements.<br><br><br>2. The failure of both parties to exercise or timely exercise any right or priority under this Agreement shall not be deemed to be a waiver, and the single or partial exercise of any right or priority shall not prevent any subsequent exercise of any right or priority.<br><br>3. The terms of this agreement are severable. If any term is deemed invalid or unenforceable according to applicable laws, this will not affect the validity of other terms. When such a situation arises, the parties shall reach alternative terms through friendly negotiations.</p>
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
            $('#y-dkslsr').attr('placeholder', gy('请输入数量'));

            var userid = Cookies.get('userid');
            var username = Cookies.get('username');

            $.ajax({
                url: apiurl + '/Wallet/getloaned',
                type: 'POST',
                data: {
                    'userid': userid,
                    'username': username,
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code == 1) {
                        $('#y-dksl').text(Number(res.data.edu).toFixed(2));
                        $('#y-ljdk').text(Number(res.data.total_jine).toFixed(2));
                        $('#y-whsl').text(Number(res.data.total_weihuan).toFixed(2));
                    } else {
                        alert(gy(res.data));
                    }
                }
            });

            $('.y-upload-box').each(function() {
                const uploadBox = $(this);
                const fileInput = uploadBox.find('input[type="file"]')[0];
                const previewImg = uploadBox.find('.y-preview');
                const cameraIcon = uploadBox.find('.y-camera-icon');

                uploadBox.on("click", function(e) {
                    e.stopPropagation();
                    fileInput.click();
                });

                fileInput.addEventListener("change", function() {
                    if (!fileInput.files || fileInput.files.length === 0) return;

                    const formData = new FormData();
                    formData.append('file', fileInput.files[0]);

                    $.ajax({
                        url: apiurl + '/Wallet/upload_image',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.code == 1) {
                                const imageUrl = apiurl.slice(0, -4) + response.data;
                                previewImg.attr('src', imageUrl).show();
                                previewImg.attr('data-ysrc', response.data);
                                cameraIcon.hide();
                            } else {
                                alert(gy('失败'));
                            }
                        }
                    });
                });
            });
        });

        $('.y-xy-ze').click(function() {
            $('.y-xy-ze').hide();
            $('.y-xy').hide();
        });

        $('.y-htchakan').click(function() {
            let ylang = Cookies.get('ylang');
            if (ylang) {
                $('.y-xy-ze').show();
                $('.y-xy-en').show();
            }
        });

        $('#y-dkslsr').on('input', function() {
            jisuan();
        });

        $('#y-tianshu').on('change', function() {
            var tian = $('#y-tianshu').val();
            var lvli;
            if (tian == 1) {
                lvli = '2.00';
            } else if (tian == 3) {
                lvli = '2.00';
            } else if (tian == 7) {
                lvli = '3.00';
            } else if (tian == 15) {
                lvli = '4.00';
            } else if (tian == 30) {
                lvli = '5.00';
            }
            $('#y-lilv').text(lvli);
            jisuan();
        });

        function jisuan() {
            var tianshu = $('#y-tianshu').val();
            var shuliang = $('#y-dkslsr').val();
            var lilv = $('#y-lilv').text() * 0.01;

            var lixi = tianshu * shuliang * lilv;
            $('#y-lixi').text(lixi);
        }

        function dksubmit() {
            var userid = Cookies.get('userid');
            var username = Cookies.get('username');

            let shuliang = $('#y-dkslsr').val();
            let tianshu = $('#y-tianshu').val();
            let lixi = $('#y-lixi').text();
            let zfxx = $('#y-zfxx').data('ysrc');
            let srzm = $('#y-srzm').data('ysrc');
            let yhxx = $('#y-yhxx').data('ysrc');
            let sfz = $('#y-sfz').data('ysrc');
            let isChecked = $('#y-checkgx').is(':checked');

            if (!isChecked) {
                alert(gy('请勾选同意选项'));
                return;
            }

            if (!userid || !username) {
                alert(gy('失败'));
                return;
            }

            if (!shuliang || !tianshu || !lixi) {
                alert(gy('填写不完整'));
                return;
            }

            if (!zfxx || !srzm || !yhxx || !sfz) {
                alert(gy('资料不全'));
                return;
            }

            if (shuliang + Number($('#y-ljdk').text()) > Number($('#y-dksl').text())) {
                alert(gy('超出额度'));
                return;
            }

            $.ajax({
                url: apiurl + '/Wallet/addloan',
                type: 'POST',
                data: {
                    userid: userid,
                    username: username,
                    shuliang: shuliang,
                    tianshu: tianshu,
                    lixi: lixi,
                    zfxx: zfxx,
                    srzm: srzm,
                    yhxx: yhxx,
                    sfz: sfz
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code === 1) {
                        alert(gy(res.data));
                        location.href = "{{ route('loan-record') }}";
                    } else {
                        alert(gy(res.data));
                    }
                }
            });
        }
    </script>
    <div id="WEB3_CONNECT_MODAL_ID"></div>
</body>
</html>
