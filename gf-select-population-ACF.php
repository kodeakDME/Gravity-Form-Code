<?php

// This is added to functions.php file and will use ACF checkbox fields to populate radio or checkbox fields in a GF. 

add_filter( 'gform_pre_render_6', 'project_addons' ); // Change the number here to specify the FORM ID
add_filter( 'gform_admin_pre_render_6', 'project_addons' ); // Change the number here to specify the FORM ID
function project_addons( $form ) {
     foreach ( $form['fields'] as &$field ) {
          if( $field['id'] == 15 ) { // This specifies the field ID that you want to populate
               $acf_fields = get_field('radio_set');
               $choices = array();

               if( is_array($acf_fields )) {
                    foreach( $acf_fields as $acf_field ) { // this loops all the ACFs that were entered for the post

                         // This takes a number from the text and turns it into a value if you need to use this for a cost equation
                         $numbers = preg_replace('/[^0-9]/', '', $acf_field ); 
                         // If you don't need a different value, both text & value will be the same var
                         $choices[] = array( 'text' => $acf_field, 'value' => $numbers );
                    }
               }
               $field["choices"] = $choices;
          }
     }
return $form;
}