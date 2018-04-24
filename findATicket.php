<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap eCommerce Page Template</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body style="padding-top: 70px; padding-right: 10px; padding-left: 10px; text-align: center;">
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">TechIT
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="postATicket.html">Post a ticket</a></li>
        <li class="nav-item active"> <a class="nav-link" href="findATicket.php">Find a ticket</a></li>
        <li class="nav-item"> <a class="nav-link" href="#">Become an expert</a></li>
        <li class="nav-item"> </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <main>
    <h1 class="text-center text-capitalize">Find a ticket</h1>
    <form id="form1" name="form1" method="post">
    <body>
      <?php 

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "test1";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error) . "<br>";
      } 
      echo "Connected successfully" . "<br>";

      $sql = "SELECT * FROM tickets";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "Ticket #: " . $row["Ticket"]. " - Description: " . $row["Description"]. " Email: " . $row["Email"]. "<br>";
          }
      } else {
          echo "0 results " . "<br>";
      }
      $conn->close();

      ?>
    </body>

    </form>
<div> </div>
  </main>
<footer class="text-center">
  <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © TechIT. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
  </body>

  
</html>