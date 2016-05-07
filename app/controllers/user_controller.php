<?php

class UserController extends baseController {
    
    public static function kirjautuminen() {
        View::make('suunnitelmat/login.html');
    }
    
    public static function kirjautumisenkasittely() {
        $params = $_POST;
        
        $user = User::authenticate($params['kayttajatunnus'], $params['salasana']);
        
        if(!$user) {
            View::make('suunnitelmat/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana', 'kayttajatunnus' => $params['kayttajatunnus']));
        } else {
            $_SESSION['user'] = $user->kayttajaid;
            
            Redirect::to('/', array('message' => 'Kirjautuminen onnistui'));
        }
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

