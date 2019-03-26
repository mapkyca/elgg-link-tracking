<?php

    $tracker = new \mapkyca\LinkTracking\Track();
    $links = $tracker->getUniqueUrls();

?>
<div class="link-tracking">
    
    <table class="elgg-list elgg-table">
	
	<tr>
	    <th class="url">URL</th>
	    <th class="from">From</th>
	    <th class="clicks">Clicks</th>
	</tr>
	
	<?php
	foreach ($links as $link) {
	  
	    ?>
	
	<tr>
	    <td class="url"><a href="<?= $link->url; ?>" target="_blank"><?= $link->url; ?></a></td>
	    <td class="from"><a href="<?= $link->from; ?>" target="_blank"><?= $link->from; ?></a></td>
	    <td class="clicks"><?= $link->urlcount; ?> </td>
	</tr>
	
	    <?php
	}
	?>
    </table>
    
</div>