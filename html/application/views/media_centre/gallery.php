<!--
we need to include the js and css for lightbox here
-->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/lightbox.css" type="text/css" media="screen"/>
<div class="twelvecol">
    
        <div class="dropdown_section">
            <h2>Photo gallery</h2>
            <div class="drop_down">
                <?php
//    $filter = 'onchange = "filter_content(' . "'" .  base_url() . "'," . 'this, \'news\');"';
                $js = 'id="organization"';
                echo form_dropdown("organization", $data['organizations'], $data['org_id'], $js);
                ?>
            </div>
        </div>
        <div id="gallery">
        <div id="message">
            <?php
                echo $this->session->flashdata('message');
            ?>
            </div>
        <?php
                $counter = 0;
                if (isset($data['images']) && count($data['images'])): foreach ($data['images'] as $image): ?>
                        <div class="single<?php echo ($counter == 0 ? '' : 'first') ?>">
                            <div class="thumbnail">
                                <a href="<?php echo $image['image_url']; ?>" rel="lightbox[plants]" title="<?php echo $image['caption'] . ' (' . $image['organization'] . ')' ?>">
                                    <img src="<?php echo $image['thumb_url']; ?>" alt="Plants: image 1 0f 4 thumb" />

                                </a>
                            </div>
                            <p class="description"><?php echo $image['caption']; ?></p>
                            <p class="credits">Uploaded on <?php echo $image['created']; ?> by <?php echo $image['organization']; ?></p>
                        </div>

        <?php
                        $counter++;
                    endforeach;

                endif; ?>

            </div>

        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/jquery.smooth-scroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/lightbox.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $('#organization').change(function(){ //any select change on the dropdown with id country trigger this code
                    var org_id = $('#organization').val();  // here we are taking organization id of the selected one.
                    //we now redirect to the relevant controller
                    window.location.replace("<?php echo base_url() ?>index.php/gallery/index/"+org_id);
        });
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