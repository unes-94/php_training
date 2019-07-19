<?php include "head.php"; ?>

<?php if (isset($_POST['submit']))
    {
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $length=3;
        $msg="";

        if (!empty($password) || !empty($username)) 
        {
        $username=$_POST['user'];
        $password=$_POST['pass'];
        } else {
        $username = false;
        $password = false;
        $msg .="should not be empty";
        }
        if($username && $password){
        if(strlen($username)<$length || strlen($password)<$length ){
        $msg .="saisissez plus de 3 chiffre";
        } else  {
            session_start();
        header("Location: Bonjour.php");
        exit();
        }
    }
} ?>

<body>

<div class="card-body">
    <div class="row">
        <div class="col-lg-4">
             <h1 class="mb-4">Login in!</h1>
                <form class="user" method="POST" action="">
                    <div class="form-group">
                    <input name="user" type="text" class="form-control form-control-user" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                    <input name="pass" type="password" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <input name="submit"class="btn btn-primary" type="submit" value="Login">
                    <p><?php if(isset($msg)) echo $msg; ?></p>
                </form>
        </div>
    </div>
</div>

</body>
</html>