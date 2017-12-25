<!DOCTYPE html>
<html>

<head>
  <title>INNTIME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=false">
  <meta name="theme-color" content="#000">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="Content/login.css" type="text/css"> </head>

<body class="bg-dark">
  <div class="py-5 bg-dark">
	<img src="../Images/logopng.png" style="width:250px; display:block; margin: 0 auto;"><br/><br/>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
		  <form method="post" action="/Services/validate_login.php" id="formlogin" name="formlogin" >
			<div class="input-group margin-bottom-sm">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
				<input id="login" name="login" class="form-control" type="text" placeholder="Username">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
				<input class="form-control" type="password" name="password" id="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>	 
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>