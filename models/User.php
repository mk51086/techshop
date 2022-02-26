<?php
include_once("Database.php");

class User
{
    public static $table_name = 'users';
    private $db;
    public $id;
    public $emri;
    public $pass;
    public $email;
    public $mbiemri;
    public $gjinia;
    public $data;
    public $img;
    public $role;
    private static $notifications = [];

    public function __construct()
    {
        $this->db = new Database();
    }

    public function UserExists($email)
    {
        $query = "SELECT * FROM " . User::$table_name . " where email = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function getNotification($notification)
    {
        if (!in_array($notification, self::$notifications)) {
            $notification = '';
        }
        return $notification;
    }

    public function getUserbyEmail($email)
    {
        $query = "SELECT * FROM " . User::$table_name . " WHERE email = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = null;
        while ($row = $stmt->fetch()) {
            $user = new User();
            $user->id = $row['id'];
            $user->email = $row['email'];
            $user->pass = $row['password'];
            $user->emri = $row['emri'];
            $user->mbiemri = $row['mbiemri'];

        }
        return $user;
    }

    public function loginUser($email, $password)
    {
        $query = "SELECT * FROM " . User::$table_name . " WHERE email = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $this->getUserbyEmail($email);
        $u = null;
        while ($row = $stmt->fetch()) {
            $u = new User();
            $u->id = $row['id'];
            $u->email = $row['email'];
            $u->pass = $row['password'];
            $u->emri = $row['emri'];
            $u->mbiemri = $row['mbiemri'];
            $u->role = $row['role'];

        }
        if ($user == null) {
            self::$notifications[] = Notification::$loginError;
            return false;
        }
        if (password_verify($password, $user->pass)) {
            self::$notifications[] = Notification::$loginSuccess;
            if ($u->role == 1) {
                Session::setUserAdmin($email);
                header("refresh:1;url=admin");
            } else if ($u->role == 0) {
                Session::setUserIfLogged($email);
                header("refresh:3;url=index.php");
            }
            return true;
        } else {
            self::$notifications[] = Notification::$loginError;
            return false;
        }
    }

    public static function logoutUser()
    {
        Session::end();
    }

    public function register($emri, $mbiemri, $email, $password, $passwordConfirm, $gjinia, $kushtet)
    {
        self::validateEmail($email);
        self::validateName($emri);
        self::validateLastname($mbiemri);
        self::validatePassword($password, $passwordConfirm);
        self::validateGjinia($gjinia);
        self::validateKushtet($kushtet);
        if (empty(self::$notifications) == true) {
            self::$notifications[] = Notification::$registrationSuccess;
            $this->db->addUser($emri, $mbiemri, self::passwordHash($password), $email, $gjinia);
        } else
            return false;
    }

    public function newUser($emri, $mbiemri, $email, $password, $gjinia)
    {
        if (empty(self::$notifications) == true) {
            self::$notifications[] = Notification::$registrationSuccess;
            $this->db->addUser($emri, $mbiemri, self::passwordHash($password), $email, $gjinia);
        } else
            return false;
    }


    private static function validateName($emri)
    {
        if (empty($emri)) {
            array_push(self::$notifications, Notification::$emriZbrazetmsg);
            return;
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $emri)) {
            array_push(self::$notifications, Notification::$emriLettersOnly);
            return;
        }

    }


