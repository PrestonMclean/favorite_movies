<?php
    class Movie {
        private $conn;
        private $table = 'movies';

        public $id;
        public $title;
        public $description;
        public $rating;
        public $genre;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT * FROM ' . $this->table;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_single() {
            $this->genre = array();
            $query = 'SELECT m.*, g.name
                FROM ' . $this->table . ' m
	            JOIN movies_genres mg ON m.id = mg.movie_id
                JOIN genres g ON mg.genre_id = g.id
                WHERE m.id = ?';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                array_push($this->genre, $name);
            }
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->rating = $rating;

        }

        public function search_by_genre()
        {
            $query = 'SELECT m.*, g.name
                FROM ' . $this->table . ' m
	            JOIN movies_genres mg ON m.id = mg.movie_id
                JOIN genres g ON mg.genre_id = g.id
                WHERE g.name = ?';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->genre);
            $stmt->execute();
            return $stmt;
        }

        public function create() {
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    title = :title,
                    description = :description,
                    rating = :rating
            ';

            $stmt = $this->conn->prepare($query);
            
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));

            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':rating', $this->rating);

            if ($stmt->execute()) {
                return true;
            } else {
                printf("ERROR: %s. \n", $stmt->error);
                return false;
            }
        }

        public function update() {
            $query = 'UPDATE ' . $this->table . '
                SET
                    title = :title,
                    description = :description
                WHERE
                    id = :id
            ';

            $stmt = $this->conn->prepare($query);
            
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                printf("ERROR: %s. \n", $stmt->error);
                return false;
            }
        }

        public function delete() {
            $query = 'DELETE FROM ' . $this->table . ' 
                WHERE
                    id = :id';

            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                printf("ERROR: %s. \n", $stmt->error);
                return false;
            }
        }

    }
    