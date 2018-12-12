<?php
function RentIt_Get_Sys_Cars_available_car($wp_customize){
	
		/*MYEDIT>*/
    /*******************************************************************
     * mobile
     *******************************************************************/
	$tmp_sectionname = "available_car";


  /**************************header*****************************/

    $wp_customize->add_section($tmp_sectionname . '_section', array(
        'title' => esc_html__('Available Car API', 'rentit'),
        'priority' => 10,
        'description' => esc_html__('This section is dedicated for showing or hiding header and footer on mobile or tablet devices.', 'rentit'),
	));

/**********************/

	$tmp_settingname = $tmp_sectionname . '_url';

    $wp_customize->add_setting($tmp_settingname, array('default' => NULL,
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('API URL', 'rentit'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));
/**********************/

	$tmp_settingname = $tmp_sectionname . '_password';

    $wp_customize->add_setting($tmp_settingname, array('default' => NULL,
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Password', 'rentit'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));
/**********************/

	$tmp_settingname = $tmp_sectionname . '_future_return_date';

    $wp_customize->add_setting($tmp_settingname, array('default' => NULL,
        'sanitize_callback' => 'wp_kses_post'));

    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Days after future return date make available', 'rentit'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));


/**********************/
	/*
	$tmp_settingname = $tmp_sectionname . '_minimum_price';

    $wp_customize->add_setting($tmp_settingname, array('default' => NULL,
        'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Minimum daily price', 'rentit'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));
/**********************/
	/*
	$tmp_settingname = $tmp_sectionname . '_maximum_price';

    $wp_customize->add_setting($tmp_settingname, array('default' => NULL,
        'sanitize_callback' => 'wp_kses_post'));
    $wp_customize->add_control($tmp_settingname . '_control', array(
        'label' => esc_html__('Maximum daily price', 'rentit'),
        'section' => $tmp_sectionname . "_section",
        'settings' => $tmp_settingname,
        'type' => 'text',
    ));*/
}
add_action('customize_register', 'RentIt_Get_Sys_Cars_available_car');