<?php 
    include("db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
        <?php include("navbar.php"); ?>
        <div id="page-wrapper">
            <div id="page-inner">

            <div class = "panel-body">
				<div class = "alert alert-info">Accounts</div>
				<a class = "btn btn-success" href = "add_acc.php"><i class = "glyphicon glyphicon-plus"></i> Create New Account</a>
				<br />
				<br />
				<div class="tdiv" style="overflow-x:auto;">
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $db->query("SELECT * FROM `login`") or die("mysqli_error()");
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo md5($fetch['pw'])?></td>
							<td><a class="btn btn-sm btn-primary edit_cat" href = "edit_acc.php?id=<?php echo $fetch['id']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a> <a class="btn btn-sm btn-danger delete_cat" onclick = "confirmationDelete(this); return false;" href = "delete_acc.php?id=<?php echo $fetch['id']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				</div>
			</div>
            
            <?php 
            	if(isset($_GET['success'])){
            		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


					   <script>
					     swal({
					        title: "Edited Successfully",
					        
					        icon: "success",
					        button: "DONE",
					      });
					   </script>
					   
					';
            	}
            	elseif (isset($_GET['success2'])) {
            		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


					   <script>
					     swal({
					        title: "Account Created Successfully",
					        
					        icon: "success",
					        button: "DONE",
					      });
					   </script>
					   
					';
            	}
            	elseif(isset($_GET['del_success'])){
            		
            		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


					   <script>
					     swal({
					        title: "Account Deleted Successfully",
					        
					        icon: "success",
					        button: "DONE",
					      });
					   </script>
					   
					';
            	}
             ?>

                <!-- /. ROW  -->
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
    
    <script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>


</body>
</html>