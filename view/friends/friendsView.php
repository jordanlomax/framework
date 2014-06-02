      <!-- page content -->
      <div id="pageFullWidth">
      	<div id="friendSearch">
      		<form>
      			<label>Search for Somebody</label><br/>
      			<input type="text" id="nameSearch">
      			<input type="button" id="nameSubmit" value="Search" onclick="getSearch()">
      		</form>
      	</div>
      	<br />
      	<?php
		/*if (isset($_POST['nameSubmit']))
	      {
	      	searchFriends($_POST['nameSearch']);
	      }*/
	    showFriends($data);
/*  	    for ($i = 0; $i<count($data); $i++)
        {
        	print '<a href="">'.$data[$i]["firstname"].' '.$data[$i]["lastname"].'</a><br/>';
			print $data[$i]["firstname"].' '.$data[$i]["lastname"].'<br/>';
			print '<input type="button" name="add" value="Add '.$data[$i]["firstname"].' '.$data[$i]["lastname"].
			'" onclick="addFriend('.$data[$i]["userID"].')"/>';
			print '<br/>';
        }*/
      ?>
      </div>
      <!-- End page content -->