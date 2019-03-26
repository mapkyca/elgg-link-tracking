<?php

namespace Elgg\Upgrades;

class CreateLinkTrackingTable {

    public function run() {

	$config = [
	    'prefix' => elgg_get_config('dbprefix'),
	];
	
	_elgg_services()->db->updateData("
	    CREATE TABLE IF NOT EXISTS
		{$config['prefix']}link_tracking
		(
		    `id` int(11) NOT NULL AUTO_INCREMENT,
		    `url` varchar(255),
		    `from` varchar(255),
		    `timestamp` int(11) NOT NULL DEFAULT '0',
		    PRIMARY KEY (`id`),
		    KEY(`url`),
		    KEY(`from`),
		    KEY(`timestamp`)
		)
	");
    }

}
