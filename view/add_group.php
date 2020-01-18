<?php
	mb_internal_encoding("UTF-8");
    $groupDao = new \model\dao\GroupDao();
?>
<div id="add_major" class="form">
	<form action="handle_requests.php?target=admin&action=addGroup" method="post" enctype="multipart/form-data">
	<h4>Добавяне на група</h4>
		<br>
		
		<div class="selects">
			Група
			 <input type="text" name="subject_group" id="subject_group" placeholder="група" required> <br>
		</div>

		<input type="submit" name="add_group" value="Добавяне">

	</form>
</div>