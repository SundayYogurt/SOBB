<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateQueue</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://img.shields.io/npm/v/@sweetalert2/theme-dark.svg"> </script>
    <script src="https://www.npmjs.com/package/@sweetalert2/theme-dark"></script>
    <link rel=" stylesheet" href="@sweetalert2/theme-dark/dark.css">
    </script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    </script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>

</body>

</html>
<script>
    import Swal from 'sweetalert2'
    // or via CommonJS
    const Swal = require('sweetalert2')

    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'
    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import '@sweetalert2/theme-dark/dark.scss'
</script>
<?php

if (isset($_POST['submit'])) {
    require 'conn.php';


    $QDate = $_POST['QDate'];
    $QNumber = $_POST['QNumber'];
    $Pid =  $_POST['Pid'];
    $QStatus =  $_POST['QStatus'];

    // echo 'QDate = ' . $QDate;
    // echo 'QNumber = ' . $QNumber;
    // echo 'Pid = ' . $Pid;
    // echo 'QStatus  = ' . $QStatus;


    $sql = "UPDATE queue SET QDate = :QDate, QNumber = :QNumber, Pid = :Pid, Qstatus = :Qstatus WHERE Pid = :Pid";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':QDate', $_POST['QDate']);
    $stmt->bindParam(':QNumber', $_POST['QNumber']);
    $stmt->bindParam(':Pid', $_POST['Pid']);
    $stmt->bindParam(':Qstatus', $_POST['QStatus']);



    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '

        <script type="text/javascript">

        $(document).ready(function(){
Swal.showLoading()
Swal.getImage()
            swal({
                title: "Success!",
                text: "Successfuly update คนไข้",
                type: "success",
                
                timer: 25000,
                showConfirmButton: "ok"


              }, function(){
                    window.location.href = "index.php";
              });
        });

        </script>
        ';
    }
}
$conn = null;

//    }, function(){
//                     window.location.href = "index.php";
//               });