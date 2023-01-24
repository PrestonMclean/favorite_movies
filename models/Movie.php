<?php
    class Movie {
        private $conn;
        private $table = 'movies';

        public $id;
        public $title;
        public $description;

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
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id =? LIMIT 0,1';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->description = $row['description'];
        }

        public function create() {
            $query = 'INSERT INTO ' . $this->table . '
                SET
                    title = :title,
                    description = :description
            ';

            $stmt = $this->conn->prepare($query);
            
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));

            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);

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
    