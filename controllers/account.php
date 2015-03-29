<?php 

class Account extends Controller{

    protected $errors;

    public function index(){
        if(!$this->isLoggedin()){
            header('location: http://localhost/finance_app/');
        }
        $data = $this->db->query_sql("SELECT * FROM users WHERE user_id=:user_id",
                        array('user_id' => $_SESSION['id']));
		$this->view('my_account_view', $data[0]);
    }

    public function login() {
        // get variables
        $password = strip_tags($_POST['password']);
        $email = strip_tags($_POST['email']);
        
        // if login button is pushed
        if ( (isset($_POST["login_btn"])) && (!empty($_POST['email'])) && (!empty($_POST['password']))) {

            $result = $this->db->query_sql('SELECT * FROM users WHERE email = :email',
                array('email' => $email));
            if(!$result){// if no user is found
                  header("location: /finance_app/");
//                $msg = "Wrong user or password";
//                echo $msg;
            }else{// if one is found
                $row = $result[0];
                $hash = $row['password'];
                //var_dump(password_verify($password, $hash)) ;
                //echo $password . "<br>" . $hash;
                if (password_verify($password, $hash)) {
                    $_SESSION["status"] = "inloggad";
                    $_SESSION["id"] = $row["user_id"];
                    header("location: /finance_app/user/portfolio");
                }else{
                    header("location: /finance_app/");
//                    $msg = "Wrong password";
//                    echo $msg;
                }
            }
        }else{
            header("location: /finance_app/");
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        // redirect to login
        header("location: /finance_app/");
    }

    public function register() {
        $password = strip_tags($_POST['password']);
        $email = strip_tags($_POST['email']);

        // if user pushed register
        if($_POST['singup_btn']){

            // get variables
            $email = $this->validateEmail($email);
            if($this->validatePasswordMatch($password, strip_tags($_POST['re_password']))){
                $hashPass = password_hash($password, PASSWORD_BCRYPT);
            }
            $last_name = strip_tags($_POST['last_name']);
            $first_name = strip_tags($_POST['first_name']);
            $bank = strip_tags($_POST['bank']);
            $account = strip_tags($_POST['account']);
            $pnr = strip_tags($_POST['pnr']);
            $balance = 50000;
            // check if everything is valid
            if ( $email && $password ) {
                // connect to db and add new user
                $sql = 'INSERT INTO users (email, password, first_name,
                                  last_name, pnr, bank, account_number)
                                  VALUES (:email, :password, :first_name, :last_name,
                                  :pnr, :bank, :account_number)';
                $params = array(
                    "email" => $email,
                    "password" => $hashPass,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "pnr" => $pnr,
                    "bank" => $bank,
                    "account_number" => $account
                );
                //if db insert is successful, send user to portfolio
                $this->db->query_sql($sql, $params);
                header("location: /finance_app/");
//                if($this->db->query_sql($sql, $params)) {
//                    header("location: /finance_app/");
//                }
//                // if not, tell that user already exists
//                else {
//                    $msg = "User already exists";
//                    echo $msg;
//                }
            }
        }else{
            header("location: /finance_app/");
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
        }else{
            return true;
        }

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