//create status table

CREATE TABLE CS490_usersStatus (
id_status int not null auto_increment, 
status_value varchar(64),
primary key (id_status));

--------------------------------------------
//insert data into status table

INSERT INTO CS490_usersStatus ('status_value') VALUES ('active');
INSERT INTO CS490_usersStatus ('status_value') VALUES ('inactive');
INSERT INTO CS490_usersStatus ('status_value') VALUES ('temporary_lockout');

--------------------------------------------
//create user type table

CREATE TABLE CS490_userType (
id_type int not null auto_increment, 
user_type varchar(64),
primary key (id_type));

--------------------------------------------
//insert data into user type table

INSERT INTO CS490_userType ('user_type') VALUES ('teacher');
INSERT INTO CS490_userType ('user_type') VALUES ('student');

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
INSERT INTO CS490_usersLogin ('username', 'password', 'id_status', 'id_type') VALUES ('rs334', PASSWORD('password'), 1, 1);

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
//beta

CREATE TABLE CS490_questions (
quest_id int not null auto_increment, 
MCTF_set varchar(25) not null, 
question varchar(5000) not null, 
opt1 varchar(120) default null,
opt2 varchar(120) default null,
opt3 varchar(120) default null,
opt4 varchar(120) default null,
ans varchar(120) not null,
student_correct int,
primary key (quest_id)
);

CREATE TABLE CS490_tests (
test_id int not null auto_increment, 
test_name varchar(140) not null,
quest_id int,
primary key (test_id),
foreign key (quest_id) references CS490_questions(quest_id)
);

CREATE TABLE CS490_student (
stud_id int not null auto_increment, 
suser varchar(140) not null,
grade int,
primary key (stud_id),
foreign key (suser) references CS490_usersLogin(username), //these two foreign keys give me an issue
foreign key (grade) references CS490_questions(student_correct) // ^^^^^^^^^^^^^^^^
);

CREATE TABLE CS490_teacher (
teacher_id int not null auto_increment, 
exam_name varchar(140) not null,
student varchar (140) not null,
primary key (teacher_id),
foreign key (exam_name) references CS490_tests(test_name), // foreign key issues
foreign key (student) references CS490_student(suser) // foreign key issue
);

CREATE TABLE CS490_studentgrades (
studgrade_id int not null auto_increment, 
students varchar(140) not null,
totalcorrect int,
primary key (studgrade_id),
foreign key (students) references CS490_st(test_name), //same issue
foreign key (student) references CS490_student(suser) //same issue
);


//the error i get is a foreign key errorno 150
//**
its says that if i dropped a table and recreated it my foreign key constrains must be 
exactly the same. but the thing is they are exactly the same. i dont know why i am getting this error. any ideas?
so i went ahead and created these tables minus the foreign key parts, i will add them in once the issue is resolved
**//

















