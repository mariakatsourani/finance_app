<?php 

class Account extends Controller{

    protected $errors;

    public function index(){
        $db = Database::getInstance();
        $data = $db->query_sql("SELECT * FROM users WHERE user_id=:user_id",
                        array('user_id' => $_SESSION['id']));
		$this->view('my_account_view', $data[0]);
    }

    public function login() {

        // get variables
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        // if login button is pushed
        if (isset($_POST["login_btn"])) {

            $db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "");
            $stm2 = $db->prepare('SELECT * FROM users WHERE email = :email');
            $stm2->bindParam(":email", $email, PDO::PARAM_STR);
                if($stm2->execute()) {
                	$result = $stm2->fetchAll(PDO::FETCH_ASSOC);
                
	                // if no user is found
	                if($stm2->rowCount()==0){
	                    $msg = "Wrong user or password";
	                    $this->view("login", $msg)  ; 
	                }
                
                // if one is found
                else {
                  	$row = $result[0];
                        //$hash = $row['password'];
                        //var_dump(password_verify($password, $hash)) ;
                        //echo $password . "<br>" . $hash;
                        //if (password_verify($password, $hash)) {
                            //$_SESSION["status"] == "inloggad";
                            $_SESSION["id"] = $row["user_id"];
                            $_SESSION["email"] = $row["email"];
                            $_SESSION["first_name"] = $row["first_name"];
                            
                            
                            header("location: /finance_app/user/viewPortfolio");
                           
                        //}
                        //else {
                          //  $msg = "Wrong password";
                            //$this->view("login", $msg)  ; 
                            //var_dump(password_verify($password, $hash));
                       // }
                   
                }
            }
            else {
                
               $msg = "Wrong user or password";
               $this->view("login", $msg)  ; 
            }
           // if (!isset($_SESSION['status'])) {
            	//header("location: /finance_app/views/index.php");
            //}
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
        $password = $_POST['password'];
        $email = $_POST['email'];

        // if user pushed register

        // get variables
        $email = $this->validateEmail($_POST['email']);
        //----------$password = $this->validatePasswordMatch($_POST['password'], $_POST['re_password']);
        $hashPass = password_hash($password, PASSWORD_BCRYPT);

        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $bank = $_POST['bank'];
        $account = $_POST['account'];
        $pnr = $_POST['pnr'];
        $balance = 50000;
        // check if everything is valid
        if ( $email && $password ) {


            // connect to db and add new user
            $db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "") ;
            $stm = $db->prepare("INSERT INTO users (email, password, first_name,
                                  last_name, pnr, actual_balance, virtual_balance, bank, account_number)
                                  VALUES (:email, :password, :first_name, :last_name,
                                  :pnr, :balance, :balance, :bank, :account) ");
            $stm->bindParam(":email", $email, PDO::PARAM_STR);
            $stm->bindParam(":password", $hashPass, PDO::PARAM_STR);
            $stm->bindParam(":first_name", $first_name, PDO::PARAM_STR);
            $stm->bindParam(":last_name", $last_name, PDO::PARAM_STR);
            $stm->bindParam(":pnr", $pnr, PDO::PARAM_INT);
            $stm->bindParam(":balance", $balance, PDO::PARAM_INT);
            $stm->bindParam(":balance", $balance, PDO::PARAM_INT);
            $stm->bindParam(":bank", $bank, PDO::PARAM_STR);
            $stm->bindParam(":account", $account, PDO::PARAM_INT);

            // if db insert is successful, send user to portfolio
            if($stm->execute()) {

                header("location: /finance_app/views/login.php");

            }
            // if not, tell that user already exists
            else {
               $msg = "User already exists";
               
               return $msg;

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