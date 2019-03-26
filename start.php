<?php

elgg_register_event_handler('init', 'system', function () {
    
    // Load classes
    spl_autoload_register(function($class) {
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

	$basedir = dirname(__FILE__) . '/Classes/';
	if (file_exists($basedir.$class.'.php')) { 
	    include_once($basedir.$class.'.php');
	}
    });
    
    // Register input page
    elgg_register_page_handler('link_tracking', function($page) {
	
	$url = get_input('url');
	if (!empty($url)) {
	    
	    $tracker = new \mapkyca\LinkTracking\Track();
	    
	    $tracker->track($url);
	    
	}
	
    });
    
    // Link tracking javascript
    elgg_register_js('link-tracking', 'mod/elgg-link-tracking/views/default/js/link-tracking.js');
    elgg_load_js('link-tracking');
    
    // Add a menu item for the admin edit page
    elgg_register_admin_menu_item('administer', 'link_tracking', 'statistics');
});

elgg_register_event_handler('upgrade', 'system', function() {
   
    if (!elgg_get_plugin_setting('tracking-table', 'elgg-link-tracking')) {
	
	try {
	    
	    $upgrade = new \Elgg\Upgrades\CreateLinkTrackingTable();
	    
	    $upgrade->run();
	    
	} catch (\Exception $ex) {
	    register_error($ex->getMessage());
	}
	
    }
});