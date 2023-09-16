<div class="aside-wrap">
  <!-- if you want to use a custom scroll when aside fixed, use the slimScroll
    <div class="navi-wrap" ui-jq="slimScroll" ui-options="{height:'100%', size:'8px'}">
  -->
  <div class="navi-wrap">
    <!-- user -->
    <div class="clearfix hidden-xs text-center hide" id="aside-user">
      <div class="dropdown wrapper" dropdown>
        <a ui-sref="app.page.profile">
          <span class="thumb-lg w-auto-folded avatar m-t-sm">
            <img src="img/a0.jpg" class="img-full" alt="...">
          </span>
        </a>
        <a href class="dropdown-toggle hidden-folded" dropdown-toggle>
          <span class="clear">
            <span class="block m-t-sm">
              <strong class="font-bold text-lt">John.Smith</strong> 
              <b class="caret"></b>
            </span>
            <span class="text-muted text-xs block">Art Director</span>
          </span>
        </a>
        <!-- dropdown -->
        <ul class="dropdown-menu animated fadeInRight w hidden-folded">
          <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
            <span class="arrow top hidden-folded arrow-info"></span>
            <div>
              <p>300mb of 500mb used</p>
            </div>
            <progressbar value="60" type="white" class="progress-xs m-b-none dker"></progressbar>
          </li>
          <li>
            <a href>Settings</a>
          </li>
          <li>
            <a ui-sref="app.page.profile">Profile</a>
          </li>
          <li>
            <a href>
              <span class="badge bg-danger pull-right">3</span>
              Notifications
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a ui-sref="access.signin">Logout</a>
          </li>
        </ul>
        <!-- / dropdown -->
      </div>
      <div class="line dk hidden-folded"></div>
    </div>
    <!-- / user -->

    <!-- nav -->
    <nav ui-nav class="navi clearfix" ng-include="'tpl/blocks/nav.html'"></nav>
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
    <!-- / aside footer -->
  </div>
</div>