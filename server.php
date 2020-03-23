<?php

$allowedResourcesTypes=[
    'books',
    'authors',
    'genres',
];

//vamos a hacer la validacion si el tipode recuso que se esta solicitando esta dentro de los recursos disponibles
$resourcesType= $_GET['resource_type'];
//con la funcion in_array verificamos que un elemento pertence a un arreglo
if(!in_array($resourcesType,$allowedResourcesTypes)){
    die;
}
    
//Me voy a valer de un metodo para saber que tipo de peticion estoy recibien y paso todo a mayuscula. 
    switch( strtoupper($_SERVER['REQUEST_METHOD'])){
        case 'GET':
        break;
        case 'POST':
        break;
        case 'PUT':
        break;
        case 'DELETE':
        break;
    }