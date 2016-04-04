<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('home.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
    
    public static function etusivu(){
      View::make('suunnitelmat/etusivu.html');
    }
    
    public static function pizza(){
      View::make('suunnitelmat/pizza.html');
    }
    
    public static function pizzanlisays(){
      View::make('suunnitelmat/pizzanlisays.html');
    }
  }
