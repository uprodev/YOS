<div class="popup" id="popup-search">
    <div class="popup__body">
        <div class="popup__content">
            <button class="popup__close" data-popup="close-popup"><span class="icon-close-thin"></span></button>
            <form <?= home_url( '/' ) ?> class="main-search">
                <div class="main-search__title text-uppercase text-3"><?= __('Щось шукаєте?', 'yos');?></div>
                <div class="input-wrap" data-input>

                    <input type="text" class="input" >
                    <span class="input-label"><?= __('Пошук', 'yos');?></span>


                </div>
                <button class="button-primary dark"><?= __('Пошук', 'yos');?></button>
            </form>
        </div>
    </div>
</div>
