# PHP-MYSQL CRUD Operations!

- git clone the repository

  Create Database:

- create database name "collegedb"
- create table using given below sql statement

```sh
CREATE TABLE `students` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`first_name` varchar(30) NOT NULL,
`last_name` varchar(30) DEFAULT NULL,
`gender` varchar(10) DEFAULT NULL,
`email` varchar(50) DEFAULT NULL,
`course` varchar(20) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1
```

### Run the Project

Run the localhost (Apache service)
point to the:

```sh
http://localhost/crud

```
