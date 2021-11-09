<?php
  require_once('options.php');
  require_once('get_data.php');

  session_start();

  if (empty(trim($json_arr['h1'])) || strlen(trim($json_arr['h1'])) == 0) {
    header("Location: ".$http.$_SERVER['HTTP_HOST']."/admin.php", true, 301);
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $json_arr['h1']; ?></title>
    <meta name="description" content="Cinta de correr plegable con velocidad hasta 14 km/h, superficie de carrera de 40 x 110 cm, motor de 1500W, pantalla LCD, pulsómetro y sistema de paro de emergencia">
    <link rel="icon" href="assets/img/favicon.ico" type="image/png">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="assets/css/app.css" rel="stylesheet">
  </head>
  <body>
<header class="header">
  <div class="header__left">
    <div class="header__props">
      <div class="header__title">
        <h1 class="header__title-text"><?php echo $json_arr['h1']; ?></h1>
      </div>
      <ul class="header__props-list">
        <?php
          foreach($json_arr['attributes'] as $item) {
            $label = null;

            if (!empty(trim($item["text"]) && $item["visible"] == true)) {

              switch ($item['id']) {
                case 'speed': $label = 'Velocidad maxima'; break;
                case 'power': $label = 'Potencia'; break;
                case 'size': $label = 'Superficie de carrera'; break;
                case 'compact': $label = 'Plegado hidraulico'; break;
                case 'programs': $label = 'Entrenamiento'; break;
                case 'mp3': $label = 'Extras'; break;
              }

              echo '<li class="header__props-item header-'.$item["id"].'"><span class="text-1">'.$label.'</span><span class="text-2">'.$item["text"].'</span></li>';
            }
          } 
        ?>
      </ul>
      <div class="header__guarantee"><img src="assets/img/garantia.png" alt="Garantía 2 años"></div>
    </div>
  </div>
  <div class="header__right">
    <div class="header__logo"><img class="header__logo-img" src="assets/img/logo.png" width="335" height="120" alt="fit your needs"><span class="header__logo-tagline">fit your needs</span></div>
    <div class="header__image">
      <img class="header__image-img"
        srcset="<?php echo $json_arr['imageName']; ?> 580w,
        <?php echo $json_arr['imageName']; ?> 780w,
        <?php echo $json_arr['imageName']; ?>"
        alt="Cinta de Correr MC-200">
    </div>
  </div>
</header>
<section class="sectoin compact">
  <div class="compact__image"><img class="compact__img" src="assets/img/cinta-plegada.jpg" width="800" height="800" alt="Cinta plegada" loading="lazy"></div>
  <div class="compact__content">
    <div class="compact__content-block"><img class="compact__icon" src="assets/img/fit_plegado.png" width="146" height="138" alt="Plegado Compacto" loading="lazy">
      <h2 class="compact__title">Plegado Compacto</h2>
      <p class="compact__text">Ahorra espacio con su sistema de plegado vertical y compacto</p>
    </div>
  </div>
</section>
<section class="section grid-images">
  <ul class="grid-images__items">
    <li class="grid-images__item"><img class="grid-images__img" src="assets/img/01.jpg" alt="cinta de correo" loading="lazy"><span class="grid-images__title">Alcanza hasta 14km/h gracias a su potente motor de 1500w</span></li>
    <li class="grid-images__item"><img class="grid-images__img" src="assets/img/02.jpg" alt="cinta de correo" loading="lazy"><span class="grid-images__title">Pantalla LCD con 12 programas y lectura en tiempo real</span></li>
    <li class="grid-images__item"><img class="grid-images__img" src="assets/img/03.jpg" alt="cinta de correo" loading="lazy"><span class="grid-images__title">Entrena cómodamente en una superfice de correra de 110x40cm</span></li>
    <li class="grid-images__item"><img class="grid-images__img" src="assets/img/04.jpg" alt="cinta de correo" loading="lazy"><span class="grid-images__title">Incorpora sensor de frecuencia cardiaca en el manilla</span></li>
    <li class="grid-images__item"><img class="grid-images__img" src="assets/img/05.jpg" alt="cinta de correo" loading="lazy"><span class="grid-images__title">Dispone de 2 ruedas frontales para facillitar su transporte</span></li>
    <li class="grid-images__item"><img class="grid-images__img" src="assets/img/06.jpg" alt="cinta de correo" loading="lazy"><span class="grid-images__title">Conexión mp3 para que disfrutes de tu entrenamiento</span></li>
  </ul>
</section>
<section class="section description">
  <h2 class="title-h2">Descripción del producto</h2>
  <div class="description__items">
    <?php
      $text_arr = preg_split('/\r\n|\r|\n/', $json_arr['text']);
      foreach($text_arr as $item) {
        if (!empty(trim($item))) {
          echo '<p>'.htmlspecialchars_decode($item).'</p>';
        }
      }
    ?>
  </div>
</section>
<section class="section data-sheet">
  <h2 class="title-h2">Ficha Técnica</h2>
  <div class="data-sheet__items">
    <div class="data-sheet__items-left">
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Generales</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Frecuencia de uso</div>
              <div class="data-sheet__list-text2">Intensiva</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Potencia</div>
              <div class="data-sheet__list-text2">2200W</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Voltaje</div>
              <div class="data-sheet__list-text2">240V</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Velocidad máxima</div>
              <div class="data-sheet__list-text2">18km/h</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Pulsómetro</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Sistema de seguridad</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Peso máximo de usuario</div>
              <div class="data-sheet__list-text2">120kg</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Máx. inclinación</div>
              <div class="data-sheet__list-text2">15%</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Teclas de velocidad directa</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
          </ul>
        </div>
      </div>
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Otros</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Mancuernas</div>
              <div class="data-sheet__list-text2">2 unidades de 1kg</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Disco giratorio</div>
              <div class="data-sheet__list-text2">1</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Soporte abdominales</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Masajeador anticelulítico</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
          </ul>
        </div>
      </div>
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Valores</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Tiempo de entrenamiento</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Distancia recorrida</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Calorias consumidas</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Velocidad de marcha</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Frecuencia cardíaca</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Inclinación</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
          </ul>
        </div>
      </div>
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Monitor</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Pantalla</div>
              <div class="data-sheet__list-text2">LCD multifunción</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Programas predeterminados</div>
              <div class="data-sheet__list-text2">11 programas predefinidos</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Test índice de masa corporal</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Soporte para tablet y móvil</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Soporte para botellas</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Ventilador</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Altavoces</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Mini jack 3.5</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="data-sheet__items-right">
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Dimensiones y peso del producto</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Dimensiones en uso</div>
              <div class="data-sheet__list-text2">169x70x132cm</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Dimensiones plegada</div>
              <div class="data-sheet__list-text2">105x70x132cm</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Peso del producto</div>
              <div class="data-sheet__list-text2">69kg</div>
            </li>
            <li class="data-sheet__list-item image"><img src="assets/img/tecnic.JPG" alt="Dimensiones"></li>
          </ul>
        </div>
      </div>
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Dimensiones y peso de la caja</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Dimensiones de la caja</div>
              <div class="data-sheet__list-text2">170x76x33cm</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Peso de la caja</div>
              <div class="data-sheet__list-text2">79kg</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Número de vultos</div>
              <div class="data-sheet__list-text2">1</div>
            </li>
          </ul>
        </div>
      </div>
      <div class="data-sheet__item accordion">
        <h3 class="data-sheet__title accordion-btn">Contenido de la caja</h3>
        <div class="accordion-item">
          <ul class="data-sheet__list accordion-content">
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Cinta de correr MC-500</div>
              <div class="data-sheet__list-text2">x1</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Mancuernas</div>
              <div class="data-sheet__list-text2">x2</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Disco giratorio</div>
              <div class="data-sheet__list-text2">x1</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Bote lubricante</div>
              <div class="data-sheet__list-text2">x1</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Manual de instrucciones</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
            <li class="data-sheet__list-item">
              <div class="data-sheet__list-text1">Kit de montaje</div>
              <div class="data-sheet__list-text2">Sí</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="banner-1"><img class="banner-1__img" srcset=" assets/img/foto-segon-banner_800.jpg 780w" sizes="(max-width: 780px) 760px" src="assets/img/foto-segon-banner.jpg" alt="Hombre en caminadora" loading="lazy"></section>
<section class="section advantages">
  <ul class="advantages__items">
    <li class="advantages__item">
      <h2 class="advantages__title">Comodidad</h2>
      <p class="advantages__text"> Entrenamiento cómodo y dinámico sin salir de casa</p>
    </li>
    <li class="advantages__item">
      <h2 class="advantages__title">Resistencia</h2>
      <p class="advantages__text"> Ideal parainiciarse en el cardio y mejorar la resistencia</p>
    </li>
    <li class="advantages__item">
      <h2 class="advantages__title">Fuerza</h2>
      <p class="advantages__text"> Trabaja el tren inferior de tu cuerpo</p>
    </li>
  </ul>
</section>
<section class="banner-red">
  <div class="banner-red__content">
    <div class="banner-red__text"><span class="banner-red__text-1">fit your</span><span class="banner-red__text-2">Cardio</span><span class="banner-red__text-3">needs</span></div>
  </div>
</section>
<footer class="footer"><img class="footer__logo" src="assets/img/logo.png" width="400" height="150" alt="Fitfiu fitness" loading="lazy"></footer>
  <script type="text/javascript" src="assets/js/vendors.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script></body>
</html>