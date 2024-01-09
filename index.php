<?
    require "config.php";
    require "classes/database.php";
    require "classes/user.php";
    $conn = require "inc/db.php";
    if($conn){
        echo "Kết nối thành công <br />";
        $rs = User::authenticate($conn, "abc", "abcd12");
        if($rs){
            echo"Đăng nhập thành công";
            //tạo session
        }else{
            die("thông tin đăng nhập không đúng");
        }
    }
?>