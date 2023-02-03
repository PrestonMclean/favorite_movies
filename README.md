# favorite_movies
A restful api to search through movies

End points for movies

Get all the movies in the data base (does not include genre)<br>
http://localhost/favorite_movies/api/movie/read.php

Get a single movie with genre<br>
http://localhost/favorite_movies/api/movie/read_single.php?id=1

Get all movies with a specific genre<br>
http://localhost/favorite_movies/api/movie/search_by_genre.php?genre=comedy

Create a new movie<br>
http://localhost/favorite_movies/api/movie/create.php<br>
body<br>
{<br>
    "title": "Lorem ipsum",<br>
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec orci nec elit semper sodales.",<br>
    "rating": "G"<br>
}

update a movie<br>
http://localhost/favorite_movies/api/movie/update.php<br>
body<br>
{<br>
    "id": 1,<br>
    "title": "Lorem ipsum",<br>
    "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec orci nec elit semper sodales.",<br>
    "rating": "PG-13"<br>
}

delete a movie from database<br>
http://localhost/favorite_movies/api/movie/delete.php<br>
body<br>
{<br>
    "id": 1<br>
}

End points for genres

Get all genres<br>
http://localhost/favorite_movies/api/genre/read.php

Create a new genre<br>
http://localhost/favorite_movies/api/genre/create.php<br>
body<br>
{<br>
    "name": "Lorem ipsum"<br>
}

update a genre<br>
http://localhost/favorite_movies/api/genre/update.php<br>
body<br>
{<br>
    "id" : 1,<br>
    "name": "Lorem ipsum"<br>
}
