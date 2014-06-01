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
            print '<pre>';
            print_r($data);
            print '</pre>';
      ?>
      </div>
      <!-- End page content -->