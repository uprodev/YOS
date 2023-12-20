<?php

$actions = [
    'facult',
    'handle_dropped_media',
    'handle_deleted_media',
    'teacher',
    'ajax_search',
];

foreach($actions as $action){
    add_action('wp_ajax_'.$action, $action);
    add_action('wp_ajax_nopriv_'.$action, $action);
}

function facult(){
    $gr = new WP_Query([
        'post_type' => 'group',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'category_facultet',
                'field' => 'name',
                'terms' => $_GET['facultet'],
            ]
        ]
    ]);?>

    <option value="" disabled selected><?= __('Група', 'usfu');?></option>
    <?php while($gr->have_posts()): $gr->the_post();
        global $post;?>
        <option value="<?php the_id();?>"><?php the_title();?></option>
    <?php endwhile;
    wp_reset_postdata();

    die();
}

/*
*
DROPZONE
*/

function handle_dropped_media() {
    status_header(200);

    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['path'] . DIRECTORY_SEPARATOR;
    $num_files = count($_FILES['file']['tmp_name']);

    $newupload = 0;

    if ( !empty($_FILES) ) {
        $files = $_FILES;
        foreach($files as $file) {
            $newfile = array (
                'name' => $file['name'],
                'type' => $file['type'],
                'tmp_name' => $file['tmp_name'],
                'error' => $file['error'],
                'size' => $file['size']
            );

            $_FILES = array('upload'=>$newfile);
            foreach($_FILES as $file => $array) {
                $newupload = media_handle_upload( $file, 0 );
            }
        }
    }

    echo $newupload;
    die();
}

function insert_attachment($file_handler) {


    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, 0 );

    return intval($attach_id);
}

function handle_deleted_media(){

    if( isset($_REQUEST['media_id']) ){
        $post_id = absint( $_REQUEST['media_id'] );

        $status = wp_delete_attachment($post_id, true);

        if( $status )
            echo json_encode(array('status' => 'OK'));
        else
            echo json_encode(array('status' => 'FAILED'));
    }


    die();
}

/* Ajax Teacher */

