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
th,td{
    text-align: center;
}
th{
    background-color: blue;
}
a{
    text-decoration: none;
}
    </style>
   
</head>
<body style="margin-top: 10%">
    <center>
        <form method="post" enctype="multipart/form-data">
    <table border="1" style="text-align:left;">
        <caption>DETAILS OF PASSANGER</caption>
        <thead>
                                            <tr>
                                                <th>Sl. No</th>
                                                <th>Passport Number</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>                                        
                                                <th>Date Of Birth</th>                                         
                                                <th>Nationality</th>                                         
                                                <th>Address</th> 
                                                <th>Gender</th>                                                
                                                <th>Image</th>             
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                          $i=1;
                                          $sql=mysqli_query($con,"SELECT * FROM passport ORDER BY pass_no ASC");
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                          ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $i++;  ?></td>
                                                
                                                <td ><?php echo $row['pass_no'];  ?></td>
                                                <td><?php echo $row['fname'];  ?></td>
                                                <td><?php echo $row['mname'];  ?></td>
                                                <td><?php echo $row['lname'];  ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($row['dob']));  ?></td>
                                                <td><?php echo $row['nationality'];  ?></td>
                                                <td><?php echo $row['address'];  ?></td>
                                                <td><?php echo $row['gender'];  ?></td>
                                                <td>
                                                    <img src="<?php echo $row['pic'];?>" height="60" width="60">
                                                </td>
                                                <td>
                                                        <a href="updatepass.php" class="btn btn-info" data-placement="top" title="Edit">Edit
                                                           
                                                        </a><br><br>
                                                        <a href="deletepass.php" onclick="return confirm('Are you sure to delete');" class="btn btn-danger" title="Delete">Delete
                                                            
                                                        </a> 
                                                </td>
                                            </tr>
                                           <?php } ?> 
                                        </tbody>
    </table>
</form>
    </center>
</body>
</html>
