<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

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
    $sql_select = 'SELECT * FROM queue,gender ORDER BY Pid';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST['submit'])) {
        if (!empty($_POST['QNumber']) && !empty($_POST['QNumber'])) {
            echo "QDate". $_POST['QDate'];
            $uploadFile = $_FILES['Picture']['name'];
            $tmpFile = $_FILES['Picture']['tmp_name'];
            echo " upload file = " . $uploadFile;
            echo " tmp file = " . $tmpFile;

            
            $sql = "insert into queue (Qdate, QNumber, Pid)
            values (:Qdate, :Qnumber, :Pid, )";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':QDate', $_POST['QDate']);
            $stmt->bindParam(':QNumber', $_POST['QNumber']);
            $stmt->bindParam(':Pid', $_POST['Pid']);

            $fullpath = "./picture/" . $uploadFile;
            move_uploaded_file($tmpFile, $fullpath);

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
                                    text: "Successfuly ",
                                    type: "success",
                                    timer: 2500,
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




    <div class="container">
        <div class="row">
            <div class="col-md-4"> <br>
                <h3>ฟอร์มเพิ่มข้อมูลคิว</h3>
                <br><br>
                <form action="addQueue.php" method="">
                    <input type="date" placeholder="วันที่" name="Qdate" class="form-control" required>
                    <br>
                    <input type="number" placeholder="หมายเลขคิว" name="" class="form-control" required>
                    <br>
                    <input type="text" placeholder="รหัสบัตรประชาชน" class="form-control" name="Pid">
                    <br>
                   
                    <select name="genderID" class="form-control">
                        <?php
                        while ($t = $stmt_s->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <option value="<?php echo $t['genderID'] ?>">
                                <?php echo $t['genderDescription'] ?>
                            </option>

                        <?php

                        endwhile;
                        ?>
                    </select>
                    <br> <br>
                    แนบรูปภาพ:
                    <input type="file" name="Picture" class="form-control" required>
                    <br><br>
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>



</body>

</html>