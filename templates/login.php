<form class="form container" action="login.php" method="post"> <!-- form--invalid -->
  <h2>Se connecter</h2>
  
  <?php $error_class = isset($errors['email']) ? 'form__item--invalid' : ''?>
  <?php $val_email = $_POST['email'] ?? ''?>
  <div class="form__item <?=$error_class?>"> <!-- form__item--invalid -->
    <label for="email">Email*</label>
    <input id="email" type="text" name="email" value="<?=htmlspecialchars($val_email);?>" placeholder="Entrez un email" >
    <span class="form__error"><?=$errors['email']?></span>
  </div>

  <?php $error_class = isset($errors['password']) ? 'form__item--invalid' : ''?>
  <div class="form__item form__item--last <?=$error_class?>">
    <label for="password">Mot de pass*</label>
    <input id="password" type="password" name="password" placeholder="Entrez le mot de pass" >
    <span class="form__error"><?=$errors['password']?></span>
  </div>
  <button type="submit" class="button">Entrez</button>
</form>
