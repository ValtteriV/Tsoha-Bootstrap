<?php

    require_once 'app/models/pizza.php';
    require_once 'app/models/tayte.php';
    
    class Taytteet extends BaseModel {
        public $pizza, $taytteet;
        
        public function __construct($attributes) {
            parent::__construct($attributes);
        }
        
        public static function all() {
            $taytekysely = DB::connection()->prepare('SELECT * FROM LISUKE');
            $taytekysely->execute();
            $taytteet = $taytekysely->fetchAll();
            $taytelista = array();
            
            foreach($taytteet as $tayte) {
                $taytelista[] = new Tayte(array('nimi' => $taytteet['nimi'], 'taytenro' => $taytteet['taytenro']));
            }
        }
        
        public static function getpizzataytteet($pizzaid) {
            $taytekysely = DB::connection()->prepare('SELECT * FROM Lisuke');
            $taytekysely->execute();
            $taytteet = $taytekysely->fetchAll();
            $query = DB::connection()->prepare('SELECT * FROM PizzaJaLisukkeet WHERE pizzanro = :pizzaid');
            $query->execute(array('pizzaid' => $pizzaid));
            $tulokset = $query->fetchAll();
            $pizzantaytteet = array();
            foreach($tulokset as $tulos) {
                $pizzantaytteet[] = new Tayte(array('nimi' => $taytteet[$tulos->lisukenro]));
            }
            $haepizza = Pizza::find_by_pizzanro($pizzaid);
            $pizza = new Pizza(array('pizzanro' => $haepizza['pizzanro'], 'hinta' => $haepizza['hinta'], 'nimi' => $haepizza['nimi']));
            $tamapizza = new Taytteet(array('pizza' => $pizza, 'taytteet' => $pizzantaytteet));
            return $tamapizza;
        }
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

