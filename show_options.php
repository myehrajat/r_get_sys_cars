<?php
function RentIt_Get_Sys_Cars_show_options() {
	// I add this part to add sys car id
	woocommerce_wp_text_input(
		array(
			'id' => '_rentit_sys_car_id',
			'label' => esc_html__( 'Car ID in TBT Sys', "rentit" ),
			'data_type' => 'text',
			'desc_tip' => 'true',
			'description' => esc_html__( 'The car ID in Tabatabaee Rental System (in car list you can find it). Based on this ID available cars will be shown!', 'rentit' )
		) );

}