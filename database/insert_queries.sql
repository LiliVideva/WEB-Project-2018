INSERT INTO courses (course_id,course) VALUES (1,1);
INSERT INTO courses (course_id,course) VALUES (2,2);
INSERT INTO courses (course_id,course) VALUES (3,3);
INSERT INTO courses (course_id,course) VALUES (4,4);

INSERT INTO groups (name) VALUES ('Др');
INSERT INTO groups (name) VALUES ('КП');
INSERT INTO groups (name) VALUES ('М');
INSERT INTO groups (name) VALUES ('ПМ');
INSERT INTO groups (name) VALUES ('ОКН');
INSERT INTO groups (name) VALUES ('С');
INSERT INTO groups (name) VALUES ('Х');
INSERT INTO groups (name) VALUES ('ЯКН');

INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
VALUES ("ii@gmail.com","Иван" , "Иванов", "iivanov", "1", 0);
INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
VALUES ("gg@gmail.com","Георги" , "Георгиев", "goshog", "2", 0);
INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
VALUES ("ss@gmail.com","Стефка" , "Стефанова", "stefi24", "2", 0);
INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
VALUES ("pp@gmail.com","Петя" , "Петкова", "petqpet5", "1", 0);
INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
VALUES ("ss@gmail.com","Стоян" , "Стоянов", "100qnst", "2", 1);
INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
VALUES ("aa@gmail.com","Ана" , "Анева", "ania", "1", 0);

INSERT INTO majors (name) VALUES ("Софтуерно инженерство");
INSERT INTO majors (name) VALUES ("Компютърни науки");
INSERT INTO majors (name) VALUES ("Информационни системи");
INSERT INTO majors (name) VALUES ("Информатика");
INSERT INTO majors (name) VALUES ("Математика и информатика");
INSERT INTO majors (name) VALUES ("Приложна математика");
INSERT INTO majors (name) VALUES ("Математика");
INSERT INTO majors (name) VALUES ("Статистика");
INSERT INTO majors (name) VALUES ("Софтуерни технологии");
INSERT INTO majors (name) VALUES ("Изкуствен интелект");

INSERT INTO titles (title_id,name) VALUES (1, "проф.");
INSERT INTO titles (title_id,name) VALUES (2, "доц.");
INSERT INTO titles (title_id,name) VALUES (3, "д-р");
INSERT INTO titles (title_id,name) VALUES (4, "гл.ас.");
INSERT INTO titles (title_id,name) VALUES (5, "ас.");

INSERT INTO lecturers (name,title_id) VALUES ("Иван Георгиев", 4);
INSERT INTO lecturers (name,title_id) VALUES ("Георги Бояджиев", 1);
INSERT INTO lecturers (name,title_id) VALUES ("Пенчо Михнев", 5);
INSERT INTO lecturers (name,title_id) VALUES ("Мира Бивас", 3);
INSERT INTO lecturers (name,title_id) VALUES ("Мариана Димова", 3);
INSERT INTO lecturers (name,title_id) VALUES ("Боян Бончев",1);
INSERT INTO lecturers (name,title_id) VALUES ("Димо Димов",2);
INSERT INTO lecturers (name,title_id) VALUES ("Милен Чечев",3);

INSERT INTO subject (name,credits,group_id,type_id) VALUES ("Изчислимост в анализа", "4.5" ,4,1);
INSERT INTO subject (name,credits,group_id,type_id) VALUES ("Геометрия на движението", "5" ,5,1);
INSERT INTO subject (name,credits,group_id,type_id) VALUES ("Електронно обучение", "5" ,8,1);
INSERT INTO subject (name,credits,group_id,type_id) VALUES ("Негладък анализ", "5" ,3,1);
INSERT INTO subject (name,credits,type_id) VALUES ("Семантичен уеб", "5" ,2);
INSERT INTO subject (name,credits,type_id) VALUES ("Софтуерни шаблони за проектиране", "5" ,2);
INSERT INTO subject (name,credits,type_id) VALUES ("Разпознаване на образи", "7" ,2);
INSERT INTO subject (name,credits,type_id) VALUES ("Препоръчващи системи", "6" ,2);

INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (1,1);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (2,2);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (3,3);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (4,4);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (5,5);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (6,6);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (7,7);
INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (8,8);

INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (3,0,0,1);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (2,0,1,2);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (2,0,2,3);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (2,0,0,4);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (2,0,2,5);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (2,0,2,6);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (3,0,2,7);
INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (2,0,2,8);

INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,1,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,2,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,3,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,4,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,5,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,6,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,7,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (1,8,2);

INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (2,1,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (2,2,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (2,3,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (2,4,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (2,6,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (2,7,2);

INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,1,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,2,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,3,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,4,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,5,4);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,6,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (3,7,2);

INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,1,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,2,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,3,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,4,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,5,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,6,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,7,2);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (4,8,2);

INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (5,9,1);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (6,9,1);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (7,10,1);
INSERT INTO subject_has_majors (subject_id,major_id,min_course_id) VALUES (8,10,1);