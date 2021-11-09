<?php
  require('options.php');
  require('pass_check.php');
  require('get_data.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Landing Page - FitFiu</title>

  <link href="assets/css/admin.css" rel="stylesheet">
</head>
<body>

  <?php if ($check_state['err']) : ?>

    <?php

      echo $check_state['err'].' - Error! '.$check_state['err_text'][$check_state['err']].'<br>';
      echo $formPass;

    ?>

  <?php else:?>
    <div class="wrapper">
      <div class="left">
        <p>
          <a href="/">Inicio</a>
        </p>
        <form action="json-edit.php" method="POST" enctype="multipart/form-data">
          <p>
            <label for="title">*Nombre del producto</label>
            <input id="title" type="text" name="title" value="<?php echo $json_arr['h1'];?>">
          </p>
          <p>
            <label for="title">Imagen del producto</label><br>
            <img class="image" src="<?php echo $json_arr['imageName'];?>" alt="Your image" width="100" height="100">
            <input type="file" name="image">
          </p>
          <div class="attributes">
            <h3>Propiedades del producto</h3>
          
            <?php
              foreach($json_arr['attributes'] as $item) {

                $checked = null;
                $label = null;

                if ($item['visible'] == true) { $checked = 'checked'; }

                switch ($item['id']) {
                  case 'speed': $label = 'Velocidad maxima'; break;
                  case 'power': $label = 'Potencia'; break;
                  case 'size': $label = 'Superficie de carrera'; break;
                  case 'compact': $label = 'Plegado hidraulico'; break;
                  case 'programs': $label = 'Entrenamiento'; break;
                  case 'mp3': $label = 'Extras'; break;
                }

                echo '<p><label for="title">'.$label.'</label><br>';
                echo '<input type="text" name="'.$item['id'].'" value="'.$item['text'].'">';
                echo '<label for="title">Mostrar</label>';
                echo '<input type="checkbox" name="'.$item['id'].'bool" '.$checked.'></p>';

              }
            ?>
          </div>
          <p>
            <label for="title">Descripción del producto</label><br>
            <textarea name="text" cols="50" rows="15"><?php echo htmlspecialchars_decode($json_arr['text']);?></textarea>
          </p>
          <p>
            <button type="submit">Guardar</button>
          </p>
        </form>
      </div> <!-- left -->
      
      <div class="right">

        <div class="right__image">
          <img src="assets/img/diseny-complet.jpg" alt="" class="right__img">
        </div>

      </div>

    </div><!-- wrapper -->
  <?php endif; ?>

</body>
</html>