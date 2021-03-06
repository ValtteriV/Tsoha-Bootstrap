<?php
require_once 'app/models/user.php';
class UserController extends BaseController {
    
    public static function kirjautuminen() {
        if (self::get_user_logged_in()) {
            Redirect::to('/', array('error' => 'Olet jo kirjautunut sisään.'));
        }
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
    
    public static function logout(){
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos'));
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

