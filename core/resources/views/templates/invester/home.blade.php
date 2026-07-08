@extends($activeTemplate.'layouts.app')
@section('panel')
@php
    $authContent = getContent('authentication.content',true);
@endphp



  <form action="{{ route('user.login') }}" method="POST" class="verify-gcaptcha account-form">
                    @csrf

<body class="frame" style="height: 100%;
    background-color: #f7f7f7;
    color: #111;">
<div class="login-form" style=" width: 100%;
    height: 100vh;
    display: inline-block;
    background: #FEDC00 url(../login-bg.png) no-repeat left top/100% 100%;
    position: relative;
    padding: 15px;">
    <div class="login-head" >
        <img style="border-radius:180px;" src="{{ getImage(getFilePath('logoIcon').'/logo_2.png') }}">
    </div>
    <div class="login-tab">
        <a href="{{ route('user.login') }}">{{ __('Entrar') }}</a>  
        <a href="{{ route('user.register') }}" class="cur">{{ __('Cadastrar') }}</a>
    </div>
    <div class="space-20"></div>
    <div class="login_main">
        <div class="login_input">
            <img src="/static/home/img/icon01.png">
            <div class="login_input_con">
                <i>+234</i>
                <input type="number" name="username" placeholder="{{ __('Digite o seu número de telefone') }}" >
            </div>
        </div>
              
            <span id="error_phonelenght" style="display: none; color: red;font-size: 13px;"></span>
          
          
          
        <div class="space-20"></div>
        <div class="login_input">
            <img src="/static/home/img/icon02.png">
            <div class="login_input_con">
                <input type="password" name="password" placeholder="{{ __('digite a sua senha') }}">
            </div>
        </div>
  
      
        <div class="space-30"></div>
        <div class="login_btn">
            <button type="submit" id="submitBtn">{{ __('Entrar') }}</button>
        </div>
    </div>
</div>
</body>


</form>




<style>
    * {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    touch-action: pan-y;
}

html {
    text-align: center;
    font-size: 16px;
}

body {
    font: 12px/180% Arial, Helvetica, sans-serif;
    height: auto;
    width: 100%;
    display: inline-block;
    max-width: 640px;
    text-align: left;
}

img {
    -webkit-touch-callout: default;
}

p {
    margin: 0;
}


a {
    text-decoration: none;
    color: #fff;
}

a:hover, a:active {
    text-decoration: none;
}

ul, li {
    list-style-type: none;
}


.list-block input[type=time], .list-block input[type=number], .list-block input[type=text], .list-block input[type=password], .list-block input[type=search], .list-block input[type=email], .list-block input[type=tel], .list-block input[type=url], .list-block input[type=date], .list-block input[type=datetime-local], .list-block select, .list-block textarea {
    font-size: 14px;
    color: #808fff;
}

a {
    text-decoration: none;
    color: #fff;
}

a:hover, a:active {
    text-decoration: none;
}

.clear {
    clear: both;
    height: 0;
    font-size: 0;
    overflow: hidden;
    line-height: 0;
}

.hide {
    display: none !important;
}

.block {
    display: block;
}

.inline {
    display: inline-block
}

.left {
    display: block;
    text-align: left;
}

.center {
    display: block;
    text-align: center;
}

.right {
    display: block;
    text-align: right;
}

.space-5 {
    height: 5px;
}

.space-10 {
    height: 10px;
}

.space-20 {
    height: 20px;
}

.space-30 {
    height: 30px;
}

.space-40 {
    height: 40px;
}

.space-50 {
    height: 50px;
}

.space-60 {
    height: 60px;
}

.space-80 {
    height: 80px;
}

.space-100 {
    height: 100px;
}

.space-120 {
    height: 120px;
}

.area-5 {
    padding: 5px;
}

.area-10 {
    padding: 10px;
}

.area-20 {
    padding: 20px;
}

.harea-10 {
    padding-left: 10px;
    padding-right: 10px;
}

.dropload-down {
    width: 100%;
    color: #ffffff;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.layui-upload-file {
    display: none;
}


.foot {
    width: 100%;
    height: 64px;
    flex-direction: column;
    background-color: #fff;
    position: fixed;
    bottom: 0;
    max-width: 640px;
    box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.02);
    border-radius: 0;
    z-index: 999;
}

.foot ul {
    width: 100%;
    display: inline-flex;
}

.foot li {
    width: 100%;
    text-align: center;
}

.foot li a {
    width: 100%;
    padding: 10px 0;
    display: inline-block;
}

.foot li img {
    width: auto;
    height: 24px;
}

.foot li p {
    height: 14px;
    line-height: 14px;
    color: #CCCCCC;
}

.foot li.on p {
    color: #E1021C;
}

.z-mask {
    position: fixed;
    top: 0;
    z-index: 1000;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .7);
    max-width: 640px;
    text-align: center;
    padding: 15px;
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

.mask-message {
    display: inline-block;
    width: 100%;
    height: auto;
    background: #00927C;
    font-size: 13px;
    border-radius: 12px;
    text-align: left;
    overflow: hidden;
}

.message-txt {
    min-height: 260px;
    max-height: 50vh;
    /*word-break: break-all;*/
    overflow: hidden;
    overflow-y: scroll;
    font-size: 13px;
    color: #ffffff;
    padding: 15px;
}

.message-tit {
    width: 100%;
    height: auto;
    font-size: 24px;
    display: inline-block;
    font-weight: 500;
    color: #ffffff;
    padding: 4px 0;
    text-align: center;
    margin-bottom: 10px;
}

.message-txt p, .message-txt img, .message-txt video {
    width: 100%;
    padding: 2px 0;
    display: inline-block;
}

.message-txt p, .message-txt p span {
    text-wrap: unset !important;
}

.message-btn {
    width: 100%;
    display: inline-flex;
    padding: 10px;
}

.message-btn a {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #FFFFFF;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    font-weight: 500;
    background: #E1021C;
    border-radius: 4px;
}

.message-btn button {
    width: 48%;
    height: auto;
    display: inline-block;
    color: #FFFFFF;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    font-weight: 500;
    background: #E1021C;
    border-radius: 6px;
    border: none;
}

.message-btn button.cancel {
    margin-right: 2%;
    background: #AAAAAA;
}

.message-btn button.confirm {
    margin-left: 2%;
}

.frame {
    height: 100%;
    background-color: #f7f7f7;
    color: #111;
}

