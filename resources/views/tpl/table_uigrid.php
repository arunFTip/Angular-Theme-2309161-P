<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">uiGrid</h1>
</div>
<div class="wrapper-md" ng-controller="UiGridDemoCtrl">
  <h4>Basic Example</h4>
    <div class="table-responsive m-b-lg">
      <div ui-grid="gridOptionsSimple"></div>
    </div>

  <h4>Complex Example</h4>
	<div class="table-responsive">
	  <div ui-grid="gridOptionsComplex" ui-grid-edit ui-grid-resize-columns ></div>
	</div>
</div>
