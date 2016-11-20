<aside>
      <?php 
      if(logged_in()===true){
      	include ('include/widgets/loggedin.php');
      }else{
      	include 'include/widgets/login.php';
      }

      
      ?>    
</aside>