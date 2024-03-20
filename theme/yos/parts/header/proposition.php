<?php

?>

<div class="side-basket proposition" data-proposition>
    <!--
        Можно открыть/закрыть боковое окно скриптами, есть два метода
        window.proposition.open();
        window.proposition.close();
    -->
    <div class="side-basket__container">
        <button class="side-basket__close-btn" data-action="close-proposition"><span
                class="icon-close-thin"></span></button>
        <div class="side-basket__head">
            <h2>Поділися своєю думкою </h2>
            <p>Що может зробити наш сайт більш зручнішим для тебе?</p>
        </div>
        <div class="side-basket__scroll-container">
            <form action="">
                <div class="form__fields">
                    <div class="form__field">
                        <div class="input-wrap" data-input>


                            <input type="text" class="input" required placeholder="enter">
                            <span class="input-label">Ім’я</span>

                        </div>
                    </div>
                    <div class="form__field">
                        <div class="input-wrap" data-input>


                            <input type="Email" class="input" required placeholder="enter">
                            <span class="input-label">Електронна адреса</span>

                        </div>
                    </div>
                    <div class="form__field">
                        <div class="textarea-wrap" data-textarea>
                            <textarea class="textarea" placeholder="enter"></textarea>
                            <span class="textarea-label">Текст повідомлення</span>
                        </div>
                    </div>
                </div>
                <div class="form__footer">
                    <button class="button-primary dark">надіслати</button>
                    <button class="button-primary light">надіслати анонімно</button>
                </div>
            </form>
        </div>
    </div>
</div>
