<?php

namespace mapkyca\LinkTracking;

class Track {
    
    /**
     * Add a track to url.
     * @param string $url
     */
    public function track($url) {
	
	$config = [
	    'prefix' => elgg_get_config('dbprefix'),
	];
	
	return _elgg_services()->db->insertData("
	    INSERT INTO {$config['prefix']}link_tracking 
		(url, `from`, timestamp)
		VALUES
		(:url, :from, :time)
	", [
	    ':url' => $url,
	    ':from' => $_SERVER['HTTP_REFERER'],
	    ':time' => time()
	]);
    }
    
    /**
     * Get unique urls
     */
    public function getUniqueUrls() {
	
	$config = [
	    'prefix' => elgg_get_config('dbprefix'),
	];
	
	return _elgg_services()->db->getData(" 
	    SELECT url, `from`, count(`url`) as urlcount
	    FROM {$config['prefix']}link_tracking 
	    GROUP BY url, `from`
	    ORDER by urlcount DESC
	");
    }
    
    /**
     * Count a url
     */
    public function count($url) {
	
	$config = [
	    'prefix' => elgg_get_config('dbprefix'),
	];
	
	$row = _elgg_services()->db->getDataRow(" 
	    SELECT count(url) as urlcount
	    FROM {$config['prefix']}link_tracking 
	");
	    
	return $row['urlcount'];
    }
}


