<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php

if (isset($_GET['Pid'])) {
    $strFoodID = ($_GET['Pid']);
}
require 'conn.php';
$sql = "DELETE FROM queue WHERE Pid = :Pid ";
$stml = $conn->prepare($sql);
$stml->bindParam(':Pid', $_GET['Pid']);


if ($stml->execute()) :
  echo '
  <script type="text/javascript">        
  $(document).ready(function(){

      swal({
          title: "Success!",
          text: "Successfuly delete food",
          type: "success",
          timer: 25000,
          showConfirmButton: "ok"
      }, function(){
              window.location.href = "index.php";
      });
  });                    
  </script>
';
else :
echo '
  <script type="text/javascript">        
  $(document).ready(function(){

      swal({
          title: "Error!",
          text: "fail to Delete",
          type: "warning",
          timer: 25000,
          showConfirmButton: "ok"
      }, function(){
              window.location.href = "index.php";
      });
  });                    
  </script>
';


endif;
$conn = null;


?>

