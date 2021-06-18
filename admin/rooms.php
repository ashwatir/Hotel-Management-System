<?php 
    include("db.php");
    session_start();
    ob_start();
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
    <style>
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	td{
		vertical-align: middle !important;
	}
</style>
</head>
<body>
<div id="wrapper">
        <?php include("navbar.php"); ?>
        <div id="page-wrapper">
            <div id="page-inner">
            
            <div class="col-md-4">
			<form method = "POST" enctype = "multipart/form-data">
				<div class="card">
					<div class="card-header">
						    Room Category Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Category</label>
								<input type="text" class="form-control" name="room_type">
							</div>
							<div class="form-group">
								<label class="control-label">Price</label>
								<input type="number" class="form-control text-right" name="price" step="any">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type = "file" required = "required" id = "photo" name = "photo" />
							</div>
							<div class = "form-group">
								<button style="margin-right: 5px;" name = "add_room" class="btn btn-sm btn-primary col-sm-3 offset-md-3"><i class = "glyphicon glyphicon-save"></i> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-category').get(0).reset()"> Cancel</button>
							</div>
					</div>

				</div>
			</form>
			</div>

			<!-- room query -->
			<?php
					if(ISSET($_POST['add_room'])){
						$room_type = $_POST['room_type'];
						$price = $_POST['price'];
						$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
						$photo_name = addslashes($_FILES['photo']['name']);
						$photo_size = getimagesize($_FILES['photo']['tmp_name']);
						move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
						$db->query("INSERT INTO `room` (room_type, price, photo) VALUES('$room_type', '$price', '$photo_name')") or die("mysqli_error()");
						header("location:rooms.php?success1");
						}
					?>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Img</th>
									<th class="text-center">Room</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $db->query("SELECT * FROM room order by room_id asc");
								while($row=$cats->fetch_assoc()):
								?>
							
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>

								
									<td class="text-center">
										<img src="<?php echo isset($row['photo']) ? '../photo/'.$row['photo'] :'' ?>" alt="" id="cimg">
									</td>
									<td class="">
										<p>Name : <b><?php echo $row['room_type'] ?></b></p>
										<p>Price : <b><?php echo "Rs ".number_format($row['price'],2) ?></b></p>
									</td>
									
									<td class="text-center">
										<a class="btn btn-sm btn-primary edit_cat" a href = "edit_room.php?room_id=<?php echo $row['room_id']?>"><i class = "glyphicon glyphicon-edit"></i>Edit</a>
										<a class="btn btn-sm btn-danger delete_cat" onclick = "confirmationDelete(this); return false;" href = "delete_room.php?room_id=<?php echo $row['room_id']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a>
										
									</td>
										
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<?php 
	if(isset($_GET['success1'])){
            		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


					   <script>
					     swal({
					        title: "Room Added Successfully",
					        
					        icon: "success",
					        button: "DONE",
					      });
					   </script>
					   
					';
            	}
    elseif(isset($_GET['success2'])){
            		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


					   <script>
					     swal({
					        title: "Room Edited Successfully",
					        
					        icon: "success",
					        button: "DONE",
					      });
					   </script>
					   
					';
            	}
    elseif(isset($_GET['success3'])){
            		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


					   <script>
					     swal({
					        title: "Room Deleted Successfully",
					        
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




</body>
</html>