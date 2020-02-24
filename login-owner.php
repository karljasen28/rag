<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#">RAG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Register As
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="user-register.php">User Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="owner-register.php">Owner Account</a>
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>
<body>
    <main>
        <div class="container col-lg-5 bg-light px-5 py-5">
        	<div class="row">
        		<div class="col text-center"><a class="" href="login-user.php">Login as user</a></div>
        		<div class="col text-center"><a href="login-owner.php">Login as Owner</a></div>
        	</div>
        	<form class="form-horizonta py-5" method="POST" action="">
        		<div class="form-group">
        			<label>Email</label>
        			<input class="form-control" type="email" name="email" placeholder="Enter Email" required="">
        		</div>
        		<div class="form-group">
        			<label>Password</label>
        			<input class="form-control" type="password" name="password" placeholder="Enter Password" required="">
        		</div>
        		<div class="form-group">
        			<input class="btn btn-primary col" type="submit" name="login" value="Login">
        		</div>
        	</form>
        </div>
    </main>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.js.map"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js.map"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js.map"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js.map"></script>
</body>
</html>