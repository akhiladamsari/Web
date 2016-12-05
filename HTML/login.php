<?php 
include 'core/init.php';


if(empty($_POST)===false){
	$username=$_POST['username'];
	$password=$_POST['password'];

	if(empty($username)===true || empty($password)===true){
		$errors[]='You need to enter a username and password';
	}else if(user_exists($username)===false){
		$errors[]='We can\'t find your username'; 
	}else if(user_active($username) === false){
		$errors[]='You haven\'t activated your account'; 
	}else{
		if(strlen($password) > 32){
			$errors[]='password too long';
		}

		$login = login($username,$password);
		if($login === false){
			$errors[] = 'That username/password combination is incorrect';
		}else{
			$_SESSION['user_id']=$login;
			header('Location:index.php');
			exit();
		}
	}
	
}else{
	$errors[]='No data Received';
}
?>
<html lang="en">
    <!--<![endif]-->
    <?php include "include/head.php"; ?>
    <body>
        <div id="body-bg">
            <!-- Header -->
            <?php include "include/header.php"; ?>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <!-- Login Box -->
                            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                            	<?php if(empty($errors) === false){
								?>
								<h2> Oops</h2>
								<?php
								echo output_errors($errors);	
								}
                                include "include/aside.php"; ?>


<?php 
include 'include/overall/footer.php';
 ?>
