      <!-- page content -->
      <div id="pageFullWidth">
      	<div id="friendSearch">
      		<form>
      			<label>Search for Somebody</label><br/>
      			<input type="text" id="nameSearch">
      			<input type="button" id="nameSubmit" value="Search" onclick="getSearch()">
      		</form>
      	</div>
      <?php
/*            foreach ($data as $key => $value) 
            {
                  print $data["firstname"].' '.$data["lastname"].'<br/>';
            }*/
/*            foreach ($data as $key => $value) 
            {
                  print '<form>';
                  print $data["firstname"].' '.$data["lastname"].'<br/>';
                  print '<input type="submit" name="add" value="Add "'.$data["firstname"].' '.$data["lastname"]'"/>';
                  print '</form>';
            }*/
            print '<form>';
            for ($i = 0; $i<count($data); $i++)
            {
                  print $data[$i]["firstname"].' '.$data[$i]["lastname"].'<br/>';
                  print '<input type="button" name="add" value="Add '.$data[$i]["firstname"].' '.$data[$i]["lastname"].
                  '" onclick="addFriend('.$data[$i]["userID"].')"/>';
                  print '<br/>';
            }
            print '</form>';
            print_r($data);

      ?>
      </div>
      <!-- End page content -->