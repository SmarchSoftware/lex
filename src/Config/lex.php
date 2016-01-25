<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Master Layout
    |--------------------------------------------------------------------------
    |
    | Lex comes with the form/pages needed to operate. It is assumed and
    | expected that you already have your own master layout to use.
    |
    |
    */
   'layout' => 'layouts.app',

    /*
    |--------------------------------------------------------------------------
    | Content Section name
    |--------------------------------------------------------------------------
    |
    | In your master layout, this is the name of the section that your master
    | layout uses. Lex will use this name for it's sectional content.
    |
    | i.e. if you use yield('content') in your master layout for the position
    | where you want Lex to appear then the section is called "content".
    |
    */
   'section' => 'content',

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | Lex comes pre-equipped with views that will work right out of the box.
    | However, you are free to define you own views to use here instead.
    |
    */   
   'views' => [
        'index'         => 'lex::index',            
        'create'        => 'lex::create',
        'show'          => 'lex::edit',
        'edit'          => 'lex::edit',
        'unauthorized'  => 'lex::unauthorized'
    ],

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Title header of the index page and other views.
    |
    */   
   'title' => 'Lex Currency',

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | How many currencies to load per page?
    |
    */   
   'pagination' => '15',

    /*
    |--------------------------------------------------------------------------
    | Authorization ?
    |--------------------------------------------------------------------------
    |
    | Out of the box, Lex can optionally use Laravel's built in authorization
    | methods. If you wish to make use of them, switch the enable param
    | to true and then use the permissions that your app requires.
    |
    | Note : Lex itself  does not provide authorization and when/if you
    | decide to enable the ACL options, the Auth::user() methods "can"
    | "can" and "cannot" must already have those permissions defined.
    | Installing/enabling authorization is outside Lex's scope.
    |
    | ACL overview :
    | 'enable' true/false
    | 'driver' [ "laravel" or "shinobi" or "sentinel" ]
    | 'index' is to view the index page.
    | 'create' is to create new currencies.
    | 'show' is to view individual currencies.
    | 'edit' is to change existing currencies.
    | 'destroy' is to delete existing currencies.
    |
    */  
   'acl' => [
        'enable'    => false,
        'driver'    => 'laravel',
        'index'     => 'lex.index',            
        'create'    => 'lex.create',
        'show'      => 'lex.show',
        'edit'      => 'lex.edit',
        'destroy'   => 'lex.destroy'       
    ],


    /*
    |--------------------------------------------------------------------------
    | Route Options
    |--------------------------------------------------------------------------
    |
    | If you want to prefix all your watchtower routes, enter the prefix here.
    | https://laravel.com/docs/5.2/routing#route-group-prefixes for info.
    | 
    | i.e 'route_prefix' => 'admin' will change your urls to look
    | like 'http://<yoursite>/admin/watchtower/user' instead of
    | 'http://<yoursite>/watchtower/user'. Default is none.
    |
    | If you want to use something other than "watchtower" in your named routes
    | you can specify it here.
    |
    */
    'route' => [
        'prefix'    => '',
        'as'        => 'lex.',
        'middleware'=> (str_contains( app()->version(), '5.2') ? 'web' : '')
    ],

];