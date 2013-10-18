 <div class="threecol">
 </div>
<div class="ninecol last">
    <h1>Tools</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("tools/do_edit"); ?>

<label for="title">Title</label>
<?php echo form_input(textInputBuilder("tool_title", @$form['title'])); ?>

<label>Description</label>
<?php echo form_textarea(textAreaBuilder('description', @$form["description"])); ?>
<br />
<input type="file" name="userfile" id="userfile" size="20" />
<p>
    <input type="submit" value="Save" name="submit" id="submit" />
</p>

</form>

</div>