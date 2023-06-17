<!DOCTYPE html>
<html lang="jp">
<head>
  <title>j4 Exam-login confirm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Login Confirm</h2>
  <div class="row">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" id="submit" name="submit" class="btn btn-outline-primary">Submit</button>
  </form>
</div>

<div class="row">
<?php

 if(isset($_POST['submit'])){
   $kemail = $_POST['email'];
   $kpswd = $_POST['pswd'];

   $ID = "hello@where.com";
   $pass = "new-world";
    
           if($kemail == $ID && $kpswd == $pass){
                 //print "<div class='col-sm-8'><p class='display-6'>認証成功．</p>";
                   header("Location:j2.html");
           }else{
                 print "<div class='col-sm-8 mt-3'><p class='display-6'>認証失敗.</p> ";
                }
 }
   
?>
</div>
</div>

</body>
</html>

