@extends('layout.index')

@section('content')

<md-content flex class="h-100 loginOuter" >
    <div ui-view class="loginMiddle zoomIn ui-container" ></div>
</md-content>

<script type="text/ng-template" id='login.html'>
    <div class="loginInner container w-xxl w-auto-xs loginContainer loginBoxShadow" >
        <div class="loginLogo" >
            @if(isset($user['company']['logo'])&&$user['company']['logo']!='')
                <img src="images/logo/{{$user['company']['logo']}}" > 
            @else 
                <img src="images/icons/KnitsERPLogo.svg"  > 
            @endif
        </div>
        <p  class="navbar-brand block m-t p-0" >
            {{$user['company']['name']}}
        </p>
        <div >
            <form name="form" class="form-validation" ng-submit="postLogin();">
            
                <div class="list-group list-group-sm" >
                
                    <div class="list-group-item m-b-20">
                        <input type="text" placeholder="Email" class="form-control no-border" ng-model="form.email" ng-click="bgBlur();" style="font-weight: 500;">
                        <div ng-messages  md-auto-hide='false' class="error">
                            <div ng-bind="formError.email[0]"></div>
                        </div>
                    </div>

                    <div class="list-group-item">
                        <input  id="password" type="password" placeholder="Password" class="form-control no-border" ng-model="form.password" ng-click="bgBBlur();" style="width: 90%;display: inline;font-weight: 500;">
                            <md-icon 
                            ng-include="'visibility.svg'" ng-click="showPassword();" style="fill: #000;margin-top: 7px;width: 19px;min-width: 19px;float:right" ng-if="visibility.type!='text'"><md-tooltip md-direction="bottom">Show Password</md-tooltip></md-icon>
                            <md-icon ng-include="'visibilityOff.svg'" ng-click="showPassword();" style="fill: #000;margin-top: 7px;width: 19px;min-width: 19px;float:right" ng-if="visibility.type=='text'"><md-tooltip md-direction="bottom">Hide Password</md-tooltip></md-icon>
                        <div ng-messages  md-auto-hide='false' class="error">
                            <div ng-bind="formError.password[0]"></div>
                        </div>
                    </div>
                </div>
                <div class="checkbox m-b-md m-t-none fs-13" >
                    <label class="i-checks">
                        <input type="checkbox" ng-model="form.remember"><i></i> Remember Password</label>
                </div>
                <button type="submit" class="btn btn-lg login-btn-info btn-info btn-block" >Login</button>
            
                    {{-- <div class="text-center m-t  font-bold"><a  href="https://ftipinfosol.com/contact-us.php" target="_blank" style="color: #4b4b4b;">Need Help?</a></div> --}}
                <div class="line line-dashed"></div>
            </form>
        </div>
        <p  class="navbar-brand block fs-16 pt-0 m-0" style="line-height:0;margin-bottom: 20px;"> <img src="images/icons/KnitsERPLogo.svg"> KNITS ERP</p>
        <br>
    </div>
</script>

<script>
    $(function() {
        $('#password').on('keypress', function(e) {
            if (e.which == 32)
                return false;
        });
    });
</script>

@endsection