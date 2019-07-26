<?php include "includes/head.php"; ?>
<?php include "includes/conexion.php"; ?>

            <form action="search.php" method="POST">
            <a href="Bonjour.php" class="btn btn-secondary btn-sm"> <- Retour </a>
                <h5 class="card-header">Liste des film disponibles</h5>
                <div class="card-body">
                    <div class="input-group">
                        <select name="sea" id="">
                            <option value="" selected disabled>Choisissez un film</option>
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

                        <span class="input-group-btn">
                            <button name="search" class="btn btn-danger" type="submit" autofocus>Go!</button>
                        </span>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom cinema</th>
                        <th scope="col">Num salle</th>
                        <th scope="col"> Num seance</th>
                        <th scope="col">Heure debut</th>
                        <th scope="col">Heure fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search'])) {
                        $search = $_POST['sea'];

                        $sel = "SELECT * FROM seance WHERE ID_film LIKE '$search' ";
                        $sr_query = mysqli_query($connection, $sel);
                        if (!$sr_query) {
                            die("error " . mysqli_error($connection));
                        }
                        $count = mysqli_num_rows($sr_query);
                        if ($count == 0) {
                            echo "<h1>No result found</h1>";
                        } else {
                            while ($row = mysqli_fetch_assoc($sr_query)) {
                                $cinema = $row['Nom_cinema'];
                                $salle = $row['No_salle'];
                                $seance = $row['No_seance'];
                                $debut = $row['Heure_debut'];
                                $fin = $row['Heure_fin'];
                                
                            echo "</tr>";
                            echo "<td>$cinema</td>";
                            echo "<td>$salle</td>";
                            echo "<td>$seance</td>";
                            echo "<td>$debut</td>";
                            echo "<td>$fin</td>";
                            echo "</tr>";
                            }
                        }
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>