.frameBg {
    background: #00927C;
}

.login-form {
    width: 100%;
    height: 100vh;
    display: inline-block;
    background: #FEDC00 no-repeat left top/100% 100%;
    position: relative;
    padding: 15px;
}

.login-head {
    width: 100%;
    height: auto;
    display: inline-block;
    margin: 12px 0 6px;
}

.login-head img {
    width: 200px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.login-head h3 {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
    font-size: 18px;
    margin: 10px 0;
}

.login-form .login-tab {
    font-size: 14px;
    font-weight: 600;
    width: 72%;
    margin: 0 14%;
    height: 42px;
    background: #ffffff;
    display: inline-flex;
    border-radius: 21px;
}

.login-form .login-tab a {
    width: 100%;
    height: 42px;
    display: inline-block;
    line-height: 42px;
    text-align: center;
    color: #E1021C;
    border-radius: 21px;
}

.login-form .login-tab a.cur {
    background: #E1021C;
    color: #ffffff;
}

.login_main {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #ffffff;
    padding: 20px 10px;
    border-radius: 10px;
}

.login-form .login_input {
    width: 100%;
    height: 48px;
    display: inline-block;
    background: #ffffff;
    position: relative;
    border-bottom: 1px solid #999999;
}

.login-form .login_input img {
    width: 24px;
    height: 24px;
    position: absolute;
    left: 6px;
    top: 10px;
}

.login_input_con {
    width: 100%;
    height: auto;
    display: flex;
    padding: 12px 0 12px 32px;
    position: relative;
    align-items: center;
}

.login_input_con i {
    font-style: normal;
    color: #E1021C;
    font-size: 15px;
}

.login_input_con input {
    width: 100%;
    height: auto;
    border: none;
    background: #ffffff;
    outline: none;
    color: #E1021C;
    font-size: 15px;
    padding-left: 2px;
}

.login_input_con input::-webkit-input-placeholder {
    color: #CCCCCC;
    font-size: 15px;
}

.login_input_con .input-send {
    width: auto;
    height: 24px;
    padding: 0 14px;
    font-size: 12px;
    position: absolute;
    top: 12px;
    right: 12px;
    border: none;
    background: #E1021C;
    color: #ffffff;
    font-weight: 600;
    border-radius: 12px;
}

.login_btn {
    width: 100%;
    height: auto;
    display: inline-block;
}

.login_btn button {
    width: 100%;
    height: 48px;
    display: inline-block;
    border: none;
    border-radius: 24px;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    background: #E1021C;
}

.login_sign {
    width: 100%;
    height: auto;
    display: inline-flex;
    text-align: center;
}

.login_sign a {
    width: 100%;
    height: auto;
    font-size: 13px;
    color: #E1021C;
    padding: 0 10px;
}

.login_back {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
}

.login_back a {
    color: #E1021C;
}

.home {
    overflow-y: scroll;
    width: 100%;
    background: #00927C;
    padding: 10px;
    display: block;
    max-width: 640px;
}

.banner {
    width: 100%;
    height: auto;
    display: inline-flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.banner .swiper-wrapper {
    width: 100%;
    height: auto;
    border-radius: 6px;
}

.banner .swiper-slide {
    width: 100%;
    height: auto;
    border-radius: 6px;
}

.banner .swiper-slide img {
    width: 100%;
    height: auto;
    border-radius: 6px;
}

.swiper-pagination-bullet {
    display: inline-block;
    width: 6px;
    height: 6px;
    opacity: 1;
    border-radius: 10px;
    background: white;
    margin: 0 3px;
    cursor: pointer;
    transition: width 0.3s ease-in-out;

}

.swiper-pagination-bullet-active {
    background: #ffffff;
    width: 12px;
}


.home-video {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 8px;
    position: relative
}

.home-video video {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 8px
}

.home-video .mediaBg {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    position: absolute;
    top: 0;
    left: 0;
    background: #000;
    opacity: .75;
    cursor: pointer
}

.home-video .mediaBg img {
    width: 42px;
    height: 42px;
    margin: 0 auto
}

.home-notice {
    width: 100%;
    height: auto;
    display: inline-block;
}

.notice-con {
    width: 100%;
    height: 48px;
    display: inline-block;
    position: relative;
    background: #FFFFFF;
    border-radius: 6px;
    overflow: hidden;
    padding-left: 32px;
    font-size: 14px;
}

.notice-con img {
    width: 18px;
    height: 18px;
    position: absolute;
    left: 10px;
    top: 15px;
}

.notice-con .swiper-wrapper {
    width: 100%;
    height: 48px;
    display: inline-block;
    color: #333333;
    font-weight: 500;

}

.notice-con .swiper-slide {
    width: 100%;
    height: auto;
    line-height: 48px;
    display: block;
    word-break: keep-all;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


.home-nav {
    width: 100%;
    height: auto;
    display: inline-block;
}

.home-nav ul {
    width: 100%;
    height: auto;
    display: inline-block;
}

.home-nav li {
    width: 25%;
    height: auto;
    display: inline-block;
    padding: 10px 5px 0;
    float: left;
}

.home-nav li a {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #111;
    text-align: center;
}

.home-nav li img {
    width: 48px;
    height: 48px;
    display: block;
    margin: 0 auto;
}

.home-nav li span {
    width: 100%;
    height: auto;
    margin-top: 10px;
    display: block;
    word-break: keep-all;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.home-nav-main {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #FFFFFF;
    border-radius: 6px;
    padding: 10px;
}

.home-nav a {
    border-radius: 6px;
}

.home-nav img {
    width: 100%;
    height: 100%;
    display: inline-block;
}

.home-task {
    width: 100%;
    height: auto;
    display: inline-block;
}

.task-tab {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: left;
    font-size: 14px;
    font-weight: 600;
    padding: 5px;
    margin-bottom: 10px;
    color: #8f293f;
    border-bottom: 2px solid #8f293f;
}

.task-con {
    width: 100%;
    height: auto;
    display: none;
}

.task-con.active {
    display: inline-block;
}

.task-level {
    width: 100%;
    background: #ffffff;
    padding: 5px;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    box-shadow: 0 1px #8f293f;
}

.task-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 5px 0;
    text-align: left;
    position: relative;
}

.task-tit span {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #00927C;
    border-radius: 6px;
    padding: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #8f293f;
}

.task-level ul {
    width: 100%;
    height: auto;
    display: inline-flex;
}

.task-level li {
    padding: 2px;
    width: 100%;
    display: inline-block;
    flex-direction: column;
    float: left;
    text-align: center;
}

.task-level li:first-child {
    padding-left: 0;
    text-align: left;
}

.task-level li:last-child {
    padding-right: 0;
    text-align: right;
}

.task-product {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 5px 0;
    text-align: left;
    position: relative;
}

.task-product span {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #00927C;
    border-radius: 6px;
    padding: 10px;
    font-size: 14px;
    color: #111111;
}

.task-product font {
    font-weight: 600;
    color: #8f293f;
}

.task-item {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #00927C;
    border-radius: 6px;
    padding: 10px;
}

.task-item label {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #111111;
    font-size: 14px;
    margin-top: 5px;
}

.task-item span {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #8f293f;
    font-size: 14px;
    font-weight: 700;
}

.task-foot {
    width: 100%;
    height: auto;
    display: inline-block;
}

.task-rate {
    margin: 10px 0;
    position: relative;
    height: 6px;
    background: #CCCCCC;
    border-radius: 4px;
}

.task-rate span {
    background: #8f293f;
    height: 6px;
    border-radius: 6px;
    display: flex;
}

.task-foot button {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 12px;
    font-weight: 600;
    background: #8f293f;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}

.task-foot button.disabled {
    background: #CCCCCC;
}

.home-product, .product {
    width: 100%;
    height: auto;
    display: inline-block;
}

.product-tab {
    width: 100%;
    height: 42px;
    display: inline-flex;
    font-size: 14px;
    font-weight: 600;
    background: #ffffff;
    border-radius: 21px;
}

.product-tab a {
    width: 100%;
    height: 42px;
    display: inline-block;
    line-height: 42px;
    text-align: center;
    color: #E1021C;
    border-radius: 21px;
}

.product-tab a.cur {
    background: #E1021C;
    color: #ffffff;
}

.product-tab-con {
    width: 100%;
    height: auto;
    display: inline-block;
}

.product {
    overflow-y: scroll;
    width: 100%;
    background: #00927C;
    padding: 10px;
    display: block;
    max-width: 640px;
}

.product-con h3, .product h3 {
    padding: 10px 5px;
    font-size: 14px;
    color: #333333;
}

.product-con li, .product li {
    width: 50%;
    height: auto;
    display: inline-block;
    padding: 5px;
    margin-bottom: 5px;
    float: left;
}

.product-con li a, .product li a {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 6px;
    background: #ffffff;
    padding: 5px;
}


.product-con li img, .product li img {
    width: 100%;
    height: auto;
    display: block;
    box-shadow: 0 1px #c4c0bc;
}

.product-con li h6, .product li h6 {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 13px;
    color: #111;
}

.product-con li span, .product li span {
    width: 100%;
    height: auto;
    display: block;
    font-size: 12px;
    color: #666;
    text-align: left;
}

.product-con li font, .product li font {
    color: #E1021C;
    padding-left: 5px;
}

.product-con button, .product button {
    width: 100%;
    display: inline-block;
    border: none;
    border-radius: 5px;
    background: #E1021C;
    color: #fff;
    font-size: 14px;
    height: 32px;
}

.product-con button i {
    font-style: normal;
    font-size: 12px;
}

.product-con button.disabled, .product button.disabled {
    background: #CCCCCC;
}

.product-detail {
    width: 100%;
    display: inline-block;
    position: relative;
    height: 100%;
    padding: 10px;
}

.product-img {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 5px;
    overflow: hidden;
}

.product-img img {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 5px;
}

.product-detail h3 {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    color: #333333;
    font-weight: 600;
}

.product-detail h3 span {
    float: right;
    font-size: 14px;
    color: #ffffff;
}

.product-option {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #ffffff;
    border-radius: 5px;
    padding: 10px 0;
}

.product-item {
    width: 33.33333%;
    height: auto;
    display: inline-block;
    text-align: center;
    float: left;
    padding: 10px 5px;
}

.product-item span {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #E1021C;
    font-size: 16px;
}

.product-item label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    color: #666666;
}

.product-text {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
    background: #ffffff;
    border-radius: 5px;
}

.product-text p, .product-text img, .product-text video {
    width: 100%;
    height: auto;
    display: inline-block;
}

.product-text p {
    font-size: 12px;
    color: #666666;
    text-wrap: inherit !important;
}

.product-text p span {
    text-wrap: inherit !important;
}

.product-foot {
    width: 100%;
    height: 60px;
    background-color: #fff;
    position: fixed;
    bottom: 0;
    max-width: 640px;
    box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.02);
    border-radius: 0;
    z-index: 999;
    padding: 9px 10px;
}

.product-foot button {
    width: 100%;
    height: 42px;
    display: inline-block;
    font-size: 16px;
    color: #ffffff;
    background: #E1021C;
    border: none;
    border-radius: 21px;
}

.product-foot button.disabled {
    background: #CCCCCC;
}

.cate {
    width: 100%;
    height: auto;
    display: inline-block;
    min-height: 100vh;
    padding: 16px 6px 0;
}

.cate-list {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 6px;
    overflow-y: scroll;
    float: right;
    min-height: 100vh;

}

.cate-list ul {
    width: 100%;
    height: auto;
}

.cate-list li {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 5px;
    margin-bottom: 5px;
    float: left;
}

.cate-list li a {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 6px;
    background: #ffffff;
    padding: 5px;
}


.cate-list li img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 5px;
    box-shadow: 0 1px #c4c0bc;
}

.cate-list li h6 {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 13px;
    color: #111;
    padding: 10px 2px 0;
}

.cate-list li dl {
    width: 100%;
    height: auto;
    display: flex;
    font-size: 12px;
    color: #666;
    text-align: center;
    margin-top: 6px;
}

.cate-list li dd {
    width: 100%;
    height: auto;
    display: inline-block;
}

.cate-list li span {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #E1021C;
}

.cate-list li label {
    width: 100%;
    height: auto;
    display: inline-block;
}

.cate-list button {
    width: 100%;
    display: inline-block;
    border: none;
    border-radius: 5px;
    background: #E1021C;
    color: #fff;
    font-size: 14px;
    height: 32px;
    margin-top: 6px;
}

.cate-list button.disabled {
    background: #CCCCCC;
}


.news-main {
    overflow-y: scroll;
    width: 100%;
    display: block;
    max-width: 640px;
    min-height: 100%;
    padding: 6px 0 64px;
}

.news {
    width: 100%;
    height: auto;
    padding: 6px 12px;
    display: inline-block;
}

.news ul {
    width: 100%;
    height: auto;
    display: inline-block;
}

.news li {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
    border-radius: 6px;
    background: #ffffff;
    margin-bottom: 10px;
}

.news li a {
    width: 100%;
    height: auto;
    display: inline-block;
}

.news .news-tit {
    width: 100%;
    height: auto;
    font-size: 14px;
    line-height: 18px;
    margin-bottom: 2px;
    color: #333333;
    font-weight: 600;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
}

.news .news-time {
    padding: 5px 0;
    color: #cccccc;
}

.news .news-con {
    width: 100%;
    height: auto;
    padding: 5px 0 0;
    display: inline-block;
}

.news .news-img {
    width: 120px;
    height: 68px;
    display: inline-block;
    border-radius: 3px;
    overflow: hidden;
}

.news .news-img img {
    width: 100%;
    height: auto;
    display: inline-block;
    float: left;
}

.news .news-desc {
    width: calc(100% - 120px);
    font-size: 12px;
    color: #666666;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    float: right;
    padding-left: 6px;
    line-height: 24px;
}


.my-head {
    overflow-y: scroll;
    width: 100%;
    padding: 15px;
    display: block;
    max-width: 640px;
    height: auto;
    min-height: 100%;
}

.my-head-con {
    width: 100%;
    height: auto;
    display: inline-flex;
    padding: 10px;
    overflow: hidden;
}

.my-head-item {
    width: 100%;
    height: auto;
    display: inline-block;
}

.my-head-item:first-child {
    width: 72px;
}

.my-head-item:last-child {
    padding: 0 6px;
}

.my-head-item img {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: #ffffff;
    padding: 2px;
}

.my-head-item h3 {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    font-weight: 600;
    color: #333333;
}

.my-head-item span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    font-weight: 400;
    color: #ffffff;
    margin-top: 4px;
}

