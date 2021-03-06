<?php
  require_once 'app/models/user.php';
  class BaseController{

    public static function get_user_logged_in(){
      // Toteuta kirjautuneen käyttäjän haku tähän
      if(isset($_SESSION['user'])){
          $user = User::find($_SESSION['user']);
          
          return $user;
      }
      return null;
    }

    public static function check_logged_in(){
      // Toteuta kirjautumisen tarkistus tähän.
      // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
        if (isset($_SESSION['user'])){
            $user = User::find($_SESSION['user']);
            
            return $user;    
        
        }
        return null;
    }

  }
