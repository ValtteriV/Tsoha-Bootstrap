<?php



    class Pizza extends BaseModel {
        
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
                $pizzat[] = new Pizza(array(
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
                return $pizza;
            }
            return null;
        }
        
        public function save() {
            $query = DB::connection()->prepare('INSERT INTO Pizza (nimi, hinta) VALUES (:nimi, :hinta) RETURNING pizzanro');
            $query->execute(array('nimi' => $this->nimi, 'hinta' => $this->hinta));
            $row = $query->fetch();
            $this->pizzanro = $row['pizzanro'];
        }
        
        public function destroy() {
            $query = DB::connection()->prepare('DELETE FROM PizzaJaLisukkeet WHERE pizzanro = :id');
            $query->execute(array('id' => $this->pizzanro));
            $query = DB::connection()->prepare('DELETE FROM Pizza WHERE pizzanro = :id');
            $query->execute(array('id' => $this->pizzanro));
        }
        
        public function update() {
            $query = DB::connection()->prepare('UPDATE Pizza SET nimi = :nimi, hinta = :hinta WHERE pizzanro = :id');
            $query->execute(array('nimi' => $this->nimi, 'hinta' => $this-hinta, 'id' => $this->pizzanro));
        }
        
        public static function taytesave($pizzanro, $lisukenro) {
            $query = DB::connection()->prepare('INSERT INTO PizzaJaLisukkeet (pizzanro, lisukenro) VALUES (:pizzanro, :lisukenro)');
            $query->execute(array('pizzanro' => $pizzanro, 'lisukenro' => $lisukenro));
        }
        
    }

