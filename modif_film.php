<?php include "includes/head.php"; ?>
<?php include "includes/conexion.php"; ?>


            <form action="" method="post" enctype="multipart/form-data">
                <a href="Bonjour.php" class="btn btn-secondary btn-sm"> Acceuil </a>
                <a href="logout.php" class="btn btn-secondary btn-sm">Déconnection</a>
                <h1>Modifier un film</h1>
                <hr>
                <?php
                if(isset($_GET['edit'])){
                    $ID_film = $_GET['edit'];
                    $sel_cat = "SELECT * FROM film WHERE ID_film = $ID_film ";
                            $sel_categories_toedit = mysqli_query($connection, $sel_cat);
                            while ($row = mysqli_fetch_array($sel_categories_toedit)) {
                                $id_film = $row['ID_film'];
                                $titre = $row['Titre'];
                                $annee = $row['Annee'];
                                $realis = $row['Nom_Realisateur'];
                
                ?>
                <div class="form-group">
                    <label for="title">Id du film</label>
                    <input type="text" class="form-control" name="ID_film" value="<?php echo $id_film ;?>"/>
                </div>

                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="Titre" value="<?php echo $titre ;?>" />
                </div>
                <div class="form-group">
                    <label for="post_status">Annee</label>
                    <input type="number" min="1000" max="2019" class="form-control" name="Annee" value="<?php echo $annee ;?>">
                </div>
                <div class="form-group">
                    <label for="post_tags">Realisateur</label>
                    <input type="text" class="form-control" name="Nom_Realisateur" value="<?php echo $realis ;?>" />
                </div>
                <div class="form-group">
                    <label for="post_image">Affiche du film</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update" value="Modifier" />

                </div>
                <?php }
            } ?>
                <?php
                if (isset($_POST['update'])) {
                    $ID_film = $_POST['ID_film'];
                    $Titre = $_POST['Titre'];
                    $Annee = $_POST['Annee'];
                    $Realisateur = $_POST['Nom_Realisateur'];
                    $post_image = $_FILES['image']['name'];
                    $post_image_temp = $_FILES['image']['tmp_name'];

                    try {
                        move_uploaded_file($post_image_temp, "img/$post_image");
                        $requete = "UPDATE film SET ID_film='{$ID_film}', Titre='{$Titre}',Annee='{$Annee}',Nom_Realisateur='{$Realisateur}',Film_img='{$post_image}' WHERE ID_film=$ID_film ";
                        $data_send = mysqli_query($connection, $requete);
                        header("Location:films.php");
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>
</div>
</div>