function teacher(){

    $ids = $_GET['idf'];

    $fac = get_the_terms($ids, 'category_facultet');

    $grafik = get_field('grafik_pryjomu', $ids);

    ?>

    <a href="#" class="meet-back"><img src="<?= get_template_directory_uri();?>/img/chev_p.svg" alt=""><?= __('Повернутися до вибору викладачів', 'usfu');?></a>
    <h2 class="section-title"><?= __('Графік прийому викладача', 'usfu');?></h2>
    <div class="event-teacher">
        <div class="event-info">
            <div class="event-img"><img src="<?= get_the_post_thumbnail_url($ids);?>" alt=""></div>
            <div class="event-content">
                <div class="lecturer-item-title"><?= get_the_title($ids);?></div>
                <div class="lecturer-item-text"><?= get_field('posada', $ids);?></div>
                <p><b><?= __('Факультет:', 'usfu');?></b> <?= $fac[0]->name;?></p>
                <p><b><?= __('E-mail:', 'usfu');?></b> <a href="mailto:<?php the_field('mail', $ids);?>"><?php the_field('mail', $ids);?></a></p>
            </div>
        </div>

        <?php if($grafik['ponedilok']):?>
            <div class="day-item">
                <div class="day-head"><?= __('Понеділок', 'usfu');?></div>
                <?php foreach($grafik['ponedilok'] as $gr):?>
                    <div class="day-event">
                        <div class="day-hours"><?= $gr['chas'];?></div>
                        <div class="day-info">
                            <p><b><?= $gr['kabinet'];?></b></p>
                        </div>
                        <a href="#sign" class="day-label teach-info fancy"
                           data-day="<?= __('Понеділок', 'usfu');?>"
                           data-hour="<?= $gr['chas'];?>"
                           data-cab="<?= $gr['kabinet'];?>"
                           data-name="<?= get_the_title($ids);?>"
                           data-pos="<?= get_field('posada', $ids);?>"
                           data-mail="<?= get_field('mail', $ids);?>"
                        ><?= __('Записатися на прийом', 'usfu');?></a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <?php if($grafik['vivtorok']):?>
            <div class="day-item">
                <div class="day-head"><?= __('Вівторок', 'usfu');?></div>
                <?php foreach($grafik['vivtorok'] as $gr):?>
                    <div class="day-event">
                        <div class="day-hours"><?= $gr['chas'];?></div>
                        <div class="day-info">
                            <p><b><?= $gr['kabinet'];?></b></p>
                        </div>
                        <a href="#sign" class="day-label teach-info fancy"
                           data-day="<?= __('Вівторок', 'usfu');?>"
                           data-hour="<?= $gr['chas'];?>"
                           data-cab="<?= $gr['kabinet'];?>"
                           data-name="<?= get_the_title($ids);?>"
                           data-pos="<?= get_field('posada', $ids);?>"
                           data-mail="<?= get_field('mail', $ids);?>"
                        ><?= __('Записатися на прийом', 'usfu');?></a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <?php if($grafik['sereda']):?>
            <div class="day-item">
                <div class="day-head"><?= __('Середа', 'usfu');?></div>
                <?php foreach($grafik['sereda'] as $gr):?>
                    <div class="day-event">
                        <div class="day-hours"><?= $gr['chas'];?></div>
                        <div class="day-info">
                            <p><b><?= $gr['kabinet'];?></b></p>
                        </div>
                        <a href="#sign" class="day-label teach-info fancy"
                           data-day="<?= __('Середа', 'usfu');?>"
                           data-hour="<?= $gr['chas'];?>"
                           data-cab="<?= $gr['kabinet'];?>"
                           data-name="<?= get_the_title($ids);?>"
                           data-pos="<?= get_field('posada', $ids);?>"
                           data-mail="<?= get_field('mail', $ids);?>"
                        ><?= __('Записатися на прийом', 'usfu');?></a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <?php if($grafik['chetver']):?>
            <div class="day-item">
                <div class="day-head"><?= __('Четвер', 'usfu');?></div>
                <?php foreach($grafik['chetver'] as $gr):?>
                    <div class="day-event">
                        <div class="day-hours"><?= $gr['chas'];?></div>
                        <div class="day-info">
                            <p><b><?= $gr['kabinet'];?></b></p>
                        </div>
                        <a href="#sign" class="day-label teach-info fancy"
                           data-day="<?= __('Четвер', 'usfu');?>"
                           data-hour="<?= $gr['chas'];?>"
                           data-cab="<?= $gr['kabinet'];?>"
                           data-name="<?= get_the_title($ids);?>"
                           data-pos="<?= get_field('posada', $ids);?>"
                           data-mail="<?= get_field('mail', $ids);?>"
                        ><?= __('Записатися на прийом', 'usfu');?></a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <?php if($grafik['pyatnyczya']):?>
            <div class="day-item">
                <div class="day-head"><?= __('П’ятниця', 'usfu');?></div>
                <?php foreach($grafik['pyatnyczya'] as $gr):?>
                    <div class="day-event">
                        <div class="day-hours"><?= $gr['chas'];?></div>
                        <div class="day-info">
                            <p><b><?= $gr['kabinet'];?></b></p>
                        </div>
                        <a href="#sign" class="day-label teach-info fancy"
                           data-day="<?= __('П’ятниця', 'usfu');?>"
                           data-hour="<?= $gr['chas'];?>"
                           data-cab="<?= $gr['kabinet'];?>"
                           data-name="<?= get_the_title($ids);?>"
                           data-pos="<?= get_field('posada', $ids);?>"
                           data-mail="<?= get_field('mail', $ids);?>"
                        ><?= __('Записатися на прийом', 'usfu');?></a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
<?php

    die();
}

/* Search Literature */

function ajax_search() {
    if ($_GET['q']){
        $q = new wp_Query(['post_type' => 'literature', 's' => $_GET['q']]);
        while ($q->have_posts()) {  $q->the_post();
        $file = get_field('fajl');
        ?>

        <div class="service-card__link-group">
            <a href="<?= $file['url'];?>" target="_blank" class="public-item">
                <span><?php the_title();?></span>
            </a>
        </div>

    <?php }

    }

    die();
}
