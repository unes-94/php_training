<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	include "includes/head.php";
	include "includes/conexion.php";
    echo "bonjour, " . $_SESSION['login'];
	// On affiche  lien pour fermer notre session
	
    echo "<a href='logout.php' class='btn btn-secondary btn-sm'>Déconnection</a>";

?>


            <form action="" method="post" enctype="multipart/form-data">
                
                <h1>Ajouter un film</h1>
                <hr>
                <div class="form-group">
                    <label for="title">Id du film</label>
                    <input type="text" class="form-control" name="ID_film" />
                </div>

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

                    try {
                        move_uploaded_file($post_image_temp, "img/$post_image");
                        $requete = "INSERT INTO film(ID_film,Titre,Annee,Nom_Realisateur,Film_img) VALUES  ('{$ID_film}','{$Titre}','{$Annee}','{$Realisateur}','{$post_image}')  ";
                        $data_send = mysqli_query($connection, $requete);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        header("Location:login.php");
                    }
                }
                ?>
            </form>
            <?php }else {
                	include "includes/head.php";
    echo "Connectez-vous pour ajouter/modifer un film <hr><br/>";
    echo "<a href='login.php' class='btn btn-primary btn-sm'>Connexion</a> ";
    echo "<a href='Bonjour.php' class='btn btn-secondary btn-sm'> Acceuil </a>";
}
?>
        </div>
    </div>
</div>
</div>
</div>