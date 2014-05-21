
      <!-- main navigation -->
      <div id="nav">
      <?php
	    if ($_SESSION["userId"])
	    {
	      //$home = $_SESSION["userId"];
	    	$home = "Home";
	    }
	    else 
	    {
	      $home = "Home";
	    }

      	print '<ul id="navbar">
			<li class="navitem"><a class="navlink" href="?q=home">'.$home.'</a></li>
			<li class="navitem"><a class="navlink" href="?q=friends">Friends</a></li>
			<li class="navitem"><a class="navlink" href="?q=friends">Friends</a></li>
			<li class="navitem"><a class="navlink" href="?q=friends">Friends</a></li>
			<li class="navitem"><a class="navlink" href="?q=friends">Friends</a></li>';

            if ($_SESSION["userId"])
            {
              print '<li id="loginbtn"><a href="index.php?q=auth&a=logout">Logout</a></li></ul>';
            }
            else 
            {
              print '<li id="loginbtn"><a href="#" onClick="loginShow();">Login</a></li></ul>';
            }

	    if (!$_SESSION["userId"])
	    {
		  print '<div id="logindiv">
	      		<form id="loginForm" method="post" action="index.php?q=auth&a=processAuth">
		  		<ul id="loginformatting">
		  		<li><label>Username:</label></li>
		  		<li><input type="text id="userId" name="userId"/></li>
		  		<li><label>Password:</label></li>
		  		<li><input type="password" id="password" name="password"/></li>
		  		<li><button id="login" name="login">Login</button></li>
		  		</ul>
		  		</form>
		  		</div>';
	    }
      ?>
      </div>
      <!-- end main navigation -->