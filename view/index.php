<?php
include 'view/header.php';
error_reporting(0);
switch ($_GET['page']) {

  default:
    include "view/home.php";
    break;

  case "home";
    include 'view/home.php';
    break;

    case "profile";
    include 'view/profile.php';
    break;
     
  case "sejarah";
    include 'view/sejarah.php';
    break;

  case "informasi";
  include 'view/informasi.php';
  break;

  case "sejarah";
  include 'view/sejarah.php';
  break;

  case "login";
    include "../login.php";
    break;
}
include 'view/footer.php';
?>
