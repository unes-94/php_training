<?php include "includes/head.php"; ?>

<?php if (isset($_POST['submit']))
    {
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $msg="";

        if (!empty($password) && !empty($username)) 
        {
            // on enregistre les paramètres de notre visiteur
        $username=$_POST['user'];
        $password=$_POST['pass'];
        } else {
        $username = false;
        $password = false;
        $msg .="Veuillez remplir les champs obligatoire";
        }
            // on teste si nos variables sont définies
        if($username && $password){
            // on vérifie les informations du formulaire
        if($username=="admin" && $password=="1234" ){
           // On démarre la session
            session_start();
            // on redirige notre visiteur vers une page de notre section membre
            header("Location: Add_film.php");
            exit();
        
        } else  {
            $msg .="login et password incorrect";
        }
    }
} ?>

<body>

<div class="container">
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
                    <input name="submit"class="btn btn-success" type="submit" value="Login">
                    <p><?php if(isset($msg)) echo $msg; ?></p>
                </form>
        </div>
    </div>
</div>

</body>
</html>