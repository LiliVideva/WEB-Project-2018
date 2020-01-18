<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
	 
	 $subjectDao = new \model\dao\SubjectDao();
	 $subjects = [];
	 if(isset($_POST["search_button"])){
	 $subjects=$subjectDao->getSubjects($_POST["select_type"], $_POST["select_major"], $_POST["select_course"], $_POST["select_group"], $_POST["select_lecturer"], $_POST["sort_subject"]);
	 }
?>

	<div id="filter-div" class="form">
		<form method="post">
		<h4>Търсене на дисциплина</h4>
		<br>

		<div class="filter-selects" id="filter-type-div">
			Семестриалност<select name="select_type" id="select_filter_type" class="parent-types">
			<?php
				 foreach ($types as $type) {
						 ?>
						 <option value="<?php echo $type->getId(); ?>"> <?= $type->getName() ?> </option>
						 <?php
					 }
			?>
		</select>
		</div>
		<div class="filter-selects" id="filter-major-div">
			Специалност<select name="select_major" id="select_filter_major">
			<option value="none"></option>
			<?php
				 foreach ($majors as $major) {
						 ?>
						 <option value="<?php echo $major->getId(); ?>"> <?=$major->getName() ?> </option>
						 <?php
					 }
			?>
		</select>
		</div>
		<div class="filter-selects" id="filter-course-div">
			Курс<select name="select_course" id="select_filter_course">
			<option value="none"></option>
			<?php
				 foreach ($courses as $course) {
						 ?>
						 <option value="<?php echo $course->getId(); ?>"> <?=$course->getName() ?> </option>
						 <?php
					 }
			?>
			</select>
		</div>
		<div class="filter-selects" id="filter-group-div">
			Група<select name="select_group" id="select_filter_group">
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
		<div class="filter-selects" id="filter-lecturer-div">
			Преподавател<select name="select_lecturer" id="select_filter_lecturer">
			<option value="none"></option>
			<?php
				 foreach ($lecturers as $lecturer) {
						 ?>
						 <option value="<?php echo $lecturer->getId(); ?>"> <?=$lecturer->getTitleId()." ".$lecturer->getName() ?> </option>
						 <?php
					 }
			?>
		</select>
		</div>
		<div class="filter-selects" id="filter-sort-div">
			Сортиране по<br>
			<input type="radio" name="sort_subject" id="sort_type" value="type"> Семестриалност 
			<input type="radio" name="sort_subject" id="sort_major" value="major"> Специалност <br>
			<input type="radio" name="sort_subject" id="sort_course" value="course"> Курс 
			<input type="radio" name="sort_subject" id="sort_group" value="group"> Група 
			<input type="radio" name="sort_subject" id="sort_lecturer" value="lecturer"> Преподавател 
		</div>
		<input  type="submit" value="Търсене" name="search_button">
	</form>
	
</div>
<table>
		<tr>
			<th>Дисциплина</th>
			<th>Семестриалност</th>
			<th>Специалност</th>
			<th>Курс</th>
			<th>Група</th>
			<th>Хорариум</th>
			<th>Преподавател</th>
			<th>Кредити</th>
		</tr>
		<?php foreach($subjects as $subject) {?>
		<tr>
			<td><?php echo $subject['name']; ?></td>
			<td><?php echo $subject['type']; ?></td>
			<td><?php echo $subject['major']; ?></td>
			<td><?php echo $subject['course']; ?></td>
			<td><?php echo $subject['groups']; ?></td>
			<td><?php echo $subject['lectures']."+".$subject['seminars']."+".$subject['practices']; ?></td>
			<td><?php echo $subject['title']." ".$subject['lecturer']; ?></td>
			<td><?php echo $subject['credits']; ?></td>
		</tr>
		<?php } ?>
</table>