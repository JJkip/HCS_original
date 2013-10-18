<?php  $categories = array("financial"=>"Financial", "narrative"=>"Narrative");?>

 <div class="threecol">
 </div>
<div class="ninecol last">
    <h1>Reports</h1>
    <div><?php echo $this->session->flashdata('message'); ?> </div>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("hcs_tab_upload/update_report"); ?>

<label for="title">Title</label>
<?php echo form_input(textInputBuilder("report_title", @$form['title'])); ?>

<label>Description</label>
<?php echo form_textarea(textAreaBuilder('description', @$form["description"])); ?>
<br />
<p>
    <label for="categories">Categories</label>
    <?php echo form_dropdown('category', $categories, 'large') ?>
</p>
<br />
<input type="file" name="userfile" id="userfile" size="20" />
<p>
    <input type="submit" name="submit" value="Save" id="submit" />
</p>

</form>

</div>