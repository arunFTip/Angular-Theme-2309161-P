'use strict';

/**
 * Config for the router
 */
angular.module('app')
    .run(
        ['$rootScope', '$state', '$stateParams',
            function($rootScope, $state, $stateParams) {
                $rootScope.$state = $state;
                $rootScope.$stateParams = $stateParams;
            }
        ]
    )
    .config(
        ['$stateProvider', '$urlRouterProvider', 'JQ_CONFIG', 'MODULE_CONFIG',
            function($stateProvider, $urlRouterProvider, JQ_CONFIG, MODULE_CONFIG) {
                var layout = "views/tpl.app";
                if (window.location.href.indexOf("material") > 0) {
                    layout = "views/tpl.blocks/material.layout";
                    $urlRouterProvider
                        .otherwise('/app/dashboard-v3');
                } else {
                    $urlRouterProvider
                        .otherwise('/app/dashboard-v1');
                }

                $stateProvider
                    .state('app', {
                        abstract: true,
                        url: '/app',
                        templateUrl: layout
                    })
                    .state('app.dashboard-v1', {
                        url: '/dashboard-v1',
                        templateUrl: 'views/tpl.app_dashboard_v1',
                        resolve: load(['js/controllers/chart.js'])
                    })
                    .state('app.dashboard-v2', {
                        url: '/dashboard-v2',
                        templateUrl: 'views/tpl.app_dashboard_v2',
                        resolve: load(['js/controllers/chart.js'])
                    })
                    .state('app.dashboard-v3', {
                        url: '/dashboard-v3',
                        templateUrl: 'views/tpl.app_dashboard_v3',
                        resolve: load(['js/controllers/chart.js'])
                    })
                    .state('app.ui', {
                        url: '/ui',
                        template: '<div ui-view class="fade-in-up"></div>'
                    })
                    .state('app.ui.buttons', {
                        url: '/buttons',
                        templateUrl: 'views/tpl.ui_buttons'
                    })
                    .state('app.ui.icons', {
                        url: '/icons',
                        templateUrl: 'views/tpl.ui_icons'
                    })
                    .state('app.ui.grid', {
                        url: '/grid',
                        templateUrl: 'views/tpl.ui_grid'
                    })
                    .state('app.ui.widgets', {
                        url: '/widgets',
                        templateUrl: 'views/tpl.ui_widgets'
                    })
                    .state('app.ui.bootstrap', {
                        url: '/bootstrap',
                        templateUrl: 'views/tpl.ui_bootstrap'
                    })
                    .state('app.ui.sortable', {
                        url: '/sortable',
                        templateUrl: 'views/tpl.ui_sortable'
                    })
                    .state('app.ui.scroll', {
                        url: '/scroll',
                        templateUrl: 'views/tpl.ui_scroll',
                        resolve: load('js/controllers/scroll.js')
                    })
                    .state('app.ui.portlet', {
                        url: '/portlet',
                        templateUrl: 'views/tpl.ui_portlet'
                    })
                    .state('app.ui.timeline', {
                        url: '/timeline',
                        templateUrl: 'views/tpl.ui_timeline'
                    })
                    .state('app.ui.tree', {
                        url: '/tree',
                        templateUrl: 'views/tpl.ui_tree',
                        resolve: load(['angularBootstrapNavTree', 'js/controllers/tree.js'])
                    })
                    .state('app.ui.toaster', {
                        url: '/toaster',
                        templateUrl: 'views/tpl.ui_toaster',
                        resolve: load(['toaster', 'js/controllers/toaster.js'])
                    })
                    .state('app.ui.jvectormap', {
                        url: '/jvectormap',
                        templateUrl: 'views/tpl.ui_jvectormap',
                        resolve: load('js/controllers/vectormap.js')
                    })
                    .state('app.ui.googlemap', {
                        url: '/googlemap',
                        templateUrl: 'views/tpl.ui_googlemap',
                        resolve: load(['js/app/map/load-google-maps.js', 'js/app/map/ui-map.js', 'js/app/map/map.js'], function() { return loadGoogleMaps(); })
                    })
                    .state('app.chart', {
                        url: '/chart',
                        templateUrl: 'views/tpl.ui_chart',
                        resolve: load('js/controllers/chart.js')
                    })
                    // table
                    .state('app.table', {
                        url: '/table',
                        template: '<div ui-view></div>'
                    })
                    .state('app.table.static', {
                        url: '/static',
                        templateUrl: 'views/tpl.table_static'
                    })
                    .state('app.table.datatable', {
                        url: '/datatable',
                        templateUrl: 'views/tpl.table_datatable'
                    })
                    .state('app.table.footable', {
                        url: '/footable',
                        templateUrl: 'views/tpl.table_footable'
                    })
                    .state('app.table.grid', {
                        url: '/grid',
                        templateUrl: 'views/tpl.table_grid',
                        resolve: load(['ngGrid', 'js/controllers/grid.js'])
                    })
                    .state('app.table.uigrid', {
                        url: '/uigrid',
                        templateUrl: 'views/tpl.table_uigrid',
                        resolve: load(['ui.grid', 'js/controllers/uigrid.js'])
                    })
                    .state('app.table.editable', {
                        url: '/editable',
                        templateUrl: 'views/tpl.table_editable',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'js/controllers/xeditable.js'])
                    })
                    .state('app.table.smart', {
                        url: '/smart',
                        templateUrl: 'views/tpl.table_smart',
                        resolve: load(['smart-table', 'js/controllers/table.js'])
                    })
                    // form
                    .state('app.form', {
                        url: '/form',
                        template: '<div ui-view class="fade-in"></div>',
                        resolve: load('js/controllers/form.js')
                    })
                    .state('app.form.components', {
                        url: '/components',
                        templateUrl: 'views/tpl.form_components',
                        resolve: load(['ngBootstrap', 'daterangepicker', 'js/controllers/form.components.js'])
                    })
                    .state('app.form.elements', {
                        url: '/elements',
                        templateUrl: 'views/tpl.form_elements'
                    })
                    .state('app.form.validation', {
                        url: '/validation',
                        templateUrl: 'views/tpl.form_validation'
                    })
                    .state('app.form.wizard', {
                        url: '/wizard',
                        templateUrl: 'views/tpl.form_wizard'
                    })
                    .state('app.form.fileupload', {
                        url: '/fileupload',
                        templateUrl: 'views/tpl.form_fileupload',
                        resolve: load(['angularFileUpload', 'js/controllers/file-upload.js'])
                    })
                    .state('app.form.imagecrop', {
                        url: '/imagecrop',
                        templateUrl: 'views/tpl.form_imagecrop',
                        resolve: load(['ngImgCrop', 'js/controllers/imgcrop.js'])
                    })
                    .state('app.form.select', {
                        url: '/select',
                        templateUrl: 'views/tpl.form_select',
                        controller: 'SelectCtrl',
                        resolve: load(['ui.select', 'js/controllers/select.js'])
                    })
                    .state('app.form.slider', {
                        url: '/slider',
                        templateUrl: 'views/tpl.form_slider',
                        controller: 'SliderCtrl',
                        resolve: load(['vr.directives.slider', 'js/controllers/slider.js'])
                    })
                    .state('app.form.editor', {
                        url: '/editor',
                        templateUrl: 'views/tpl.form_editor',
                        controller: 'EditorCtrl',
                        resolve: load(['textAngular', 'js/controllers/editor.js'])
                    })
                    .state('app.form.xeditable', {
                        url: '/xeditable',
                        templateUrl: 'views/tpl.form_xeditable',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'js/controllers/xeditable.js'])
                    })
                    // pages
                    .state('app.page', {
                        url: '/page',
                        template: '<div ui-view class="fade-in-down"></div>'
                    })
                    .state('app.page.profile', {
                        url: '/profile',
                        templateUrl: 'views/tpl.page_profile'
                    })
                    .state('app.page.post', {
                        url: '/post',
                        templateUrl: 'views/tpl.page_post'
                    })
                    .state('app.page.search', {
                        url: '/search',
                        templateUrl: 'views/tpl.page_search'
                    })
                    .state('app.page.invoice', {
                        url: '/invoice',
                        templateUrl: 'views/tpl.page_invoice'
                    })
                    .state('app.page.price', {
                        url: '/price',
                        templateUrl: 'views/tpl.page_price'
                    })
                    .state('app.docs', {
                        url: '/docs',
                        templateUrl: 'views/tpl.docs'
                    })
                    // others
                    .state('lockme', {
                        url: '/lockme',
                        templateUrl: 'views/tpl.page_lockme'
                    })
                    .state('access', {
                        url: '/access',
                        template: '<div ui-view class="fade-in-right-big smooth"></div>'
                    })
                    .state('access.signin', {
                        url: '/signin',
                        templateUrl: 'views/tpl.page_signin',
                        resolve: load(['js/controllers/signin.js'])
                    })
                    .state('access.signup', {
                        url: '/signup',
                        templateUrl: 'views/tpl.page_signup',
                        resolve: load(['js/controllers/signup.js'])
                    })
                    .state('access.forgotpwd', {
                        url: '/forgotpwd',
                        templateUrl: 'views/tpl.page_forgotpwd'
                    })
                    .state('access.404', {
                        url: '/404',
                        templateUrl: 'views/tpl.page_404'
                    })

                // fullCalendar
                .state('app.calendar', {
                    url: '/calendar',
                    templateUrl: 'views/tpl.app_calendar',
                    // use resolve to load other dependences
                    resolve: load(['moment', 'fullcalendar', 'ui.calendar', 'js/app/calendar/calendar.js'])
                })

                // mail
                .state('app.mail', {
                        abstract: true,
                        url: '/mail',
                        templateUrl: 'views/tpl.mail',
                        // use resolve to load other dependences
                        resolve: load(['js/app/mail/mail.js', 'js/app/mail/mail-service.js', 'moment'])
                    })
                    .state('app.mail.list', {
                        url: '/inbox/{fold}',
                        templateUrl: 'views/tpl.mail.list'
                    })
                    .state('app.mail.detail', {
                        url: '/{mailId:[0-9]{1,4}}',
                        templateUrl: 'views/tpl.mail.detail'
                    })
                    .state('app.mail.compose', {
                        url: '/compose',
                        templateUrl: 'views/tpl.mail.new'
                    })

                .state('layout', {
                        abstract: true,
                        url: '/layout',
                        templateUrl: 'views/tpl.layout'
                    })
                    .state('layout.fullwidth', {
                        url: '/fullwidth',
                        views: {
                            '': {
                                templateUrl: 'views/tpl.layout_fullwidth'
                            },
                            'footer': {
                                templateUrl: 'views/tpl.layout_footer_fullwidth'
                            }
                        },
                        resolve: load(['js/controllers/vectormap.js'])
                    })
                    .state('layout.mobile', {
                        url: '/mobile',
                        views: {
                            '': {
                                templateUrl: 'views/tpl.layout_mobile'
                            },
                            'footer': {
                                templateUrl: 'views/tpl.layout_footer_mobile'
                            }
                        }
                    })
                    .state('layout.app', {
                        url: '/app',
                        views: {
                            '': {
                                templateUrl: 'views/tpl.layout_app'
                            },
                            'footer': {
                                templateUrl: 'views/tpl.layout_footer_fullwidth'
                            }
                        },
                        resolve: load(['js/controllers/tab.js'])
                    })
                    .state('apps', {
                        abstract: true,
                        url: '/apps',
                        templateUrl: 'views/tpl.layout'
                    })
                    .state('apps.note', {
                        url: '/note',
                        templateUrl: 'views/tpl.apps_note',
                        resolve: load(['js/app/note/note.js', 'moment'])
                    })
                    .state('apps.contact', {
                        url: '/contact',
                        templateUrl: 'views/tpl.apps_contact',
                        resolve: load(['js/app/contact/contact.js'])
                    })
                    .state('app.weather', {
                        url: '/weather',
                        templateUrl: 'views/tpl.apps_weather',
                        resolve: load(['js/app/weather/skycons.js', 'angular-skycons', 'js/app/weather/ctrl.js', 'moment'])
                    })
                    .state('app.todo', {
                        url: '/todo',
                        templateUrl: 'views/tpl.apps_todo',
                        resolve: load(['js/app/todo/todo.js', 'moment'])
                    })
                    .state('app.todo.list', {
                        url: '/{fold}'
                    })
                    .state('app.note', {
                        url: '/note',
                        templateUrl: 'views/tpl.apps_note_material',
                        resolve: load(['js/app/note/note.js', 'moment'])
                    })
                    .state('music', {
                        url: '/music',
                        templateUrl: 'views/tpl.music',
                        controller: 'MusicCtrl',
                        resolve: load([
                            'com.2fdevs.videogular',
                            'com.2fdevs.videogular.plugins.controls',
                            'com.2fdevs.videogular.plugins.overlayplay',
                            'com.2fdevs.videogular.plugins.poster',
                            'com.2fdevs.videogular.plugins.buffering',
                            'js/app/music/ctrl.js',
                            'js/app/music/theme.css'
                        ])
                    })
                    .state('music.home', {
                        url: '/home',
                        templateUrl: 'views/tpl.music.home'
                    })
                    .state('music.genres', {
                        url: '/genres',
                        templateUrl: 'views/tpl.music.genres'
                    })
                    .state('music.detail', {
                        url: '/detail',
                        templateUrl: 'views/tpl.music.detail'
                    })
                    .state('music.mtv', {
                        url: '/mtv',
                        templateUrl: 'views/tpl.music.mtv'
                    })
                    .state('music.mtvdetail', {
                        url: '/mtvdetail',
                        templateUrl: 'views/tpl.music.mtv.detail'
                    })
                    .state('music.playlist', {
                        url: '/playlist/{fold}',
                        templateUrl: 'views/tpl.music.playlist'
                    })
                    .state('app.material', {
                        url: '/material',
                        template: '<div ui-view class="wrapper-md"></div>',
                        resolve: load(['js/controllers/material.js'])
                    })
                    .state('app.material.button', {
                        url: '/button',
                        templateUrl: 'views/tpl.material/button'
                    })
                    .state('app.material.color', {
                        url: '/color',
                        templateUrl: 'views/tpl.material/color'
                    })
                    .state('app.material.icon', {
                        url: '/icon',
                        templateUrl: 'views/tpl.material/icon'
                    })
                    .state('app.material.card', {
                        url: '/card',
                        templateUrl: 'views/tpl.material/card'
                    })
                    .state('app.material.form', {
                        url: '/form',
                        templateUrl: 'views/tpl.material/form'
                    })
                    .state('app.material.list', {
                        url: '/list',
                        templateUrl: 'views/tpl.material/list'
                    })
                    .state('app.material.ngmaterial', {
                        url: '/ngmaterial',
                        templateUrl: 'views/tpl.material/ngmaterial'
                    });

                function load(srcs, callback) {
                    return {
                        deps: ['$ocLazyLoad', '$q',
                            function($ocLazyLoad, $q) {
                                var deferred = $q.defer();
                                var promise = false;
                                srcs = angular.isArray(srcs) ? srcs : srcs.split(/\s+/);
                                if (!promise) {
                                    promise = deferred.promise;
                                }
                                angular.forEach(srcs, function(src) {
                                    promise = promise.then(function() {
                                        if (JQ_CONFIG[src]) {
                                            return $ocLazyLoad.load(JQ_CONFIG[src]);
                                        }
                                        angular.forEach(MODULE_CONFIG, function(module) {
                                            if (module.name == src) {
                                                name = module.name;
                                            } else {
                                                name = src;
                                            }
                                        });
                                        return $ocLazyLoad.load(name);
                                    });
                                });
                                deferred.resolve();
                                return callback ? promise.then(function() { return callback(); }) : promise;
                            }
                        ]
                    }
                }


            }
        ]
    );