### Alpha release Jan 15, 2016.

This is probably only of use to me, but I have need of it in multiple apps so I packaged it up in case you want it too. :)

***

# Lex
A game-currency management package. Everything need to add / edit / manage your game's version of currency _(pennies, dollars, gold, silver, bucks, dineros, crystals, pounds, etc...)_ and their relation to each other. Set your lowest form currency _(for example - penny)_ and then add "higher value" / "lower value" / "different value" versions of that base. _(i.e. "dollar" = "100" base currency, "silver" = "1350" base value)_.

## Overview

Out of the box, Lex contains all the views necessary to enable "Game Currency" management. It also uses the config file to for you to easily define the necessary permissions to secure your site so that only those allowed to perform the admin functions are permitted _(or you can disable ACL altogether)_. Since it is a config file all views and permissions are configurable so you are free to provide your own views and change the permissions the way your app requires them.

Lex will do the math for you.

Lex will also let you set options on the currencies you add. Perhaps your "gold" can't be bought or sold or traded, only found. Sure, you can do that. Or maybe you decide you don't want your game to use "silver" any more. De-value it or disable it altogether.

Lex also comes with a config file that will allow you to specify the routes, views and / or permissions.

If you have a need for in-game currency management this will be a package to help with that.

## Installation

This page is intended for installation, please check out the wiki for more information about usage.

#### :black_square_button: Composer

    composer require "smarch/lex"

#### :pencil: Service Provider

Lex uses the [HTML Forms](https://laravelcollective.com/docs/5.1/html) package from the "Laravel Collective" for Html & Form rendering so composer will install that as well if you don't already have it installed _(you probably do...or should)_. Once composer has installed the necessary packages for Lex to function you need to open your laravel config page for service providers and add Lex _(and if necessary the Laravel Collective Html provider)_. To properly function you need to have both service providers referenced : [HTML Forms](https://laravelcollective.com/docs/5.1/html) and Lex.

*config/app.php*
       
       /*
        * Third Party Service Providers
        */
        Collective\Html\HtmlServiceProvider::class, // For Lex Currency Forms to function
        Smarch\Lex\LexServiceProvider::class, // For Lex

#### :pencil: Facades
Next you will need to add the Lex and Forms Facades to your config app file.

*config/app.php*

        /*
        * Third Party Service Providers
        */
        'Form'  => Collective\Html\FormFacade::class,	// required for Lex Forms
        'HTML'  => Collective\Html\HtmlFacade::class,	// required for Lex Forms
        'Lex'	=> Smarch\Lex\LexFacade::class,

#### :card_index: Database Migrations / Seeds

Next you need to add the migration to create the Lex Currency table to hold your game-currency information. From your command prompt (wherever you run your artisan commands) enter the following command <kbd>php artisan vendor:publish</kbd> and then <kbd>php artisan migrate</kbd>. This should properly create your necessary tables AND create the Lex config file *(which allows you to define any views / permissions you wish to change from their defaults)*.

    php artisan vendor:publish
    php artisan migrate

> :exclamation: Optional - DatabaseSeed
> 
> Lex comes equipped with a database seed that can start off your game-currency with some common currencies.
    
    php artisan db:seed --class Smarch\Lex\Seeds\LexTableSeeder     

#### :trident: Why "Lex"?
I've been a DC geek for over 30 years now. Lex Luther in DC has always been "the money guy" for me so..."Lex". :smile:
   