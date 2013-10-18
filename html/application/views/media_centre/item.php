<div class="ninecol">
    
    <div class="downloadlist">
        <h2><?php echo $media->title ?></h2>
        <p class="downloaddescription <?php echo $media->css_class; ?>">
            <?php echo $media->description ?>
        </p>
        <p class="downloadfiledetails"><a href="<?php echo $media->download_link; ?>" target="_blank">Download</a>
            <?php echo $media->file; ?>&nbsp;<?php echo $media->size; ?>Kb uploaded on <?php echo $media->created; ?> by <?php echo $media->organization; ?></p>
    </div>

</div>
