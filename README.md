# favorite_movies
A restful api to search through movies

End points for movies

Get all the movies in the data base (does not include genre)
localhost/favorite_movies/api/movie/read.php

Get a single movie with genre
localhost/favorite_movies/api/movie/read_single.php?id=1

Get all movies with a specific genre
localhost/favorite_movies/api/movie/search_by_genre.php?genre=comedy

Create a new movie
localhost/favorite_movies/api/movie/create.php
body
{
    "title": "Lorem ipsum",
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec orci nec elit semper sodales.",
    "rating": "G"
}

update a movie
localhost/favorite_movies/api/movie/update.php
body
{
    "id": 1,
    "title": "Lorem ipsum",
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec orci nec elit semper sodales.",
    "rating": "PG-13"
}

delete a movie from database
localhost/favorite_movies/api/movie/delete.php
body
{
    "id": 1
}

End points for genres

Get all genres
localhost/favorite_movies/api/genre/read.php

Create a new genre
localhost/favorite_movies/api/genre/create.php
body
{
    "name": "Lorem ipsum"
}

update a genre
localhost/favorite_movies/api/genre/update.php
body
{
    "id" : 1,
    "name": "Lorem ipsum"
}
