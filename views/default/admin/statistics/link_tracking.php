<?php

    $tracker = new \mapkyca\LinkTracking\Track();
    $links = $tracker->getUniqueUrls();

?>
<div class="link-tracking">
    
    <table class="elgg-list elgg-table">
	
	<tr>
	    <th class="url">URL</th>
	    <th class="user">User</th>
	    <th class="clicks">Clicks</th>
	</tr>
	
	<?php
	foreach ($links as $link) {
	  
	    ?>
	
	<tr>
	    <td class="url"><a href="<?= $link->url; ?>" target="_blank"><?= $link->url; ?></a></td>
	    <td class="user"><?php 
		if ($link->user_guid) {
		    if ($user = get_entity($link->user_guid)) {
			
			echo elgg_view_entity_icon($user, 'tiny');
			?>
			
			<a href="<?= $user->getUrl(); ?>"><?= $user->name ?></a>
			   <?php
		    }
		} else {
		    echo elgg_echo('elgg-link-tracking:loggedout');
		}
	    ?></td>
	    <td class="clicks"><?= $link->urlcount; ?> </td>
	</tr>
	
	    <?php
	}
	?>
    </table>
    
</div>