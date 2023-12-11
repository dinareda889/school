<?php
/*
echo'<pre>';
print_r($all_details);*/

if (isset($all_details) && $all_details != null) { ?>
    <div class="row">
        <video width="100%" height="100%" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="<?= base_url() . 'uploads/videos/'.$all_details->video_link ?>" type="video/mp4">
        </video>
    </div>
    <?php
} ?>