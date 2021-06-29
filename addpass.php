<?php 
    include 'con_db.php';
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
    </style>
</head>
<body style="margin-top: 10%">
    <center>
        <form method="post" enctype="multipart/form-data">
    <table border="1" style="text-align:left;">
        <tr>
            <th colspan="2" style="text-align:center;background-color: blue;"> Passport Form</th>
        </tr>
        <tr>
            <th>Enter Passport Number</th><th><input type="text" name="passno" placeholder="passport Number" maxlength="10"></th>
        </tr>
        <tr>
            <th>Enter First Name</th><th><input type="text" name="fname" placeholder="first name"></th>
        </tr>
        <tr>
            <th>Enter Middle Name</th><th><input type="text" name="mname" placeholder="Middle name"></th>
        </tr>
        <tr>
            <th>Enter Last Number</th><th><input type="text" name="lname" placeholder="Last name"></th>
        </tr>
        <tr>
            <th>Enter DOB</th><th><input type="date" name="dob" ></th>
        </tr>
        <tr>
            <th>Enter Nationality</th><th><input type="text" name="nation" placeholder="eg:indian"></th>
        </tr>
        <tr>
            <th>Address</th><th><textarea name="address"></textarea></th>
        </tr>
        <tr>
            <th>Select Gender</th><th><input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="other">Other</th>
        </tr>      
        <tr>
            <th>Upload Picture</th><th><input type="file" name="file"></th>
        </tr>  
        <tr>
            <th colspan="3" style="text-align:center"><input type="submit" name="submit" value="Submit"></th>
        </tr> 
    </table>
</form>
    </center>
<?php
if(isset ($_POST["submit"]))
{
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$passno = $_POST['passno'];
$nation = $_POST['nation'];
$addr = $_POST['address'];
$gender = $_POST['gender'];

$pname=$_FILES['file']['name'];
        $ftype=$_FILES['file']['type'];
        $fsize=$_FILES['file']['size'];
        $floc=$_FILES['file']['tmp_name'];
        $fstore="upload/".$pname;
        move_uploaded_file($floc,$fstore);

$sql = mysqli_query($con,"INSERT INTO passport VALUES('$passno','$fname','$mname','$lname','$dob','$nation','$addr','$gender','$fstore')");
if($sql)
                    {
                        echo '<script>alert("Data Added Successfully");window.location="viewpass.php"</script>';
                    }
                    else
                    {
                       echo '<script>alert("Failed");</script>'; 
                    }
}
?>
</body>
</html>