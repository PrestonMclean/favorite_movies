<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Autoriztion, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Movie.php';

    $database = new Database();
    $db = $database->connect();

    $movie = new Movie($db);

    $data = json_decode(file_get_contents('php://input'));

    $movie->id = $data->id;

    $movie->title = $data->title;
    $movie->description = $data->description;

    if($movie->update()) {
        echo json_encode(
            array("message" => $movie->title . " Updated")
        );
    } else {
        echo json_encode(
            array("message" => "Movie Not Updated")
        );
    }