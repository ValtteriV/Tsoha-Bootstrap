<?php

    class Tayte extends BaseModel {
        public $nimi, $taytenro;
        
        public function __construct($attributes) {
            parent::__construct($attributes);
        }
        
        public static function all() {
            $query = DB::connection()->prepare('SELECT * FROM Lisuke');
            $query->execute();
            $results = $query->fetchAll();
            $lisukkeet = array();
            foreach($results as $result) {
                $lisukkeet[] = new Tayte(array(
                    'nimi' => $result['nimi'],
                    'taytenro' => $result['lisukenro']
                ));
            }
            return $lisukkeet;
        }
        
        public static function find($id) {
            $query = DB::connection()->prepare('SELECT * FROM Lisuke WHERE lisukenro = :id LIMIT 1');
            $query->execute(array('id' => $id));
            $row = $query->fetch();
            if ($row){
                $lisuke = new Tayte(array('nimi' => $row['nimi'], 'taytenro' => $row['lisukenro']));
                return $lisuke;
            }else{
                return null;
            }
        }
        
        public function save() {
            $query = DB::connection()->prepare('INSERT INTO Lisuke (nimi) VALUES (:nimi) RETURNING lisukenro');
            $query->execute(array('nimi' => $this->nimi));
            $row = $query->fetch();
            $this->taytenro = $row['lisukenro'];
        }
        
        public function destroy() {
            $query = DB::connection()->prepare('DELETE FROM PizzaJaLisukkeet WHERE lisukenro = :id');
            $query->execute(array('id' => $this->taytenro));
            $query = DB::connection()->prepare('DELETE FROM Lisuke WHERE lisukenro = :id');
            $query->execute(array('id' => $this->taytenro));
        }
        
        public function update() {
            $query = DB:: connection()->prepare('UPDATE Lisuke SET nimi = :nimi WHERE lisukenro = :id');
            $query->execute(array('nimi' => $this->nimi, 'id' => $this->taytenro));
        }
        
        public function validate_nimi() {
            $errors = array();
            if ($this->nimi == '' || $this->nimi == null) {
                $errors[] = 'Nimi ei saa olla tyhjä.';
            }
            if (strlen($this->nimi) < 3 || strlen($this->nimi) > 20) {
                $errors[] = 'Nimen tulee olla 3-20 merkkiä pitkä.';
            }
            return $errors;
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

