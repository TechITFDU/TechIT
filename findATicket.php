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
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active"> <a class="nav-link" href="index.html">TechIT <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="postATicket.html">Post a ticket</a></li>
        <li class="nav-item active"> <a class="nav-link" href="findATicket.php">Find a ticket</a></li>
        <li class="nav-item"> <a class="nav-link" href="manageMyTickets.php">Manage My Tickets</a></li>
        <li class="nav-item"> </li>
      </ul>

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
      // echo "Connected successfully" . "<br>";
      $sql = "SELECT * FROM tickets WHERE status = 'unclaimed' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output table header
         echo ("
         <form id=\"submitTicket\" name=\"submitTicket\" method=\"post\">
         <table class ='table table-striped' id='tableSelect'>
          <tbody>
          <th class='text-left'> </th>
          <th class='text-left'> Ticket Number </th>
          <th class='text-left'> Description </th>");
            $x =0;
            // output data for each row dynamically
          while($row = $result->fetch_assoc()) {
              echo "<tr class='text-left'>
              <td><input type=\"radio\" name=\"RadioGroup1\" value=" . $x ." id=\"RadioGroup1_" . $x . "\"></td> <td>" . $row["Ticket"]. "</td> <td>" . $row["Description"]. "</td>";
                          echo ("
                          
                        </tr>"); 
                        $x+=1;            
          }
      } else {
          echo "No tickets found, try again later" . "<br>";
      }
          echo("
          </tbody>
        </table>"
        );
      $conn->close();
      ?>

    </body>
    </form>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
      $(document).ready(function(){
          $("button").click(function(){
            var selected = findSelectedRadioButton();
              $.post("ChangeTicketStatus.php",
              {
                ticketNum: selected,
                currentTicketStatus: "unclaimed",
                statusToSetTo: "in-progress"
              },
              function(data,status){
                  if (!alert(data)){ window.location.reload(); };
              });
          });
      });
      </script>
      <body>

            <button type="button" class="btn btn-primary">Claim Ticket</button>

    <br>
    <!-- <button onclick="findSelectedRadioButton()" type="button" class="btn btn-primary">Primary Button</button> -->

      <script>
        function findSelectedRadioButton() {
        var selected = document.querySelector('input[name = "RadioGroup1"]:checked').value;
        // alert("you selected " + selected);
        return selected;
      }

      </script>



    <br>
    <br>    

        <br>   

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