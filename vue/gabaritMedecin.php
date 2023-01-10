<!DOCTYPE html>
<html lang="fr">
    <head>
      <title><?php echo $nom; ?></title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="vue/style.css">

      <script type="text/javascript">

function envoi() {
    var set = document.getElementById("set");
    var textfield = document.getElementById("textfield")

    for (var i=0; i<textfield.value; i++) {

        p = document.createElement("p");
        p.innerHTML = "Créneau n°" + (i + 1) + ":<br>";

        input = document.createElement("input");
        input.type = "datetime-local";
        input.name = "addedfield" + i;
        input.className = "gabarit";

        p.appendChild(input);
        set.appendChild(p);

    }

    s = document.createElement("input");
    s.type = "submit";
    s.name = "envoyerCreneauxBloques";
    s.value = "Envoyer";
    s.className = "bouton";

    set.appendChild(s);
}

      </script>
	  
    </head>
  <body>

  <h1>Page de <?php echo $nom; ?></h1>

  <form id="menu" method="POST">
    <fieldset id="set">
    <legend>Tâches administratives</legend>
        <input type="hidden" name="id" value="<?php echo $id; ?>">  
        <input type="hidden" name="login" value="<?php echo $login; ?>">
        <input type="hidden" name="mdp" value="<?php echo $mdp; ?>">

        <p>nombre de créneaux a bloquer:<br><input type="text" id="textfield" class="gabarit" onblur="envoi()"></p>

        <?php echo $taches; ?>
    </fieldset>

  </form>

  <form method="POST" action="site.php">
    
    <p><input type="submit" class="bouton" value="Déconnexion"></p>
  </form>

  </body>
</html>