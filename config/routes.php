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
  
  $routes->get('/pizza', function() {
      HelloWorldController::pizza();
  });

  $routes->get('/pizzanlisays', function() {
      HelloWorldController::pizzanlisays();
  });