<?php
  require "data.php";
// array coming from the form
  if (isset($_POST['movie_title'])){
    //var_dump($_POST);
   array_push($movies, [
      'movie_id' => end($movies)['movie_id'] + 1,
      'movie_title' => $_POST['movie_title'],
      'director' => $_POST['director'],
      'year' => $_POST['year'],
     'genre' => $_POST['genre']
    ]);

    $_SESSION['movies'] = $movies;
  }
// search box using array filter 
  if (isset($_GET['search'])) {
    $movies = array_filter($movies, function ($movie) {
      return strpos($movie['movie_title'], $_GET['search']) !== false;
    });
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movies</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="main">
    <?php require "header.php"; ?>

    <!-- the search is a action get method which is alredy set by defult -->
    <form class="form">
      <input type="search" class="form-control" name="search" placeholder="Search">
    </form>
    <section class="movies">

    <!--to display data-->
      <?php foreach ($movies as $movie) :?>
       <!--using href to ask for spcifec movie using query string pass data throw href-->
       <a class="movie" href="movie.php?id=<?php echo $movie ['movie_id']; ?> ">
         <!-- $movie without s is value and 'movie_title' is the key got it from data-->
         <?php echo $movie ['movie_title']; ?>
       </a>
      <?php endforeach; ?>

    </section>
  </main>
</body>
</html>
