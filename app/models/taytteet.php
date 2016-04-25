<?php

    require_once 'app/models/pizza.php';
    require_once 'app/models/tayte.php';
    
    class Taytteet extends BaseModel {
        public $pizza, $taytteet;
        
        public function __construct($attributes) {
            parent::__construct($attributes);
        }
        
        public static function all() {
            $taytekysely = DB::connection()->prepare('SELECT * FROM Lisuke');
            $taytekysely->execute();
            $taytteet = $taytekysely->fetchAll();
            $taytelista = array();
            
            foreach($taytteet as $tayte) {
                $taytelista[] = new Tayte(array('nimi' => $tayte['nimi'], 'taytenro' => $tayte['lisukenro']));
            }
            return $taytelista;
        }
        
        public static function getpizzataytteet($pizzaid) {
            $taytteet = Taytteet::all();
            $query = DB::connection()->prepare('SELECT Lisuke.* FROM PizzaJaLisukkeet, Lisuke WHERE PizzaJaLisukkeet.pizzanro = :pizzaid AND Lisuke.lisukenro = PizzaJaLisukkeet.lisukenro');
            $query->execute(array('pizzaid' => $pizzaid));
            $tulokset = $query->fetchAll();
            $pizzantaytteet = array();
            foreach($tulokset as $tulos) {
                $pizzantaytteet[] = new Tayte(array('nimi' => $tulos['nimi'], 'taytenro' => $tulos['lisukenro']));
            }
            return $pizzantaytteet;
        }
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

