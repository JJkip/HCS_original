<!--
we need to include the css for lightbox here
-->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/lightbox.css" type="text/css" media="screen"/>
<div class="twelvecol">
    <div id="gallery">

        <h2>Photo gallery</h2>
        <span><a href="<?php echo site_url().'/gallery';?>">Back to gallery</a></span>
        <?php
        $counter = 0;
        if (isset($data) && count($data)): foreach ($data as $image): ?>
                <div class="single<?php echo ($counter == 0 ? '' : 'first') ?>">
                    <div class="thumbnail">
                        <a href="<?php echo $image['image_url']; ?>" rel="lightbox[plants]" title="image">
                            <img src="<?php echo $image['thumb_url']; ?>" alt="<?php echo $image['caption']; ?>" />

                        </a>
                    </div>
                    <p class="description"><?php echo $image['caption']; ?></p>
            <?php if ($image['created'] <> "NA") {
            ?>
                    <p class="credits">Uploaded on <?php echo $image['created']; ?></p>
            <?php } ?>
            </div>

        <?php
                $counter++;
            endforeach;

        endif;
        ?>

    </div>

</div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/jquery.smooth-scroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/lightbox.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('a').smoothScroll({
            speed: 1000,
            easing: 'easeInOutCubic'
        });

        $('.showOlderChanges').on('click', function(e){
            $('.changelog .old').slideDown('slow');
            $(this).fadeOut();
            e.preventDefault();
        })
    });

</script>