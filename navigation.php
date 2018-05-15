<body>
    <!-- Navigation -->
	
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Airways
		
        </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
		       
          </span>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		  <?php 
		  if($_SESSION['page']==1){
			  echo'
		    <a class="nav-link active" href="index.php">Home  <span class="sr-only"></a>';
		  }
		  else {
			     echo ' <a class="nav-link" href="index.php">Home  </a>';
		  }
		    if($_SESSION['page']==2){
			  echo'
		    <a class="nav-link active" href="user.php">Plane  <span class="sr-only"></a>';
		  }
		  else {
			     echo '<a class="nav-link" href="user.php">Plane</a>';
		  }
		  ?>
			
		  
		  </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  
		  <?php 
		 
		  if( $_SESSION['page']==1){
			  echo '
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)
                </span>
              </a>
            </li>
			';
		  }
			else{
				echo '
				<li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">
                </span>
              </a>
            </li>
			';
			}
			?>
			
			
            <?php if (login_check($mysqli) == true && $_SESSION['username'] == "admin"):?> 
            <li class="nav-item">
              <a class="nav-link" href="protected_page.php">Plane Control
              </a>
            </li>
            <?php elseif (login_check($mysqli) == true  && $_SESSION['username'] != "admin") : ?>
			<?php 
			if($_SESSION['page']==2){
				echo'
            <li class="nav-item active">
              <a class="nav-link" href="user.php">Plane
			   <span class="sr-only">
              </a>
            </li>
			';
			}
			else {
					echo'
            <li class="nav-item">
              <a class="nav-link" href="user.php">Plane
			 
              </a>
            </li>
			';
			}
			?>

            <?php else: ?>
			<?php 
			if($_SESSION['page']==3){
				echo '
            <li class="nav-item active">
              <a class="nav-link" href="register.php">Plane
			  	   <span class="sr-only">
              </a>
            </li>';
			}
			else{
				echo '
            <li class="nav-item ">
              <a class="nav-link" href="register.php">Plane
			  
              </a>
            </li>';
			}
			?>
            <?php endif; ?>
			<?php 
			if($_SESSION['page']==3){
				echo'
            <li class="nav-item active">
              <a class="nav-link" href="register.php">Login
			  <span class="sr-only">
              </a>
            </li>
			';
			}
			else{
				echo'
            <li class="nav-item ">
              <a class="nav-link" href="register.php">Login
			
              </a>
            </li>
			';
			}?>
          </ul>
        </div>
      </div>
    </nav>