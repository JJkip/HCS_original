<div class="threecol">
 </div>
<div class="ninecol last">
   <h2>News</h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("hcs_tab_upload/add_news"); ?>

<label for="title">Title</label>
<?php echo form_input(textInputBuilder("news_title", @$news_title)); ?>

<label>Description</label>
<?php echo form_textarea(textAreaBuilder('description', @$form["description"])); ?>
<label for="userfile">File attachment</label>
        <input type="file" name="userfile" size="20" />
<p>
    <input type="submit" name="submit" id="submit" value="Save" />
</p>

<?php echo form_close(); ?>

</div>