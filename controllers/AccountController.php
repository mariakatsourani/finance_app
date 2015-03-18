<?php

class AccountController {

    protected $errors;

    public function index() {

    }

    public function loginAction() {

        // get variables
        $password = $_POST['password'];
        $email = $_POST['email'];

        // check if fields are empty
        // if not, get username and password from database
        if((!empty($password)) && (!empty($email))) {

            $db = Db::get(); // get db connection
            $stm = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
            $stm->bindParam(":email", $email, PDO::PARAM_STR);
            $stm->bindParam(":password", $password, PDO::PARAM_STR);
            $stm->execute();

            // if there is a result, send to user profile
            if ($stm->rowCount() == 1) {
                $user = $stm->fetchObject();
                session_start();
                $_SESSION['user'] = $user;

                //  redirect to portfolio
                header("location:..//");
            }
            // if not, return error in $msg
            else {
                $msg =  "Wrong username or password";
                return $msg;
            }

        }
        // if not, return error in $msg
        else {
            $errors = $this->errors;
            return $errors;
        }
    }


    public function logoutAction() {
        session_start();
        session_unset();
        session_destroy();

        // redirect to login
        header("location:..//");
    }

    public function registerAction() {

        // if user pushed register
        if ( isset($_POST['register']) ) {

            // get variables
            $username =  $this->validateUsername($_POST['username']);
            $email = $this->validateEmail($_POST['email']);
            $password = $this->validatePasswordMatch($_POST['password'], $_POST['re_password']);

            // check if everything is valid
            if ( $username && $email && $password ) {

                $user_img = "imgs/userprofile.jpg" ;
                // connect to db and add new user
                $db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root") ;
                $stm = $db->prepare("INSERT INTO users (username, email, password, user_img) VALUES (:username, :email, :password, :user_img) ");
                $stm->bindParam(":username", $username, PDO::PARAM_STR);
                $stm->bindParam(":email", $email, PDO::PARAM_STR);
                $stm->bindParam(":password", $password, PDO::PARAM_STR);
                $stm->bindParam(":user_img", $user_img, PDO::PARAM_STR);

                // if db insert is successful, send user to portfolio
                if($stm->execute()) {

                    header("location: portfolio.php");

                }
                // if not, tell that user already exists
                else {
                    $msg = 'User already exists.';
                    return $msg;

                }
                // if validation doesn't work, return errors
            } else {

                $errors = $this->errors;
                return $errors;
            }
        }
    }


    // Validation methods for registration and login input.

    protected function validateUsername($username) {
        $username = $this->filterInput($username);

        if ( strlen($username) <= 5 ) {
            $this->errors[] = 'Username must be at least 6 characters';
            return false;
        }

        return $username;
    }

    protected function validateEmail($email) {
        $email = $this->filterInput($email);

        return $email;
    }

    protected function validatePassword($password) {
        $password = $this->filterInput($password);

        if ( strlen($password) <= 5 ) {
            $this->errors[] = 'Password must be at least 6 characters';
            return false;
        }

        return $password;
    }

    protected function validatePasswordMatch($password, $re_password) {
        if ($password == $re_password) {
            return true;
        }
        else {
            $this->errors[] = 'Passwords do not match' ;
        }
    }


    // basic filter for input content.
    protected function filterInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }
}