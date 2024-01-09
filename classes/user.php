<?
    class User{
        public $id;
        public $username;
        public $password; 
        /*
            Phương thức chứng thực người dùng
            So khớp password trên DB với password người dùng cung cấp
        */
        public static function authenticate($conn, $username, $password){
            $sql = "select * from users where username=:username";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();
            $user = $stmt->fetch();
            if($user){
                $hash = $user->password;
                return password_verify($password, $hash);
            }
        }
    }
?>