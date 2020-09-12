<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="index.php" method="get">
    <label>Search<input type="text" name="search"></label>
    <select name="taskOption">
      <option disabled selected> Select search option:</option>
      <option value="actors">Onlu actors </option>
      <option value="movie">Only movie </option>
    </select>
    <input type="submit" value="search" name="submit">
  </form>



  <?php
  if (!$db_connect = pg_pconnect("host='localhost' port='5432' user='postgres' password='karolek123' dbname='movie_database'")) echo "Connect ERROR";

  //search results
  if (!empty($_REQUEST['search'])) { //if search not empty
    $search = $_GET["search"];
    if (!empty($_REQUEST['taskOption'])) {
      $selectOption = $_GET['taskOption'];
      if ($selectOption === 'actors') { //if select option is equal actors table
        $queryActors = "select * from " . $selectOption . " where name like '%" . $search . "%'";
        if ($result = pg_query($queryActors)) {
          echo '<div class="actorsBox"> search: ' . $search . ' <br/>';
          while ($row = pg_fetch_array($result)) {
            echo '' . $row["id"] . $row["name"] . ' <br/>';
          }
          echo '</div>';
        }
      } else { //if select option is equal movie table
        $queryMovie = "select * from " . $selectOption . " where title like '%" . $search . "%'";
        if ($result = pg_query($queryMovie)) {
          echo '<div class="movieBox">search: ' . $search . ' <br/>';
          while ($row = pg_fetch_array($result)) {
            echo '' . $row["id"] . $row["title"] . ' <br/>';
          }
          echo '</div>';
        }
      }
    } else { //if select option was empty but search no
      $queryActors = "select * from actors where name like '%" . $search . "%'";
      if ($result = pg_query($queryActors)) {
        echo '<div class="actorsBox"> search: ' . $search . ' <br/>';
        while ($row = pg_fetch_array($result)) {
          echo '' . $row["id"] . $row["name"] . ' <br/>';
        }
        echo '</div>';
      }

      $queryMovie = "select * from movie where title like '%" . $search . "%'";
      if ($result = pg_query($queryMovie)) {
        echo '<div class="movieBox">search: ' . $search . ' <br/>';
        while ($row = pg_fetch_array($result)) {
          echo '' . $row["id"] . $row["title"] . ' <br/>';
        }
        echo '</div>';
      }
    }
  } else { //if search was empty
    $queryActors = "select * from actors";
    if ($result = pg_query($queryActors)) {
      echo '<div class="actorsBox">';
      while ($row = pg_fetch_array($result)) {
        echo '' . $row["id"] . $row["name"] . ' <br/>';
      }
      echo '</div>';
    }

    $queryMovie = "select * from movie";
    if ($result = pg_query($queryMovie)) {
      echo '<div class="movieBox">';
      while ($row = pg_fetch_array($result)) {
        echo '' . $row["id"] . $row["title"] . ' <br/>';
      }
      echo '</div>';
    }
  };

  pg_close($db_connect)
  ?>
</body>

</html>