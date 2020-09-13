<?php
require "index.php";
if (!$db_connect = pg_pconnect("host='localhost' port='5432' user='postgres' password='karolek123' dbname='movie_database'")) echo "Connect ERROR";


//search results
echo '<div class="container">';
if (!empty($_REQUEST['search'])) { //if search not empty
  $search = $_GET["search"];
  if (!empty($_REQUEST['taskOption'])) {
    $selectOption = $_GET['taskOption'];
    if ($selectOption === 'actors') { //if select option is equal actors table
      echo 'pusty select actors';
      $queryActors = "select * from " . $selectOption . " where name like '%" . $search . "%'";
      if ($result = pg_query($queryActors)) {
        echo '<div class="actorsBox">
       <span class="searchValue"> search: ' . $search . '</span>
        <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
        ';
        while ($row = pg_fetch_array($result)) {
          echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["name"] . '" data-img="' . $row["image"] . '" data-type="actors">
          <td>' . $row["id"] . '</td>
          <td>' . $row["name"] . '</td>
          </tr>';
        }
        echo '</table></div>';
      }
    } else { //if select option is equal movie table
      echo 'pusty select movie';
      $queryMovie = "select * from movie where title like '%" . $search . "%'";
      if ($result = pg_query($queryMovie)) {
        echo '<div class="movieBox">
       <span class="searchValue"> search: ' . $search . '</span>
        <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Film genre</th>
        </tr>
        ';
        while ($row = pg_fetch_array($result)) {
          echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["title"] . '" data-img="' . $row["image"] . '" data-type="movies">
          <td>' . $row["id"] . '</td>
          <td>' . $row["title"] . '</td>
          <td>' . $row["film_genre"] . '</td>
          </tr>';
        }
        echo '</table></div>';
      }
    }
  } else { //if select option was empty but search no
    $queryActors = "select * from actors where name like '%" . $search . "%'";
    if ($result = pg_query($queryActors)) {
      echo '<div class="actorsBox">
       <span class="searchValue"> search: ' . $search . '</span>
        <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
        ';
      while ($row = pg_fetch_array($result)) {
        echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["name"] . '" data-img="' . $row["image"] . '" data-type="actors">
          <td>' . $row["id"] . '</td>
          <td>' . $row["name"] . '</td>
          </tr>';
      }
      echo '</table></div>';
    }

    $queryMovie = "select * from movie where title like '%" . $search . "%'";
    if ($result = pg_query($queryMovie)) {
      echo '<div class="movieBox">
        <span class="searchValue"> search: ' . $search . '</span>
        <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Film genre</th>
        </tr>
        ';
      while ($row = pg_fetch_array($result)) {
        echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["title"] . '" data-img="' . $row["image"] . '" data-type="movies">
          <td>' . $row["id"] . '</td>
          <td>' . $row["title"] . '</td>
          <td>' . $row["film_genre"] . '</td>
          </tr>';
      }
      echo '</table></div>';
    }
  }
} else { //if search was empty

  if (!empty($_REQUEST['taskOption'])) {
    $selectOption = $_GET['taskOption'];
    if ($selectOption === 'actors') { //if select option is empty actors table
      $queryActors = "select * from " . $selectOption . "";
      if ($result = pg_query($queryActors)) {
        echo '<div class="actorsBox">
        <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
        ';
        while ($row = pg_fetch_array($result)) {
          echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["name"] . '" data-img="' . $row["image"] . '" data-type="actors">
          <td>' . $row["id"] . '</td>
          <td>' . $row["name"] . '</td>
          </tr>';
        }
        echo '</table></div>';
      }
    } else { //if select option is equal movie table
      $queryMovie = "select * from movie";
      if ($result = pg_query($queryMovie)) {
        echo '<div class="movieBox">
        <h1 class="bestMovie">The best movies in the world</h1>
        <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Film genre</th>
        </tr>
        ';
        while ($row = pg_fetch_array($result)) {
          echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["title"] . '" data-img="' . $row["image"] . '" data-type="movies">
          <td>' . $row["id"] . '</td>
          <td>' . $row["title"] . '</td>
          <td>' . $row["film_genre"] . '</td>
          </tr>';
        }
        echo '</table></div>';
      }
    }
  } else {
    $queryActors = "select * from actors";
    if ($result = pg_query($queryActors)) {
      echo '<div class="actorsBox">
        <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
        ';
      while ($row = pg_fetch_array($result)) {
        echo '<tr data-id="' . $row["id"] . '" data-title="' . $row["name"] . '" data-img="' . $row["image"] . '" data-type="actors">
          <td>' . $row["id"] . '</td>
          <td>' . $row["name"] . '</td>
          </tr>';
      }
      echo '</table></div>';
    }

    $queryMovie = "select * from movie";
    if ($result = pg_query($queryMovie)) {
      echo '<div class="movieBox">
        <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Film genre</th>
        </tr>
        ';
      while ($row = pg_fetch_array($result)) {
        echo '
      <tr data-id="' . $row["id"] . '" data-title="' . $row["title"] . '" data-img="' . $row["image"] . '" data-type="movies">
          <td>' . $row["id"] . '</td>
          <td>' . $row["title"] . '</td>
          <td>' . $row["film_genre"] . '</td>
          </tr>
          ';
      }
      echo
        '</table></div>';
    }
  }
};
echo '</div>';
pg_close($db_connect);
?>
<script>
  $(".filmsStart").css("display", "none")
</script>