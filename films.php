<?php include "includes/head.php"; ?>
<?php include "includes/conexion.php"; ?>
<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
  echo "<a href='logout.php' class='btn btn-secondary btn-sm'>
  deconnexion </a>";
}else{
  echo "Connectez-vous pour ajouter/modifer un film <hr>";
  echo "<a href='login.php' class='btn btn-primary btn-sm'>Connexion</a> ";
}

?>

    <a href="Bonjour.php" class="btn btn-secondary btn-sm">
      <- Retour </a>
      <hr>
       <form action="login.php" method="post">
                    <h5 class="card-header mb-4">Ajouter un film </h5>
                    <input class="btn btn-outline-primary " value="Ajouter" type="submit" name="admin">
       </form>
      <hr>
       <h1>La liste des films</h1>
                    <!-- <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="image">
                <select name="film" id="">
                            <option value="" selected disabled>Film</option>
                              <?php
                              $req = "SELECT  * FROM film ";
                              $query = mysqli_query($connection, $req);
                              while ($row = mysqli_fetch_array($query)) {
                                $titre = $row['Titre'];
                                $id_film = $row['ID_film'];
                                echo "<option value='$id_film'>$titre</option>";
                              }
                              ?>
                </select>

          <input type="submit" name="submit" value="Add poster">
        </form> -->

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">titre</th>
              <th scope="col">Annee</th>
              <th scope="col">Realisateur</th>
              <th scope="col">modifier un film</th>

            </tr>
          </thead>
          <tbody>

            <?php
            //creation de la requete
            $sel_artiste = "SELECT * FROM film ";

            $sel_arts = mysqli_query($connection, $sel_artiste);
            while ($row = mysqli_fetch_array($sel_arts)) {
              $id_film = $row['ID_film'];
              $titre = $row['Titre'];
              $annee = $row['Annee'];
              $realis = $row['Nom_Realisateur'];
              echo "<tr>";
              echo "<td> $id_film </td>";
              echo "<td>$titre</td>";
              echo "<td>$annee</td>";
              echo "<td>$realis</td>";
              if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
              echo "<td><a href='modif_film?edit={$id_film}'>editer</a></td>";
              
            }else{
              echo "<td>non dispo</td>";
            }
              echo "</tr>";
            }
            ?>
            <?php
            if (isset($_POST['submit'])) {
              $id = $_POST['film'];
              $post_image = $_FILES['image']['name'];
              $post_image_temp = $_FILES['image']['tmp_name'];
              move_uploaded_file($post_image_temp, "img/$post_image");

              $requete = "UPDATE  film SET Film_img='{$post_image}'  WHERE ID_film=$id ";
              $data_fill = mysqli_query($connection, $requete);
            }
            ?>
          </tbody>
        </table>
  </div>
</div>