.my-head-item .copy {
    font-size: 12px;
    color: #ffffff;
    cursor: pointer;
}

.my-head-item .copy small {
    float: left;
}

.my-head-item .copy small:first-child {
    width: 60%;
    height: auto;
    display: inline-block;
    font-size: 13px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.my-head-item .copy small:last-child {
    background: #E1021C;
    font-size: 12px;
    font-style: unset;
    padding: 0 4px;
    border-radius: 3px;

}

.my-asset {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #ffffff;
    padding: 10px;
    border-radius: 5px;
}

.my-asset li {
    width: 33.33333%;
    height: auto;
    display: inline-block;
    text-align: center;
    float: left;
    padding: 5px;
}

.my-asset li:nth-child(1), .my-asset li:nth-child(4) {
    text-align: left;
}

.my-asset li:nth-child(3), .my-asset li:nth-child(6) {
    text-align: right;
}

.my-asset li label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 12px;
    font-weight: 400;
    color: #666666;
}

.my-asset li span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    color: #E1021C;
    padding: 5px 0;
}

.my-asset li font {
    font-size: 13px;
    padding-left: 2px;
}


.my-obtain {
    width: 100%;
    height: auto;
    display: inline-block;
}

.my-obtain button {
    width: 100%;
    float: left;
    text-align: center;
    background: #E1021C;
    padding: 12px;
    border-radius: 5px;
    font-weight: 600;
    border: none;
    color: #ffffff;
}

