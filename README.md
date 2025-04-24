 Welcome to online learning platform  web development:
 how top navigate in online learning platform:-
 "bio_view2.php" ITS THE  HOMEPAGE TO ONLINE LEARNING PLATFORM.
 
 This homepage will redirect you to to log_ins  "student login" where you are  register first, secondly"instructor" where you require special 
 access through "instructors.php" and be provided with {First Name	Last Name	Unique Code} to enable one manage the sessions.

 Admin_CourseManagement.php: for adding courses enrolled  and is managed by administrator
 ADDITIONAL SUMMURY;
 The database for the Online Learning Platform is designed to connect students, instructors, courses, and learning resources in a structured way. The database for the Online Learning
Platform is designed to keep everything connected and running smoothly. At the heart of it is
the students table, which stores each student’s name, email, and password, with the ADM
number serving as a unique identifier. This ADM number is used across multiple tables to track
student progress, course enrollments, and interactions. The student_grades table records student
marks, assigns a grade, and recommends learning materials based on performance. This table is
linked to the courses table using the unit Code, making sure every grade corresponds to a valid
course. To keep track of which courses students are taking, there’s the student_enrollments table, which links each student’s ADM number to the unit codes of the subjects they’ve signed up for. The courses table itself holds all the details about available subjects, including their unit codes
and names. These codes are also used in the learning_resources and assignments tables, ensuring that uploaded study materials and assignments match specific courses. Instructors can
upload assignments with deadlines, and students submit their responses through the solutions
table, which records their ADM number, names, uploaded work, and submission time to keep
track of submissions. Instructors have their own tables: instructors (which holds login details and a unique access
code) and instructors2 (which contains personal information like occupation, bio, profile
picture, and social media handles). To encourage interaction and engagement, the platform
also includes a messages table, where students can chat and exchange information
