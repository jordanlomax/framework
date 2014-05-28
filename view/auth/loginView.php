      <!-- page content -->
      <div id="pageFullWidth">
      	<div id="loginError"></div>
      	<?php
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
      		<form id="loginForm" method="post" onSubmit="return formatValidate()" action="index.php?q=auth&a=processAuth">
	  		<ul id="loginformatting">
	  		<li><p id="formatError">'.$formError.'</p></li>
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
      <!-- End page content -->