.my-balance {
    width: 100%;
    height: auto;
    display: inline-block;
}

.my-balance li {
    width: 49%;
    float: left;
    text-align: center;
    background: #ffffff;
    padding: 6px;
    border-radius: 5px;
}

.my-balance li:first-child {
    margin-right: 1%;
}

.my-balance li:last-child {
    margin-left: 1%;
}


.my-balance li label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 12px;
    font-weight: 400;
    color: #666666;
}

.my-balance li span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    color: #E1021C;
}

.my-button {
    width: 100%;
    height: auto;
    display: inline-block;
}

.my-button a {
    width: 49%;
    float: left;
    text-align: center;
    background: #E1021C;
    padding: 12px;
    border-radius: 5px;
    font-weight: 600;
}

.my-button a:first-child {
    margin-right: 1%;
}

.my-button a:last-child {
    margin-left: 1%;
}

.my-nav {
    width: 100%;
    height: auto;
    display: inline-block;
}

.my-nav ul {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #FFFFFF;
    border-radius: 6px;
    padding: 10px;
}

.my-nav li {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 12px 0;
    border-bottom: 1px solid #FAFAFA;
    position: relative;
}

.my-nav li a {
    width: 100%;
    display: inline-block;
    font-size: 14px;
    color: #333333;
    height: 24px;
    line-height: 24px;
    position: relative;
}

.my-nav li img {
    width: 24px;
    height: 24px;
    position: absolute;
}

.my-nav li span {
    padding-left: 36px;
}

.my-nav li a i {
    width: auto;
    height: 16px;
    line-height: 16px;
    display: inline-block;
    position: absolute;
    top: 6px;
    font-size: 12px;
    font-style: normal;
    background: #E1021C;
    color: #ffffff;
    border-radius: 3px;
    text-align: center;
    margin-left: 10px;
    padding: 1px 5px;
}

.logout {
    width: 100%;
    height: 48px;
    display: inline-block;
    color: #ffffff;
    background: #E1021C;
    line-height: 48px;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
}

.head {
    position: fixed;
    width: 100%;
    height: 50px;
    z-index: 9;
    max-width: 640px;
    background: #E1021C;
}

.head-back {
    position: absolute;
    top: 0;
    left: 0;
    padding: 13px 20px 13px 10px;
    display: inline-flex;
}

.head-back img {
    height: 20px;
    width: auto;
    padding: 2px;
}


.head-title {
    width: 100%;
    height: 50px;
    line-height: 50px;
    text-align: center;
    color: #ffffff;
    font-size: 17px;
    font-weight: 600;
}

.head-link {
    position: absolute;
    top: 0;
    right: 0;
    padding: 13px 20px 13px 10px;
    display: inline-block;
    color: #ffffff;
    text-decoration: underline;
}

.news-content {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 12px;
}

.news-title {
    width: 100%;
    height: auto;
    display: inline-block;
    font-weight: 600;
    font-size: 16px;
    color: #ffffff;
    text-align: center;
    padding: 6px 0 12px;
}

