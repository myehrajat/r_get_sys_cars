<?php

function RentIt_Get_Sys_Cars_save_options($post_id) {

	if ( isset( $_POST[ '_rentit_sys_car_id' ] ) ) {
		update_post_meta( $post_id, '_rentit_sys_car_id', wc_clean( $_POST[ '_rentit_sys_car_id' ] ) );
	}
}