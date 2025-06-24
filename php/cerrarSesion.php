<?php
  session_start();
  $nombreSesion = $_REQUEST["curp"];
  unset($_SESSION[$nombreSesion]);
  header("location: ./../");
?>