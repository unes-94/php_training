<?php include "includes/head.php"; ?>
<?php include "includes/conexion.php"; ?>

<body>
    <div class="col-md-4">
    <a href="Bonjour.php" class="btn btn-secondary btn-sm"> <- Retour </a>
        <h1>Les aristes</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Birth date</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                //creation de la requete
                $sel_artiste = "SELECT * FROM artiste ";

            
                $sel_arts = mysqli_query($connection, $sel_artiste);
                while ($row = mysqli_fetch_array($sel_arts)) 
                {
                    $nom = $row['Nom'];
                    $prenom = $row['Prenom'];
                    $dat_naiss = $row['Annee_naissance'];
                    echo "<tr>";
                    echo "<td> {$nom} </td>";
                    echo "<td>{$prenom}</td>";
                    echo "<td>{$dat_naiss}</td>";
                    echo "</tr>";

                }
                ?>

                </tbody>
            </table>
    </div>
</body>

</html>