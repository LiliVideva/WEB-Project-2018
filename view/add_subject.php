<?php
	mb_internal_encoding("UTF-8");
    $groupDao = new \model\dao\GroupDao();
    $majorDao = new \model\dao\MajorDao();
    $typeDao = new \model\dao\TypeDao();
    $courseDao = new \model\dao\CourseDao();
    $lecturerDao = new \model\dao\LecturerDao();

	 $groups = $groupDao->getAllGroups();
	 $majors = $majorDao->getAllMajors();
	 $courses = $courseDao->getAllCourses();
	 $lecturers = $lecturerDao->getAllLecturers();
	 $types=$typeDao->getAllTypes();
?>
    <div id="add_subject" class="form">
        <form action="handle_requests.php?target=admin&action=addSubject" method="post" enctype="multipart/form-data">
		<h4>Добавяне на дисциплина</h4>
            <br>

            Дисциплина
            <input type="text" name="subject_name" id="subject_name" placeholder="име" required> <br>

            <div class="selects">
                Семестриалност<select name="subject_type" id="subject_type">
				<?php
					 foreach ($types as $type) {
							 ?>
							 <option value="<?php echo $type->getId(); ?>"> <?= $type->getName() ?> </option>
							 <?php
						 }
                ?>
            </select>
            </div>
            <div class="selects">
                Специалност<select name="subject_major" id="subject_major">
				<?php
					 foreach ($majors as $major) {
							 ?>
							 <option value="<?php echo $major->getId(); ?>"> <?=$major->getName() ?> </option>
							 <?php
						 }
                ?>
            </select>
            </div>
            <div class="selects">
                Курс<select name="subject_course" id="subject_course">
				<?php
					 foreach ($courses as $course) {
							 ?>
							 <option value="<?php echo $course->getId(); ?>"> <?=$course->getName() ?> </option>
							 <?php
						 }
                ?>
				</select>
            </div>
            <div class="selects">
                Група<select name="subject_group" id="subject_group">
				<option value="none"></option>
				<?php
					 foreach ($groups as $group) {
							 ?>
							 <option value="<?php echo $group->getId(); ?>"> <?=$group->getName() ?> </option>
							 <?php
						 }
                ?>
            </select>
            </div>
            <div class="selects">
                Преподавател<select name="subject_lecturer" id="subject_lecturer">
				<?php
					 foreach ($lecturers as $lecturer) {
							 ?>
							 <option value="<?php echo $lecturer->getId(); ?>"> <?=$lecturer->getName() ?> </option>
							 <?php
						 }
                ?>
            </select>
            </div>

            Хорариум<br>
			<div class="selects">
            Лекции
            <input type="text" name="subject_lectures" id="subject_lectures"><br>
            Упражнения
            <input type="text" name="subject_seminars" id="subject_seminars"><br>
            Практикум
            <input type="text" name="subject_practices" id="subject_practices"><br>
			</div>

            Кредити
			<div class="selects">
            <input type="text" name="subject_credits" id="subject_credits"><br>
			</div>

            <input type="submit" name="add_subject" value="Добавяне">

        </form>
    </div>