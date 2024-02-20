<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <iframe width="0" height="0" src="http://youtuberepeater.com/watch?v=4xnsmyI5KMQ&name=1HOUR+of+Toothless+Dancing+to+Driftveil+City#gsc.tab=0" frameborder="0" allowfullscreen></iframe>
    <meta charset=" UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css rel="stylesheet">
    <link href=https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css rel="stylesheet">
    <link href=https://cdn.datatables.net/searchpanes/2.3.0/css/searchPanes.bootstrap5.css rel="stylesheet">
    <link href=https://cdn.datatables.net/select/2.0.0/css/select.bootstrap5.css rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="styleb.css">
</head>

<body>


    <div class="zoom"></div>
    <div class="container-sm mt-5 shadow-lg p-3  ">
        <div class="bg">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>ตารางจองคิวสำหรับเจ้าหน้าที่ <a href="AddQueue.php" class="btn float-end btn-outline-info">+เพิ่มข้อมูลการจองคิว</a>
                    </h3> <br />
                    <table id="PatientTable" class="display table table-striped nowrap table-hover table-responsive table-bordered table-dark ">

                        <thead align=" center">
                            <tr>
                                <th width="10%">วันที่จองเข้ารับการรักษา</th>
                                <th width="10%">รหัสคิว</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                                <th width="25%">ชื่อ - นามสกุล</th>
                                <th width="10%">เพศ</th>
                                <th width="10%">ภาพผู้ป่วย</th>
                                <th width="15%">สถานะคิว</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            require 'conn.php';
                            $query =
                                'SELECT * FROM queue q, patient p, gender g
                            WHERE q.Pid = p.Pid AND p.Pgender = g.genderID ';


                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $r) { ?>
                                <tr>
                                    <td><?= $r['QDate'] ?></td>
                                    <td><?= $r['QNumber'] ?></td>

                                    <td><a href="UpdateQueueForm.php?Pid=<?= $r['Pid'] ?>" class="btn btn-outline-light btn-lg btn-radius  ">แก้ไข</a></td>
                                    <td><a href=" DeleteQueue.php?Pid=<?= $r['Pid'] ?>" class="btn btn-outline-danger btn-lg btn-radius" data-toggle="modal" data-target="#ModalCenter" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>

                                    <td><?= $r['Pname'] ?></td>
                                    <td><?= $r['genderDescription'] ?></td>
                                    <td><img src="./picture/<?= $r['Picture']; ?>" width="80px" height="80px" alt="picture" class="box" onclick="enlargeImg()" id=" picture1"></td>
                                    <td><?= $r['QStatus'] ?></td>

                                </tr>
                            <?php }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src=https://code.jquery.com/jquery-3.7.1.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/2.0.0/js/dataTables.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/searchpanes/2.3.0/js/dataTables.searchPanes.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/searchpanes/2.3.0/js/searchPanes.bootstrap5.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js></script>
    <script type="text/javascript" charset="utf8" src=https://cdn.datatables.net/select/2.0.0/js/select.bootstrap5.js></script>
    <!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#PatientTable').DataTable();
        });
    </script>

    <!-- <audio controls autoplay src="./picture/dace.mp3" loop="true" width="2" height="0"> </audio> -->


    <div class="layout">
        <img src="./picture/toothless-dancing.gif" alt="toothless">
        <img src="./picture/toothless-dancing (1).gif" alt=" firewhite">


        <iframe width="180px" height="50px" src="https://www.youtube.com/embed/4xnsmyI5KMQ?si=VmpT6TfFBZaZf2Ez" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


    </div>
</body>

</html>