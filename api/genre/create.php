<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Autoriztion, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Genre.php';

    $database = new Database();
    $db = $database->connect();

    $genre = new Genre($db);

    $data = json_decode(file_get_contents('php://input'));

    $genre->name = $data->name;

    if ($genre->create()) {
        echo json_encode(
            array('message' => 'Genre Created')
        );
    }else {
        echo json_encode(
            array('message' => 'Genre Not Created')
        );
    }