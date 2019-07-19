<?php include "includes/head.php"; ?>
<?php include "includes/conexion.php"; ?>


<div class="row">
    <div class="col-md-4 ml-5">

        <form action="" method="post" enctype="multipart/form-data">
        <a href="Bonjour.php" class="btn btn-secondary btn-sm"> Acceuil </a>
        <a href="logout.php" class="btn btn-secondary btn-sm">Déconnection</a>
            <h1>Ajouter un film</h1>
            <hr>
            <!-- <div class="form-group">
                        <label for="title">Id du film</label>
                        <input type="text" class="form-control" name="ID_film" />
                    </div> -->

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="Titre" />
            </div>
            <div class="form-group">
                <label for="post_status">Annee</label>
                <input type="number" min="1000" max="2019" class="form-control" name="Annee" />
            </div>
            <div class="form-group">
                <label for="post_tags">Realisateur</label>
                <input type="text" class="form-control" name="Nom_Realisateur" />
            </div>
            <div class="form-group">
                <label for="post_image">Affiche du film</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="Add_film" value="Ajouter" />

            </div>
            <?php
            if (isset($_POST['Add_film'])) {
                $ID_film = $_POST['ID_film'];
                $Titre = $_POST['Titre'];
                $Annee = $_POST['Annee'];
                $Realisateur = $_POST['Nom_Realisateur'];
                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];

                //code...

                move_uploaded_file($post_image_temp, "img/$post_image");
                try {
                    $requete = "INSERT INTO film(ID_film,Titre,Annee,Nom_Realisateur,Film_img) VALUES  ('{$ID_film}','{$Titre}','{$Annee}','{$Realisateur}','{$post_image}')  ";
                    $data_send = mysqli_query($connection, $requete);
                } catch (Exception $e) {
                    echo $e->getMessage();
                    header("Location:login.php");
                }
            }
            // ('".$_POST["ID_film"]."','".$_POST["Titre"]."','".$_POST["Annee"]."','".$_POST["Nom_Realisateur"]."','".$_FILES['image']['name']."')
            // ('{$ID_film}','{$Titre}','{$Annee}','{$Realisateur}','{$post_image}') 
            ?>
        </form>
    </div>
</div>
</div>
</div>