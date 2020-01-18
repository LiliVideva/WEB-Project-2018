<?php
	mb_internal_encoding("UTF-8");
    $lecturerDao = new \model\dao\LecturerDao();

	 $titles = $lecturerDao->getAllTitles();
?>
    <div id="add_lecturer" class="form">
        <form action="handle_requests.php?target=admin&action=addLecturer" method="post" enctype="multipart/form-data">
		<h4>Добавяне на преподавател</h4>
            <br>
			
            <div class="selects">
                Титла<select name="lecturer_title" id="lecturer_title">
				<option value="none"></option>
				<?php
					 foreach ($titles as $title) {
							 ?>
							 <option value="<?php echo $title->getId(); ?>"> <?=$title->getName() ?> </option>
							 <?php
						 }
                ?>
            </select>
            </div>
            <div class="selects">
                Преподавател
				 <input type="text" name="subject_lecturer" id="subject_lecturer" placeholder="преподавател" required> <br>
            </select>
            </div>

            <input type="submit" name="add_lecturer" value="Добавяне">

        </form>
    </div>