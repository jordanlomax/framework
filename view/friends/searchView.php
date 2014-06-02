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
            showSearch($data);

      ?>
      </div>
      <!-- End page content -->