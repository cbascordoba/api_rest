<?php
//definimos los recursos disponibles
$allowedResourcesTypes=[
    'books',
    'authors',
    'genres',
];

//vamos a hacer la validacion si el tipo de recuso que se esta solicitando esta dentro de los recursos disponibles
$resourcesType= $_GET['resource_type'];
//con la funcion in_array verificamos que un elemento pertence a un arreglo
if(!in_array($resourcesType,$allowedResourcesTypes)){
    die;
}

//Definio los recuros, esto simulando una base de datos, vamos a hacerlo con un arreglo
$books= [
    1 => [
        'titulo' => 'Lo que el viento se llevo',
        'id_autor' => 2,
        'id_genero' => 2,
    ],
    2 => [
        'titulo' => 'La Iliada',
        'id_autor' => 1,
        'id_genero' => 1,
    ],
    3 => [
        'titulo' => 'La Odisea',
        'id_autor' => 1,
        'id_genero' => 1,
    ],
];

//vamos a indicarle al usuario que le vamos a enviar un json

header('Content-Type: application/json');
    
//Me voy a valer de un metodo para saber que tipo de peticion estoy recibien y paso todo a mayuscula. 
//generamos la respuesta asumiendo que el pedido es correcto. 
    switch( strtoupper($_SERVER['REQUEST_METHOD'])){
        //vamos con GET a devolver la coleccion de libros
        case 'GET':
            //lo devolvemos en formato json
            echo json_encode($books);
        break;
        case 'POST':
        break;
        case 'PUT':
        break;
        case 'DELETE':
        break;
    }