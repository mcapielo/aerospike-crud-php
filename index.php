<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>CRUD with Aerospike</h3>
            </div>
            <div class="row">
               <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
		<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
		      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
		require_once("database.php");
		$bin = 'name';
		$result = $cl->set_default_bin($bin);
		
		$i = 1;
		while ($i <= 20) {

			$response = $cl->get($i);

			$code = $response->get_response_code();
			if($code != 2){
				$read_bin_vals = $response->get_bins();		
				$array[$i] = $read_bin_vals['name'];
				$response->free_bins();
			}		

			$response->free_bins();
			$i++;
		}
	
                   foreach ($array as $id=>$row) {
                            echo '<tr>';
                            echo '<td>'. $row . '</td>';
			    echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$id.'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$id.'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$id.'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
