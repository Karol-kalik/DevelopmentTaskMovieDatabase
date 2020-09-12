<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">




<body>

  <form action="result.php" method="get" class="searchBox">
    <label>Search <input type="text" name="search" placeholder="search actor or movie"></label>
    <select name="taskOption">
      <option disabled selected> Search actors and films: </option>
      <option value="actors">Only actors </option>
      <option value="movie">Only movie </option>
    </select>
    <input type="submit" id="display" value="Search" /> </td>
  </form>

  <?php

  if (!$db_connect = pg_pconnect("host='localhost' port='5432' user='postgres' password='karolek123' dbname='movie_database'")) echo "Connect ERROR";
  $queryMovie = "select * from movie";
  if ($result = pg_query($queryMovie)) {
    echo '<div class="filmsStart" name="filmsStart">
    <h1>The best movies in the world</h1>
        <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Film genre</th>
        </tr>
        ';
    while ($row = pg_fetch_array($result)) {
      echo '
      <tr>
          <td>' . $row["id"] . '</td>
          <td>' . $row["title"] . '</td>
          <td>' . $row["film_genre"] . '</td>
          </tr>
          ';
    }
    echo
      '</table></div>';
  }
  ?>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
  <script src="index.js"></script>

</body>

</html>