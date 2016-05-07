<?php

  $routes->get('/', function() {
    PizzaController::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    PizzaController::sandbox();
  });
  
  $routes->get('/etusivu', function() {
      PizzaController::etusivu();
  });
  
  $routes->get('/pizza/:id', function($id) {
      PizzaController::tiettypizza($id);
  });
  
  $routes->post('/pizza/:id', function($id) {
      PizzaController::taytestore($id);
  });
  
  $routes->post('/pizza/:id/destroy', function($id) {
      PizzaController::destroy($id);
  });
  
  $routes->post('/pizza', function() {
      PizzaController::store();
  });

  $routes->get('/pizzanlisays', function() {
      PizzaController::pizzanlisays();
  });
  
  $routes->get('/pizza/:id/lisaatayte', function($id) {
      PizzaController::taytteenlisaysnakyma($id);
  });
  
  $routes->post('/pizza/:id/lisaatayte', function($id) {
      PizzaController::taytteenlisays($id);
  });
  
  $routes->get('/pizza/:id/poistatayte', function($id) {
      PizzaController::taytteenpoistonakyma($id);
  });
  
  $routes->post('/pizza/:id/poistatayte', function($id) {
      PizzaController::taytteenpoisto($id);
  });
  
  $routes->get('/login', function() {
      UserController::kirjautuminen();
  }); 
  
  $routes->post('/login', function() {
      UserController::kirjautumisenkasittely();
  });
  
  $routes->post('/logout', function() {
      UserController::logout();
  });
  
  $routes->get('/tayte', function() {
      TayteController::listaus();
  });
  
  $routes->post('/pizza/:id/muokkaa', function($id) {
      PizzaController::pizzanimentaihinnanmuokkaus($id);
  });
  
  $routes->post('/tayte/:id/delete', function($id) {
      TayteController::delete($id);
  });
  
  $routes->get('/tayte/:id/muokkaa', function($id) {
      TayteController::muokkausnakyma($id);
  });
  
  $routes->post('/tayte/:id/muokkaa', function($id) {
      TayteController::muokkaa($id);
  });