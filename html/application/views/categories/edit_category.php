<div class="threecol">
 </div>
<div class="ninecol last">
   <h1>Category</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("categories/edit_categories"); ?>
<?php foreach ($all_categories as $key=>$value): ?>
                <p>
                    <?php 
                        
                      
                        echo form_button(buttonBuilder($key, 'Edit'));
                        echo " " .$value ;
                    
                    ?>
                   <br/>
                </p>
                            
            <?php endforeach; ?>
<?php echo form_close();?>

</div>
