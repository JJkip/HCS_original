<div class="twelvcol">
		    <div class='back btn btn-small btn-danger' style="left:80%"><?php echo anchor('feedback/index','<< Back'); ?></div>
        <div class="newstitle"><?php echo $title; ?> </div>
    
        
        <p class="date"><?php echo 'written on ' . $date_created . ' by ' . $organization; ?></p>
        <p class="description">
            <?php echo $description; ?>
        </p>
       
        <div class="download">
                    Download <a href="<?php echo base_url() . 'uploads/feedback/' . $file ?>" target="_blank">
                <?php echo $file ?>
            </a>
        </div>
        </div>