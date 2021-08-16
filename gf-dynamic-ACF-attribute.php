<?php

// This sets up a field to be populated dynamically using ACF on the post type
// This example will take the ACF field key of 'build_it_price' and dynamically populate ANY field that uses the attribute key of 'build_it_cost'

add_filter( 'gform_field_value_build_it_cost', 'populate_cost' );
function populate_cost( $value ) {

    return get_field('build_it_price');
}
