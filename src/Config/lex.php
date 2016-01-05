<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Overview of config
    |--------------------------------------------------------------------------
    |
    | This config might look a little long, but it allows a lot of flexibility.
    | You can choose your own views for each page, and the permissions (if
    | any at all) required to access all the different sections.
    |
    |--------------------------------------------------------------------------
    | Default bootstrap theme
    |--------------------------------------------------------------------------
    |
    | Choose the one you want from https://www.bootstrapcdn.com/bootswatch/
    |
    | Lex will check if there is a "theme" defined in Auth->user() and 
    | use that one if one is found, othewise it will use the default.
    |
    */   
   'layout' => 'watchtower::layouts.master',
   'secton' => 'content',

];