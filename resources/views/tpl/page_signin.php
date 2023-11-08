<div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
    <a href class="navbar-brand block m-t">{{app.name}}</a>
    <div class="m-b-lg">
        <div class="wrapper text-center">
            <strong>Sign in to get in touch</strong>
        </div>
        <form name="form" class="form-validation">
            <div class="text-danger wrapper text-center" ng-show="authError">
                {{authError}}
            </div>
            <div class="list-group list-group-sm">
                <div class="list-group-item">
                    <input type="email" placeholder="Email" class="form-control no-border" ng-model="user.email" required>
                </div>
                <div class="list-group-item">
                    <input type="password" placeholder="Password" class="form-control no-border" ng-model="user.password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="login()" ng-disabled='form.$invalid'>Log in</button>
            <div class="text-center m-t m-b"><a ui-sref="access.forgotpwd">Forgot password?</a></div>
            <div class="line line-dashed"></div>
            <p class="text-center"><small>Do not have an account?</small></p>
            <a ui-sref="access.signup" class="btn btn-lg btn-default btn-block">Create an account</a>
        </form>
    </div>
    <div class="text-center" ng-include="'views/tpl.blocks.page_footer'">
        {% include 'blocks/page_footer.html' %}
    </div>
</div>


<form role="form" method="post" ng-submit="postLogin()" name="login">
    <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">

        <div style="text-align: center">
            <div>
                <h4 style="font-size: 16px;color: #636363;">Radiant Flex</h4>
            </div>
            <h4 style="margin: 20px 0;font-size: 25px;">Login</h4>
        </div>
        <md-input-container class="md-block" md-no-float md-is-error="formError.email">
            <md-icon md-svg-src="icons/user.svg"></md-icon>
            <input type="email" name="email" ng-model="form.email" placeholder="Username">
            <div ng-messages md-auto-hide='false'>
                <div ng-bind="formError.email[0]"></div>
            </div>
        </md-input-container>
        <md-input-container class="md-block" md-no-float md-is-error="formError.password">
            <md-icon md-svg-src="icons/lock.svg"></md-icon>
            <input id="password" type="password" name="password" ng-model="form.password" placeholder="Password">
            <div ng-messages md-auto-hide='false'>
                <div ng-bind="formError.password[0]"></div>
            </div>
        </md-input-container>
        <md-checkbox ng-click="showPassword();">
            <b>Show Password</b>
        </md-checkbox>
        <md-checkbox ng-model="form.remember" ng-true-value=1 ng-false-value=0>
            <b>Remember Password</b>
        </md-checkbox>
        <md-button type="submit" class="md-raised md-accent md-hue-2">Login</md-button>

        <a href="" ng-click="support();" style="text-align:center;">Need Help ?</a>
        <div>
</form>