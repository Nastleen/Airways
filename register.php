<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
$logged = 'in';
} else {
$logged = 'out';
}
?>

  <?php require_once("parts/header.php");?>
    
    <?php$_SESSION['page']=3;?>
	<?php require_once('parts/navigation.php');?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h1 class="my-4">
          </h1>
        </div>
        <!-- /.col-lg-3 -->
        <!-- Page Content -->
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h1 class="my-4"><center>User Status</center>
              </h1>
              <div class="list-group">
                <a class="list-group-item ">
                  <?php
if (login_check($mysqli) == true) {
echo '<p><center>Currently logged ' . $logged . ' as:<b><br><br> ' . htmlentities($_SESSION['username']) . '</b></center></p>';
echo '<a href="includes/logout.php" class="btn btn-primary" role="button">Log out</a>';
} else {
echo '<p><center>Currently logged ' . $logged . '.</center></p>' . '</a>';
echo '<li class="list-group-item"><center>' . "If you don't have a login, please <a href='register.php'>register here!</center></a>" . '</li>';
echo '<li class="list-group-item">
<h4>Login:</h4>
<form action="includes/process_login.php" method="post" name="login_form">                      
Email: <input type="text" name="email" />
Password: <input type="password" 
name="password" 
id="password"/>
<br>
<br>
<input type="button" 
value="Login" 
onclick="formhash(this.form, this.form.password);" /> 
</form>
</li>';
}
?>   
                </a>
              </div>
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9">
              <div class="card mt-4">
                <div class="card-body text-center">
                  <h3 class="card-title text-center">Register with us!
                  </h3>
                  <p class="card-text ">
                    <!-- Registration form to be output if the POST variables are not
set or if the registration script caused an error. -->
                    <?php
if (!empty($error_msg)) {
echo $error_msg;
}
?>
                  <ul>
                    <li>Usernames may contain only numbers or letters
                    </li>
                    <li>Emails must be in a valid email format (xxx@xxx.xxx)
                    </li>
                    <li>Passwords must be at least 6 characters long
                    </li>
                    <li>Passwords must contain: one uppercase letter, one lowercase letter, and one number
                    </li>
                  </ul>
                  <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
                        method="post" 
                        name="registration_form">
                    
                    <input type='text'
                           placeholder='Username: '					
                           name='username' 
                           id='username' />
                    <br>
                    <br>
                   
                    <input type="text" name="email" id="email" placeholder=' Email: ' />
                    <br>
                    <br>
                   
                    <input type="password"
                           name="password" 
						   placeholder=' Password: '
                           id="password"/>
                    <br>
                    <br>
                  
                    <input type="password" 
					placeholder= "  Confirm password: "
                           name="confirmpwd" 
                           id="confirmpwd" />
                    <br>
                    <br>
                    <input type="button" 
                           value="Register" 
                           onclick="return regformhash(this.form,
                                    this.form.username,
                                    this.form.email,
                                    this.form.password,
                                    this.form.confirmpwd);" /> 
                  </form>
                  </p>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
    </div>
    <!-- /.container -->
    </div>
  </body>
<?php require_once("parts/footer.php"); ?>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js">
</script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js">
</script>
</html>