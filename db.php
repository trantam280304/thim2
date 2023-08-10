    <?php
$username   = 'root';
$password   = '';
$database   = 'quan_ly_benh_nhan';

define('ROOT_DIR', dirname(__FILE__) );
try {
    
    $conn = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (Exception $e) {
    // echo $e->getMessage();
    echo '<h1>Khong the ket noi CSDL</h1>';
}
