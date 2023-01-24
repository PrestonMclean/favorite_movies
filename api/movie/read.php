<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Movie.php';

    $database = new Database();
    $db = $database->connect();

    $movie = new Movie($db);

    $result = $movie->read();
    $number = $result->rowCount();

    if ($number > 0) {
        $movies_arr = array();
        $movies_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $movie_item = array(
                'id' => $id,
                'title' => $title,
                'description' => $description
            );
            array_push($movies_arr['data'], $movie_item);
        }

        echo json_encode($movies_arr);

    } else {
        echo json_encode(
            array('message' => 'No Movies Found')
        );
    }