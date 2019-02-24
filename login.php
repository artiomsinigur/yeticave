<?php
require_once('functions.php');
require_once('data.php');
require_once('users_data.php');
require_once('lots_data.php');

session_start();

/*
ug0GdVMi 
daecNazD 
oixb3aL8
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $required_fields = ['email', 'password'];
  $errors = [];
  foreach ($required_fields as $field) {
    // Validation des champs, s'ils sont vides
    if (empty($_POST[$field])) {
      $errors[$field] = 'Le champ doit être rempli';
    }
  }

  // Validation de bon format d'email
  if (!empty($_POST['email'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Entrez un email valide';
    }
  }

  // Identification d'utilisateur
  if (empty($errors)) {
    foreach ($users as $user) {
      $user_email = in_array($user['email'], $_POST);
      $user_password = password_verify($_POST['password'], $user['password']);

      if ($user_email) {
        if ($user_password) {
          $_SESSION['user'] = $user;
          break;
        } else {
            $errors['password'] = 'Mot de pass invalide';
            break;
        }
      } else {
        $errors['email'] = 'Cet email n\'existe pas';
      }
    }
  }

  // Afficher les erreurs, si le tableau $errors n'est pas vide
  if (!empty($errors)) {
    $page_content = include_template('login.php', ['errors' => $errors]);
  } else {
    header("Location: /yeticave/index.php");
    // exit();
  }
} else {
  // Si la session est active, on affiche son nom
  if (isset($_SESSION['user'])) {
    $page_content = include_template('main.php', [
      'user' => $_SESSION['user']['name'],
      'lots' => $lots
      ]);
    echo "Bienvenue: " . $_SESSION['user']['name'];
  } else {
    // Si la methode POST n'a pas été envoyé, on l'affiche le formulaire de nouveau
    $page_content = include_template('login.php', []);
  }
}

// unset($_SESSION['user']);
// var_dump($errors);
var_dump($_SERVER['REQUEST_METHOD']);
// var_dump($_SESSION);
var_dump($_POST);


$layout_content = include_template('layout.php', [
  'main_content' => $page_content,
  'categories' => $categories,
  'title_page' => 'Se connecter',
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'user_avatar' => $user_avatar,
  'header_categories' => $categories
]);
print($layout_content);