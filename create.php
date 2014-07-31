<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
         
        // keep track post values
        $name = strip_tags($_POST['name']);
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
         
         
        // insert data
        if ($valid) {
	    
	$cl->set_default_bin('name');
	$i = 1;
                while ($i <= 30) {

                        $response = $cl->get($i);

                        $code = $response->get_response_code();
                        if($code == 2){
				$code = $cl->put($i,$name);
				break;
                        }

                        $response->free_bins();
                        $i++;
                }

    	$code = $cl->put($key,$value);
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link   href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

	<div class="span10 offset1">
	    <div class="row">
		<h3>Create a Customer</h3>
	    </div>
     
	    <form class="form-horizontal" action="create.php" method="post">
	      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
		<label class="control-label">Name</label>
		<div class="controls">
		    <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
		    <?php if (!empty($nameError)): ?>
			<span class="help-inline"><?php echo $nameError;?></span>
		    <?php endif; ?>
		</div>
	      </div>
	      <div class="form-actions">
		  <button type="submit" class="btn btn-success">Create</button>
		  <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
