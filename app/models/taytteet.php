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
            return $taytelista;
        }
        
        public static function getpizzataytteet($pizzaid) {
            $taytteet = all();
            $query = DB::connection()->prepare('SELECT * FROM PizzaJaLisukkeet WHERE pizzanro = :pizzaid');
            $query->execute(array('pizzaid' => $pizzaid));
            $tulokset = $query->fetchAll();
            $pizzantaytteet = array();
            foreach($tulokset as $tulos) {
                foreach($taytteet as $tayte) {
                    if ($tayte->taytenro == $tulos['lisukenro']) {
                        $pizzantaytteet[] = $tayte;
                        break;
                    }
                }
            }
            $pizza = Pizza::find_by_pizzanro($pizzaid);
            $tamapizza = new Taytteet(array('pizza' => $pizza, 'taytteet' => $pizzantaytteet));
            return $tamapizza;
        }
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

