<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Genre.php';

    $database = new Database();
    $db = $database->connect();

    $genre = new Genre($db);

    $result = $genre->read();
    $number = $result->rowCount();

    if ($number > 0) {
        $genres_arr = array();
        $genres_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $genre_item = array(
                'id' => $id,
                'name' => $name
            );
            array_push($genres_arr['data'], $genre_item);
        }

        echo json_encode($genres_arr);

    } else {
        echo json_encode(
            array('message' => 'No Genre Found')
        );
    }