.news-txt {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #ffffff;
}

.news-txt img, .news-txt video {
    width: 100%;
    height: auto;
    display: inline-block;
}

.news-txt p {
    width: 100%;
    height: auto;
    display: inline-block;
    text-wrap: unset !important;
}

.news-txt p span {
    text-wrap: unset !important;
}

.sign-main {
    width: 100%;
    height: auto;
    display: inline-block;
    background: url(../img/sign-bg.png) #00927C no-repeat;
    background-size: 100% auto;
    text-align: center;
    padding: 160px 15px 0;
    min-height: 100vh;
}

.sign-bonus {
    width: auto;
    height: auto;
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 18px;
    padding: 8px 48px;
}

.sign-bonus span {
    color: #ffffff;
    font-size: 12px;
}

.sign-record {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #00927C;
    border-radius: 12px;
    padding: 20px 15px;
}

.sign-num {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
    font-size: 24px;
    color: #F67755;
    font-weight: 600;
}

.sign-btn {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 20px;
    text-align: center;
}

.sign-btn button {
    background: #F67755;
    height: 36px;
    border-radius: 18px;
    border: none;
    padding: 0 36px;
    font-size: 16px;
    color: #FFFFFF;
}

.sign-text {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
}

.sign-text p, .sign-text img, .sign-text video {
    width: 100%;
    height: auto;
    display: inline-block;
}

.sign-text p {
    color: #999999;
    font-size: 12px;
}

.record-item {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
    border-bottom: 1px solid #F8F9FD;
}

.record-item-top {
    width: 100%;
    height: auto;
    display: inline-block;
}

.record-item-tit {
    float: left;
    font-size: 16px;
    color: #333333;
}

.record-item-num {
    float: right;
    font-size: 16px;
    color: #333333;
    font-weight: 600;
}

.record-item-time {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: left;
    color: rgba(51, 51, 51, 0.6);
    font-size: 12px;
}

.wallet-head {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #FFF4E9;
    padding: 20px 15px;
    position: relative;
    margin-bottom: 32px;
    background: linear-gradient(179deg, #FFE4D9 0%, #F5F5F5 100%);
}

.wallet-head h3 {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    font-weight: 400;
    color: #DE9243;
    padding: 0 10px;
}

.wallet-head h3 font {
    font-size: 12px;
    font-weight: 400;
    float: right;
}

.wallet-head .wallet-amount {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 20px;
    font-weight: 600;
    color: #333333;
    padding: 5px 10px;
    margin-top: 10px;
}

.wallet-head .wallet-exchange {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 13px;
    color: #AF661D;
    padding: 5px 10px;
}

.wallet-option {
    width: 100%;
    height: auto;
    display: inline-flex;
}

.wallet-option a {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
    font-size: 14px;
}

.wallet-option a:first-child {
    padding-right: 10px;
}

.wallet-option a:last-child {
    padding-left: 10px;
}

.wallet-option span {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 8px;
    border-radius: 6px;
}

.wallet-option a:first-child span {
    border: 1px solid #F67755;
    color: #F67755;
    background: #ffffff;
}

.wallet-option a:last-child span {
    border: 1px solid #F67755;
    background: #F67755;
    color: #ffffff;
}

.wallet-record {
    width: 100%;
    height: auto;
    display: inline-block;
    background: #ffffff;
    border-radius: 6px;
    padding: 10px;
}

.wallet-record-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
}

.wallet-record-tit h6 {
    color: #333333;
    float: left;
    display: inline-block;
}

.wallet-record-tit a {
    display: inline-block;
    color: #666666;
    float: right;
}

.wallet-record-item {
    padding: 10px;
    border-bottom: 1px solid #F5F5F5;
}

.record-list {
    width: 100%;
    height: auto;
    min-height: 100%;
    display: inline-block;
    padding: 10px 20px 20px;
}

.record-list ul {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-bottom: 20px;
}

.record-list li {
    width: 100%;
    height: auto;
    display: inline-block;
    border-bottom: 1px solid #F5F5F5;
    padding: 10px 5px;
}

.record-list .record-dt {
    width: 100%;
    height: auto;
    display: inline-block;
}

.record-list .record-dt span:first-child {
    float: left;
    font-size: 16px;
    color: #111111;
}

.record-list .record-dt span:last-child {
    float: right;
    font-size: 16px;
    color: #E1021C;
    font-weight: 600;
}

.record-list .record-dd {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 12px;
    color: #ffffff;
    text-align: left;
}

.record-list .record-dd span:first-child {
    float: left;
    font-size: 12px;
    color: #ffffff;
}

.record-list .record-dd span:last-child {
    float: right;
    font-size: 12px;
    color: #ffffff;
}

.card {
    width: 100%;
    height: auto;
    display: inline-block;
    min-height: 100vh;
    padding: 15px;
}

.card-head {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
}

.card-tab {
    width: 100%;
    height: auto;
    display: inline-flex;
}

.card-tab a {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #653E00;
    font-size: 16px;
}

.card-tab a.cur {
    font-weight: 600;
}

.card-tab a span {
    display: inline-block;
    padding: 5px 0;
}

.card-tab a.cur span {
    border-bottom: 2px solid #653E00;
}

.card-form {
    width: 100%;
    height: auto;
    display: inline-block;
}

.card-form-item {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 12px 3px 6px;
    border-bottom: 1px solid #ffffff;
}

.card-form-item label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 12px;
    color: #333333;
    font-weight: 600;
}


.card-form-item .card-form-input {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px 0 0;
    position: relative;
}

.card-form-item .card-form-input img {
    width: 24px;
    height: 24px;
    display: inline-block;
    position: absolute;
    top: 8px;
    left: 0;
}

.card-form-item .card-form-input input {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    color: #ffffff;
    border: none;
    outline: none;
    background: none;
}

.card-form-item .card-form-input input::-webkit-input-placeholder {
    color: #E6E6E6;
    font-size: 14px;
}

.card-form-send button {
    position: absolute;
    top: 14px;
    right: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #ffffff;
    background: none;
    border-top: none;
    border-bottom: none;
    border-right: none;
    border-left: 2px solid #ffffff;
    padding-left: 20px;
    padding-right: 5px;
}

.card-form-btn {
    width: 100%;
    height: auto;
    display: inline-block;
}

.card-form-btn button {
    width: 100%;
    height: 42px;
    display: inline-block;
    background: #E1021C;
    border-radius: 6px;
    font-size: 16px;
    color: #FFFFFF;
    font-weight: 600;
    border: none;
}

