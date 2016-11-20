<form class="login-page">
                                    <div class="login-header margin-bottom-30">
                                        <h2>You Are Logged In as  <?php  echo $user_data['username']; ?></h2>
                                        <a class="btn btn-primary pull-right" href="logout.php">Log Out</a>

                                    </div>
                                    <?php 
        							$user_count=user_count();
        							$suffix=($user_count != 1) ? 's' : '';
        							 ?>
    								We currently have <?php echo user_count(); ?> registered user<?php echo $suffix; ?>. 
                                  
                                    
                                    
                                    
</form>