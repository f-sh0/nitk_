<html>

<head>
    <title>Bootstrap GUI & PHP Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<style>
    .bgcolor {
        background: linear-gradient(to right, rgb(15, 16, 16), rgb(246, 247, 247));
    }
    
    .content-center {
        display: flex;
        justify-content: center;
    }
    
    .form-outline {
        width: 470px;
        /*bs col-sm  570px*/
        background-color: white;
        margin-top: 160px;
        padding: 1em;
        border-radius: 10px;
    }
    
    form i {
        transform: translate(400px, -30px);
    }
    
    .btn-black {
        background-color: rgb(137, 139, 140);
        color: white;
        border: none;
    }
</style>

<body class="bgcolor text-black">
    <div class="container content-center">
        <form action="login2022action.php" method="post" class="form-outline">
            <h2 class="text-center">wineShop Manager Login</h2>
            <div class="form-floating mb-3 mt-3 "><input type="email" class="form-control" id="email" placeholder="Enter email " name="email" required><label for="email ">Email</label></div>
            <div class="form-floating mt-3 mb-3 "><input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" required><i id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></i>
                <label for="pswd">Password</label></div>
            <button type="submit" name="submit" class="form-control btn btn-black btn-outline-dark btn-lg mb-3">Sign in</button>
        </form>
    </div>
    <script language="javascript">
        function pushHideButton() {
            var txtPass = document.getElementById("pswd");
            var btnEye = document.getElementById("buttonEye");
            if (txtPass.type === "text") {
                txtPass.type = "password";
                btnEye.className = "fa fa-eye";
            } else {
                txtPass.type = "text";
                btnEye.className = "fa fa-eye-slash";
            }
        }
    </script>
</body>

</html>
