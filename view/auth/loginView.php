      <!-- page content -->
      <div id="pageFullWidth">
      	<div id="loginError">
      	<?php
      	print
		'<div id="signupdiv">
		<form id="signupform" method="post" onSubmit="return formatValidate(\'signupEmail\',\'signUpFormatError\')" action="index.php?q=auth&a=signup">
		<h3>Sign Up</h3>
		<ul class="loginformatting">
		<li><p id="signUpFormatError"></br></p></li>
		<li><label>Email:</label></li>
		<li><input type="text" id="signupEmail" name="userId"/></li>
		<li><label>First Name:</label></li>
		<li><input type="text" id="first" name="first"/></li>
		<li><label>Last Name:</label></li>
		<li><input type="text" id="last" name="last"/></li>
		<li><label>Password:</label></li>
		<li><input type="password" id="signupPassword" name="password"/></li>
		<!--<li><button id="login" name="login" action="formatValidation()">Login</button></li>-->
		<li><input type="submit" value="Sign Up"/></li>
		<li><br/></li>
		</ul>
		</form>
		</div>';

      	if ($formError != "")
      	{
	      	/*
	      	print '
	      	<form id="loginFormFull" method="post" action="index.php?q=auth&a=processAuth">
	      		<div class="loginFull">
	      			<label>Username:</label>
	      			<input type="text" id="userIdFull" name="userId"/>
					<label>Password:</label>
	      			<input type="passwordFull" id="password" name="password"/>
	      			<button id="login" name="login">Login</button>
	      		</div>
	      	</form> ';
      		*/

  			print 
  			'<div id="logindivFull">
      		<form id="loginForm" method="post" onSubmit="return formatValidate(\'loginId\',\'fullFormatError\')" action="index.php?q=auth&a=processAuth">
      		<h3>Log In</h3>
	  		<ul class="loginformatting">
	  		<li><p id="fullFormatError">'.$formError.'</p></li>
	  		<li><label>Email:</label></li>
	  		<li><input type="text" id="loginId" name="userId"/></li>
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
      </div>
      <!-- End page content -->