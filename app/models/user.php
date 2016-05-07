<?php

class User extends BaseModel {
    public $kayttajaid, $nimi, $osoite, $puhelinnro, $kayttajatunnus, $salasana;
    
    public static function authenticate($kayttajatunnus, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE kayttajaTunnus = :kayttajatunnus AND salasana = :salasana LIMIT 1');
        $query->execute(array('kayttajatunnus' => $kayttajatunnus, 'salasana' => $salasana));
        $match = $query->fetch();
        
        if($match) {
            $user = new User(array(
                'kayttajaid' => $match['kayttajaid'],
                'nimi' => $match['nimi'],
                'osoite' => $match['osoite'],
                'puhelinnro' => $match['puhelinnro'],
                'kayttajatunnus' => $match['kayttajatunnus'],
                'salasana' => $match['salasana']
            ));
            return $user;
        } else {
            return null;
        }
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

