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
            <div class = "alert alert-info">Edit Room Information</div>
            <div class="col-lg-5">
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
								<button style="margin-right: 5px;" name = "edit_room" class="btn btn-sm btn-primary col-sm-3 offset-md-3"><i class = "glyphicon glyphicon-save"></i> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-category').get(0).reset()"> Cancel</button>
							</div>
					</div>

				</div>
			</form>
			</div>

			<!-- room query -->
			<?php
            
            if(ISSET($_POST['edit_room'])){
                $room_type = $_POST['room_type'];
                $price = $_POST['price'];
                $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                $photo_name = addslashes($_FILES['photo']['name']);
                $photo_size = getimagesize($_FILES['photo']['tmp_name']);
                move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
                $db->query("UPDATE `room` SET `room_type` = '$room_type', `price` = '$price', `photo` = '$photo_name' WHERE `room_id` = '$_REQUEST[room_id]'") or die("mysqli_error()");
                header("location:rooms.php?success2");
            }
        ?>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			
			<!-- Table Panel -->
		</div>
	</div>	

</div>

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
    




</body>
</html>