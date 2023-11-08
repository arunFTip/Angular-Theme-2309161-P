<div class="indexHeader">
    <div class="row">
        <div class="col-md-3 col-sm-8 col-xs-8 indexLabel">
            <md-icon ng-include="'back.svg'" ng-click="back();" class="backIcon">
                <md-tooltip md-direction="bottom">Back</md-tooltip>
            </md-icon>
            <h1>{{title}}</h1>
        </div>
        <div class="col-md-6 p-0">
            <div class="row searchArea" style="position: unset;">
                <div class="col-md-3 p-05"></div>
                <div class="col-md-6 p-05">
                    <md-input-container class="md-block ">
                        <label>Search Master</label>
                        <input type="text" ng-model="DATA.VALUE.reportFilter">
                    </md-input-container>
                </div>
                <div class="col-md-3 p-05"></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-8 col-xs-8 indexLabel">


        </div>
    </div>
</div>
<md-content>

    <div class="panel panel-info">
        <div class="panel-heading font-bold" ng-repeat-start="header in menus.customMenu"
            ng-hide="header.filtered.length==0" ng-if="header.menu[0] && (header.name=='Master')"
            style="height:0px;padding:0px;"><!-- {{header.name}} --></div>
        <div class="list-group bg-white " ng-class=" {reportGrid: DATA.TABLE.theme.data.masterGrid == 1}" ng-repeat-end
            ng-repeat="menu in header.filtered = ( header.menu | filter:{ name: DATA.VALUE.reportFilter })"
            ng-if="header.name=='Master'">
            <div class="row list-group-item">
                <a ng-click="asideFoldedFromGrid(menu.name);"  ui-sref="{{menu.url}}" class="bg-white"
                    style="cursor: pointer;">
                    <md-icon ng-include="menu.icon+'.svg'" class="sidebarIcon">
                    </md-icon>
                    <b class="CheckBoxLabel ttCapitalize">{{menu.name}}</b>
                </a>
            </div>
        </div>
    </div>
</md-content>
