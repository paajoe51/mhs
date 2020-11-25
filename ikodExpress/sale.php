<?php
if (empty($_POST['service_type'] || $_POST['amount_paid'] || $_POST['description'] ||  $_POST['customer_name'])){
    //do something 
    echo 'something is missing ';
}
else{
   // echo 'we have all';
 // echo  $_POST['service_type'];
   echo $_POST['amount_paid']. "<br>"; 
   echo $_POST['description']. "<br>";
   echo $_POST['customer_name']. "<br>";
}
$amount_paid = $_POST['amount_paid'];
$description=$_POST['description'];
$customer_name=$_POST['customer_name'];
?>
