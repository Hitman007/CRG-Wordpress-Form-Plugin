<?php

function doModifyAdminWidgets(){
	include_once('doReturnAdminWidgetOutput.php');
	$adminWidgetOutput = doReturnAdminWidgetOutput();
	//die('hello wlrld');
        //die($adminWidgetOutput);
        
        wp_add_dashboard_widget(
                 'example_dashboard_widget',         // Widget slug.
                 'Example Dashboard Widget',         // Title.
                 'example_dashboard_widget_function' // Display function.
        );
}

//add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

function example_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo "Hello World, I'm a great Dashboard Widget";
}
