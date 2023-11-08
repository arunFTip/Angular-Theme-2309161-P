  <!-- navbar -->
  <div data-ng-include=" 'views/tpl.blocks.header.music' " class="app-header navbar">
  </div>
  <!-- / navbar -->

  <!-- menu -->
  <div data-ng-include=" 'views/tpl.blocks.aside.music' " class="app-aside hidden-xs {{app.settings.asideColor}}">
  </div>
  <!-- / menu -->

  <!-- content -->
  <div class="app-content">
    <div ui-butterbar></div>
    <a href class="off-screen-toggle hide" ui-toggle-class="off-screen" data-target=".app-aside" ></a>
    <div class="app-content-body fade-in-up" ui-view>

    </div>
  </div>
  <!-- /content -->

  <!-- footer -->
  <div class="app-footer app-footer-fixed" data-ng-include=" 'views/tpl.music.player' ">
  </div>
  <!-- / footer -->

  <div data-ng-include=" 'views/tpl.blocks.settings' " class="settings panel panel-default">
  </div>