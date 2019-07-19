<?php include "includes/head.php"; ?>
<?php session_start();  // On démarre la session 
?>


<body>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 ml-5">
                <h1>Acceuil !!</h1>
                <hr>
                <h3 class="card-header mb-4">cliquer pour afficher</h3>
                <a href="artiste.php" class="btn btn-primary ">Artistes ></a>
                <a href="cinema.php" class="btn btn-primary ">Cinema ></a>
                <a href="films.php" class="btn btn-primary ">Films ></a>
            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <h3 class="card-header mb-4">Recherche </h3>
                    <a href="search.php" class="btn btn-outline-primary ">  Programmes par film</a>
                    <hr>
                    <form action="login.php" method="post">
                    <h3 class="card-header mb-4">Ajouter un film </h3>
                    <input class="btn btn-outline-primary " value="Ajouter" type="submit" name="admin">
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>