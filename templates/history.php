<div class="container">
    <section class="lots">
      <h2>Histoire sur les articles visionnés</h2>
      <ul class="lots__list">
      <?php foreach ($lot_viewed as $lot): ?>
        <?=include_template('lot.php', ['lot' => $lot]);?>
      <?php endforeach; ?>
      <?php if (empty($lot_viewed)) {
        echo "<p>Vous n'avez pas d'histoire</p>";
      }?>

        <!-- <li class="lots__item lot">
          <div class="lot__image">
            <img src="img/lot-2.jpg" width="350" height="260" alt="Сноуборд">
          </div>
          <div class="lot__info">
            <span class="lot__category">Доски и лыжи</span>
            <h3 class="lot__title"><a class="text-link" href="lot.html">DC Ply Mens 2016/2017 Snowboard</a></h3>
            <div class="lot__state">
              <div class="lot__rate">
                <span class="lot__amount">12 ставок</span>
                <span class="lot__cost">15 999<b class="rub">р</b></span>
              </div>
              <div class="lot__timer timer timer--finishing">
                00:54:12
              </div>
            </div>
          </div>
        </li> -->
      </ul>
    </section>
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
  </div>