    private function validateEmail($email)
    {
        if (empty($email)) {
            array_push(self::$notifications, Notification::$emailZbrazetmsg);
            return;
        }

        if ($this->db->isUserEmailExists($email)) {
            array_push(self::$notifications, Notification::$emailEkziston);
            return;
        }

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            array_push(self::$notifications, Notification::$emailJoValide);
            return;
        }
    }

    private static function validateLastname($lastname)
    {
        if (empty($lastname)) {
            array_push(self::$notifications, Notification::$MbiEmriZbrazetmsg);
            return;
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            array_push(self::$notifications, Notification::$MbiemriLettersOnly);
            return;
        }
    }

    private static function validateTel($tel)
    {
        if (empty($tel)) {
            array_push(self::$notifications, Notification::$telZbrazet);
            return;
        }

        if (!preg_match("/^[\+]?[(]?[0-9]*$/", $tel)) {
            array_push(self::$notifications, Notification::$telNrOnly);
            return;
        }
    }

    private static function validateMsg($msg)
    {
        if (empty($msg)) {
            array_push(self::$notifications, Notification::$msgEmpty);
            return;
        }

        if (strlen($msg) < 10 || strlen($msg) > 250) {
            array_push(self::$notifications, Notification::$msgSize);
        }
    }


    private static function validatePassword($password, $passwordConfirm)
    {
        if (empty($password)) {
            array_push(self::$notifications, Notification::$passwordZbrazet);
            return;
        }

        if ($password != $passwordConfirm) {
            array_push(self::$notifications, Notification::$passwordGabim);
            return;
        }

        if (strlen($password) < 8 || strlen($password) > 25) {
            array_push(self::$notifications, Notification::$passwordLength);
            return;
        }

        if (!preg_match("#[0-9]+#", $password)) {
            array_push(self::$notifications, Notification::$passwordPaNumer);
            return;
        }

        if (!preg_match("#[A-Z]+#", $password)) {
            array_push(self::$notifications, Notification::$passwordPaShkronja);
        }
    }

    public static function passwordHash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' > 12]);
    }

    private function validateEmailMsg($email)
    {
        if (empty($email)) {
            array_push(self::$notifications, Notification::$emailZbrazetmsg);
            return;
        }

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            array_push(self::$notifications, Notification::$emailJoValide);
        }
    }


    public function contact($email, $emri, $tel, $msg)
    {

        self::validateEmailMsg($email);
        self::validateName($emri);
        self::validateTel($tel);
        self::validateMsg($msg);
        if (empty(self::$notifications) == true) {
            $this->db->addMsg($emri, $email, $msg, $tel);
        } else
            return false;
    }

    public function getTotalNumofUsers()
    {
        $query = "SELECT COUNT(*) FROM " . User::$table_name;
        $stmt = $this->db->conn->prepare($query);
        $stmt->execute();
        $num = $stmt->fetchColumn();
        return $num;
    }

    public function getNumofUsers($n)
    {
        $query = "SELECT * FROM " . User::$table_name . " LIMIT " . $n;
        $stmt = $this->db->conn->query($query);
        $users = [];
        while ($row = $stmt->fetch()) {
            $user = $this->createUser($row);
            $users[] = $user;
        }
        return $users;
    }

    public function recentUsers($n)
    {
        $query = "SELECT * FROM " . User::$table_name . " ORDER BY data DESC LIMIT " . $n;
        $stmt = $this->db->conn->query($query);
        $users = [];
        while ($row = $stmt->fetch()) {
            $user = $this->createUser($row);
            $users[] = $user;
        }
        return $users;
    }


    public function createUser($row)
    {

        $user = new User();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->pass = $row['password'];
        $user->emri = $row['emri'];
        $user->mbiemri = $row['mbiemri'];
        $user->gjinia = $row['gjinia'];
        return $user;
    }

    private static function validateGjinia($gjinia)
    {
        if (empty($gjinia)) {
            array_push(self::$notifications, Notification::$gjiniaIsempty);
        }
    }

    private static function validateKushtet($kushtet)
    {
        if ($kushtet == 0) {
            array_push(self::$notifications, Notification::$kushtetPerdorimit);
        }
    }
    
    public function getUser($id)
    {
        $query = "SELECT * FROM " . user::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = null;
        while ($row = $stmt->fetch()) {
           $user = $this->createUser($row);
        }
        return $user;
    }
    
    public function userUpdate($emri, $mbiemri,$pass,$email,$id)
    {
        $user = $this->getUser($id);
        $pass = self::passwordHash($pass);
        $query = "UPDATE " . User::$table_name . " SET emri = ?, mbiemri = ?, password = ?, email = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $emri  , PDO::PARAM_STR);
        $stmt->bindParam(2, $mbiemri , PDO::PARAM_STR);
        $stmt->bindParam(3, $pass , PDO::PARAM_STR);
        $stmt->bindParam(4, $email, PDO::PARAM_STR);
        $stmt->bindParam(5, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $user;
    }

    public function deleleteUserById($id)
    {
        $user = $this->getUser($id);
        $query = "DELETE FROM " . user::$table_name . " WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function totalRowsU()
    {
        $query = "SELECT * FROM " . user::$table_name;
        $stmt = $this->db->conn->query($query)->rowCount();
        return $stmt;
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM " . user::$table_name;
        $stmt = $this->db->conn->query($query);
        $user = [];
        while ($row = $stmt->fetch()) {
            $user = $this->createUser($row);
            $users[] = $user;
        }
        return $users;
    }




    public function getUsersPage($v1,$v2){
        $query = "SELECT * FROM " . user::$table_name . " ORDER BY data DESC LIMIT ?,?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $v1, PDO::PARAM_INT);
        $stmt->bindParam(2, $v2, PDO::PARAM_INT);
        $stmt->execute();
        $users = [];
        while ($row = $stmt->fetch()) {
            $user = $this->createUser($row);
            $users[]=$user;
        }
        return $users;
    }

}
