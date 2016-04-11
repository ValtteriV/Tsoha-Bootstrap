<?php



    class Pizza extends BaseModel{
        public $pizzanro, $nimi, $hinta;
        
        public function __construct($attributes) {
            parent::__construct($attributes);
        }
        
        public static function all(){
            $query = DB::connection()->prepare('SELECT * FROM Pizza');
            $query->execute();
            $rows = $query->fetchAll();
            $pizzat = array();
            
            foreach($rows as $row) {
                $pizzat = new Pizza(array(
                    'pizzanro' => $row['pizzanro'],
                    'nimi' => $row['nimi'],
                    'hinta' => $row['hinta']
                ));   
            }
            return $pizzat;
        }
        
        public static function find_by_pizzanro($id) {
            $query = DB::connection()->prepare('SELECT * FROM Pizza WHERE pizzanro = :id LIMIT 1');
            $query->execute(array('id' => $id));
            $row = $query->fetch();
            
            if ($row) {
                $pizza = new Pizza(array(
                    'pizzanro' => $row['pizzanro'],
                    'nimi' => $row['nimi'],
                    'hinta' => $row['hinta']
                ));
            }
        }
        
        public function save() {
            $query = DB::connection()->prepare('INSERT INTO Pizza (nimi, hinta) VALUES (:nimi, :hinta) RETURNING pizzanro');
            $query->execute(array('nimi' => $this->nimi, 'hinta' => $this->hinta));
            $row = $query->fetch();
            $this->pizzanro = $row['pizzanro'];
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

