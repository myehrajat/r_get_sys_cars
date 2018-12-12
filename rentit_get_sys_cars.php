<?php
/**
 * @package RentIt_Get_Sys_Cars
 * @version 1.0
 */
/*
Plugin Name: RentIt Get Sys Cars
Plugin URI: https://wordpress.org/plugins/hello-dolly/
Description: this plugin get car from rent car system!
Version: 1.0
Author URI: https://ma.tt/
Text Domain: RentIt_Get_Sys_Cars
*/
//this plugin need changig in theme



include_once('show_options.php');
include_once('save_options.php');
include_once('customizer.php');














function RentIt_Get_Sys_Cars_get_cars( $post_id) {

	 if(!isset($start_date)){
		 $start_date = $_GET['jalali_start_date'];
	 }
	 if(!isset($end_date) ){
		 $start_date = $_GET['jalali_end_date'];
	 }
	static $sys_mojoodi;
	static $start_date;
	static $end_date;
	static $end_date;

	$sys_id = get_post_meta( $post_id, '_rentit_sys_car_id',true  );

	if ( !$sys_mojoodi ) {

		$sys_mojoodi = json_decode( file_get_contents( get_theme_mod( 'available_car_url', 'https://sys.ejarehkhodro.com/wp-content/plugins/jqwidget-custom/json.php' ).'?list=mojoodi&start=' . urlencode( $start_date ) . '&end=' . urlencode($end_date) . '&min=0&max=99999999999999&vo='.get_theme_mod( 'available_car_future_return_date', 7 ).'&psw='.get_theme_mod( 'available_car_password', 'TBT RENTAL SYS PASS' ).'&rawdata=raw' ) );
		foreach ( $sys_mojoodi as $mojoodi ) {
			$formatted_mojoodi[ $mojoodi->id ] = $mojoodi;
		}
		$sys_mojoodi = $formatted_mojoodi;
		//var_dump($formatted_mojoodi);
		//die;
	}
	/*
	$_GET['start']
	$_GET['end']
	$_GET['min']
	$_GET['max']
	$_GET['vo']
	*/
//var_dump($sys_id);
	if($sys_id){
		if ( array_key_exists( $sys_id, $sys_mojoodi ) ) {
			return $sys_mojoodi[ $sys_id ];
		} else {
			return false;
		}
	}else{
		return false;
	}
}