<?php
include 'con_db.php';
if($_POST)
    {
        $acno  =$_POST['acno'];
    }
?>

<html>
<head>
   
    <style type="text/css">
        p {
color:white;
font-size:50px;
position: absolute;
top: 20%;
left: 40%;
transform: translate(-50%, -50%);
}
a{
    text-decoration: none;
}

    </style>
}
</head>
<body style="margin-top: 20%;">
    <center>
        <form method="post" action="">
    <table border="1" style="text-align:left;">
        <tr>
            <th colspan="2" style="text-align:center;background-color: blue"> Deposit</th>
        </tr>
        <tr>
            <th>Acccount Number</th><th><input type="text" name="acno" readonly="" value="<?php echo $acno?>"></th>
        </tr>
        <tr>
            <th>Enter the amount to deposit</th><th><input type="number" name="amt" ></th>
        </tr> 
        <tr>
            <th colspan="3" style="text-align:center"><input type="submit" name="add" value="Deposit"></th>
        </tr> 
    </table>
</form>
<a href="deposit.php">GO BACK</a>
    </center>
    <?php
include 'con_db.php';
if(isset ($_POST["add"]))
{
$amt = $_POST['amt'];
$acno = $_POST['acno'];
        $q =mysqli_query($con, "select * from customer WHERE acno = $acno ");
        $row=mysqli_fetch_array($q);

$bal = $row['balance'];

$tot=$amt+$bal;
$sql = mysqli_query($con,"UPDATE `customer` set `balance`='$tot' WHERE acno='$acno'");
if($sql)
                    {
                        echo '<script>alert("Amount Deposited Successfully");window.location="viewbank.php"</script>';
                    }
                    else
                    {
                       echo '<script>alert("Failed");</script>'; 
                    }
}
?>
</body>
</html>
