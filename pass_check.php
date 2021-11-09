<?php
  // 0 - Sin errores (Mostrar un formulario para editar datos)
  // 1 - La contraseña de la sesión no coincide
  // 2 - La contraseña es incorrecta
  // 3 - Introducir la contraseña
  $check_state = [
    'err' => 3,
    'err_text' => [
      1 => 'La contraseña de la sesión no coincide',
      2 => 'La contraseña es incorrecta',
      3 => 'Introducir la contraseña'
    ]];

  session_start();

  if (!$_SESSION['pass']) {

    if (isset($_POST['pass']) && !empty(trim($_POST['pass']))) {

      $editPass = strip_tags($_POST['pass']);
      $editPass = htmlspecialchars($editPass);
      $editPass = base64_encode($editPass);

      if ($editPass !== $pass) {
        $check_state['err'] = 2;
       } else {
        $_SESSION['pass'] = $pass;
        $check_state['err'] = 0;
       }
    }

  } elseif($_SESSION['pass'] != $pass) {
    $check_state['err'] = 1;
  } else {
    $check_state['err'] = 0;
  }
  
?>