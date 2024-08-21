
# School Management System API

This is a Laravel-based API for a school management system, which allows managing schools, classrooms, students, teachers, and subjects.

## Database Schema

The database schema consists of the following tables:

1. **schools**
    - `id` (primary key)
    - `name` (unique)
    - `address`
    - `created_at`
    - `updated_at`

2. **class_rooms**
    - `id` (primary key)
    - `name` (unique)
    - `school_id` (foreign key referencing `schools.id`)
    - `teacher_id` (foreign key referencing `teachers.id`)
    - `created_at`
    - `updated_at`

3. **students**
    - `id` (primary key)
    - `name`
    - `email` (unique)
    - `class_room_id` (foreign key referencing `class_rooms.id`)
    - `created_at`
    - `updated_at`

4. **teachers**
    - `id` (primary key)
    - `name`
    - `email` (unique)
    - `created_at`
    - `updated_at`

5. **subjects**
    - `id` (primary key)
    - `name` (unique)
    - `created_at`
    - `updated_at`

6. **student_subject**
    - `id` (primary key)
    - `student_id` (foreign key referencing `students.id`)
    - `subject_id` (foreign key referencing `subjects.id`)
    - `created_at`
    - `updated_at`

7. **subject_teacher**
    - `id` (primary key)
    - `subject_id` (foreign key referencing `subjects.id`)
    - `teacher_id` (foreign key referencing `teachers.id`)
    - `created_at`
    - `updated_at`

## API Endpoints

The API provides the following endpoints:

1. **Schools**
    - `GET /api/schools`: List all schools
    - `POST /api/schools`: Create a new school
    - `GET /api/schools/{id}`: Retrieve a specific school
    - `PUT /api/schools/{id}`: Update a school
    - `DELETE /api/schools/{id}`: Delete a school

2. **ClassRooms**
    - `GET /api/classrooms`: List all classrooms
    - `POST /api/classrooms`: Create a new classroom
    - `GET /api/classrooms/{id}`: Retrieve a specific classroom
    - `PUT /api/classrooms/{id}`: Update a classroom
    - `DELETE /api/classrooms/{id}`: Delete a classroom

3. **Students**
    - `GET /api/students`: List all students
    - `POST /api/students`: Create a new student
    - `GET /api/students/{id}`: Retrieve a specific student
    - `PUT /api/students/{id}`: Update a student
    - `DELETE /api/students/{id}`: Delete a student

4. **Teachers**
    - `GET /api/teachers`: List all teachers
    - `POST /api/teachers`: Create a new teacher
    - `GET /api/teachers/{id}`: Retrieve a specific teacher
    - `PUT /api/teachers/{id}`: Update a teacher
    - `DELETE /api/teachers/{id}`: Delete a teacher

5. **Subjects**
    - `GET /api/subjects`: List all subjects
    - `POST /api/subjects`: Create a new subject
    - `GET /api/subjects/{id}`: Retrieve a specific subject
    - `PUT /api/subjects/{id}`: Update a subject
    - `DELETE /api/subjects/{id}`: Delete a subject

## Domain Logic

1. **School**
    - A school can have multiple classrooms.
    - A school cannot have two classrooms with the same name.

2. **ClassRoom**
    - A classroom belongs to a single school.
    - A classroom can have multiple students.
    - A classroom can have a single teacher assigned to it.
    - A classroom cannot have two classrooms with the same name within the same school.

3. **Student**
    - A student can only be enrolled in a single classroom.
    - A student can be associated with multiple subjects.
    - A student cannot have two email addresses.

4. **Teacher**
    - A teacher can only be assigned to a single classroom.
    - A teacher can be associated with multiple subjects.
    - A teacher cannot have two email addresses.

5. **Subject**
    - A subject can be associated with multiple students.
    - A subject can be associated with multiple teachers.
    - A subject cannot have two subjects with the same name.

This API allows you to manage the various entities in a school management system, including the relationships between them. You can use this API to create, read, update, and delete schools, classrooms, students, teachers, and subjects.

