<?php
include("conn.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="pro.css">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: 'Baloo Bhaina 2', cursive;

        }

        #navbar {
            display: flex;
            align-items: center;
        }

        #logo {
            margin: 10px 36px;
        }

        #logo img {
            height: 68px;
            margin: 8px 5px;
        }

        #navbar ul {
            display: flex;
            padding: 0px 200px;
        }

        #navbar::before {
            content: "";
            background-color: rgb(11, 0, 75);
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: -1;

        }

        #navbar {
            position: relative;
        }

        #navbar ul li {
            list-style: none;
            font-size: 1.3rem;
        }

        #navbar ul li a {
            color: white;
            display: block;
            padding: 3px 22px;
            border-radius: 20px;
            text-decoration: none;
        }

        #navbar ul li a:hover {
            color: black;
            background-color: chocolate;
        }

        .bg {
            background-image: url("shiv.jpg");
            background-size: cover;
            z-index: -1;
            opacity: 0.9;
            
        }
        
        #heading {
            margin: 0px 400px;
        }

        .block1 {
            border: 2px solid rgb(39, 26, 26);
            
     width: 684px;
    margin: 89px 260px;
    border-radius: 89px;
    padding: 28px 67px;
    background-color: rgb(131, 90, 90);
    opacity: 0.8;

} 

        #ad {
            color: black;

        }

        #conn {
            margin: auto 400px;
        }
        /* .h1{
            font size: 14px;
        } */
        input,textarea{
            border: 2px solid black;
            border-radius: 10px;
            font-size: 20px;
        }
        .btn{
            color: white;
            background:black ;
            cursor: pointer;
            width: 20%;
        }
        .btn:hover{
            color: black;
            background-color: cyan;
        }
        .bt{
            margin: auto 400px;
            padding: 6px 44px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            background-color: rgb(173, 14, 9);
        }
        .bt:hover{
            color: black;
            background-color: rgb(199, 67, 15);
        }

        
    </style>
    <title>BANKING</title>
</head>


<body>
   
    <div class="back">
        <nav id="navbar">
            <div id="logo">
                <img src="logo.jpg" alt="MY BANKING">
            </div>

            <ul>
                <li class="item"><a href="cust.php">Home</a></li>
                <li class="item"><a href="disp1.php">View Customer Details</a></li>
                <li class="item"><a href="disp2.php">View Transaction Details</a></li>

            </ul>
        </nav>
        <div class="bg">
            <h1 id="heading">Welcome to Online Banking</h1>
            <div class="block1">
                <form>
                    <div class="h1">
                        <h2 id="ad">Enter Details for the new Customer</h2>
                        <br>
                        <div>
                           NAME: <input type="text" id="name" name="name">
                        </div>
                        <br>
                        <div>
                            ACCOUNT NUMBER :<input type="text" id="accno" name="accno">
                        </div>
                        <br>
                        <div>
                            EMAIL : <input type="email" id="email" name="email">
                        </div>
                        <br>
                        <div>
                            CURRENT BALANCE: <input type="number" id="bal" name="bal">
                        </div>
                        <br>
                        <div>
                            <button class="btn">Reset</button>
                            <button class="bt">Submit</button>
                        </div>
                    </div>
             <!-- <p id="msg">Details successfully submitted</p> -->

                </form>

            </div>
                   

        <h2 id="conn">Your Bank at your Fingertips</h2>
    </div>
    <script src="pro.js"></script>

</body>

</html>
<?php
 $name=$_GET['name'];
 $accno=$_GET['accno'];
 $email=$_GET['email'];
 $bal=$_GET['bal'];
//  echo "$name";
//  echo "$accno";
//  echo "$email";
//  echo "$bal";

 $query="INSERT INTO customer_details VALUES ('$name', '$accno', '$email', '$bal')";
 $data=mysqli_query($conn,$query);
 if($data)
 {
    // echo "Data inserted into database";
 }
 else
// echo "Failed to insert data";
 
 ?>
 

 
