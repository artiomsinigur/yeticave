<?php
session_start();
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
}

if (!isset($_SESSION['user'])) {
  header("Location: /yeticave/index.php");
}