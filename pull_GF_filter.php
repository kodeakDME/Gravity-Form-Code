<?php

//put the below in your functions.php file. To be used with the custom GF styler in Unlimited Elements. 

function setMyDropdownItems($options){
    $forms = GFAPI::get_forms();
    foreach ( $forms as $form) {
        $formTitle = $form['title'];
        $options[$formTitle] = $form['id'];
    }
	return($options);
}
add_filter("ue_modify_dropdown_mydropdown","setMyDropdownItems");
    
