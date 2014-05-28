
      <!-- main navigation -->
      <div id="nav">
      <?php
	    if ($_SESSION["userId"])
	    {
	      $sqlname = mysql_query("SELECT firstname FROM users WHERE email = '" . $_SESSION["userId"] . "'"); 
	      $rowname = mysql_fetch_row($sqlname);
		  $home = $rowname[0];
		  //$home =  $_SESSION["userId"];
	    }
	    else 
	    {
	      $home = "Home";
	    }

      	print '<ul id="navbar">
			<li class="navitem"><a class="navlink" href="?q=home">'.$home.'</a></li>
			<li class="navitem"><a class="navlink" href="?q=friends">Friends</a></li></ul>
			<li class="navitem"><a class="navlink" href="?q=config">Config</a></li></ul>';
			if ($formError == "")
			{
	            if ($_SESSION["userId"])
	            {
	              print '<ul id="loginbar"><li id="loginbtn"><a href="index.php?q=auth&a=logout">Logout</a></li></ul>';
	            }
	            else 
	            {
	              print '<ul id="loginbar"><li id="loginbtn"><a href="#" onClick="loginShow();">Login</a></li></ul>';
	            }
        	}

	    if (!$_SESSION["userId"] && $formError == "")
	    {
		  print '<div id="logindiv">
	      		<form id="loginForm" method="post" onSubmit="return formatValidate()" action="index.php?q=auth&a=processAuth">
		  		<ul id="loginformatting">
		  		<li><p id="formatError"></br></p></li>
		  		<li><label>Email:</label></li>
		  		<li><input type="text" id="userId" name="userId"/></li>
		  		<li><label>Password:</label></li>
		  		<li><input type="password" id="password" name="password"/></li>
		  		<!--<li><button id="login" name="login" action="formatValidation()">Login</button></li>-->
		  		<li><input type="submit" value="Login"/></li>
		  		<li><br/></li>
		  		</ul>
		  		</form>
		  		</div>';
	    }
      ?>
      </div>
      <!-- end main navigation -->