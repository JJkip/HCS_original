<div class="ninecol">
    <div class="downloadlist">
        <h2><?php echo $data->title ?></h2>

        <p> <?php echo $error; ?></p>
        <?php echo form_open_multipart('media_centre/do_edit'); ?>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $data->title; ?>" />
        <br/>
        <label>Description</label><br/>
        <?php echo form_textarea('description', $data->description); ?>
        <br/>
        <label for="userfile">File(upload a new one to overwrite the existing)</label>
        <input type="file" name="userfile" size="20" value="" />
        <br /><br />
        <input type="submit" value="save" />
        <?php
        echo form_hidden("category_id", $data->category_id);
        echo form_hidden("id", $data->id);
        echo form_hidden("file", $data->file);
        echo form_close();
        ?>
    </div>
</div>
