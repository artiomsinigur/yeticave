<?php if (empty($errors) && isset($_FILES['lot-img'])) {
  foreach ($_POST as $value) {
    echo '<li>' . $value . '</li>';
  }
    echo '<img src="' . 'img/' . $_FILES['lot-img']['name'] . '">';
  ?>
<?php
} else {
?>
<form class="form form--add-lot container form--invalid" action="add_lot.php" method="post" name="add-lot-form" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">

      <?php $error_class = isset($errors['lot-name']) ? 'form__item--invalid' : ''?>
      <?php $lot_name = $_POST['lot-name'] ?? ''?> 
      <div class="form__item <?=$error_class?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" value="<?=htmlspecialchars($lot_name)?>" placeholder="Введите наименование лота" >
        <span class="form__error">Введите наименование лота</span>
      </div>
      
      
      <?php $error_class = isset($errors['category']) ? 'form__item--invalid' : ''?>
      <div class="form__item <?=$error_class?>">
        <label for="category">Категория</label>
        <select id="category" name="category">
          <option value="">Выберите категорию</option>
          <?php foreach ($categories as $key => $value): ?>
            <option value="<?=$key?>"
              <?php if (isset($_POST['category'])): ?>
                <?php echo ($key == $_POST['category'] ? 'selected' : '')?>
              <?php endif;?>>
            <?=htmlspecialchars($value)?></option>
          <?php endforeach;?>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    
    <?php $error_class = isset($errors['message']) ? 'form__item--invalid' : ''?>
    <?php $message = $_POST['message'] ?? ''?> 
    <div class="form__item form__item--wide <?=$error_class?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?=htmlspecialchars($message)?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    
    <?php $error_class = isset($errors['lot-img']) ? 'form__item--invalid' : ''?>
    <div class="form__item form__item--file <?=$error_class?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="lot-img" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <?php if (isset($errors['lot-img'])): ?>
        <?php foreach ($errors['lot-img'] as $error) {
          print('<span class="form__error">' . $error . '</span>');
        }?>
      <?php endif;?>
    </div>
    <div class="form__container-three">

    <?php $error_class = isset($errors['lot-rate']) ? 'form__item--invalid' : ''?>
    <?php $lot_rate = $_POST['lot-rate'] ?? ''?> 
      <div class="form__item form__item--small <?=$error_class?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" value="<?=htmlspecialchars($lot_rate)?>" placeholder="0" >
        <span class="form__error">Введите начальную цену</span>
      </div>

      <?php $error_class = isset($errors['lot-step']) ? 'form__item--invalid' : ''?>
      <?php $lot_step = $_POST['lot-step'] ?? ''?> 
      <div class="form__item form__item--small <?=$error_class?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" value="<?=htmlspecialchars($lot_step)?>" placeholder="0" >
        <span class="form__error">Введите шаг ставки</span>
      </div>

      <?php $error_class = isset($errors['lot-date']) ? 'form__item--invalid' : ''?>
      <?php $lot_date = $_POST['lot-date'] ?? ''?> 
      <div class="form__item <?=$error_class?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=htmlspecialchars($lot_date)?>">
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <?php if (!empty($error)): ?>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif;?>
    <button type="submit" class="button" name="lot_send">Добавить лот</button>
  </form>
  <?php
  }
  ?>