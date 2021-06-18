<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


   <script>
     swal({
        title: "Booking Unsuccessful",
        text: "Room Not Available On <?php $q_date = $db->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
              while($f_date = $q_date->fetch_array()){
                echo "".date("M d, Y ", strtotime($f_date['checkin']."+8HOURS"))."";
              }
            ?>",
        icon: "error",
        button: "DONE",
      });
   </script>
   
