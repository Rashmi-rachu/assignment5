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
    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="margin-top: 20%">
    <center>
        <form method="post" action="">
    <table border="1">
        <tr>
            <th colspan="3" style="text-align: center;background-color: blue"> Delete</th>
        </tr>   

        <tr>
            <th>Enter Passport Number</th><th><input type="text" name="passno"></th>
        </tr>
        <tr>
            <th colspan="3" style="text-align:center"><input type="submit" name="submit" value="Delete"></th>
        </tr>
    </table>
</form>
    </center>
    <?php
include 'con_db.php';
    if($_POST)
    {
        $pno  =$_POST['passno'];
        $q =mysqli_query($con, "select * from passport WHERE pass_no = $pno ");
        $row=mysqli_fetch_array($q);
    

$sql = mysqli_query($con,"DELETE FROM  `passport`  WHERE pass_no='$pno'");
if($sql)
                    {
                        echo '<script>alert("Data deleted Successfully");window.location="viewpass.php"</script>';
                    }
                    else
                    {
                       echo '<script>alert("Failed");</script>'; 
                    }
}
?>
</body>
</html>
