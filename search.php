<?php include "head.php"; ?>
<?php include "conexion.php"; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <form action="search.php" method="POST">
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
                        <!-- <th scope="col">Nom du film</th> -->
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
                            echo "<th scope='col'>$cinema</th>";
                            echo "<th scope='col'>$salle</th>";
                            echo "<th scope='col'>$seance</th>";
                            echo "<th scope='col'>$debut</th>";
                            echo "<th scope='col'>$fin</th>";
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