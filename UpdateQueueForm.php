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
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <?php
    require 'conn.php';

    // if (isset($_GET['QDate'], $_GET['QNumber'])) {
    //     $query_select = 'SELECT * FROM queue WHERE QDate=? and QNumber=?';
    //     $stmt = $conn->prepare($query_select);
    //     $params = array($_GET['QDate'], $_GET['QNumber']);
    //     $stmt->execute($params);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    if (isset($_GET['Pid'])) {
        $sql_select_customer = 'SELECT * FROM queue WHERE Pid=?';
        $stmt = $conn->prepare($sql_select_customer);
        $stmt->execute([$_GET['Pid']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>


    <div class="container-sm mt-5 shadow-lg p-3 col-md-3 bg-dark rounded w-30 ">
        <div class="justify-content-center flex-column align-item-center ">

            <h3>ฟอร์มแก้ไขข้อมูลคิว</h3>
            <form action="UpdateQueue.php" method="POST">

                <label for="name" class="col-sm-5 col-form-label"> วันที่จองเข้ารับการรักษา : </label>
                <input type="date" name="QDate" class="form-control" required value="<?= $result['QDate']; ?>">


                <label for="name" class="col-sm-2 col-form-label"> รหัสคิว : </label>
                <input type="number" name="QNumber" class="form-control" required value="<?= $result['QNumber']; ?>">

                <label for="name" class="col-sm-2 col-form-label"> รหัสบัตรประชาชน : </label>
                <input type="text" name="Pid" class="form-control" required value="<?= $result['Pid']; ?>">

                <label for="name" class="col-sm-2 col-form-label"> สถานะ : </label>
                <select name="QStatus" id="QStatus" class="form-control">
                    <option value="รอเข้ารับการรักษา">รอเข้ารับการรักษา</option>
                    <option value="รักษาเสร็จแล้ว">รักษาเสร็จแล้ว</option>
                </select>

                <br> <button type="submit" name="submit" class="mb-3 btn btn-light btn-lg btn-radius">แก้ไขข้อมูล</button> <br>
                <button type="button" class="mb-3 d-flex justify-content-center btn btn-outline-light btn-radius" onclick=" history.back();">Back</button>
            </form>
        </div>
    </div>
    </div>
    </div>

</body>

</html>