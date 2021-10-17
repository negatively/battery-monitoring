<?php
  require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Battery Monitoring</title>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="static/main.css">
  
</head>
<body>
  <div class="navbar">
    <header>
      <h2>
        Battery Monitoring
      </h2>
    </header>
  </div>
  <main>
    <div class="cards">
      <div class="card-single">
        <div>
          <h1>
            <?php 
              $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC LIMIT 1");
              $row = mysqli_fetch_assoc($sql);
              echo $row['battery1']
            ?>
            %
          </h1>
          <span>Baterai 1</span>
        </div>
        <div>
          <span class="las la-battery-full"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
            <?php 
              $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC LIMIT 1");
              $row = mysqli_fetch_assoc($sql);
              echo $row['battery2']
            ?>
            %
          </h1>
          <span>Baterai 2</span>
        </div>
        <div>
          <span class="las la-battery-full"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
            <?php 
              $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC LIMIT 1");
              $row = mysqli_fetch_assoc($sql);
              echo $row['battery3']
            ?>
            %
          </h1>
          <span>Baterai 3</span>
        </div>
        <div>
          <span class="las la-battery-full"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
            <?php 
              $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC LIMIT 1");
              $row = mysqli_fetch_assoc($sql);
              echo $row['battery4']
            ?>
            %
          </h1>
          <span>Baterai 4</span>
        </div>
        <div>
          <span class="las la-battery-full"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
            <?php 
              $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC LIMIT 1");
              $row = mysqli_fetch_assoc($sql);
              echo $row['battery5']
            ?>
            %
          </h1>
          <span>Baterai 5</span>
        </div>
        <div>
          <span class="las la-battery-full"></span>
        </div>
      </div>
      <div class="card-single">
        <div>
          <h1>
            <?php 
              $sql = mysqli_query($koneksi, "SELECT * FROM datasensor ORDER BY id DESC LIMIT 1");
              $row = mysqli_fetch_assoc($sql);
              echo $row['battery6']
            ?>
            %
          </h1>
          <span>Baterai 6</span>
        </div>
        <div>
          <span class="las la-battery-full"></span>
        </div>
      </div>
    </div>
  </main>
</body>
</html>