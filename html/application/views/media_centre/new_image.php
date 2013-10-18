<div class="ninecol">
    <div class="downloadlist">
        <h2><?php echo $data['title']; ?></h2>
        <?php
        echo $error;
        echo form_open_multipart('gallery/do_upload');
        ?>
        <label for="userfile">Photo (zipped folder with all your photos or just one photo)</label>
        <input type="file" name="userfile" size="20" value="" />
        <br />
        <label for="title">Caption it!</label>
        <input type="text" name="caption" id="title" value="<?php echo set_value('caption'); ?>" />
        <br/>
        <input type="submit" value="Upload" />
        <?php
        echo form_close();
        ?>
    </div>
</div>