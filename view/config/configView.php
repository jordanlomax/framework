      <!-- page content -->
      <div id="pageFullWidth">
      <?php
      
      	  print '
      	  		<div>
      	  		<form method="post" enctype="multipart/form-data">
      	  		Upload avatar:<br/>
      	  		<input type="file" id="avatarFile" name="avatarFile"/><br/>
      	  		<input type="submit" name="avatarBtn" value="Save Avatar"/><br/>
      	  		<br/>
      	  		</form>
      	  		<form method="post">
      	  		Show about section:<input type="checkbox" name="showAbout" value="show"'.$aboutChecked.'><br/>
      	  		About:</br>
      	  		<textarea name="about" id="aboutField" row="6" col="50">'.$about.'</textarea><br/>
      	  		<input type="submit" name="updateBtn" value="Save"/>
      	  		</form>
      	  		</div>';

      	  		if (isset($_POST['updateBtn']))
      	  		{
				    updateInfo();
      	  		}

      	  		if (isset($_POST['avatarBtn']))
      	  		{
      	  			if ($_FILES['avatarFile']['name'] != "")
      	  			{
       	  				//move_uploaded_file($_FILES["avatarFile"]["tmp_name"], 'img/'. $_FILES["avatarFile"]["name"]);
       	  				updateAvatar();
      	  			}
      	  			else
      	  			{

      	  			}

      	  		}
      ?>
      </div>
      <!-- End page content -->