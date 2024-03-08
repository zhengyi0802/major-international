<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'Joylife Manager',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => 'Joylife Manager',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => '',
    'password_reset_url' => '',
    'password_email_url' => '',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav'       => false,
        ],
        [
            'text'         => 'Project',
            'topnav'       => true,
            'submenu'      => [
            ],
        ],
        [
            'text'         => 'Language',
            'topnav_right' => true,
            'icon'         => 'fas fa-fw fa-flag',
            'submenu'      => [
                [
                     'text' => 'English',
                     'icon' => 'flag-icon flag-icon-us flag-icon-square',
                     'url'  => 'lang/en-US',
                ],
                [
                     'text' => 'Tailand',
                     'icon' => 'flag-icon flag-icon-th flag-icon-square',
                     'url'  => 'lang/th',
                ],
                [
                     'text' => 'Chinese(Simple)',
                     'icon' => 'flag-icon flag-icon-cn flag-icon-square',
                     'url'  => 'lang/zh-CN',
                ],
                [
                     'text' => 'Chinese(Traditional)',
                     'icon' => 'flag-icon flag-icon-tw flag-icon-square',
                     'url'  => 'lang/zh-TW',
                ],
            ],
        ],
/*
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        [
            'text'         => 'search',
            'search'       => true,
            'topnav_right' => true,
        ],
        [   'header' => 'backend_system',
            'can'    => 'operator-only',
        ],

        [
            'text'         => 'packages_manager',
            'url'          => 'packages',
            'label_color'  => 'success',
            'can'          => 'manager-only',
        ],
*/
        [   'text'         => 'apps',
            'can'          => 'manager-only',
            'icon'         => 'fas fa-fw fa-laptop',
            'submenu'      => [
              [
                    'text'         => 'apkmanagers',
                    'url'          => 'apkmanagers',
                    'label_color'  => 'success',
                    'icon'         => 'fas fa-fw fa-square',
                    'can'          => 'manager-only',
              ],
              [
                    'text'         => 'onekeyinstallers',
                    'url'          => 'onekeyinstallers',
                    'label_color'  => 'success',
                    'icon'         => 'fas fa-fw fa-star-o',
                    'can'          => 'manager-only',
              ],
              [
                    'text'         => 'hotapps',
                    'url'          => 'hotapps',
                    'label_color'  => 'success',
                    'icon'         => 'fas fa-fw fa-star',
                    'can'          => 'manager-only',
              ],
              [
                    'text'         => 'appmanagers',
                    'url'          => 'appmanagers',
                    'label_color'  => 'success',
                    'icon'         => 'fas fa-fw fa-shopping-bag',
                    'can'          => 'manager-only',
              ],
            ],
        ],
