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
        'index'     => 'lex::index',            
        'create'    => 'lex::create',
        'show'      => 'lex::show',
        'edit'      => 'lex::edit'       
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
    | Shinobi
    |--------------------------------------------------------------------------
    |
    | If you use Shinobi for your ACL, enable the ACL functions and specify
    | the authorize permissions for the different Lex functions.
    |
    *  
   'acl' => [
        'enable'    => false;
        'index'     => 'lex.view',            
        'create'    => 'lex.create',
        'show'      => 'lex.show',
        'edit'      => 'lex.edit'       
    ],
    /* */

];