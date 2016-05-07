<?php
require_once "app/models/tayte.php";
require_once "app/models/user.php";
class TayteController extends BaseController{
    
    public static function listaus() {
        $user = self::get_user_logged_in();
        $taytteet = Tayte::all();
        View::make('suunnitelmat/taytteet.html', array('user' => $user, 'taytteet' => $taytteet));
    }
    
    public static function delete($id) {
        $user = self::get_user_logged_in();
        if (!$user) {
            Redirect::to('/login', array('error' => 'Sinun täytyy olla kirjautunut poistaaksesi täytteitä.'));
        }
        $tayte = Tayte::find($id);
        $tayte->destroy();
        Redirect::to('/tayte', array('user' => $user, 'message' => 'Täyte poistettu onnistuneesti.'));
    }
    
    public static function muokkausnakyma($id) {
        $user = self::get_user_logged_in();
        if (!$user) {
            Redirect::to('/login', array('error' => 'Sinun täytyy olla kirjautunut muokataksesi täytteitä.'));
        }
        $tayte = Tayte::find($id);
        View::make('suunnitelmat/muokkaatayte.html', array('user' => $user, 'tayte' => $tayte));
    }
    
    public static function muokkaa($id) {
        $params = $_POST;
        $user = self::get_user_logged_in();
        if (!$user) {
            Redirect::to('/login', array('error' => 'Sinun täytyy olla kirjautunut muokataksesi täytteitä.'));
        }
        $tayte = new Tayte(array('nimi' => $params['nimi'], 'taytenro' => $id));
        $tayte->update();
        Redirect::to('/tayte', array('user' => $user, 'message' => 'Täytettä muokattu onnistuneesti.'));
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

