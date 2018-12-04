<?php
function acf_load_menu_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();

    $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    //$menus = get_registered_nav_menus();
    $blank_list = json_encode(array( "name" => "Default Menu", "term_id" => "")); 
    $blank_list = json_decode($blank_list);
    array_unshift($menus, $blank_list);
	foreach ( $menus as $val ) {

		$value = $val->term_id;
        $label = $val->name;

        $field['choices'][ $value ] = $label;
	}

    // return the field
    return $field;
    
}
add_filter('acf/load_field/name=custom_menu', 'acf_load_menu_field_choices');  //replace custom_menu with your field name
