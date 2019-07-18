<?php include "head.php"; ?>
<?php include "conexion.php"; ?>

<body>
<div class="col-md-4">
<h1>La liste des cinemas</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nom cinema</th>
        <th scope="col">Arrondissement</th>
        <th scope="col">Adresse</th>
      </tr>
    </thead>
<tbody>
  
    <?php
    //creation de la requete
        $sel_artiste = "SELECT * FROM cinema ";

        $sel_arts = mysqli_query($connection, $sel_artiste);
        while ($row = mysqli_fetch_array($sel_arts)) {
        $Nom_cinema=$row['Nom_cinema'];
        $Arrondissement=$row['Arrondissement'];
        $Adresse=$row['Adresse'];
        echo "<tr>";
        echo "<td> $Nom_cinema </td>";
        echo "<td>$Arrondissement</td>";
        echo "<td>$Adresse</td>";
        echo "</tr>";
        }
    ?>

</tbody>
</table>
</div>
</body>
</html>