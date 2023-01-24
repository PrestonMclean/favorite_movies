<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Autoriztion, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Movie.php';

    $database = new Database();
    $db = $database->connect();

    $movie = new Movie($db);

    $data = json_decode(file_get_contents('php://input'));

    $movie->title = $data->title;
    $movie->description = $data->description;

    if($movie->create()) {
        echo json_encode(
            array("message" => "Movie Created")
        );
    } else {
        echo json_encode(
            array("message" => "Movie Not Created")
        );
    }