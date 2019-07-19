<?php include "includes/head.php"; ?>
<?php session_start();  // On démarre la session 
?>


<body>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 ml-5">
                <h1>bonjour !!</h1>
                <hr>
                <a href="logout.php">Déconnection</a>
                <h3 class="card-header mb-4">cliquer pour afficher</h3>
                <a href="artiste.php"><input class="btn btn-primary " value="Artistes"></a>
                <a href="cinema.php"><input class="btn btn-primary " value="Cinema"></a>
                <a href="films.php"><input class="btn btn-primary " value="Films"></a>
            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <h3 class="card-header mb-4">Rechercher </h3>
                    <a href="search.php"><input class="btn btn-outline-primary " value="Programmes par film"></a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>