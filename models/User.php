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

    

}
