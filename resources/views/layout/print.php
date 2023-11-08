<md-dialog class="default-dialog" style="min-height: 100%;height: inherit;">

    <form name="userform" style="height:100%!important;min-height:100%!important">
        <md-toolbar class="default-dialog-tool md-dialog-toolbar md-container-dialog" style="height: 50px;">
            <div class="md-toolbar-tools">
                <h1>Print View</h1>
                <a href="{{print_url}}" target="_blank" style="display: contents;">
                    <md-icon ng-include="'openInNew.svg'" class="sidebarIcon" style="fill:white!important">
                    </md-icon>
                </a>
            </div>
        </md-toolbar>
        <md-dialog-content style="height:100%!important;min-height:83%!important">
            <div class="md-dialog-content dialog"
                style="padding:0!important;height:100%!important;min-height:100%!important">
                <div class="row" style="padding-left: 12px;">
                    <div class="col-md-2 p-05">
                        <md-select ng-model="printCopy" multiple placeholder="Print Copy" ng-change="print($event);" style="margin: 20px 0 26px!important;">
                            <md-optgroup label="Print Copy">
                                <md-option ng-repeat="copy in DATA.VALUE.invoiceCopy2" ng-value="{{copy}}">
                                    {{copy.value}}</md-option>
                            </md-optgroup>
                        </md-select>
                    </div>
                    <div class="col-md-2 p-05">
                        <div class="checkbox fs-13" style="margin-top: 24px;">
                            <label class="i-checks">
                                <input type="checkbox" ng-model="signature" ng-true-value=1 ng-false-value=0 ng-change="print($event);"><i></i> Signature</label>
                        </div>
                    </div>
                </div>
                <iframe height="100%" src="{{print_url}}" width="100%"></iframe>
            </div>
        </md-dialog-content>
        <md-dialog-actions layout="row" class="dialog-actions">
            <span flex></span>
            <button type="button" ng-click="hide();create();" class="btn m-b-xs w-xs btn-info m-r-10">Cancel</button>
        </md-dialog-actions>
    </form>
</md-dialog>