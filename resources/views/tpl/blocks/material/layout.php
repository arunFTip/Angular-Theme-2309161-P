	<div ng-init="app.settings.container = false;" class="md-navbar navbar blue md-whiteframe-z1" data-ng-include=" 'views/tpl.blocks.material.header' " >
	</div>
	<div layout="row">
	  <!-- menu -->
	  <div flex class="bg-white md-whiteframe-z0 md-aside md-content hidden-xs" data-ng-include=" 'views/tpl.blocks.material.aside' ">
	  </div>
	  <!-- / menu -->

	  <!-- view -->
	  <div flex layout="column">
	  	<div ui-butterbar></div>
    	<a href class="off-screen-toggle hide" ui-toggle-class="off-screen" data-target=".md-aside" ></a>
	  	<div class="md-content" ui-view></div>
	  </div>
	  <!-- / view -->
	</div>
