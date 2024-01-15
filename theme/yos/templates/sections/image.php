<?php

$image = get_sub_field('image');

?>

<div class="top-space-140 top-space-md-150">
    <div class="image-full-width">
        <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>">
    </div>
</div>
