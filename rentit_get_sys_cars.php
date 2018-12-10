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














function RentIt_Get_Sys_Cars_get_cars( $product ) {

	 if(!isset($start_date)){
	 }
	 if(!isset($end_date) ){
	 }
	static $sys_mojoodi;
	static $start_date;
	static $end_date;
	static $end_date;
	static $gregorian_to_jalali;
	if($gregorian_to_jalali != 'done'){
		$gregorian_to_jalali = 'done';
		$end_date = sst_simple_gregorian_to_jalali( $_GET['end_date']);
		$start_date = 	 sst_simple_gregorian_to_jalali( $_GET['start_date']);

	}
//var_dump($_GET['start_date']);
//var_dump($_GET['end_date']);
//var_dump($start_date);
//var_dump($end_date);
//	die;
	$sys_id = $product->get_attribute( '_rentit_sys_car_id' );
	if ( !$sys_mojoodi ) {

		$sys_mojoodi = json_decode( file_get_contents( 'https://sys.ejarehkhodro.com/wp-content/plugins/jqwidget-custom/json.php?list=mojoodi&start=' . urlencode( $start_date ) . '&end=' . urlencode($end_date) . '&min=0&max=99999999999999&vo=7&psw=ehrajat1363&rawdata=raw' ) );
		//var_dump($sys_mojoodi);
		foreach ( $sys_mojoodi as $mojoodi ) {
			$formatted_mojoodi[ $mojoodi->id ] = $mojoodi;
		}
		$sys_mojoodi = $formatted_mojoodi;
		//var_dump($sys_mojoodi);
		//echo '<pre>';
		//var_dump($formatted_mojoodi);
		//echo '</pre>';
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