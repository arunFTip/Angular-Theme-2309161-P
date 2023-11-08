<div class="hbox hbox-auto-xs hbox-auto-sm" style="min-height:100vh">
    <div class="col w w-auto-xs bg-light inherit dk b-r">
        <div class="wrapper-md b-b" style="border-bottom: 1px solid #ccd0d1;padding: 19.3px;">
            <a class="btn btn-link pull-right m-t-n-xs m-r-n-sm visible-sm visible-xs" ui-toggle-class="show"
                data-target="#nav-docs">
                <i class="fa fa-cog color-black"></i>
            </a>
            <span class="h4 font-bold">{{menuactive}}</span>
        </div>
        <div class="hidden-sm hidden-xs " id="nav-docs">
            <ul class="nav">
                <li class="subMenuBorder" 
                    ng-repeat="menu in menus.customMenu[topNavIndex].menu[menuIndex].menu" ng-class="{'subActive':title==menu.name}">
                    <a ng-click="goTo(menu.url)" ui-toggle-class="show" data-target="#nav-docs" style="padding-left: 18px;">
                        {{menu.name}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col">
        <div class="clearfix ">
            <div ui-view class="setting"></div>
        </div>
    </div>
</div>