@extends($activeTemplate.'layouts.master')
@section('panel')

   <!-- Plugin Link -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/lib/apexcharts.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">

    @stack('style-lib')

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/custom.css') }}">

<style>
    * {
        -webkit-touch-callout: none;
        /*系统默认菜单被禁用*/
        -webkit-user-select: none;
        /*webkit浏览器*/
        -khtml-user-select: none;
        /*早期浏览器*/
        -moz-user-select: none;
        /*火狐*/
        -ms-user-select: none;
        /*IE10*/
        user-select: none;
    }

    .countdown-text {
        font-size: 16px;
        font-weight: bold;
        position: absolute;
        top: 40px;
        right: 25px;
    }

    .bank-icon {
        width: 5rem;
        height: 5rem;
        position: absolute;
        left: 40vw;
        top: 30px;
        z-index: 99;
    }

    .bank-card {
        margin-top: 55px;
        background: linear-gradient(127deg, #276981 0%, #23637E 30%, #073853 100%);
        border-radius: 8px 8px 0px 0px;
    }

    .bank-amount {
        background: linear-gradient(270deg, #184A57 0%, #061A23 100%);
        border-radius: 0px 0px 0px 0px;
    }

    .bank-name {
        font-size: 10px;
        font-weight: 400;
        color: #9BBCCB;
    }

    .amount-text {
        font-size: 32px;
        font-weight: 400;
        color: #FFFFFF;
    }

    .step-text {
        font-size: 14px;
        color: #3D3D3D;
        display: flex;
    }

    .input-view {
        margin-top: 8px;
        width: 92vw;
        height: 36px;
        background: #FFFFFF;
        border-radius: 4px 4px 4px 4px;
        opacity: 1;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .info-card-view {
        background: #FFFFFF;
        border-radius: 8px 8px 0px 0px;
        width: 100%;
        height: 100%;
    }

    .info-text {
        margin-top: 32px;
        margin-left: 42px;
        margin-right: 42px;
        font-size: 14px;
        font-weight: 400;
        color: #003A5E;
        line-height: 18px;
        text-align: center;
    }

    .pay-text {
        margin-top: 44px;
        margin-left: 55px;
        font-size: 14px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.25);
    }

    .bank-text {
        margin-top: 20px;
        margin-left: 55px;
        font-size: 13px;
        font-weight: 400;
        color: #000000;
    }
    
    .bank-title{
        font-size: 14px;
    }


    .bank-num {
        font-size: 14px;
        font-weight: 700;
        color: #459FA8;
        text-align: right;
    }

    .copy-btn {
        width: 50px;
        height: 22px;
        background: #f44336;
        border-radius: 4px 4px 4px 4px;
        border: 0;
        margin-left: 10px;
        text-align: center;
        color: #FFFFFF;
        font-size: 12px;
    }

    .copy-btn2 {
        width: 50px;
        height: 22px;
        background: #f44336;
        border-radius: 4px 4px 4px 4px;
        border: 0;
        margin-left: 10px;
        text-align: center;
        color: #FFFFFF;
        font-size: 12px;
    }
    
    .copy-btn3 {
        width: 50px;
        height: 22px;
        background: #f44336;
        border-radius: 4px 4px 4px 4px;
        border: 0;
        margin-left: 10px;
        text-align: center;
        color: #FFFFFF;
        font-size: 12px;
    }

    .submit {
        margin-top: 32px;
        margin-left: 17px;
        margin-right: 17px;
        width: 92vw;
        height: 44px;
        background: #429EA9;
        border-radius: 4px 4px 4px 4px;
        color: #FFFFFF;
        text-align: center;
        line-height: 45px;
    }
    
    .box-view {
        box-shadow: 2px 2px 10px 0px rgba(140, 140, 140, 0.1);
        border-radius: 4px 4px 4px 4px;
        padding-left: 25px;
        padding-right: 25px;
    }
    
    #link {
      align-self: center;
      font-size: 1.2em;
      color: #333;
      font-weight: bold;
      flex-grow: 2;
      background-color: #fff;
      border: none;
    }
    #copy {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
      i {
        display: block;
        line-height: 30px;
        position: relative;
        &::before {
          display: block;
          width: 15px;
          margin: 0 auto;
        }
        &.copied::after {
          position: absolute;
          top: 0px;
          right: 35px;
          height: 30px;
          line-height: 25px;
          display: block;
          content: "copied";
          font-size: 1.5em;
          padding: 2px 10px;
          color: #fff;
          background-color: #4099FF;
          border-radius: 3px;
          opacity: 1;
          will-change: opacity, transform;
          animation: showcopied 1.5s ease;
        }
      }
      &:hover {
        cursor: pointer;
        background-color: darken(#f8f8f8, 10%);
        transition: background-color .3s ease-in;
      }
    }
  

@keyframes showcopied {
  0% {
    opacity: 0;
    transform: translateX(100%);
  }
  70% {
    opacity: 1;
    transform: translateX(0);
  }
  100% {
    opacity: 0;
  }
}
</style>

<body>
    <div style="padding: 16px;background: #F7F7F7;">
        <img src="https://www.mx-pay.com/static/img/bank-icon.png" class="bank-icon">
        <div id="countdown" class="countdown-text"></div>
       <div class="bank-card">
            <div style="padding-top: 42px;padding-bottom: 15px;text-align: center;">
                <!--<div class="bank-name">WEMA BANK</div>-->
                <div class="amount-text">{{ __('Withdrawal Details') }}</div>
            </div>
        </div>

        <form action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
                        @csrf
        <div class="step-text" style="margin-top: 20px;">
            <div style="color: red;">*</div>
            <div style="font-weight: bold;">{{ __('step 1:') }}</div>
            <div style="margin-left: 4px;">{{ __('input the sender name') }}</div>
            <div style="color:red;margin-left:2px;">{{ __('(Required)') }}</div>
        </div>
        <div style="-webkit-user-select:text !important; width:100%;">
          <x-viser-form identifier="id" identifierValue="{{ $withdraw->method->form_id }}" />
                        @if(auth()->user()->ts)
                        <div class="form-group">
                            <label>@lang('Google Authenticator Code')</label>
                            <input type="text" name="authenticator_code" class="form-control form--control" required>
                        </div>
                        @endif
        </div>

        
    </div>
    
    
<button id="submit-btn" type="submit" class="submit">
        {{ __('Process Withdrawal') }}
    </button>
    </form>
    
@endsection
