  <div class="app-header navbar">
      <div class="navbar-header">

          <button class="pull-right visible-xs dk" ui-toggle-class="show" class="dropdown" dropdown
              style="height: 52px;padding: 0;">
              <a href class="dropdown-toggle clear" dropdown-toggle style="height: 52px;margin-right:5px;">
                  <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                      <md-icon ng-include="'accountCircle.svg'" style="width: 40px;height: 40px;margin-top: 16px;"
                          ng-if="!AuthUser.logo">
                      </md-icon>
                      <img ng-src="images/logo/{{AuthUser.logo}}" class="icon" ng-if="AuthUser.logo"
                          style="height: 38px;margin-top: 16px;">
                      <i class="on md b-white bottom"></i>
                  </span>
              </a>
              <ul class="dropdown-menu animated fadeInRight w">
                  <li class="wrapper b-b m-b-sm bg-light m-t-n-xs font-bold visible-xs">
                      <div>
                          <p class="no-margin">{{AuthUser.email}}</p>
                      </div>
                  </li>
                  <li class="wrapper b-b m-b-sm bg-light m-t-n-xs font-bold ">
                      <div>
                          <p class="no-margin">OPTIONS</p>
                      </div>
                  </li>
                  <li><a ui-sref="home.setting.profile" style="font-weight:500">Profile</a></li>
                  <li>
                      <a class="fullScreen" ng-click="fullScreen();" ng-if="fullScreenActive==0"
                          style="font-weight:500">Full Screen</a>
                      <a class="fullScreen" ng-click="fullScreen();" ng-if="fullScreenActive==1"
                          style="font-weight:500">Exit Full Screen</a>
                  </li>
                  <li><a ui-sref="home.setting.theme" style="font-weight:500">Themes</a></li>
                  <!-- <li><a href="https://ftipinfosol.com/contact-us.php" target="_blank" style="font-weight:500"> Need
                          Help?</a></li> -->
                  <li class="divider"></li>
                  <li><a href="/logout" style="font-weight:500">Logout</a></li>
              </ul>
          </button>

          <button class="mobar pull-right visible-xs" ui-toggle-class="off-screen" data-target=".app-aside"
              ui-scroll-to="app">
              <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand text-lt fs-16" style="padding: 0 13px;" ng-dblclick="productConfig($event);">
              <md-icon ng-include="'KnitsERPLogoWhite.svg'"
                  style="fill: #ffffff!important;min-height: 35px;height: 35px;width: 25px"></md-icon>
              <span class="hidden-folded m-l-xs">KNITS ERP</span>
          </a>
      </div>

      <div class="collapse pos-rlt navbar-collapse box-shadow align-center">
          <div class="nav navbar-nav hidden-xs" ng-if="DATA.TABLE.theme.data.asideDock==0">
              <a href class="btn no-shadow navbar-btn p-60"
                  ng-click="DATA.TABLE.theme.data.asideFolded = (DATA.TABLE.theme.data.asideFolded==0) ? 1: 0;">
                  <md-icon ng-include="'menu.svg'"
                      style="fill: #ffffff!important;min-height: 20px;height: 20px;width: 15px;"></md-icon>
                  <md-tooltip md-direction="right" class="zIndexHigh">Side Dock</md-tooltip>
              </a>
          </div>
          <!-- <ul class="nav navbar-nav hidden-sm">
              <li class="dropdown open" dropdown="">
                  <a href="" class="dropdown-toggle" dropdown-toggle="" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-fw  fa-plus-circle visible-xs-inline-block"></i>
                      <i class="fa  fa-plus-circle" style="font-size: 20px;"></i>
                  </a>
                  <ul class="dropdown-menu" role="menu" style="top: 50px;">
                      <li>
                          <a ui-sref="home.report" class="ng-scope">
                              <i class="fa fa-star"></i> Reports
                          </a>
                      </li>
                      <li class="divider"></li>
                  </ul>
              </li>
          </ul> -->
          <!-- <a href="#/" class="navbar-brand CompanyNamePadding fs-16 displayInlineBlock">
              <span class="m-l-xs">{{setting.name}}</span>
          </a> -->

          <div class="form-group  m-b-0 CompanyNamePadding fs-16 displayInlineBlock"
              ng-if="DATA.TABLE.theme.data.asideFolded==0" style="margin:0px;">
              <div class="input-group  branchHeader" style="width:100%">
                  {{filter1.companyName}}
              </div>
          </div>

          <ul class="nav navbar-nav navbar-right">

              <!-- <li class="dropdown" style="height: 51px;">
                  <div class="form-group  m-b-0 CompanyNamePadding fs-16 displayInlineBlock"
                      ng-if="DATA.TABLE.theme.data.asideFolded==0" style="margin:0px;">
                      <div class="input-group  branchHeader" style="min-width: 75px;">ERP</div>
                  </div>

                  <div class="headerSwitch">
                      <label class="i-switch bg-info pull-right header-switch">
                          <input type="checkbox" ng-change="changeMenu()" ng-model="applicationRole" ng-true-value=1
                              ng-false-value=0><i></i>
                      </label>
                  </div>

                  <div class="form-group  m-b-0 CompanyNamePadding fs-16 displayInlineBlock"
                      ng-if="DATA.TABLE.theme.data.asideFolded==0" style="margin:0px;">
                      <div class="input-group  branchHeader" style="min-width: 75px;">PAYROLL</div>
                  </div>
              </li> -->

              <li class="dropdown" style="height: 51px;">
                  <a ng-click="zoomOut();" data-toggle="dropdown" class="dropdown-toggle"
                      style="padding:5px;height: 51px;">
                      <span class="zoomIcon" style="padding: 4px 5px;"> -A </span>
                  </a>
              </li>
              <li class="dropdown" style="height: 51px;">
                  <a ng-click="backToNormal();" data-toggle="dropdown" class="dropdown-toggle"
                      style="padding:5px;height: 51px;">
                      <span class="zoomIcon" style="padding: 4px 7px;"> A </span>
                  </a>
              </li>
              <li class="dropdown" style="height: 51px;">
                  <a ng-click="zoomIn();" data-toggle="dropdown" class="dropdown-toggle"
                      style="padding:5px;height: 51px;">
                      <span class="zoomIcon" style="padding: 4px;"> A+ </span>
                  </a>
              </li>


              <li class="dropdown" dropdown style="height: 51px;">
                  <a href class="dropdown-toggle clear" dropdown-toggle style="height: 51px;">
                      <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                          <md-icon ng-include="'accountCircle.svg'"
                              style="width: 30px;height: 30px;margin-top: 5px;fill:#fff" ng-if="!AuthUser.logo">
                          </md-icon>
                          <img ng-src="images/logo/{{AuthUser.logo}}" class="icon" ng-if="AuthUser.logo"
                              style="height: 38px;">
                          <i class="on md b-white bottom"></i>
                      </span>
                      <span class="hidden-sm hidden-md" style="font-weight: 500;">{{AuthUser.email}}</span> <b
                          class="caret"></b>
                  </a>
                  <ul class="dropdown-menu animated fadeInRight w">
                      <li class="wrapper b-b m-b-sm bg-light m-t-n-xs font-bold">
                          <div>
                              <p class="no-margin">OPTIONS</p>
                          </div>
                      </li>
                      <li><a ui-sref="home.setting.profile" style="font-weight:500">Profile</a></li>
                      <li>
                          <a class="fullScreen" ng-click="fullScreen();" ng-if="fullScreenActive==0"
                              style="font-weight:500">Full Screen</a>
                          <a class="fullScreen" ng-click="fullScreen();" ng-if="fullScreenActive==1"
                              style="font-weight:500">Exit Full Screen</a>
                      </li>
                      <li><a ui-sref="erp.setting.theme" style="font-weight:500">Themes</a></li>
                      <!-- <li><a href="https://ftipinfosol.com/contact-us.php" target="_blank" style="font-weight:500"> Need
                              Help?</a></li> -->
                      <li class="divider"></li>
                      <li><a href="/logout" style="font-weight:500">Logout</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>

  <div class="app-aside hidden-xs bg-black">
      <div class="aside-wrap">
          <div class="navi-wrap">
              <nav ui-nav class="navi clearfix">
                  <ul class="nav">
                      <div class="form-group m-12"
                          ng-if="DATA.TABLE.theme.data.asideFolded==0&&DATA.TABLE.theme.data.asideDock==0">
                          <div class="input-group " style="margin-top: 20px;">
                              <input type="text" ng-model="DATA.VALUE.navFilter"
                                  class="form-control input-sm bg-light no-border rounded padder"
                                  placeholder="Search Menu">
                              <span class="input-group-btn"><button type="submit"
                                      class="btn btn-sm bg-light rounded btnSearch"><i
                                          class="fa fa-search"></i></button></span>
                          </div>
                      </div>

                      <li ng-repeat="header in menus.customMenu" ng-if="header.menu[0]"
                          ng-hide="header.filtered.length==0"
                          ng-class="{'active':header.name==menus.customMenu[topNavIndex].name||DATA.VALUE.navFilter}">
                          <a href class="auto" ng-if="!header.url">
                              <span class="pull-right text-muted">
                                  <i class="fa fa-fw fa-angle-right text"></i>
                                  <i class="fa fa-fw fa-angle-down text-active"></i>
                              </span>
                              <md-icon ng-include="header.icon+'.svg'" class="sidebarIcon navHeader">
                              </md-icon>
                              <span class="font-bold">{{header.name}}{{header.active}}</span>
                          </a>
                          <a href ng-click="asideFoldedFromGrid($parent.$index);" ui-sref="{{header.url}}" class="auto"
                              ng-if="header.url">
                              <md-icon ng-include="header.icon+'.svg'" class="sidebarIcon navHeader"></md-icon>
                              <span class="font-bold">{{header.name}}</span>
                              <md-tooltip md-direction="right" style="text-transform:capitalize">{{header.name}}
                              </md-tooltip>
                          </a>
                          <ul class="nav nav-sub dk" ng-if="!header.url">
                              <li ng-class="{'active':menu.name==menuactive}"
                                  ng-repeat="menu in header.filtered = ( header.menu | filter:{ name: DATA.VALUE.navFilter })">
                                  <md-tooltip md-direction="right" style="text-transform:capitalize">
                                      {{menu.name}}
                                  </md-tooltip>

                                  <div>
                                      <a ng-click="asideFolded($parent.$index, $index);" ui-sref="{{menu.url}}"
                                          class="sideBarWidth">
                                          <!-- <a ng-click="asideFolded($parent.$index, $index);goTo(menu.url);"> -->
                                          <md-icon ng-include="menu.icon+'.svg'" class="sidebarIcon">
                                          </md-icon>
                                          <span class="text-concat hidden-xs">
                                              {{menu.name}}
                                          </span>
                                          <span class="text-concat visible-xs concatdis">
                                              {{menu.name}}
                                          </span>
                                          <span class="hidden-xs" style="vertical-align: bottom;"
                                              ng-if="menu.name.length>15">...</span>
                                      </a>
                                      <a ui-sref="{{menu.formUrl}}"
                                          style="width:5%;display:inline-block;vertical-align: -webkit-baseline-middle;padding: 0!important;"
                                          ng-if="menu.formUrl">
                                          <i class="fa  fa-plus-circle"
                                              style="font-size: 17px;position: relative;float: left;width: 19px;margin: -10px -10px;margin-right: 5px;overflow: hidden;line-height: 40px;text-align: center;"></i>
                                      </a>
                                  </div>

                              </li>
                          </ul>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>

  <div class="app-content">
      <a href class="off-screen-toggle hide" ui-toggle-class="off-screen" data-target=".app-aside"></a>
      <div class="app-content-body" ui-view></div>
  </div>
  <!--
  <div class="app-footer wrapper b-t bg-light no-print">
      <a href="https://ftipinfosol.com" target="_blank"> &copy; {{AuthUser.poweredBy}} </a>
  </div> -->

  <style>
.header-switch i:before {
    background-color: var(--accent) !important;
    border: 1px solid var(--accent) !important;
}
.i-switch1 i:after {
    position: absolute;
    top: 1px;
    bottom: 1px;
    width: 18px;
    background-color: #fff;
    border-radius: 50%;
    content: "";
    -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
    -webkit-transition: margin-left 0.3s;
    transition: margin-left 0.3s;
}

.i-switch1 input {
    position: absolute;
    opacity: 0;
    filter: alpha(opacity=0);
}

.i-switch1 input:checked+i:before {
    top: 50%;
    right: 5px;
    bottom: 50%;
    left: 50%;
    border-width: 0;
    border-radius: 5px;
}

.i-switch1 input:checked+i:after {
    margin-left: 16px;
}

.headerSwitch {
    display: inline-block;
    margin: 5px;
    text-align: left;
}
  </style>
