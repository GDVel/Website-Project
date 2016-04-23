//create status table

CREATE TABLE CS490_usersStatus (
id_status int not null auto_increment, 
status_value varchar(64),
primary key (id_status));

--------------------------------------------
//insert data into status table

INSERT INTO CS490_usersStatus (status_value) VALUES ('active');
INSERT INTO CS490_usersStatus (status_value) VALUES ('inactive');
INSERT INTO CS490_usersStatus (status_value) VALUES ('temporary_lockout');

--------------------------------------------
//create user type table

CREATE TABLE CS490_userType (
id_type int not null auto_increment, 
user_type varchar(64),
primary key (id_type));

--------------------------------------------
//insert data into user type table

INSERT INTO CS490_userType (user_type) VALUES ('teacher');
INSERT INTO CS490_userType (user_type) VALUES ('student');

--------------------------------------------
//create user login table

CREATE TABLE CS490_usersLogin (
id int not null auto_increment, 
username varchar(25), 
password varchar(64), 
id_status int,
id_type int,
primary key (id),
foreign key (id_status) references CS490_usersStatus(id_status),
foreign key (id_type) references CS490_userType(id_type)
);


--------------------------------------------
//insert data into login table
INSERT INTO CS490_usersLogin (username, password, id_status, id_type) VALUES ('rs334', PASSWORD('password'), 1, 1);
INSERT INTO CS490_usersLogin (username, password, id_status, id_type) VALUES ('ve23', PASSWORD('password'), 1, 2);

--------------------------------------------
//TEST CASES

	//correct credentials
SELECT COUNT(*) FROM CS490_usersLogin WHERE username = 'rs334' AND password = PASSWORD('password');

	//wrong username
SELECT COUNT(*) FROM CS490_usersLogin WHERE username = 'user2' AND password = PASSWORD('password');

//wrong password
SELECT COUNT(*) FROM CS490_usersLogin WHERE username = 'rs334' AND password = PASSWORD('passworD');

--------------------------------------------
//query to find user type based on user id
select user_type from CS490_userType where id_type = (select id_type from CS490_usersLogin where username='rs334');




-----------------------------------------------------------------------------------
//beta __ edited

//assumption: each question is 10 points

CREATE TABLE CS490_questions (
quest_id int not null auto_increment, 
MCTF_set varchar(25) not null, 
question varchar(5000) not null, 
opt1 varchar(120) default null,
opt2 varchar(120) default null,
opt3 varchar(120) default null,
opt4 varchar(120) default null,
ans char(1) not null,
points int not null,
primary key (quest_id)
);

CREATE TABLE CS490_testInfo (
test_id int not null auto_increment, 
test_name varchar(140) unique not null,
test_description varchar(50000),
primary key (test_id)
);

CREATE TABLE CS490_testQuestions (
test_q_id int not null auto_increment, 
test_id int not null, 
quest_id int not null,
primary key (test_q_id),
foreign key (test_id) references CS490_testInfo(test_id),
foreign key (quest_id) references CS490_questions(quest_id),
unique key unique_val2 (test_id,quest_id)
);

//note: you can only fk to unique fields in another table.
//for the release_status, a value of 1 will imply that the teacher is 'releasing' the scores

CREATE TABLE CS490_teacher (
teacher_id int not null,
student_id int not null,
test_id int not null,
exam_release_status char(1) not null default 0,
score_release_status char(1) not null default 0,
primary key (teacher_id,test_id,student_id),
foreign key (teacher_id) references CS490_usersLogin(id),
foreign key (student_id) references CS490_usersLogin(id),
foreign key (test_id) references CS490_testInfo(test_id)
);

CREATE TABLE CS490_studentgrades (
grade_id int not null auto_increment, 
student_id int not null,
test_q_id int not null,
chosen_ans char(1) not null,
grade_student int default null,
primary key (grade_id),
foreign key (student_id) references CS490_usersLogin(id),
foreign key (test_q_id) references CS490_testQuestions(test_q_id),
unique key unique_val3 (student_id, test_q_id,chosen_ans)
);


















