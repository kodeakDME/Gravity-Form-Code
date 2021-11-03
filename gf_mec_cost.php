<?php
// use the parameter after 'gform_field_value_{Your parameter call here}'

add_filter( 'gform_field_value_event_cost', 'populate_event_cost' );
function populate_event_cost( $value ) {
    return get_post_meta( get_the_ID(), 'mec_cost', true );
}
