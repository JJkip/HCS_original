<div class="threecol">
</div>
<div class="ninecol last">
    <h2><?php echo $data->news_title ?></h2>
     <p> <?php echo $error; ?></p>
    <?php echo form_open_multipart("news/do_edit"); ?>

    <label for="title">Title</label>
    <?php echo form_input(textInputBuilder("news_title", $data->news_title)); ?>

    <label>Description</label>
    <?php echo form_textarea(textAreaBuilder('description', $data->description)); ?>
    <label for="userfile">File attachment</label>
    <input type="file" name="userfile" size="20" />
    <p>
        <input type="submit" name="submit" id="submit" value="Save" />
    </p>

    <?php
    echo form_hidden("news_id", $data->news_id);
    echo form_hidden("file", $data->file);
    echo form_close(); ?>
</div>