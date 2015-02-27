insert into `User`(`user_entity`,`user_first_name`,`user_last_name`,`user_email`,`user_address`,`user_phone`,`user_password`) values ("entreprise A", "Jean", "Dupont", "jd@mail.fr", "1 rue cordelette", "0212345678", "aaa");

select `user_first_name` from `User` where `user_id` = 1;