.treasure {
    width: 100%;
    height: auto;
    display: block;
    overflow: hidden;
    text-align: center;
    padding: 20px;
}

.treasure-main {
    width: 100%;
    height: auto;
    display: inline-block;
}

.treasure-img {
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

.treasure-img img {
    width: 160px;
    height: auto;
    display: inline-block;

}

.treasure-input {
    width: 100%;
    height: 44px;
    display: inline-block;
    background: #ffffff;
    position: relative;
    border-radius: 22px;
}

.treasure-input img {
    width: 24px;
    height: 24px;
    display: inline-block;
    position: absolute;
    top: 10px;
    left: 15px;
}

.treasure-input input {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    color: #666666;
    padding: 14px 0;
    outline: none;
    background: none;
    padding-left: 44px;
    border: none;
}

.treasure-input input::-webkit-input-placeholder {
    color: #CCCCCC;
}

.treasure-btn {
    width: 100%;
    height: auto;
    display: inline-block;
}

.treasure-btn button {
    width: 100%;
    height: 44px;
    display: inline-block;
    border-radius: 22px;
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
    background: #E1021C;
    border: none;
}

.recharge {
    width: 100%;
    height: auto;
    display: inline-block;
    min-height: 100vh;
    padding-bottom: 20px;
}

.recharge-head {
    width: 100%;
    height: 180px;
    display: inline-block;
    padding: 10px;
}

.recharge-main {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #653E00;
    border-radius: 6px;
    padding: 10px 5px;
}

.recharge-main.copy {
    cursor: pointer;
}

.recharge-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #333333;
    font-size: 14px;
    font-weight: 600;
    position: relative;
}

.recharge-tit font {
    float: right;
    font-size: 14px;
    color: #8f293f;
}

.recharge-tit button {
    float: right;
    font-size: 12px;
    color: #ffffff;
    background: #8f293f;
    border: none;
    border-radius: 2px;
    padding: 5px 10px;
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
}

.recharge-amount {
    width: 100%;
    height: auto;
    display: inline-block;
    position: relative;
    border-bottom: 1px solid #ffffff;
    padding: 12px 0 6px;
    margin-top: 5px;
}

.recharge-amount i {
    width: 9px;
    height: 21px;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    position: absolute;
    top: 12px;
    left: 5px;
    font-style: normal;
}

.recharge-amount input {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    outline: none;
    background: none;
    padding-left: 20px;
    border: none;

}

.recharge-amount input::-webkit-input-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: #E6E6E6;
    line-height: 24px;
}

.recharge-amount textarea {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    font-weight: 600;
    color: #333333;
    outline: none;
    background: none;
    padding: 0 5px;
    border: none;

}

.recharge-amount textarea::-webkit-input-placeholder {
    font-size: 14px;
    font-weight: 400;
    color: #666666;
    line-height: 24px;
}

.recharge-balance {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    color: #333333;
    font-weight: 600;
    border-radius: 6px;
    background: #ffffff;
    text-align: center;
    padding: 16px 12px;
}

.recharge-balance span {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-bottom: 12px;
    color: #E1021C;
}

.recharge-balance label {
    width: 100%;
    height: auto;
    display: inline-block;
}

.recharge-balance font {
    font-size: 18px;
    color: #333333;
    font-weight: 600;
    padding-left: 5px;
}

.recharge-method {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 6px;
    padding: 10px 5px;
}

.recharge-method label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    color: #333333;
    padding: 10px 0 0;
    font-weight: 600;
}

.recharge-method dl {
    width: 100%;
    height: auto;
    display: inline-block;
}

.recharge-method dd {
    width: 100%;
    height: auto;
    display: inline-block;
    border-bottom: 1px solid #F5F5F5;
    padding: 20px 0 10px;
    position: relative;
    cursor: pointer;
}

.recharge-method dd img {
    width: 24px;
    height: 24px;
    position: absolute;
    top: 18px;
    left: 5px;
}

.recharge-method dd span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    color: #333333;
    padding-left: 36px;
    font-weight: 600;
}

.recharge-method dd.cur span {
    color: #ffffff;
}

.recharge-method dd i {
    width: 24px;
    height: 24px;
    background: url(../img/icon08.png) no-repeat;
    background-size: 100% 100%;
    display: inline-block;
    position: absolute;
    top: 18px;
    right: 5px;
    border-radius: 50%;
}

.recharge-method dd.cur i {
    background: url(../img/icon09.png) no-repeat;
    background-size: 100% 100%;
}

.recharge-btn {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 500;
    color: #ffffff;
    padding: 10px;
    text-align: center;
    margin-top: 10px;
    background: #E1021C;
    border: none;
}

.recharge-text {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 6px;
}

.recharge-text p, .recharge-text img, .recharge-text video {
    width: 100%;
    height: auto;
    display: inline-block;
}

.recharge-text p {
    color: #ffffff;
    font-size: 12px;
}


.withdraw {
    width: 100%;
    height: auto;
    display: inline-block;
    min-height: 100vh;
}

.withdraw-head {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
}

.withdraw-main {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #653E00;
    border-radius: 6px;
}

.withdraw-bank {
    width: 100%;
    height: auto;
    display: inline-block;
}

.withdraw-bank-item {
    width: 100%;
    height: auto;
    display: inline-block;
    border-bottom: 1px solid #F5F5F5;
    padding: 12px 5px 6px;
}

.withdraw-bank-item label {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #333333;
    font-size: 14px;
    font-weight: 600;
}

.withdraw-bank-item span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    margin-top: 8px;
    color: #ffffff;
}

.withdraw-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #333333;
    font-size: 14px;
    font-weight: 600;
    position: relative;
    padding: 0 5px;
}

.withdraw-tit font {
    float: right;
    font-size: 14px;
    color: #E1021C;
}

.withdraw-amount {
    width: 100%;
    height: auto;
    display: inline-block;
    position: relative;
    border-bottom: 1px solid #ffffff;
    padding: 12px 0 6px;
}

.withdraw-amount i {
    width: 9px;
    height: 21px;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    position: absolute;
    top: 12px;
    left: 5px;
    font-style: normal;
}

.withdraw-amount input {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    outline: none;
    background: none;
    padding-left: 20px;
    border: none;

}

