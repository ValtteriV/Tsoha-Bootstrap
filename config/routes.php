<?php

  $routes->get('/', function() {
    HelloWorldController::index();
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
  
  $routes->post('/pizza', function() {
      HelloWorldController::store();
  });

  $routes->get('/pizzanlisays', function() {
      HelloWorldController::pizzanlisays();
  });
  
  $routes->get('/pizza/:id/lisaatayte', function($id) {
      HelloWorldController::taytteenlisays($id);
  });