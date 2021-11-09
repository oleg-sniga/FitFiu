<?php
  require('options.php');
  require('pass_check.php');
  require('get_data.php');

  if (isset($_POST['title']) && !empty($_POST['title'])) {
    $title = data_checking($_POST['title']);
  }


  // Checking data before adding
  function data_checking($data, $tags = '') {

    $data = strip_tags($data, $tags);
    $data = htmlspecialchars($data);

    return $data;
  }


  if (file_exists($json_file)) {

    if ($title) { $json_arr["h1"] = $title; }

    if ($_POST['text']) {  $json_arr["text"] = data_checking($_POST['text'], '<b><p><strong>'); }

    for ($i = 0; count($json_arr['attributes']) > $i; $i++) {

      if ($_POST[$json_arr['attributes'][$i]['id']]) { $json_arr['attributes'][$i]['text'] = data_checking($_POST[$json_arr['attributes'][$i]['id']]); }

      if ($_POST[$json_arr['attributes'][$i]['id'].'bool']) {
        $json_arr['attributes'][$i]['visible'] = true;
      } else {
        $json_arr['attributes'][$i]['visible'] = false;
      }

    }

    function uploadFileImg($file) { //Upload image

      if (exif_imagetype($_FILES['image']['tmp_name'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
          return true;
        } else { return false;}
      }

      return false;
    }

    //Check Image
    if ($_FILES['image'] && !empty($_FILES['image']['tmp_name'])) {

      $uploaddir = 'assets/img/';
      $nameFiles = ['product', 'product_600', 'product_900', 'product_1200'];
      $extension = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
      $fullNameFile = $nameFiles[0]. '.' .$extension;

      $uploadfile = $uploaddir . $fullNameFile;

      $fileFromData = stripslashes($json_arr['imageName']);
      if (file_exists($fileFromData)) {
        if (unlink($fileFromData)) {

          if (uploadFileImg($uploadfile)) {
            $json_arr['imageName'] = $uploadfile;
          }

        }
      } else {
        if (uploadFileImg($uploadfile)) {
          $json_arr['imageName'] = $uploadfile;
        }
      }

    }

    // Convert to JSON string and update the file
    $json_set = json_encode($json_arr);

    if (file_put_contents($json_file, $json_set)) {
      header("Location: ".$hostName, true, 301);
    } else { echo 'Error de actualización de datos'; }

  } else {
    echo "File $json_file does not exist";
  }

?>