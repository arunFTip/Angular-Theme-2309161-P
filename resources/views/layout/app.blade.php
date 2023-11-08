@extends('layout.index')
@section('content')
        <div ng-controller="HomeController"  class="app" id="app" ng-class="{'app-header-fixed':DATA.TABLE.theme.data.headerFixed, 'app-aside-fixed':DATA.TABLE.theme.data.asideFixed, 'app-aside-folded':DATA.TABLE.theme.data.asideFolded, 'app-aside-dock':DATA.TABLE.theme.data.asideDock, 'container':DATA.TABLE.theme.data.container}" ui-view></div>
@endsection
