<?php include "head.php"; ?>
<?php include "conexion.php"; ?>

<body>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <a href="Bonjour">retour</a>
                <form action="" method="post">
                <label for="salle">Salles disponible</label>
                <select class="mdb-select mb-4" name="inf">
                    <option value="" disabled selected>Selectionnez une salle</option>

                    <?php
                    //creation de la requete
                        $sel_artiste = "SELECT DISTINCT  No_salle FROM salle";

                        $sel_arts = mysqli_query($connection, $sel_artiste);
                        while ($row = mysqli_fetch_array($sel_arts)) {
                        $num_salle = $row['No_salle'];

                        echo "<option value=' $num_salle '> $num_salle </option>";
                    }
                    ?>
                </select>
                <button name="infos" class="btn btn-danger" >show </button>
                </form>
                <h1>Les salles disponible</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Num salle</th>
                            <th scope="col">Nom cinema</th>
                            <th scope="col"> Num seance</th>
                            <th scope="col">Heure debut</th>
                            <th scope="col">Heure fin</th>
                            <!-- <th scope="col">Nom du film</th> -->
                            <th scope="col">Id du film</th>
                            <th scope="col">Affiche</th>
                        </tr>
                    </thead>
                    <tbody>
                 
                        <?php
                        if(isset ($_POST['inf'])){
                            $No_salle = $_POST['inf'];
                            $salle_properties="SELECT t1.*, t2.Film_img FROM seance AS t1 INNER JOIN film AS t2 ON No_salle=$No_salle AND t1.ID_film=t2.ID_film";
                            $sallePropr=mysqli_query($connection, $salle_properties);

                            while($row=mysqli_fetch_array($sallePropr))
                            {
                                $film_img=$row['Film_img'];

                            $nom_cin = $row['Nom_cinema'];
                            $seance = $row['No_seance'];
                            $debut = $row['Heure_fin'];
                            $fin = $row['Heure_debut'];
                            // $film = $row['Heure_debut'];
                            $id_film = $row['ID_film'];
                            echo "</tr>";
                            echo "<th scope='col'>$No_salle</th>";
                            echo "<th scope='col'>$nom_cin</th>";
                            echo "<th scope='col'>$seance</th>";
                            echo "<th scope='col'>$debut</th>";
                            echo "<th scope='col'>$fin</th>";
                            // echo "<th scope='col'>$film</th>";
                            echo "<th scope='col'>$id_film</th>";
                            if(empty($row['Film_img'])){
                                echo "<th scope='col'>no Image</th>";
                        }else{
                            echo "<th scope='col'><img src='img/$film_img' alt='' class='img-thumbnail' style='width:30%; height:100px'></th>";
                            
                        }
                            echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>