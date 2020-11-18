<?php include 'includes/state-utilities.inc.php';
$states = readStates('data/states.txt');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Election 2016</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-red.min.css" />
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  <script src="js/jquery.sparkline.2.1.2.js"></script>
  <script type="text/javascript"></script>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgpfxdQ0Ep_nieNjV64u4yXWeSFHAT4BE&callback=initMap&libraries=&v=weekly" defer></script>
  <link rel="stylesheet" type="text/css" href="./style.css" />
  <script src="./index.js"></script>

</head>

<body>

  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php include 'includes/header.inc.php'; ?>

    <main class="mdl-layout__content mdl-color--blue-50">
      <section class="page-content">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
            <div class="mdl-card__title mdl-color--red mdl-color-text--white">
              <h2 class="mdl-card__title-text">States</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <table class="mdl-data-table  mdl-shadow--2dp">
                <thead>
                  <tr>
                    <th class="mdl-data-table__cell--non-numeric">State</th>
                    <th class="mdl-data-table__cell--non-numeric">Winning Candidate</th>
                    <th class="mdl-data-table__cell--non-numeric">Political Party</th>
                    <th class="mdl-data-table__cell--non-numeric">Electoral Votes</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  foreach ($states as $state) {

                    $id = $state['id'];
                    $url = "index.php?state=$id";
                    $name = $state['name'];
                    $candidate = $state['candidate'];
                    $party = $state['party'];
                    $numVotes = $state['numVotes'];

                    echo '<tr>';
                    echo "<td class='mdl-data-table__cell--non-numeric'><a href=$url>$name</a></td>";
                    echo "<td class='mdl-data-table__cell--non-numeric'>$candidate</td>";
                    echo "<td class='mdl-data-table__cell--non-numeric'>$party</td>";
                    echo "<td class='mdl-data-table__cell--non-numeric'>$numVotes</td>";
                    echo '</tr>';
                  }

                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="mdl-grid mdl-cell--6-col">
            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
              if (isset($_GET['state'])) {
                $requestedState = $states[$_GET['state']];
                $name = $requestedState['name'];
                $capitol = $requestedState['capitol'];
                $population = $requestedState['population'];
                $candidate = $requestedState['candidate'];
                $party = $requestedState['party'];
                $numVotes = $requestedState['numVotes'];
            ?>
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-color--red mdl-color-text--white">
                    <h2 class="mdl-card__title-text">State Details</h2>
                  </div>
                  <div class="mdl-card__supporting-text">

                    <h4><?php echo "$name" ?></h4>
                    <?php echo "Capitol: $capitol" ?><br>
                    <?php echo "Population: $population" ?><br>
                    <?php echo "Winning Candidate: $candidate" ?><br>
                    <?php echo "Political Party: $party" ?><br>
                    <?php echo "Electoral College Votes: $numVotes" ?>

                  </div>
                </div>

                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-color--red mdl-color-text--white">
                    <h2 class="mdl-card__title-text">State Map</h2>
                  </div>
                  <div class="mdl-card__supporting-text">
                      <div id="map"></div>
                  </div>
                </div>
            <?php
              }
            } ?>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>