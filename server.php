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

//tomo el id del elemento que debe venir en el GET
//debemos verificar que este resource_id existe (con un IF EN LINEA)
$resourcesId= array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '' ;

    
//Me voy a valer de un metodo para saber que tipo de peticion estoy recibien y paso todo a mayuscula. 
//generamos la respuesta asumiendo que el pedido es correcto. 
    switch( strtoupper($_SERVER['REQUEST_METHOD'])){
        //vamos con GET a devolver la coleccion de libros
        case 'GET':
            if( empty( $resourcesId) ){
                //lo devolvemos en formato json
                echo json_encode($books);
            }
            else{
                //si el resourceId existe dentro del array books entonces muestre ese item
                if( array_key_exists( $resourcesId, $books )){
                    echo json_encode( $books[ $resourcesId ] );
                }
            }
        break;
        case 'POST':
            //vamos a leer un archivo por completo y devolver su contenido 
            $json = file_get_contents('php://input');
            $books[] = json_decode($json, true);
            
            //vamos a mostrar la cantidad total menos 1 por que empieza en cero
            // echo array_keys($books)[count($books)-1];
            echo json_encode($books);
        break;
        case 'PUT':
        break;
        case 'DELETE':
        break;
    }