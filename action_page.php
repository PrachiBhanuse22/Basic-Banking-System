 <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


<body>

<!-- Navigation -->
<nav class="w3-bar w3-black w3-border">
  <a href="index.html" class="w3-button w3-bar-item w3-hover-red">Home</a>
  <a href="about-us.html" class="w3-button w3-bar-item w3-hover-red">About Us</a>
  <a href="all-customers.php" class="w3-button w3-bar-item w3-hover-red">All Customers</a>
  <a href="transaction-history.php" class="w3-button w3-bar-item w3-hover-red">Transaction History</a>
</nav>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                 <script>
                  swal("Transfer Successful", "Click OK to close", "success");
                 </script>
<?php
session_start();
$sender = $_POST["sender"];
$receiver = $_POST["receiver"];
$amount = $_POST["amount"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BankingSystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
            

$sql = "UPDATE customerinfo SET amount=amount-$amount WHERE customerid=$sender";
$conn->query($sql);
$sql = "UPDATE customerinfo SET amount=amount+$amount WHERE customerid=$receiver";
$conn->query($sql);

$sql1="select * from customerinfo where customerid=$sender";
$res1=$conn->query($sql1);
$ss="";
if($res1->num_rows>0)
{
  while($row1=$res1->fetch_assoc())
  {
    $ss=$row1["name"];
  }
}

$sql2="select * from customerinfo where customerid=$receiver";
$res2=$conn->query($sql2);
$rr="";
if($res2->num_rows>0)
{
  while($row1=$res2->fetch_assoc())
  {
    $rr=$row1["name"];
  }
}

$current_date = date("Y-m-d H:i:s");
$sql="insert into transactions values('$ss','$rr',$amount,'$current_date')";
$conn->query($sql);


mysqli_close($conn);

?>


</body>
</html>