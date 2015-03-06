use `Suivi_client`;

/*
insert into `User`(`user_entity`,`user_first_name`,`user_last_name`,`user_email`,`user_address`,`user_phone`,`user_password`) values ("entreprise A", "Jean", "Dupont", "jd@mail.fr", "1 rue cordelette", "0212345678", "aaa");
insert into `Project`(`project_name`) values ("nom du projet");
insert into `Demand` (`demand_title`,`demand_content`,`user_id`,`project_id`,`demand_date_creation`,`demand_date_wished`) values ("add a demand","content of the demand","1","1","2015-01-10","2015-10-20");
insert into `Comment`(`user_id`,`demand_id`,`comment_content`,`comment_date`) values ("1", "1", "hello", "2015-01-10");
*/

select * from `User`;
select * from `UserProject`;
select * from `Project`;
select * from `Demand`;
select * from `Comment`;
