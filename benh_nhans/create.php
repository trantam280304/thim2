<?php
include_once '../db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // echo '<pre>';
  // print_r ($_REQUEST);
  // die();
  $TENBENHNHAN = $_REQUEST['TENBENHNHAN'];
  $PHONG = $_REQUEST['PHONG'];
  $NGAYNHAPVIEN = $_REQUEST['NGAYNHAPVIEN'];
  $GIOITINH = $_REQUEST['GIOITINH'];
  $TINHTRANG = $_REQUEST['TINHTRANG'];
  $THONGTIN = $_REQUEST['THONGTIN'];

  $sql = "INSERT INTO `benh_nhans` 
    ( `TENBENHNHAN`,`PHONG`,`NGAYNHAPVIEN`,`GIOITINH`,`TINHTRANG`,`THONGTIN`) 
    VALUES 
    ('$TENBENHNHAN','$PHONG','$NGAYNHAPVIEN','$GIOITINH','$TINHTRANG','$THONGTIN')";
  //Thuc hien truy van
  $conn->exec($sql);

  // chuyen huong ve trang danh sach
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    h2 {
      color: #191970;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 16px;
      font-family: "Roboto", Arial, sans-serif;
    margin-left: 20px;

    }

    form {
      width: 300px;
      margin: 20px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 8px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <h2>THÊM BÊNH NHÂN</h2>

  <form action="" method="POST" >
    <label for="fname">Tên bênh nhân :</label><br>
    <input type="text" name="TENBENHNHAN" required><br>
    <label for="fname">Số phòng:</label><br>
    <input type="number" name="PHONG" required><br><br>
    <label for="fname">Ngày nhập viện:</label><br>
    <input type="date" name="NGAYNHAPVIEN" required><br><br>
    

    <label for="fname">Giới tính:</label><br>
<select name="GIOITINH" required>
  <option value="Nam">Nam</option>
  <option value="Nữ">Nữ</option>
</select><br><br>

    <label for="fname">Tình trạng:</label><br>
    <input type="text" name="TINHTRANG" required><br><br>
    <label for="fname">Thông tin:</label><br>
    <input type="text" name="THONGTIN" required><br><br>
    <input type="submit" value="THÊM MỚI">
  </form>
</body>
</html>
