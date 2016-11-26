<?php

require __DIR__ . '/../src/init.php';

/* 
* Root Request
* Returns a 'Hello API!' message
*/
$app->get('/', function ($request, $response, $args) {     
   
    return "Hello API !";
});


/*
* Send a GET request to /sample 
* Returns a JSON Array of Items with proper JSON Header
*/
$app->get('/sample', function ($request, $response, $args) {    
    
    $array = array(
    	"Apple" => "Fruit",
    	"Tiger" => "Animal",
    	"Lisa" => "Human");

    return $response->withJson($array);
});

/*
* Send a POST request to /sample 
* Returns a JSON Array of Items with proper JSON Header
*/
$app->post('/sample', function ($request, $response, $args) {    
    
    $array = array(
    	"Apple" => "Fruit",
    	"Tiger" => "Animal",
    	"Lisa" => "Human");

    return $response->withJson($array);
});

/*
* Send a GET request to /fruit/Apple 
* Replace the fruit name Apple with anything,
* Returns a JSON respose with the name of the fruit given
*/
$app->get('/fruit/{name}', function ($request, $response, $args) {    

	//Getting the fruit name from the Route    
    $fruit = $request->getAttribute('name');

    $resp = array(
    	"Name of the Fruit" => $fruit
    	);

    return $response->withJson($resp);

});


$app->run();
