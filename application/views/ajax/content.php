<?php
	
	foreach($content as $row){
		echo "<div id='faq-container'>";
		echo "<h3 id='single-faq-title'>" . $row->subject . "<button class='btn btn-md btn-warning' id='edit-faq' data='" . $row->id . "'><i class='fa fa-edit'></i></button></h3><br>";
		echo "<p class='content' id='single-faq-content'>" . $row->body . "</p>";
	}

?>