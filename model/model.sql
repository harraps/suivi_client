-- DATABASE GENERATION SCRIPT --
create database if not exists `Suivi_client`;
use `Suivi_client`;

set FOREIGN_KEY_CHECKS = 0;

-- Table for users
create table if not exists `User`(
    `user_id`         int auto_increment primary key comment "ID of the user",
    `user_isAdmin`    bool not null default 0 comment "is the user an admin or not ?",
    `user_first_name` varchar(20) not null comment "first name of the user",
    `user_last_name`  varchar(20) not null comment "last name of the user",
    `user_email` 	  varchar(50) not null comment "email of the user",
    `user_entity`     varchar(20) not null comment "the entity of the user",
    -- the user doesn't have to give his address or his phone number if he doesn't want to
    `user_address`    varchar(50) comment "address of the user",
    `user_phone`      char(10)    comment "phone number of the user",
    -- the password of the user has to be encrypted for security reasons
    `user_password`   varchar(40) not null comment "encrypted password of the user",
    -- two users cannot have the same email address
    unique key `u_User_user_email`(`user_email`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 comment="contains the users";

-- Table for the projects
create table if not exists `Project` (
    `project_id`   int auto_increment primary key comment "ID of the project",
    `project_name` varchar(20) not null comment "name of the project",
    unique key `u_Project_project_name`(`project_name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 comment="contains the projects";

-- Table for mapping users with projects
create table if not exists `UserProject` (
    `user_id`    int not null comment "ID of the user working on the project",
    `project_id` int not null comment "ID of the project the user is working on",
    unique key `u_UserProject`(`user_id`,`project_id`),
    foreign key `fk_UserProject_user_id`(`user_id`)       references `User`(`user_id`),
    foreign key `fk_UserProject_project_id`(`project_id`) references `Project`(`project_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 comment="map users with projects";

-- Table for the demands
create table if not exists `Demand` (
    `demand_id`      int auto_increment primary key comment "ID of the demand",
    `demand_title`   varchar(50) not null comment "title of the demand",
    -- the content of the demand may be empty
    `demand_content` varchar(500) comment "content of the demand",
    `user_id`        int not null comment "ID of the author of this demand",
    `project_id`     int not null comment "ID of the project this demand is related to",
    `demand_date_creation`              date not null comment "date of creation of the demand",                                             -- generated automatically
    `demand_date_wished`                date not null comment "date the customer whishes his demand would be fulfilled",                    -- setted by the customer
    `demand_date_test`                  date comment "date at which the developper would have done the tests",                              -- setted by the developper
    `demand_date_test_validation`       date comment "date at which the customer would have validated the tests",                           -- setted by the customer
    `demand_date_production`            date comment "date at which the developper would have released the demand in production",           -- setted by the developper
    `demand_date_production_validation` date comment "date at which the customer would have validated that the demand has been accomplish", -- setted by the customer
    foreign key `fk_Demand_user_id`(`user_id`)       references `User`(`user_id`),
    foreign key `fk_Demand_project_id`(`project_id`) references `Project`(`project_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 comment="contains the demands of the users";

-- Table for comments
create table if not exists `Comment`(
    `comment_id`      int auto_increment primary key comment "ID of the comment",
    `user_id`         int not null comment "ID of the user who made this comment",
    `demand_id`       int not null comment "ID of the demand the comment is related to",
    `comment_content` varchar(500) not null comment "content of the comment",
    `comment_date`    date not null comment "date of the comment's post",
    foreign key `fk_Comment_user_id`(`user_id`)     references `User`(`user_id`),
    foreign key `fk_Comment_demand_id`(`demand_id`) references `Demand`(`demand_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 comment="contains the comments of the users on the demands that have been made";

set FOREIGN_KEY_CHECKS = 1;

insert into `User`(`user_isAdmin`,`user_entity`,`user_first_name`,`user_last_name`,`user_email`,`user_password`) values (1, "Suivi Client", "root", "root", "root@root", "dc76e9f0c0006e8f919e0c515c66dbba3982f785");
