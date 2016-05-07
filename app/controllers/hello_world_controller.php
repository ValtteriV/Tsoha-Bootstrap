<?php
  require_once 'app/models/pizza.php';
  require_once 'app/models/taytteet.php';
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
        View::make('suunnitelmat/etusivu.html', array('pizzat' => $pizzat));
    }
    
    public static function pizza(){
      View::make('suunnitelmat/pizza.html');
    }
    
    public static function tiettypizza($id){
        $pizzantaytteet = Taytteet::getpizzataytteet($id);
        $pizza = Pizza::find_by_pizzanro($id);
        View::make('suunnitelmat/pizzamallilla.html', array('pizza' => $pizza, 'taytteet' => $pizzantaytteet));
    }
    
    public static function pizzanlisays(){
        $taytelista = Taytteet::all();
      View::make('suunnitelmat/pizzanlisays.html', array('taytteet' => $taytelista));
    }
    
    
    public static function store(){
        $params = $_POST;
        $pizza = new Pizza(array(
            'nimi' => $params['nimi'],
            'hinta' => $params['hinta']
        ));
        
        $pizza->save();
        foreach($params['taytteet'] as $tayte) {
            Pizza::taytesave($pizza->pizzanro, $tayte);
        }
        
        Redirect::to('/pizza/' . $pizza->pizzanro, array('message' => 'Pizza on lisätty onnistuneesti.'));
    }
    
    public static function taytteenlisaysnakyma($id){
        $pizza = Pizza::find_by_pizzanro($id);
        $taytteet = Taytteet::all();
        View::make('suunnitelmat/taytteenlisays.html', array('pizza' => $pizza, 'taytteet' => $taytteet));
    }
    
    public static function destroy($id) {
        $pizza = new Pizza(array('pizzanro' => $id));
        $pizza->destroy();
        Redirect::to('/etusivu', array('message' => 'Pizza on poistettu onnistuneesti.'));
    }
    
    public static function taytteenlisays($id) {
        $params = $_POST;
        foreach($params['taytteet'] as $tayte) {
            Pizza::taytesave($id, $tayte);
        }
        Redirect::to('/pizza/' . $id, array('message' => 'Täytteet lisätty onnistuneesti.'));
    }
    
    public static function taytteenpoistonakyma($id){
        $taytteet = Taytteet::getpizzataytteet($id);
        $pizza = Pizza::find_by_pizzanro($id);
        View::make('suunnitelmat/taytteenpoisto.html', array('pizza' => $pizza, 'taytteet' => $taytteet));
    }
    
    public static function taytteenpoisto($id){
        $params = $_POST;
        foreach($params['taytteet'] as $tayte) {
            Pizza::taytedelete($id, $tayte);
        }
        Redirect::to('/pizza/' . $id, array('message' => 'Taytteet lisätty onnistuneesti.'));
    }
    
  }
