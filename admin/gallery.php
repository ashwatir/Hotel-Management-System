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
						    Add photo
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							
							<div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type = "file" required = "required" id = "photo" name = "photo" id="File1" />
							</div>
							<div class = "form-group">
								<button style="margin-right: 5px;" name = "add_pic" class="btn btn-sm btn-primary col-sm-3 offset-md-3"><i class = "glyphicon glyphicon-save"></i> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#File1').val('');"> Cancel</button>
							</div>
					</div>

				</div>
			</form>
			</div>

			<!-- room query -->
			<?php
					if(ISSET($_POST['add_pic'])){
						
						$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
						$photo_name = addslashes($_FILES['photo']['name']);
						$photo_size = getimagesize($_FILES['photo']['tmp_name']);
						move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/" . $_FILES['photo']['name']);
						$db->query("INSERT INTO `gallery` (photo) VALUES('$photo_name')") or die("mysqli_error()");
						header("location:gallery.php?success1");
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
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $db->query("SELECT * FROM gallery order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
							
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>

								
									<td class="text-center">
										<img src="<?php echo isset($row['photo']) ? '../assets/'.$row['photo'] :'' ?>" alt="" id="cimg">
									</td>
									
									
									<td class="text-center">
										<!-- <a class="btn btn-sm btn-primary edit_cat" a href = "edit_room.php?room_id="><i class = "glyphicon glyphicon-edit"></i>Edit</a> -->
										<a class="btn btn-sm btn-danger delete_cat" onclick = "confirmationDelete(this); return false;" href = "delete_pic.php?id=<?php echo $row['id']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a>
										
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
					        title: "Photo Added Successfully",
					        
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
					        title: "Photo Deleted Successfully",
					        
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