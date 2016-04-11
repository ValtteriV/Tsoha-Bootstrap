<?php
  require 'app/models/pizza.php';
  require 'app/models/taytteet.php';
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
        $pizzat = Pizza::all();
        View::make('suunnitelmat/etusivu.html', array('pizza' => $pizzat));
    }
    
    public static function pizza(){
      View::make('suunnitelmat/pizza.html');
    }
    
    public static function tiettypizza($id){
        $pizza = Taytteet::getpizzataytteet($id);
        View::make('suunnitelmat/pizzamallilla.html', array('pizza' => $pizza->pizza, 'taytteet' => $pizza->taytteet));
    }
    
    public static function pizzanlisays(){
      View::make('suunnitelmat/pizzanlisays.html');
    }
    
    public static function store(){
        $params = $_POST;
        $pizza = new Pizza(array(
            'nimi' => $params['nimi'],
            'pizzanro' => $params['pizzanro'],
            'hinta' => $params['hinta']
        ));
        
        $pizza->save();
        
        Redirect::to('/pizza' . $pizza->pizzanro, array('message' => 'Pizza on lisätty onnistuneesti'));
    }
    
  }
