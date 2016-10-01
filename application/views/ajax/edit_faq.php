<?php
	
	foreach($content as $row){
		echo "<div id='faq-container'>";
		echo "<h3 id='one-faq-title'>" . $row->subject . "<button class='btn btn-md btn-warning' id='edit-faq'><i class='fa fa-edit'></i></button></h3><br>";
		echo "<p class='content' id='one-faq-content'>" . $row->body . "</p>";
	}

?>

<h3 id="edit-faq-title"></h3>
<p id="edit-faq-content"></p>