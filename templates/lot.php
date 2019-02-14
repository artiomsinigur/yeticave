<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?=$lot['url']?>" width="350" height="260" alt="<?=$lot['title']?>">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?=$lot['category']?></span>
        <h3 class="lot__title"><a class="text-link" href="lot_view.php?lot_id=<?=$lot['id'] ?>"><?=cutText($lot['title'], 55)?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=formatPrice($lot['price'])?></span>
            </div>
            <div class="lot__timer timer">
              <?=endTime();?>
            </div>
        </div>
    </div>
</li>