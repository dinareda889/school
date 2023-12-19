<?php
/*
echo'<pre>';
print_r($all_details);*/

if (isset($all_details) && $all_details != null) { ?>
    <div class="row">
        <iframe width="100%" height="100%"
                src="https://www.youtube.com/embed/<?=$all_details->video_link?>">
        </iframe>
    </div>
    <?php
} ?>