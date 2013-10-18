<div class="ninecol">
    <div class="downloadlist">
        <h2><?php echo $data['title'] ?></h2>

        <?php echo $error; ?>
        <?php echo form_open_multipart('media_centre/do_upload'); ?>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" />
        <br/>
        <label>Description</label><br/>
        <?php echo form_textarea('description', set_value('description')); ?>
        <br/>
        <label for="userfile">File</label>
        <input type="file" name="userfile" size="20" value="<?php echo set_value('userfile'); ?>" />
        <br /><br />
        <input type="submit" value="save" />
        <?php
        echo form_hidden("category_id", $data['section']);
        echo form_close();
        ?>
    </div>
</div>
