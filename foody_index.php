<?php

		header('Cache-Control: no cache');
		session_cache_limiter('private_no_expire');
  		session_start();

		$cPage = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);

		

		
	
		if(filter_has_var(INPUT_POST, 'submit'))
  		{
   		 	$ingred1 = htmlentities($_POST['ingred1']);
   		 	$ingred2 = htmlentities($_POST['ingred2']);
    		 	$ingred3 = htmlentities($_POST['ingred3']);
    		 	$resu = file_get_contents('https://api.edamam.com/search?q='.$ingred1.'&search?q='.$ingred2.'&app_id=5ee0a61d&app_key=32e69f550e6b2ab75b8eec40ab00232f&from=0&to=6&calories=591-722&health=alcohol-free');
    		 	$out = json_decode($resu, true);
		}
		$length = count($out['hits']);
		
		$_SESSION['ingred1'] = $ingred1; 
		$_SESSION['ingred2'] = $ingred2;
		$_SESSION['ingred3'] = $ingred3;
?>


<DOCTYPE! html>
<html>
<head>
  <title>Foody Devs</title>
<link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Foody Devs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://greytownforest.x10host.com/foodyDevs/recipe.php">FOODS!!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">

</div>
</header>
<div class="container">
	<div class="vSpace">
 	</div>

  <form method="post" action="<?php $cPage; ?>">
    <div class="form-group">
      <label>Ingredient1</label>
      <input class="form-control" type="text" name="ingred1">
    </div>
    <div class="form-group">
      <label>Ingredient2</label>
      <input class="form-control" type="text" name="ingred2">
    </div>
    <div class="form-group">
      <label>Ingredient3</label>
      <input class="form-control" type="text" name="ingred3">
    </div>
    <button class="btn btn-danger" type="submit" name="submit">
      Submit
    </button>
  </form>
  <div class="container">  	
  			 	
    		 	<?php for($i = 0; $i < $length; $i++): ?>
    		 		<div class="container">
    		 			<?php $name = $out['hits'][$i]['recipe']['label']; ?>
    		 			<?php $_SESSION['i'] = $i; ?>
    		 			<img src="<?php echo $out['hits'][$i]['recipe']['image']; ?>" alt="Food Image" height="42" width="42">
    		 			<a href="http://greytownforest.x10host.com/foodyDevs/recipe.php"><?php echo $name; ?></a>
    		 			<?php echo '<br>'; ?>
    		 			<?php echo '<br>'; ?>
    		 		</div> 		 	
  			<?php endfor; ?>
  </div>

</div>
<footer>
<div class="container">


</div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>


</body>
</html>
