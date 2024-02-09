<?php

$short = get_sub_field('shortkod');

if($short) {

    echo do_shortcode('' . $short . '');

}
