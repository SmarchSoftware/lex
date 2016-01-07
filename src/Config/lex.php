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
   'layout' => 'watchtower::layouts.master',

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
    | By default, Lex can optionally use Laravel's built in authorization
    | methods. If you wish to make use of them, switch the enable param
    | to true and then use the permissions or roles your app requires.
    |
    | All options can be either a defined permission or defined role
    | name. Note : Lex itself  does not provide authorization and
    | if you decide to enable the ACL options, the Auth::user()
    | methods "can" and "cannot" must already have the roles 
    | and permissions defined. That is outside Lex's scope.
    |
    | ACL overview :
    | 'index' is to view the index page.
    | 'create' is to create new currencies.
    | 'show' is to view individual currencies.
    | 'edit' is to change existing currencies.
    | 'destroy' is to delete existing currencies.
    |
    */  
   'acl' => [
        'enable'    => true,
        'index'     => 'lex.index',            
        'create'    => 'lex.create',
        'show'      => 'lex.show',
        'edit'      => 'lex.edit',
        'destroy'   => 'lex.destroy'       
    ],
    /* */

];