/*
        [   'text'    => 'videomanager',
            'can'     => 'admin-only',
            'icon'    => 'fas fa-fw fa-film',
            'submenu' => [
               [
                    'text'        => 'videocatagories',
                    'url'         => 'videocatagories',
                    'icon'        => 'fas fa-fw fa-folder',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'videos',
                    'url'         => 'videos',
                    'icon'        => 'fas fa-fw fa-file-video',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'youtube',
                    'url'         => 'youtube/home',
                    'label_color' => 'success',
                    'icon'        => 'fas fa-fw fa-tv',
                    'can'         => 'admin-only',
               ],
            ],
        ],
*/
        [   'text'    => 'pages_manager',
            'can'     => 'operator-only',
            'icon'    => 'fas fa-fw fa-home',
            'submenu' => [
               [
                    'text'        => 'startpage',
                    'url'         => 'startpages',
                    'label_color' => 'success',
               ],
/*
               [
                    'text'        => 'pages',
                    'url'         => 'frontend_views',
                    'icon'        => 'far fa-fw fa-file',
                    'label_color' => 'success',
               ],
*/
               [
                    'text'        => 'logos',
                    'url'         => 'logos',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
               ],
               [
                    'text'        => 'businesses',
                    'url'         => 'businesses',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'advertisings',
                    'url'         => 'advertisings',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'mainvideos',
                    'url'         => 'mainvideos',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'appmenus',
                    'url'         => 'appmenus',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
               ],
               [
                    'text'        => 'bulletinmanager',
                    'submenu'     => [
                        [
                           'text'        => 'bulletins',
                           'url'         => 'bulletins',
                           'label_color' => 'success',
                        ],
                        [
                           'text'        => 'bulletinitems',
                           'url'         => 'bulletinitems',
                           'label_color' => 'success',
                           'can'         => 'operator-only',
                        ],
                    ],
               ],
               [
                    'text'        => 'menus',
                    'url'         => 'menus',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
               ],
               [
                    'text'        => 'appadvertisings',
                    'url'         => 'appadvertisings',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'voicesettings',
                    'url'         => 'voicesettings',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
               ],
               [
                    'text'        => 'marquees',
                    'url'         => 'marquees',
                    'label_color' => 'success',
               ],
               [
                    'text'        => 'qamanager',
                    'can'         => 'manager-only',
                    'submenu'     => [
                        [
                           'text'        => 'qacatagories',
                           'url'         => 'qacatagories',
                           'label_color' => 'success',
                        ],
                        [
                           'text'        => 'qalists',
                           'url'         => 'qalists',
                           'label_color' => 'success',
                        ],
                    ],
               ],
               [
                    'text'        => 'customersupports',
                    'url'         => 'customersupports',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
               ],
               [
                    'text'        => 'elearningmanager',
                    'submenu'     => [
                        [
                            'text'        => 'elearningcatagories',
                            'url'         => 'elearningcatagories',
                            'label_color' => 'success',
                        ],
                        [
                            'text'        => 'elearnings',
                            'url'         => 'elearnings',
                            'label_color' => 'success',
                        ],
                    ],
               ],
               [
                    'text'        => 'mediamanager',
                    'submenu'     => [
                         [
                             'text'        => 'mediacatagories',
                             'url'         => 'mediacatagories',
                             'label_color' => 'success',
                         ],
                         [
                             'text'        => 'mediacontents',
                             'url'         => 'mediacontents',
                             'label_color' => 'success',
                         ],
                     ],
               ],
            ],
        ],
        [   'text'    => 'product_manager',
            'can'     => 'operator-only',
            'icon'    => 'fas fa-fw fa-microchip',
            'submenu' =>  [
                [
                    'text'        => 'product_catagories',
                    'url'         => 'product_catagories',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
                ],
                [
                    'text'        => 'product_types',
                    'url'         => 'product_types',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
                ],
                [
                    'text'        => 'product_statuses',
                    'url'         => 'product_statuses',
                    'label_color' => 'success',
                    'can'         => 'admin-only',
                ],
                [
                    'text'        => 'products',
                    'url'         => 'products',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
                ],
/*
                [
                    'text'        => 'warranties',
                    'url'         => 'warranties',
                    'label_color' => 'success',
                    'can'         => 'manager-only',
                ],
*/
                [
                    'text'        => 'productrecords',
                    'url'         => 'product_records',
                    'label_color' => 'success',
                ],
                [
                    'text'        => 'logmessages',
                    'url'         => 'logmessages',
                    'icon'        => 'fas fa-fw fa-history',
                    'label_color' => 'success',
                ],
            ],
        ],
        [   'text' => 'project_manager',
            'can'  => 'manager-only',
            'icon' => 'fas fa-fw fa-cogs',
            'submenu' => [
                [
                    'text'        => 'projects',
                    'url'         => 'projects',
                    'icon'        => 'fas fa-fw fa-cogs',
                    'label_color' => 'success',
                ],
            ],
        ],
        [   'header' => 'backend_manager',
            'can'  => 'manage-backends',
        ],
        [
            'text' => 'managers',
            'url'  => 'managers',
            'icon' => 'fas fa-fw fa-user',
            'can'  => 'manage-managers',
        ],
/*
        [
            'text' => 'product_queries',
            'url'  => 'product_queries',
            'icon' => 'fas fa-fw fa-random',
            'can'  => 'admin-only',
        ],
        [
            'text' => 'apitests',
            'url'  => 'apitests',
            'icon' => 'fas fa-fw fa-random',
            'can'  => 'admin-only',
        ],
        [
            'text' => 'orders',
            'url'  => 'orders',
            'icon' => 'fas fa-fw fa-random',
            'can'  => 'admin-only',
        ],
        [
            'text' => 'resellers',
            'url'  => 'resellers',
            'icon' => 'fas fa-fw fa-lock',
            'can'  => 'manage-resellers',
        ],
        [
            'text' => 'members',
            'url'  => 'members',
            'icon' => 'fas fa-fw fa-lock',
            'can'  => 'manage-members',
        ],
*/
        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/profile',
            'icon' => 'fas fa-fw fa-user-plus',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/change_password',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text' => 'language',
        ],
/*
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'DatatablesPlugins' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'flagIconCss' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'vendor/flag-icon-css/css/flag-icon.css',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'BootstrapSelect' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
