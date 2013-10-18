<?php
echo validation_errors();
echo form_open('reset_password/email_exists');
$email_textbox = textInputBuilder('email_reset', @$email_reset);
$email_textbox['placeholder'] = 'Enter email';
echo form_input($email_textbox);
echo form_button(buttonBuilder('submit', 'Reset'));
echo form_close();
?>
