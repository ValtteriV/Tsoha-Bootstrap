<?php

  $routes->get('/', function() {
    HelloWorldController::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/etusivu', function() {
      HelloWorldController::etusivu();
  });
  
  $routes->get('/pizza/:id', function($id) {
      HelloWorldController::tiettypizza($id);
  });
  
  $routes->post('/pizza/:id', function($id) {
      HelloWorldController::taytestore($id);
  });
  
  $routes->post('/pizza/:id/destroy', function($id) {
      HelloWorldController::destroy($id);
  });
  
  $routes->post('/pizza', function() {
      HelloWorldController::store();
  });

  $routes->get('/pizzanlisays', function() {
      HelloWorldController::pizzanlisays();
  });
  
  $routes->get('/pizza/:id/lisaatayte', function($id) {
      HelloWorldController::taytteenlisaysnakyma($id);
  });
  
  $routes->post('/pizza/:id/lisaatayte', function($id) {
      HelloWorldController::taytteenlisays($id);
  });
  
  $routes->get('/pizza/:id/poistatayte', function($id) {
      HelloWorldController::taytteenpoistonakyma($id);
  });
  
  $routes->post('/pizza/:id/poistatayte', function($id) {
      HelloWorldController::taytteenpoisto($id);
  });
  
  $routes->get('/login', function($id) {
      UserController::kirjautuminen();
  }); 
  
  $routes->post('/login', function() {
      UserController::kirjautumisenkasittely();
  });