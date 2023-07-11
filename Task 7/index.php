<?php
//1)SELECT `first_name`,departments.department_name,locations.street_address,countries.country_name,regions.region_name FROM `employees`,`departments`,`locations`,`countries`,`regions` WHERE departments.department_id = employees.department_id AND departments.location_id = locations.location_id AND countries.country_id = locations.country_id AND regions.region_id = countries.region_id;
// 2)SELECT * FROM `employees` left JOIN departments on departments.department_id = employees.department_id
// UNION
// SELECT * FROM `employees` RIGHT JOIN departments on departments.department_id = employees.department_id;
//3)SELECT `first_name`,employee_id,manager_id FROM `employees` WHERE `employee_id` = 100;
//4)INSERT INTO `employees`(`employee_id`, `first_name`, `last_name`, `email`, `phone_number`, `hire_date`, `job_id`) VALUES (310,'Ziad','Hesham','Ziad@gmail.com','022215464',CURRENT_DATE(),'AD_VP');
//5)UPDATE `employees` SET `salary` = salary + 1000 WHERE `employee_id`=101;