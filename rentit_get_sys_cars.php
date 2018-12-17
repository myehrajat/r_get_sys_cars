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

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// check for plugin using plugin name
if ( is_plugin_active( 'rentit_date_changer/rentit_date_changer.php' ) ) {


	include_once('show_options.php');
	include_once('save_options.php');
	include_once('customizer.php');














	function RentIt_Get_Sys_Cars_get_cars( $post_id) {

		 if(isset($_GET['jalali_start_date'])){
			 $start_date = $_GET['jalali_start_date'];
		 }else{

		 }
		 if(!isset($_GET['jalali_end_date']) ){
			 $start_date = $_GET['jalali_end_date'];
		 }else{

		 }
		static $sys_mojoodi;
		static $start_date;
		static $end_date;
		static $end_date;
		static $error_message;

		$sys_id = get_post_meta( $post_id, '_rentit_sys_car_id',true  );

		if ( !$sys_mojoodi ) {
			$file_get_contents = @ file_get_contents( get_theme_mod( 'available_car_url', 'https://sys.ejarehkhodro.com/wp-content/plugins/jqwidget-custom/json.php' ).'?list=mojoodi&start=' . urlencode( $start_date ) . '&end=' . urlencode($end_date) . '&min=0&max=99999999999999&vo='.get_theme_mod( 'available_car_future_return_date', 7 ).'&psw='.get_theme_mod( 'available_car_password', 'TBT RENTAL SYS PASS' ).'&rawdata=raw' );
			//var_dump($file_get_contents);
			if($file_get_contents){
				$sys_mojoodi = json_decode($file_get_contents);
				foreach ( $sys_mojoodi as $mojoodi ) {
					$formatted_mojoodi[ $mojoodi->id ] = $mojoodi;
				}
				$sys_mojoodi = $formatted_mojoodi;
				//var_dump($formatted_mojoodi);
				//die;
				if($sys_id){
					if ( array_key_exists( $sys_id, $sys_mojoodi ) ) {
						return $sys_mojoodi[ $sys_id ];
					} else {
						return false;
					}
				}else{
					return false;
				}
			}else{
				if($error_message==false){
					echo "TBT SYSTEM IS DOWN!";
					$error_message =true;
					return false;
				}
			}

		}

		/*
		$_GET['start']
		$_GET['end']
		$_GET['min']
		$_GET['max']
		$_GET['vo']
		*/
	//var_dump($sys_id);

	}
}else{
	add_action( 'admin_init', 'RentIt_Get_Sys_Cars_notice' );
	function RentIt_Get_Sys_Cars_notice(){
		 $plugin = plugin_basename( __FILE__ ); // 'myplugin'
		 deactivate_plugins( $plugin ); // Deactivate 'myplugin'
		?><div class="error"><p><?php 	esc_html_e( 'Sorry, but This Plugin requires the "RentIt Date Changer" to be installed and active.', 'rentit' );
	 ?></p></div><?php
	}
}