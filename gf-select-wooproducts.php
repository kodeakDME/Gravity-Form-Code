<?php
add_filter( 'gform_pre_render_6', 'product_list' ); //change this number to reflect the form ID
add_filter( 'gform_admin_pre_render_6', 'product_list' ); //change this number to reflect the form ID
function product_list( $form ) {
	$products_IDs = new WP_Query( array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	));
	$prodTitles = array();
	foreach ($products_IDs as $product_ID) {
		foreach ($product_ID as $productItem) {
			$prodTitles[] = $productItem->post_title;
	}}
	foreach ( $form['fields'] as &$field ) {
        if( $field['id'] == 6 ) {  //change this number to reflect the field ID
            $choices = array();
			if( is_array($prodTitles )) {
                foreach( $prodTitles as $prodTitle ) { 
					if (!empty($prodTitle)) {
                    	$choices[] = array( 'text' => $prodTitle, 'value' => $prodTitle );
					}
                }
        	} 
        	$field["choices"] = $choices;
    	}
    }
	return $form;
}
