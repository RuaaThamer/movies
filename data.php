<?php 
  //  session_start();

  //  $movies = json_decode(file_get_contents('movies.json'), 1);

  //  if (isset($_SESSION['movies'])) {
  //   $movies = $_SESSION['movies'];
  //  } else {
  //   $_SESSION['movies'] = $movies;
  //  }

  //  $genres = [
  //   'Fantasy',
  //   'Sci-Fi',
  //   'Action',
  //   'Comedy',
  //   'Drama',
  //   'Horror',
  //   'Romance',
  //   'Family',
  // ];

  //database source name
  $dsn = "mysql:host=localhost;dbname=movie_mayhem";
  //user name
  $username = "root";
  // password
  $password = "";

  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    $error = $e->getMessage();
    echo $error;
 
  }


  // make call to database to get genres 
  $sql = "SELECT * FROM genres";
  $result = $db->query($sql);
  $genres = $result->fetchAll(PDO::FETCH_COLUMN, 1);

  // go to 


