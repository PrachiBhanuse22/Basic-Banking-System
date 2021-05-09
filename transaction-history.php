<!DOCTYPE html>
<html>
<head>
	<title>
		TRANSACTIONS
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!--<link rel="stylesheet" type="text/css" href="NavBar.css">-->
  <link rel="stylesheet" type="text/css" href="TABLE.css">
  <link rel="stylesheet" href="src/bootstrap.min.css">
    <script src="src/jquery.min.js"></script>
    <script src="src/popper.min.js"></script>
    <script src="src/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<body>

<!-- Navigation -->
<nav class="w3-bar w3-black w3-border">
  <a href="index.html" class="w3-button w3-bar-item w3-hover-red">Home</a>
  <a href="about-us.html" class="w3-button w3-bar-item w3-hover-red">About Us</a>
  <a href="all-customers.php" class="w3-button w3-bar-item w3-hover-red">All Customers</a>
  <a href="transaction_history.php" class="w3-button w3-bar-item w3-hover-red">Transaction History</a>
</nav>


<div class="container w3-padding-48 w3-center">
  <h3>TRANSACTION HISTORY</h3>
  
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="info">
        <th>SENDER</th>
        <th>RECEIVER</th>
        <th>AMOUNT</th>
        <th>TIME</th>
      </tr>
    </thead>


  <?php
  include("connection.php");
  error_reporting(0);
  $query="select * from transactions";
  $data=mysqli_query($conn,$query);

  $total=mysqli_num_rows($data);
  
  


  if($total!=0)
  {
    while($result=mysqli_fetch_assoc($data))
    {
      echo"
      <tr>
      <td>".$result['sender']."</td>
      <td>".$result['receiver']."</td>
      <td>".$result['amount']."</td>
      <td>".$result['sent_on']."</td>
      </tr>";
    }
    
  }
  else
  {
  echo "no record";
  }
  ?>
</table>
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <p class="w3-medium">
    Powered by Prachi Gopichand Bhanuse
  </p>
</footer>

</body>
</html>