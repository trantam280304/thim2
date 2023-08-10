<?php
include_once '../db.php';

// Tìm kiếm
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    //S oạn câu lệnh SQL với điều kiện tìm kiếm
    $sql = "SELECT * FROM `benh_nhans` WHERE `TENBENHNHAN` LIKE :searchTerm OR `PHONG` LIKE :searchTerm";

    // Truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute(); // Execute the prepared statement

    $rows = $stmt->fetchAll();
} else {
    // Default query without search condition
    $sql = "SELECT * FROM `benh_nhans`";

    // Truy vấn
    $stmt = $conn->query($sql);
     // Lấy dữ liệu

    $rows = $stmt->fetchAll();
}
?>



<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #363636;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 5px;
            width: 200px;
            margin-right: 10px;
        }

        .search-button {
            padding: 5px 10px;
            background-color: #FFE4B5;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #333;
            color: #fff;
            border: 1px solid #333;
        }

        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #ff6a00, #ee0979);
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .edit-button,
        .delete-button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-button:hover,
        .delete-button:hover {
            background-color: #45a049;
        }

        .delete-button {
            background-color: #f44336;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
    <h2>THÔNG TIN BỆNH NHÂN</h2>
    <div class="header">
        <a href="create.php" class="add-button">Thêm mới</a>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Nhập tên bạn cần tìm">
            <input type="submit" value="Tìm kiếm">
        </form>
    </div>

</head>

<body>


    <table>
        <tr>
            <th>STT</th>
            <th>Tên bênh nhân </th>
            <th>Phòng</th>
            <th>Ngày nhập viện</th>
            <th>Giới tính</th>
            <th>Tình trạng</th>
            <th>Thông tin</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($rows as $r) : ?>
            <td><?php echo $r['MABENHNHAN']; ?></td>

            <td><?php echo $r['TENBENHNHAN']; ?></td>
            <td><?php echo $r['PHONG']; ?></td>
            <td><?php echo $r['NGAYNHAPVIEN']; ?></td>
            <td><?php echo $r['GIOITINH']; ?></td>
            <td><?php echo $r['TINHTRANG']; ?></td>
            <td><?php echo $r['THONGTIN']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $r['MABENHNHAN']; ?>" class="edit-button">Sửa</a>
                <a onclick="return confirm('Bạn có chắc muốn xóa ?');" href="delete.php?id=<?php echo $r['MABENHNHAN']; ?>" class="delete-button">Xóa</a>
            </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>