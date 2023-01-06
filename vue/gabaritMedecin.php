<!DOCTYPE html>
<html lang="fr">
    <head>
      <title><?php echo $nom; ?></title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css" />

      <script type="text/javascript">

function envoi() {
    var set = document.getElementById("set");
    var textfield = document.getElementById("textfield")

    for (var i=0; i<textfield.value; i++) {

        p = document.createElement("p");
        p.innerHTML = "Créneau n°" + (i + 1) + " : ";

        input = document.createElement("input");
        input.type = "datetime-local";
        input.name = "addedfield" + i;

        p.appendChild(input);
        set.appendChild(p);

    }

    s = document.createElement("input");
    s.type = "submit";
    s.name = "envoyerCreneauxBloques";
    s.value = "Envoyer";

    set.appendChild(s);
}

      </script>
	  
    </head>
  <body>

  <h1>Page de <?php echo $nom; ?></h1>

  <form id="menu" method="POST">
    <fieldset id="set">
        <legend>haha</legend>
        <input type="hidden" name="idhidden" value="<?php echo $id; ?>">

        <p>nombre de créneaux a bloquer : <input type="text" id="textfield" onblur="envoi()"></p>
    </fieldset>

  </form>

  </body>
</html>