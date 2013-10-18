<?php 
$form = array();
if (isset($to_edit)) {
    $form = $to_edit[0];
}
?>
<div class="threecol"></div>
<div class="ninecol last">
	<h1>Category</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("categories/add_new");
        if (count($form) > 0) {
            echo form_hidden('category_id', $form["category_id"]);
        }
	?>
	<p>
		<?php echo form_input(textInputBuilder("category", @$form["category"])); ?>
	</p>
	<p>
		<input type="submit" name="submit" id="submit" value="Save" />
	</p>

	</form>

	<div id="Success">
		<?php

        if (isset($saved)) {
            echo "Category added successfully";
        }
		?>
	</div>
</div>