<!DOCTYPE html>
<html>
  <head>
    <style>
  body {
    background-image: url(transaction.jpg);
    
  }

  div {
    width: 50%;
    height: 50%;
    opacity: 0.9;

  }

  input[type=text],
  select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  button {
    width: 100%;
    background-color: #549fe6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #187edd;
  }

  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  </style>
<?php include 'conn.php'; ?> 
</head>

<body>

  <h3>Transfer Money</h3>

  <div>
    <form method="POST">
      <label for="fname">Sender's Name</label>
      <input type="text" id="fname" name="name1" value="<?php //echo $arrdata['Name']; //?>" required
        placeholder="Your name..">

      <label>Account no:</label>
      <input type="text" name="acc1" id="acc1" value="<?php //echo $arrdata['Email']; ?>" required
        placeholder="Your account no. " /><br><br>

      <label>Amount Rs:</label>
      <input type="text" name="amount1" id="amount1" value=""  style="width:210px;" required placeholder="Enter amount" /><br>

      <label for="lname">Reciever's Name</label>
      <input type="text" id="lname" name="name2" placeholder="Reciever's name..">

      <label>Account no:</label>
      <input type="text" name="acc2" id="acc2" value="" required placeholder="Enter account no." /><br><br>

      <button name="submit">Transfer</button>
    </form>
  </div>
  
  <?php


if(isset($_POST['submit']))
{
    $acc1=$_POST['acc1'];
$acc2=$_POST['acc2'];
$amount1=$_POST['amount1'];

 $query2="INSERT INTO transaction_details VALUES ('$acc1', '$acc2', '$amount1')";
$data2=mysqli_query($conn,$query2);
 if($data2)
 {
     echo "Data inserted into database";
 }
 else
{
 echo "Failed to insert data";
 }
  
    $Sender_name=$_POST['name1'];
    $Sender_account=$_POST['acc1'];
    $Sender=$_POST['amount1'];
    $Receiver_name=$_POST['name2'];
    $Receiver_account=$_POST['acc2'];
     
  

    $ids=$_GET['ac'];
    echo "$ids";
    $senderquery="select * from `customer_details` where `acc_no`='$ids' ";
    $senderdata=mysqli_query($conn,$senderquery);
  
    if (!$senderdata) {
     printf("Error: %s\n", mysqli_error($conn));
    exit();
    }

    $arrdata=mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery="select * from `customer_details` where `acc_no`='$Receiver_account'";
    $receiver_data=mysqli_query($conn,$receiverquery);
   
    if (!$receiver_data) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['acc_no'];


    if($arrdata['curr_bal'] >= $Sender)
    {  

      $decrease_sender=$arrdata['curr_bal'] - $Sender;
      $increase_receiver=$receiver_arr['curr_bal'] + $Sender;
       $query="UPDATE `customer_details` SET `acc_no`='$ids',`curr_bal`= $decrease_sender  where `acc_no`='$ids' ";
       $rec_query="UPDATE `customer_details` SET `acc_no`='$id_receiver',`curr_bal`= $increase_receiver where  `acc_no`='$id_receiver'";
       $res= mysqli_query($conn,$query);
       $rec_res= mysqli_query($conn,$rec_query);
       if($res && $rec_res)
       {
       ?>
  <script>
    swal("Done!", "Transaction Successful!", "success");
  </script>

  <?php
   
      }
      else
      {
      ?>
  <script>
    swal("Error!", "Error Occured!", "error");
  </script>

  <?php
      
      }
    }
  

  else
 {
  ?>
  <script>
    swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
  </script>
  <?php
   
 }
 
}
?>

</body>

</html>