.withdraw-amount input::-webkit-input-placeholder {
    font-size: 16px;
    font-weight: 400;
    color: #E6E6E6;
    line-height: 24px;
}

.withdraw-balance {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    color: #333333;
    margin-top: 15px;
}

.withdraw-balance font {
    font-size: 18px;
    color: #333333;
    font-weight: 600;
    padding-left: 5px;
}

.withdraw-text {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
    color: #ffffff;
    font-size: 12px;
}

.withdraw-text p, .withdraw-text img, .withdraw-text video {
    width: 100%;
    height: auto;
    display: inline-block;
}

.withdraw-text p, .withdraw-text p span {
    text-wrap: unset !important;
}

.withdraw-button {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 500;
    color: #ffffff;
    padding: 10px;
    text-align: center;
    margin-top: 10px;
    background: #E1021C;
    border: none;
}

.invite {
    width: 100%;
    display: inline-table;
    overflow: hidden;
    padding: 10px 15px;
}

.invite-qrcode {
    width: 100%;
    height: auto;
    display: inline-flex;
    margin-top: 20px;
}

.invite-qrcode img {
    width: 160px;
    height: 160px;
    margin: 0 auto;
}

.invite-code {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
    padding: 16px 0;
}

.invite-code span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 13px;
}

.invite-code h3 {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    color: #ffffff;
    margin-top: 6px;
}

.invite-link {
    width: 100%;
    height: auto;
    display: inline-block;
}

.invite-link-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 0 3px 6px;
}

.invite-link-con {
    width: 100%;
    height: auto;
    display: inline-block;
    border: 1px solid #E1021C;
    padding: 12px 6px;
    border-radius: 2px;
    color: #ffffff;
    font-weight: 600;
}

.invite-link button {
    width: 100%;
    height: 48px;
    display: inline-block;
    margin: 12px 0;
    border-radius: 4px;
    background: #E1021C;
    border: none;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
}

.invite-text {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
}

.invite-text img, .invite-text video {
    width: 100%;
    height: auto;
    display: inline-block;
}

.invite-text p {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #ffffff;
    font-size: 12px;
    text-wrap: unset !important;
}

.invite-text p span {
    text-wrap: unset !important;
}

.team {
    width: 100%;
    display: inline-table;
    overflow: hidden;
    padding: 10px 15px;
}

.team-head {
    width: 100%;
    height: auto;
    display: inline-flex;
    text-align: center;
}

.team-head a {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 15px;
    font-weight: 600;
    color: #333333;
    padding: 5px;
}

.team-head a.cur {
    color: #E1021C;
    border-bottom: 2px solid #E1021C;
}

.team-total {
    width: 100%;
    height: auto;
    display: inline-block;
}

.team-total h3 {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
    color: #ffffff;
    font-size: 13px;
    margin: 20px 0;
}

.team-tab {
    width: 100%;
    height: auto;
    display: inline-flex;
    background: #FFFFFF;
    border-radius: 5px;
    overflow: hidden;
}

.team-tab-item {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #E1021C;
    font-size: 14px;
    text-align: center;
    padding: 5px 0;
}

.team-tab-item.active {
    background: #E1021C;
    color: #FFFFFF;
    font-weight: 600;
}

.team-option {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 20px;
}

.team-option-item {
    width: 100%;
    height: auto;
    display: inline-flex;
    color: #ffffff;
    font-size: 13px;
    padding: 6px 4px;
}

.team-option-item:first-child {
    color: #E1021C;
}

.team-option-item span {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

.team-option-item span:first-child {
    justify-content: flex-start;
}

.team-option-item span:last-child {
    justify-content: flex-end;
}

.team-option-item span img {
    width: 24px;
    height: auto;
    display: inline-block;
}

.order {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px 15px;
}

.order-asset {
    width: 100%;
    height: auto;
    display: flex;
    text-align: center;
    background: #ffffff;
    border-radius: 5px;
    padding: 16px 12px;
}

.order-asset-item {
    width: 100%;
    height: auto;
    display: inline-block;
}

.order-asset-item span {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #E1021C;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 14px;
}

.order-asset-item label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 15px;
}

.order-list {
    width: 100%;
    height: auto;
    display: inline-block;
}

.order-item {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 12px;
    padding: 10px;
    background: #ffffff;
    border-radius: 5px;
}

.order-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 16px;
    color: #333333;
    padding: 0 2px;
    margin-bottom: 6px;
}

.order-tit span {
    float: right;
    color: #E1021C;
    font-weight: 600;
    font-size: 12px;
}

.order-t {
    width: 100%;
    height: auto;
    display: block;
}

.order-l {
    width: 120px;
    height: 90px;
    display: inline-block;
    overflow: hidden;
    float: left;
}

.order-l img {
    width: 132px;
    height: 90px;
    border-radius: 4px;
}

.order-r {
    width: calc(100% - 132px);
    height: auto;
    display: inline-block;
    float: left;
    padding-left: 10px;
}

.order-con {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: left;
    color: #333333;
    margin-bottom: 1px;
}

.order-con:last-child {
    margin-bottom: 0;
}

.order-con small {
    margin-left: 6px;
    color: #E1021C;
    font-weight: 600;
}

.order-btn {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 10px;
}

.order-btn button {
    width: 100%;
    height: 36px;
    display: inline-block;
    border-radius: 4px;
    font-size: 14px;
    border: none;
    background: #E1021C;
    color: #ffffff;
    font-weight: 600;
}

.order-btn button.disabled {
    background: #CCCCCC;
}

.fixd-icons {
    width: 60px;
    height: auto;
    position: fixed;
    bottom: 120px;
    right: 0;
    z-index: 5000;
}

.fixd-icons .kf-item {
    width: 64px;
    height: 64px;
    display: inline-block;
    border-radius: 50%;
    overflow: hidden;
    padding: 6px;
}

.fixd-icons .kf-item img {
    width: 100%;
    height: auto;
    border-radius: 50%;
}

.message-main {
    overflow-y: scroll;
    width: 100%;
    background: #00927C;
    padding: 10px;
    display: block;
    max-width: 640px;
    min-height: 100%;
}

.message {
    width: 100%;
    height: auto;
    padding: 5px 10px;
    display: inline-block;
}

.message ul {
    width: 100%;
    height: auto;
    display: inline-block;
}

.message li {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 10px;
    border-radius: 6px;
    background: #ffffff;
    margin-bottom: 10px;
}

