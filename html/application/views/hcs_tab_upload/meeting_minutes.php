 <div class="threecol">
 </div>
<div class="ninecol last">
   <h1>Meeting Minutes</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("hcs_tab_upload/upload_minutes"); ?>

<label for="title">Title</label>
<?php echo form_input(textInputBuilder("meeting_title", @$meeting_title)); ?>

<label>Description</label>
<?php echo form_textarea(textAreaBuilder('description', @$form["description"])); ?>
<br />
<input type="file" name="userfile" id="userfile" size="20" />
<p>
    <input type="submit" name="submit" id="submit" value="Save" />
</p>

</form>


</div>