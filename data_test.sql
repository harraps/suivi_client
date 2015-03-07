-- SCRIPT FOR TESTING THE WEBSITE WITH PLACEHOLDER VALUES --

use `Suivi_client`;

-- users have for password : 123
insert into `User`
(`user_entity`,`user_first_name`,`user_last_name`,`user_email`,`user_address`,`user_phone`,`user_password`)
values
("Entreprise A", "Jean", "Dupont", "jean.dubois@mail.fr", "3, place Jean Jaures 41000 Blois", "0254552108", "40bd001563085fc35165329ea1ff5c5ecbdbbeef"),
("Entreprise B", "Pierre", "Dubois", "pierre.bubois@mail.fr", "60 rue du Plat d’Etain, BP 12050, 37020 TOURS CEDEX 1", "0247368036", "40bd001563085fc35165329ea1ff5c5ecbdbbeef");


insert into `Project`
(`project_name`)
values
("Projet A"),
("Projet B");


insert into `UserProject`
(`user_id`,`project_id`)
select `user_id`, `project_id`
from `User` natural join `Project`
where `user_entity` = "Entreprise A" and `project_name` = "Projet A";

insert into `UserProject`
(`user_id`,`project_id`)
select `user_id`, `project_id`
from `User` natural join `Project`
where `user_entity` = "Entreprise B" and `project_name` = "Projet B";


insert into `Demand`
(`demand_title`,`demand_content`,`user_id`,`project_id`,`demand_date_creation`,`demand_date_wished`)
select "Demand A", "Content of the demand A", `user_id`, `project_id`, "2015-01-01", "2016-01-01"
from `User` natural join `UserProject`
where `user_entity` = "Entreprise A";

insert into `Demand`
(`demand_title`,`demand_content`,`user_id`,`project_id`,`demand_date_creation`,`demand_date_wished`)
select "Demand B", "Content of the demand B", `user_id`, `project_id`, "2015-02-02", "2016-02-02"
from `User` natural join `UserProject`
where `user_entity` = "Entreprise B";


insert into `Comment`
(`user_id`,`demand_id`,`comment_content`,`comment_date`)
select `user_id`, `demand_id`, "Contenu du commentaire pour la demande A", "2015-01-01"
from `UserProject` natural join `Project` natural join `Demand`
where `project_name` = "Projet A";

insert into `Comment`
(`user_id`,`demand_id`,`comment_content`,`comment_date`)
select `user_id`, `demand_id`, "Contenu du commentaire pour la demande B", "2015-02-02"
from `UserProject` natural join `Project` natural join `Demand`
where `project_name` = "Projet B";


select * from `User`;
select * from `Project`;
select * from `UserProject`;
select * from `Demand`;
select * from `Comment`;

