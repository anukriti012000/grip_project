
<html>
<head>
<title>Customers</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.display_table{
    width:100vw;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content: center;
    text-align:center;
}
.center_div{
    width:100vw;
    height:100vh;
	justify-content: center;
    background-image:url('heya.jpg');
    background-repeat:no-repeat;
    background-size:100%;
	padding: 50px;
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius:10px;
    margin:auto;
    opacity: 0.7;
}
h1{
    font-size:45px;
    font-family: 'Baloo Bhaina 2', cursive;
    color:rgb(0,0,0);
    text-align:center;
    margin: auto;
	padding: 10px;
}
table{
    border-collapse:collapse;
    background-color:rgb(108, 109, 112);
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius: 10px;
    border-collapse:collapse;
    table-layout:fixed;
    opacity:0.9;
    color:#F7CC1A;
    font-weight:bold;
    margin:auto;
}
th,td{
  border:1px solid #f2f2f2;
   padding:8px 30px;
  text-align:center;
  opacity:0.9;
  /* color:#f2f2f2 ;  */
  background-color:blue;
}
th{
    text-transform:uppercase;
    font-weight:500;
    color:yellow;
}
td{
    font-size:13px;
}
a{
    color:cyan;
}

  </style>
</head>
<body>
<div class="main_div">
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid">		
	  <img src="https://image.shutterstock.com/image-vector/bank-icon-logo-vector-600w-399995245.jpg" alt="Logo" width="64" height="48">
		<a class="navbar-brand" href="homepage.html">Online Bank</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="cust.php">Home</a>
			</li>
			<!-- <li class="nav-item">
			  <a class="nav-link" href="customer.php"> Customers</a>
			</li>
			 -->
			<!-- </li> -->
		</div>
	  </div>
	</nav>
         
 </div>
 <div class="display_table">
                 <div class="center_div">
                 <h1>Customers at The Sparks Bank</h1>
    <div class="center_div">
    <table border="2">
        <tr>
            <th>Customer_name</th>
            <th>Account_no</th>
            <th>Email</th>
            <th>Available_Balance</th>
            <th colspan="2" align="center">Operation</th>
</tr>
    </div>
</div>
</div>
<?php
include("conn.php");
$query="select * from customer_details";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
    {
        echo"
        <tr>
        <td>".$result['Name']."</td>
        <td>".$result['acc_no']."</td>
        <td>".$result['email']."</td>
        <td>".$result['curr_bal']."</td>
        <td><a href='transaction1.php?ac=$result[acc_no]'>Make Transaction</td>
        </tr>";
   }
}
?>
</table>
</body>
</html>