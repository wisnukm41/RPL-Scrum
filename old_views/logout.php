<?php
  include '../config/function';
  session_destroy();
  header('Location:./login.php');