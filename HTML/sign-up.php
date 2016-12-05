<?php include 'core/init.php'; ?>   
<?php  include "include/overall/header2.php";
    if(empty($_POST) === false){
    $required_fields = array('first_name','last_name','username','what','email','password','password_again');
    //echo '<pre>',print_r($_POST,true),'</pre>';
    foreach ($_POST as $key => $value) {
        if(empty($value) && in_array($key, $required_fields)===true){
            $errors[] ='Fields marked With \' * \' are required';
            break 1;
        }
    }
    if(empty($errors)===true){
        if(user_exists($_POST['username'])===true){
            $errors[] ='Sorry, the username \''.$_POST['username'].'\' is already taken. ';
        }

    if(preg_match("/\\s/", $_POST['username'])== true ){
        $errors[] ='Your username must not contain any spaces .';
    }
    if(strlen($_POST['password']) < 6){
        $errors[] ='Your password must me least 6 characters .';
    }
    if($_POST['password'] !== $_POST['password_again']){
        $errors[] ='Your passwords do not match .';
    }
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false){
        $errors[] ='A  valid Email address is required .';
    }
    if(email_exists($_POST['email'])===true){
       $errors[] ='Sorry ,the email \''. $_POST['email'] .'\' is already taken';
    }
    }
}


?>



<h1>Register</h1>
<?php 


    if(empty($_POST)===false && empty($errors)===true){
        $register_data = array(
        'firstname' => $_POST['first_name'],
        'lastname' => $_POST['last_name'],
        'username' => $_POST['username'],
        'what' => $_POST['what'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    );
        register_user($register_data);
        echo "you have been registered successfully ";
        include "include/overall/footer.php";
        exit();

    }else if(empty($errors)===false){
        echo output_errors($errors);
    }
    
 ?>

                            <form class="signup-page" action="" method="POST">
                                <div class="signup-header">
                                    <h2>Register a new account</h2>
                                    <p>Already a member? Click
                                        <a href="#">HERE</a>to login to your account.</p>
                                </div>
                                <label>First Name</label>
                                    <span class="color-red">*</span>
                                <input class="form-control margin-bottom-20" type="text" name="first_name">
                                <label>Last Name</label>
                                    <span class="color-red">*</span>
                                <input class="form-control margin-bottom-20" type="text" name="last_name">
                                 <label> UserName</label>
                                    <span class="color-red">*</span>

                                <input class="form-control margin-bottom-20" type="text" name="username">
                                <label> Are you</label>
                                        <select name=what class="form-control margin-bottom-20">
                                        <option>Nature Lover</option>
                                        <option>Scientist</option>
                                        </select>
                                <label>Email Address
                                    <span class="color-red">*</span>
                                </label>
                                <input class="form-control margin-bottom-20" type="text" name="email">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Password
                                            <span class="color-red">*</span>
                                        </label>
                                        <input class="form-control margin-bottom-20" type="password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Confirm Password
                                            <span class="color-red">*</span>
                                        </label>
                                        <input class="form-control margin-bottom-20" type="password" name="password_again">
                                        <p style="float: left;">Required Fields
                                             <span class="color-red">*</span></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label class="checkbox">
                                            <input type="checkbox">I read the
                                            <a href="#">Terms and Conditions</a>
                                        </label>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>
    <?php 
    
include "include/overall/footer.php";?>