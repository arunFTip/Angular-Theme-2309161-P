<div ng-controller="MailDetailCtrl">
  <!-- header -->
  <div class="wrapper bg-light lter b-b">
    <a ui-sref="app.mail.list" class="btn btn-sm btn-default w-xxs m-r-sm" tooltip="Back to Inbox"><i class="fa fa-long-arrow-left"></i></a>
    <div class="btn-group pos-stc m-r-sm">
      <button class="btn btn-sm btn-default w-xxs w-auto-xs" tooltip="Archive"><i class="fa fa-archive"></i></button>
      <button class="btn btn-sm btn-default w-xxs w-auto-xs" tooltip="Report"><i class="fa fa-exclamation-circle"></i></button>
      <button class="btn btn-sm btn-default w-xxs w-auto-xs" tooltip="Delete"><i class="fa fa-trash-o"></i></button>
    </div>
    <div class="btn-group pos-stc">
      <div class="btn-group dropdown">
        <button class="btn btn-sm btn-default w-xxs w-auto-xs dropdown-toggle" tooltip="Move to" tooltip-placement="bottom"><i class="fa fa-fw fa-folder"></i> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href>Trash</a></li>
          <li><a href>Spam</a></li>
        </ul>
      </div>
      <div class="btn-group dropdown">
        <button class="btn btn-sm btn-default w-xxs w-auto-xs dropdown-toggle" tooltip="Move to" tooltip-placement="bottom"><i class="fa fa-fw fa-tag"></i> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li ng-repeat="label in labels">
            <a href>
              <i class="fa fa-fw fa-circle text-muted text-xs" color="{{label.color}}" label-color ></i>
              {{label.name}}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- / header -->
  <div class="wrapper b-b">
    <h2 class="font-thin m-n">{{mail.subject}}</h2>
  </div>
  <div class="wrapper b-b">
    <img ng-src="{{mail.avatar}}" class="img-circle thumb-xs m-r-sm">
    from <a href>{{mail.from}}</a> on {{mail.date}}
  </div>
  <div class="wrapper">
    {{mail.content}}
  </div>
  <div class="wrapper">
    <div ng-repeat="attach in mail.attach" class="panel b-a inline m-r-sm m-b-sm bg-light">
      <div class="wrapper-xs b-b"><i class="fa fa-paperclip"></i> {{attach.name}}</div>
      <div class="wrapper-xs w-sm lt">
        <a ng-href="{{attach.url}}"><img ng-src="{{attach.url}}" class="img-full"></a>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="panel b-a">
      <div class="panel-heading ng-show" ng-hide="reply">
        <div class="m-b-lg">
        Click here to <a href class="text-u-l" ng-click="reply=!reply">Reply</a> or <a href class="text-u-l" ng-click="reply=!reply">Forward</a>
        </div>
      </div>
      <div class="ng-hide" ng-show="reply">
        <div class="panel-heading b-b b-light">
          {{mail.from}}
        </div>
        <div class="wrapper" contenteditable="true" style="min-height:100px"></div>
        <div class="panel-footer bg-light lt">
          <button class="btn btn-link pull-right" ng-click="reply=!reply"><i class="fa fa-trash-o"></i></button>
          <button class="btn btn-info w-xs font-bold">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
