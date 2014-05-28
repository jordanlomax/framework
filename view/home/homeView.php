
      <!-- page content -->
      <div id="pageFullWidth">
      <?php
      	  $sqlprofile = mysql_query("SELECT * FROM content WHERE userID = (SELECT userID FROM users where email = '" . $_SESSION["userId"] . "')"); 
	      $rowprofile = mysql_fetch_row($sqlprofile);

		  if ($rowprofile[2] == true)
		  {
		  	print '<img id="avatar" src="'.APP_IMG.'/'.$rowprofile[1].'">';
		  }
		  if ($rowprofile[4] == true)
		  {
		  	print '<pre id="about">' . $rowprofile[3] . '</pre>';
		  }
      ?>
      </div>
      <!-- End page content -->