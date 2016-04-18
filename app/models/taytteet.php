<?php

    require_once 'app/models/pizza.php';
    
    class Taytteet extends BaseModel {
        public $pizza, $taytteet;
        
        public function __construct($attributes) {
            parent::__construct($attributes);
        }
        
        public static function getpizzataytteet($pizzaid) {
            $taytekysely = DB:: connection()->prepare('SELECT * From Lisuke');
            $taytekysely->execute();
            $taytteet = $taytekysely->fetchAll();
            $query = DB::connection()->prepare('SELECT * FROM PizzaJaLisukkeet WHERE pizzanro = :pizzaid');
            $query->execute(array('pizzaid' => $pizzaid));
            $tulokset = $query->fetchAll();
            $pizzantaytteet = array();
            foreach($tulokset as $tulos) {
                $pizzantaytteet[] = $taytekysely[$tulos->lisukenro];
            }
            $pizza = Pizza::find_by_pizzanro($id);
            $tamapizza = new Taytteet(array('pizza' => $pizza, 'taytteet' => $pizzantaytteet));
            return $tamapizza;
        }
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

