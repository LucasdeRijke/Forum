<?php 

class User{

	public function login($data, $conn){

        $username = $data['username'];
        $password = $data['password'];

		$sql = "SELECT id, password FROM `user` WHERE username = ?";

		$stmt = $conn->prepare($sql);

        $stmt->execute(array($username));

        $data = $stmt->fetch();

        if (!$data == false) {
             if(password_verify($password, $data['password'])){
                session_start();
                $_SESSION['user'] = $username;
                return true;

            } else{
                echo 'username or password is not correct';
            }
        } else{
            echo 'username or password is not correct';
        }
	}

    public function password($mail, $password, $conn){

        $sql = "UPDATE user SET password =? WHERE email=?";

        $stmt= $conn->prepare($sql);

        $stmt->execute([$password, $mail]);

        return true;
    }

    public function create ($data, $conn){

        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        //$email = $data['email'];

        $check = $this->checkUserName($username, $conn);

        if ($check == true){
            $sql = "INSERT INTO `user` (username, password) VALUES (?, ?)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([$username, $password/*, $email*/]);

            return true;
        }
    }

    public function checkUserName ($username, $conn){
        $sql = "SELECT * FROM user WHERE username = ?";
        $query = $conn->prepare($sql);
        $query->execute(array($username));  

        $data = $query->fetch();

        if ($data) {
            // gebruiker bestaat al
            echo "<script>alert('Gebruikersnaam bestaat al')</script>
                  <script>window.location = 'register.php'</script>";
            return false;
        } else {
            return true;
        }
    }
}

?>