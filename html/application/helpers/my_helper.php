<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * CSS creator only displays one div at a time
 */

if (!function_exists('div_selector')) {

    function div_selector($div_elements, $divToDisplay) {

        $css = "";
        $numOfDivs = count($div_elements);

        for ($i = 0; $i < $numOfDivs; $i++) {

            $current_div = $div_elements[$i];

            if (strcasecmp($current_div, $divToDisplay) == 0) {

            } else {
                //construct CSS string
                $css .= $current_div . ", ";
            }
        }
        $css = substr_replace($css, "", -2);
        //Remove the last comma
        $css .= "{display: none;}";

        return $css;

    }

}
/*
 * Template for textbox, textarea, submitt button
 *
 */

if (!function_exists('textInputBuilder')) {
    function textInputBuilder($name, $value) {
        $textBox = array('name' => $name, 'id' => 'textBox', 'value' => set_value($name, $value));
        return $textBox;
    }

}

//textArea Builder
if (!function_exists('textAreaBuilder')) {

    function textAreaBuilder($name, $value) {
        $textarea = array('name' => $name, 'value' => set_value($name, $value), 'rows' => '4', 'cols' => '50');

        return $textarea;
    }

}

//Button builder
if (!function_exists('buttonBuilder')) {

    function buttonBuilder($value, $content) {
        $button = array('name' => 'submit', 'type' => 'submit', 'value' => $value, 'content' => $content);
        return $button;
    }

}
//datePicker Builder
if (!function_exists("datePickerBuilder")) {

    function datePickerBuilder($name, $value) {

        $datePicker = array('name' => $name, 'value' => set_value($name, $value), 'class' => 'datepicker');

        return $datePicker;
    }

}

//Radio button builder

if (!function_exists("radio_button_builder")) {

    function radio_button_builder($name) {
        $radio_button = array('name' => $name, 'id' => $name, 'value' => 'accept', 'checked' => FALSE, 'style' => 'margin:10px' );
         
        return $radio_button;
    }

}
?>