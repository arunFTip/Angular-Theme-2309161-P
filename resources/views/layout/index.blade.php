<!DOCTYPE html>
<html ng-app="KnitsERP" lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="/images/icons/KnitsERPLogo.svg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title ng-bind="'Knits ERP  - '+title"></title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js" ></script>


<!-- AngularJS Material CSS now available via Google CDN; version 1.2.1 used here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css" rel="stylesheet" type="text/css">

    <!-- AngularJS Material Dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-animate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-moment/1.1.0/angular-moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-aria.min.js"></script>

    <!-- AngularJS Material Javascript now available via Google CDN; version 1.2.1 used here -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.6/angular-route.min.js"></script>

     <!-- ngTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
   {{-- New Theme --}}

    <link rel="stylesheet" href="css/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/app.css" type="text/css" />

    <script src="js/lib/angular-ui-router.js"></script>
    <script src="js/lib/ngStorage.js"></script>
    <script src="js/lib/ui-bootstrap-tpls.js"></script>

    <script type='text/javascript' src="app/app.js?29"></script>

    <!-- FtipBox -->
    <script src="https://api.sf3.in/ftipbox/v1/js/constant-json.js"></script>
    <script type="text/javascript">app.constant('USER',{data: {!! json_encode($user) !!} })</script>
    <script type='text/javascript' src="app/payrollRoute.js"></script>
    <script type='text/javascript' src="app/route.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="css/radiant.css?29" rel="stylesheet" type="text/css">
    <link href="css/theme.css?29" rel="stylesheet" type="text/css">
    @if($login==0)
        <script type='text/javascript' src="app/Controllers/LoginController.js?29"></script>
    @else

        <!-- Our app Dependencies -->
        @include('layout.dependency')

       <!-- Image Processing -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.css" />
       <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.js"></script>
        <script name="jquery-croper-script">
        !function(e,r){"object"==typeof exports&&"undefined"!=typeof module?r(require("jquery"),require("cropperjs")):"function"==typeof define&&define.amd?define(["jquery","cropperjs"],r):r(e.jQuery,e.Cropper)}(this,function(c,s){"use strict";if(c=c&&c.hasOwnProperty("default")?c.default:c,s=s&&s.hasOwnProperty("default")?s.default:s,c.fn){var e=c.fn.cropper,d="cropper";c.fn.cropper=function(p){for(var e=arguments.length,a=Array(1<e?e-1:0),r=1;r<e;r++)a[r-1]=arguments[r];var u=void 0;return this.each(function(e,r){var t=c(r),n="destroy"===p,o=t.data(d);if(!o){if(n)return;var f=c.extend({},t.data(),c.isPlainObject(p)&&p);o=new s(r,f),t.data(d,o)}if("string"==typeof p){var i=o[p];c.isFunction(i)&&((u=i.apply(o,a))===o&&(u=void 0),n&&t.removeData(d))}}),void 0!==u?u:this},c.fn.cropper.Constructor=s,c.fn.cropper.setDefaults=s.setDefaults,c.fn.cropper.noConflict=function(){return c.fn.cropper=e,this}}});
        </script>

        <!-- overhang Top Notification -->
        {{-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/overhang.min.css" />
        <script type="text/javascript" src="js/overhang.min.js"></script> --}}

        {{-- Date Range --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.0.7/compressor.js" ></script>

        <script src="//cdn.jsdelivr.net/underscorejs/1.5.1/underscore-min.js"></script>


        <style>
            html.bg {
                background: url({{$user->loginBg}}) !important;
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
    @endif
    <meta name="theme-color" content="{{$user['tabcolor']}}" />



</head>

<body id="body" style="top:0px!important;" >
    <section id="loading"><div id="loading-content"></div></section>
    @yield('content')
</body>

</html>
