<?php
	mb_internal_encoding("UTF-8");
    $majorDao = new \model\dao\MajorDao();
?>
<div id="add_major" class="form">
	<form action="handle_requests.php?target=admin&action=addMajor" method="post" enctype="multipart/form-data">
	<h4>Добавяне на специалност</h4>
		<br>
		
		<div class="selects">
			Специалност
			 <input type="text" name="subject_major" id="subject_major" placeholder="специалност" required> <br>
		</div>

		<input type="submit" name="add_major" value="Добавяне">

	</form>
</div>