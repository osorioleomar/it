<ul>
	<?php
		foreach($faq as $title){
			echo '<li><a class="title" href="#" id="' . $title->id . '">' . $title->subject . '</a></li>';
			echo "<br>";
		};
	 ?>
</ul>