<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <style type="text/css">
        img {
            transition: transform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
        }
    </style>


</head>

<body>
    <?php
    require 'conn.php';

    $sql_select = "SELECT * FROM queue";
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST['submit'])) {
        if (!empty($_POST['QNumber'])) {
            // $uploadFile = $_FILES['Picture']['name'];
            // $tmpFile = $_FILES['Picture']['tmp_name'];
            // echo " upload file = " . $uploadFile;
            // echo " tmp file = " . $tmpFile;
            $sql = "INSERT INTO queue (QDate, QNumber, Pid, QStatus ) VALUES (:QDate, :QNumber, :Pid, :QStatus);";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':QDate', $_POST['QDate']);
            $stmt->bindParam(':QNumber', $_POST['QNumber']);
            $stmt->bindParam(':Pid', $_POST['Pid']);
            $stmt->bindParam(':QStatus', $_POST['QStatus']);
            // $stmt->bindParam(
            //     ':Picture',
            //     $uploadFile
            // );

            echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

            try {
                if ($stmt->execute()) :
                    echo '
                        <script type="text/javascript">        
                        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly add คนไข้จิตเวช",
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

                    echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal({
                title: "ไม่สำเร็จ",
                text: "ไม่สามารถเพิ่มได้",
                icon: "warning",
                confirmButtonText: "ok",
              }).then(function(){
                window.location.href = "index.php";
              });
            });
          </script>';
                endif;
            } catch (PDOException $e) {
                echo 'Fail! ' . $e;
            }
            $conn = null;
        }
    }
    ?>




    <div class="container-sm mt-5 shadow-lg p-3 col-md-3 bg-dark rounded w-30 ">
        <div class="justify-content-center flex-column align-item-center ">
            <!-- <div class="d-flex align-items-center justify-content-center"> -->
            <h3>ฟอร์มเพิ่มข้อมูลคิว</h3>
            <form action="AddQueue.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <input type="date" placeholder="วันที่" name="QDate" class="form-control" required>
                </div>
                <div class="mb-3">

                    <label for="name" class="col-sm-2 col-form-label"> สถานะ : </label>
                    <select name="QStatus" id="QStatus" class="form-control">
                        <option value="รอเข้ารับการรักษา">รอเข้ารับการรักษา</option>
                        <option value="รักษาเสร็จแล้ว">รักษาเสร็จแล้ว</option>
                    </select>

                </div>
                <div class="mb-3">
                    <input type="text" placeholder="หมายเลขคิว" name="QNumber" class="d-grid gap-4  form-control  " required>
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="รหัสบัตรประชาชน" class="d-grid gap-6 form-control " name="Pid" a-describedby="Pid">

                    <div id="Pid" class="form-text">โปรดใส่รหัสบัตรที่มีในฐานข้อมูล</div>
                </div>
                <!-- <div class="g-3 mt-n1"> -->
                <input type="submit" value="Submit" name="submit" class="btn btn-light btn-radius float-end " />
                <button type="button" class="d-flex justify-content-center btn btn-dark btn-radius float-end " onclick=" history.back();">Back</button>


                <!-- แนบรูปภาพ:
                    <input type="file" name="Picture" class="form-control" required> -->
            </form>
        </div>
    </div>





    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#PatientTable').DataTable();
        });
    </script>



</body>

</html>