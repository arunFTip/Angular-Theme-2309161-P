<div class="clearfix" id="aside-user">
    <div class="wrapper blue-100">
        <a ui-sref="app.page.profile">
            <span class="thumb-md w-auto-folded avatar m-t-sm">
        <img src="img/a2.jpg" class="img-full" alt="...">
      </span>
        </a>
        <a href class="hidden-folded" ui-toggle-class="show" target="#user">
            <span class="block m-t-sm auto">
        <span class="pull-right">
          <i class="fa fa-fw fa-caret-down text"></i>
          <i class="fa fa-fw fa-caret-up text-active"></i>
        </span>
            <strong class="font-bold text-lt">John.Smith@gmail.com</strong>
            </span>
            <span class="text-xs block">Art Director</span>
        </a>
    </div>
</div>
<!-- / user -->

<!-- nav -->
<nav class="navi hide" id="user">
    <ul class="nav b-b m-t-sm">
        <li ui-sref-active="active">
            <a ui-sref="app.page.profile">
                <i class="glyphicon glyphicon-user icon"></i>
                <span>Profile</span>
            </a>
        </li>
        <li ui-sref-active="active">
            <a ui-sref="app.page.settings">
                <i class="glyphicon glyphicon-cog icon"></i>
                <span>Settings</span>
            </a>
        </li>
        <li class="m-b-sm">
            <a ui-sref="access.signin">
                <i class="glyphicon glyphicon-log-out icon"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</nav>
<nav ui-nav class="navi clearfix" ng-include="'views/tpl.blocks.material.nav'"></nav>
<!-- nav -->

<!-- aside footer -->
<div class="wrapper m-t">
    <div class="text-center-folded">
        <span class="pull-right pull-none-folded">60%</span>
        <span class="hidden-folded" translate="aside.MILESTONE">Milestone</span>
    </div>
    <progressbar value="60" class="progress-xxs m-t-sm dk" type="info"></progressbar>
    <div class="text-center-folded">
        <span class="pull-right pull-none-folded">35%</span>
        <span class="hidden-folded" translate="aside.RELEASE">Release</span>
    </div>
    <progressbar value="35" class="progress-xxs m-t-sm dk" type="primary"></progressbar>
</div>