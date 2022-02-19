<?php 
include_once("Database.php");

class User{
public static $table_name = 'users';    
private $db;
private $id;
private $emri;
private $pass;
private $email ;
private $mbiemri;
private static $notifications = [];

public function __construct (){
$this->db=new Database();
}

  public static function db()
    {
        return Database::instance();
    }

public function UserExists($email){
    $query = "SELECT * FROM ".User::$table_name. " where email = ?";
    $stmt = $this->db->conn->prepare($query);
    $stmt->bindParam(1,$email, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn()>0;
}

    public function getNotification($notification)
    {
        if (!in_array($notification, self::$notifications)) {
            $notification = '';
        }
        return $notification;
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM " . User::$table_name . " WHERE email = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
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
        
        $user = $this->getUserByUsername($email);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if ($user == null) {
            self::$notifications[] = Notification::$loginError;
            return false;
        }
        if(password_verify($user->pass, $hashed_password)) {
			self::$notifications[] = Notification::$loginSuccess;
			Session::setUserIfLogged($email);
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

    public static function register($emri, $mbiemri, $email, $password, $passwordConfirm)
    {
        self::validateEmail($email);
        self::validateName($emri);
        self::validateLastname($mbiemri);
        self::validatePassword($password, $passwordConfirm);
        if (empty(self::$notifications) == true) {
            self::db()->addUser($emri, $mbiemri, $email, self::passwordHash($password));
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
     private static function validateEmail($email)
    {
        if (empty($email)) {
            array_push(self::$notifications, Notification::$emailZbrazetmsg);
            return;
        }

        if (self::db()->isUserEmailExists($email)) {
            array_push(self::$notifications, Notification::$emailEkziston);
            return;
        }

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            array_push(self::$notifications, Notification::$emailJoValide);
            return;
        }
    }




}