.message-time {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: left;
    color: #333333;
    font-size: 13px;
    border-bottom: 1px solid #E6E6E6;
    padding-bottom: 5px;
}

.message-con {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #666666;
    padding-top: 5px;
}

.coupon {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 15px;
    background: #00927C;
}

.coupon-head {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
}

.coupon-tab {
    width: 100%;
    height: auto;
    display: inline-flex;
}

.coupon-tab a {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #653E00;
    font-size: 16px;
}

.coupon-tab a.cur {
    font-weight: 600;
}

.coupon-tab a span {
    display: inline-block;
    padding: 5px 0;
}

.coupon-tab a.cur span {
    border-bottom: 2px solid #653E00;
}

.coupon-inline {
    width: 100%;
    height: auto;
    display: inline-block;
}

.coupon-inline ul {
    width: 100%;
    height: auto;
    display: inline-block;
}

.coupon-inline li {
    width: 100%;
    box-shadow: 0 3px 8px #653E00;
    background-color: #ffffff;
    border-radius: 6px;;
    padding: 10px;
    margin-bottom: 16px;
    display: inline-block;
    position: relative;
}

.coupon-inline li a {
    width: 100%;
    height: auto;
    display: inline-block;
}

.coupon-inline li img {
    width: 48px;
    height: 48px;
    display: inline-block;
    float: left;
    padding: 5px;
}

.coupon-content {
    width: calc(100% - 48px);
    height: 48px;
    display: inline-block;
    float: left;
    padding-left: 5px;
}

.coupon-content label {
    width: 100%;
    height: auto;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    color: #8f293f;
}

.coupon-content span {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 12px;
    color: #666666;
}

.coupon-inline li button {
    position: absolute;
    right: 10px;
    bottom: 20px;
    padding: 5px 10px;
    background: #8f293f;
    border-radius: 3px;
    color: #FFFFFF;
    font-weight: 600;
    border: none;
}

.coupon-inline li button.disabled {
    background: #cccccc;
}

.home-task {
    width: 100%;
    height: auto;
    display: inline-block;
}

.home-task-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    color: #ffffff;
    padding: 6px 4px 6px 16px;
    position: relative;
}

.home-task-tit i {
    width: 5px;
    height: 16px;
    background: #E1021C;
    display: inline-block;
    border-radius: 2px;
    position: absolute;
    left: 4px;
    bottom: 10px;
}

.home-task-tit a {
    font-weight: 400;
    text-decoration: underline;
    color: #ffffff;
    float: right;
}

.home-task-list {
    width: 100%;
    height: auto;
    display: inline-block;
}

.home-task-list ul {
    width: 100%;
    height: auto;
    display: inline-block;
}

.home-task-list li {
    width: 32%;
    height: auto;
    display: inline-block;
    padding: 2px 2px 0;
    margin-bottom: 4px;
}

.home-task-list li:nth-child(1), .home-task-list li:nth-child(4) {
    margin-right: 1%;
}

.home-task-list li:nth-child(3), .home-task-list li:nth-child(6) {
    margin-left: 1%;
}

.home-task-list li img {
    width: 100%;
    height: auto;
    display: inline-block;
    border-radius: 2px;
}

.home-task-list li p {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
    color: #ffffff;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


.home-reward {
    width: 100%;
    height: auto;
    display: inline-block;
}

.home-reward-tit {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    color: #ffffff;
    padding: 6px 4px 6px 16px;
    position: relative;
}

.home-reward-tit i {
    width: 5px;
    height: 16px;
    background: #E1021C;
    display: inline-block;
    border-radius: 2px;
    position: absolute;
    left: 4px;
    bottom: 10px;
}

.home-reward-list {
    width: 100%;
    height: auto;
    display: inline-block;
}

.reward-list {
    width: 100%;
    height: auto;
    display: inline-block;
    padding: 12px;
}


.reward-item {
    width: 100%;
    margin-bottom: 15px;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 12px;
}

.reward-item-tit {
    width: 100%;
    height: auto;
    display: block;
    color: #E1021C;
    font-size: 16px;
    font-weight: 600;
    padding: 0 6px 6px;
    text-align: center;
    border-bottom: 1px solid #f0f0f0;
}


.reward-item ul {
    width: 100%;
    height: auto;
    display: flex;
    margin-top: 12px;
    padding: 0 6px;
}

.reward-item li {
    width: 100%;
    height: auto;
    display: inline-block;
    text-align: center;
}

.reward-item li:first-child {
    text-align: left;
}

.reward-item li:last-child {
    text-align: right;
}

.reward-item span {
    width: 100%;
    height: auto;
    display: inline-block;
    color: #E1021C;
    font-weight: 500;
}

.reward-item label {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 6px;
}

.reward-rate {
    width: 100%;
    height: 8px;
    display: inline-block;
    background: #EEEEEE;
    margin-top: 12px;
    border-radius: 4px;
    position: relative;
}

.reward-rate span {
    height: 8px;
    display: inline-block;
    background: #E1021C;
    position: absolute;
    border-radius: 4px;
    top: 0;
    left: 0;
}

.reward-btm {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 12px;
}

.reward-btm button {
    width: 100%;
    height: 36px;
    display: inline-block;
    background: #E1021C;
    border-radius: 8px;
    border: none;
    font-weight: 500;
    color: #ffffff;
}

.reward-btm button.disabled {
    background: #EEEEEE;
    color: #ffffff;
}

.treasure-record {
    width: 100%;
    height: auto;
    display: inline-block;
    margin-top: 20px;
}

.treasure-record li {
    width: 100%;
    height: auto;
    display: inline-block;
    border-bottom: 1px solid #F5F5F5;
    padding: 10px 5px;
}

.treasure-record .treasure-dt {
    width: 100%;
    height: auto;
    display: inline-block;
}

.treasure-record .treasure-dt span:first-child {
    float: left;
    font-size: 16px;
    color: #111111;
}

.treasure-record .treasure-dt span:last-child {
    float: right;
    font-size: 16px;
    color: #E1021C;
    font-weight: 600;
}

.treasure-record .treasure-dd {
    width: 100%;
    height: auto;
    display: inline-block;
    font-size: 12px;
    color: #ffffff;
    text-align: left;
}

.treasure-record .treasure-dd span:first-child {
    float: left;
    font-size: 12px;
    color: #ffffff;
}

.treasure-record .treasure-dd span:last-child {
    float: right;
    font-size: 12px;
    color: #ffffff;
}



</style>







@endsection
