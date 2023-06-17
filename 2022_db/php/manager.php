<html>
<head>
<title>Store Manager</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="p12.js" type="text/javascript"></script>

<style>
 .imgLogo{
	width:150px;
        height:50px;
        border:2px solid skyblue;
        margin-left:2em;
        border-radius:20%;
}
 .line1 {
                background-color:#88aaff;
                color:#ffffff;
                height:100px;
                padding-top:5px;
        }
</style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light justify-content-center fixed-top">
 <!-- Brand -->
 <a class="navbar-brand" href="#">
  <img class="imgLogo" src="../../images/ws.JPG" alt="Logo">
 </a>
<h3> Store Manager</h3>
 <!--- Toggler/collapsibe Button-->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
  <span class="text-black"> menu </span>
  </button>

 <!-- Navbar links -->
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav">
   <li class="nav-item">
   <a class="nav-link text-black" href="p6_2022.php"><button class="btn btn-light btn-lg">
   ワイン在庫</button>
   </a>
   </li>
  <li class="nav-item">
   <a class="nav-link text-black" href="p7_2022.php"><button class="btn btn-light btn-lg">
   ワインセット在庫</button>
   </a>
   </li> 
   <li class="nav-item">
   <a class="nav-link text-black" href="#"><button class="btn btn-light btn-lg">
   ワイン価格変更</button>
   </a>
   </li>
  <li class="nav-item">
    
    <form class="mt-1">
    <div class="input-group">
   <label for="tname" class="input-group-text">
   テーブル検索 
 </label>
 <select id="aname" name="aname" class="tpart form-select form-select-lg">
  <option value=" ">テーブル名</option>
   <option value="wine">wine</option>
   <option value="wineSet">wineSet</option>
   <option value="setDetail">setDetail</option>
   <option value="locality">locality</option>
   <option value="idpw">idpw</option>
   <option value="storeidpw">storeidpw</option>
   <option value="customer">customer</option>
   <option value="cusOrder">cusOrder</option>
   <option value="orderWine">orderWine</option>
   <option value="orderWineSet">orderWineSet</option>
   </select>
      </div>
</form>
</li>
 </ul>
 </div>
</nav>
<div class="container mt-3">
 <div id="message"> </div>
 </div>
</body>
</html>
