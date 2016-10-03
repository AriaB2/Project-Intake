<?php
	
	for($i = 0; $i < $pageCount; $i++){

		$count++;
		echo "<a id=\"button-" . $count . "\" class=\"results-button btn btn-default btn-sm\">" . $count . "</a>";
	}

?>