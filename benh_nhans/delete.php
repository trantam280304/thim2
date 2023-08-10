<?php
// Ket noi CSDL
include_once '../db.php';
// Lay ID tren url xuong
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
// Viet cau SQL
$mysql = "DELETE FROM benh_nhans WHERE MABENHNHAN = $id";
// Thuc thi SQL
$conn->exec($mysql);
//Chuyen huong ve danh sach
header("Location:index.php");
die();