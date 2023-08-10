<?php
include_once '../db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (!$id) {
    header("Location: index.php");
}
$sql = "SELECT * FROM `benh_nhans` WHERE MABENHNHAN = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);
// die();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // in du lieu nguoi dung gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();
    // 
    $TENBENHNHAN = $_REQUEST['TENBENHNHAN'];
    $PHONG = $_REQUEST['PHONG'];
    $NGAYNHAPVIEN = $_REQUEST['NGAYNHAPVIEN'];
    $GIOITINH = $_REQUEST['GIOITINH'];
    $TINHTRANG = $_REQUEST['TINHTRANG'];
    $THONGTIN = $_REQUEST['THONGTIN'];


    $sql = "UPDATE `benh_nhans` SET `TENBENHNHAN` = '$TENBENHNHAN',
     `PHONG` = '$PHONG',`NGAYNHAPVIEN` = '$NGAYNHAPVIEN',
     `GIOITINH` = '$GIOITINH', `TINHTRANG` = '$TINHTRANG',
     `THONGTIN`='$THONGTIN' WHERE `MABENHNHAN` = $id";
    //Thuc hien truy van
    $conn->exec($sql);

    // chuyen huong ve trang danh sach
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>

<body>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0px;
        }

        h2 {
            color: #333;
            margin-left: 200px;
        }

        form {
            max-width: 500px;
            margin: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #666;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <h2>Sửa bệnh nhân</h2>

    <form action="" method="POST">
        <label for="fname">Tên bênh nhân :</label><br>
        <input type="text" name="TENBENHNHAN" value="<?= $row['TENBENHNHAN']; ?>"><br>

        <label for="lname">Phòng :</label><br>
        <input type="number" name="PHONG" value="<?= $row['PHONG']; ?>"><br><br>
        <label for="lname">Ngày nhập viện : </label><br>
        <input type="date" name="NGAYNHAPVIEN" value="<?= $row['NGAYNHAPVIEN']; ?>"><br><br>

        <label for="lname">Giới tính:</label><br>
        <select name="GIOITINH" required>
            <option value="Nam" <?php if ($row['GIOITINH'] == 'Nam') echo 'selected'; ?>>Nam</option>
            <option value="Nữ" <?php if ($row['GIOITINH'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
        </select><br><br>

        <label for="lname">Tình trạng :</label><br>
        <input type="text" name="TINHTRANG" value="<?= $row['TINHTRANG']; ?>"><br><br>

        <label for="lname">Thông tin : </label><br>
        <input type="tex" name="THONGTIN" value="<?= $row['THONGTIN']; ?>"><br><br>

        <input type="submit" value="SỬA">
    </form>



</body>

</html>