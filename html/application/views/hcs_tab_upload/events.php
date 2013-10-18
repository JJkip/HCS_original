<div class="threecol">
 </div>
<div class="ninecol last">
   <h1>Events</h1>
<?php echo validation_errors(); ?>
<?php echo form_open("hcs_tab_upload/add_events"); ?>

<label for="title">Event</label>
<?php echo form_input(textInputBuilder("event_name", @$event_name)); ?>

<label for="title">Venue</label>
<?php echo form_input(textInputBuilder("event_venue", @$event_venue)); ?>

<label>Description</label>
<?php echo form_textarea(textAreaBuilder('description', @$form["description"])); ?>
<br />
 <p>
    <?php
        echo form_label('Start');
        echo form_input(datePickerBuilder('start_date', @$form["start_date"]));
    ?>
 </p>
 <p>
    <?php
        echo form_label('End');
        echo form_input(datePickerBuilder('end_date',  @$form["end_date"]));
    ?>
 </p>

<p>
    <input type="submit" name="submit" value="Save" id="submit" />
</p>

</form>


</div>