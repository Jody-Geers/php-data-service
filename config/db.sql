USE DATABASE test;

/*
* START USER
*/
DROP TABLE IF EXISTS `user`;

CREATE TABLE user (
	user_id INT NOT NULL AUTO_INCREMENT, 
	PRIMARY KEY( user_id ),
	user_name CHAR(15),
	user_surname CHAR(15)
);

INSERT INTO user ( user_name, user_surname ) VALUES ( 'Jody', 'Geers' );
INSERT INTO user ( user_name, user_surname ) VALUES ( 'Lionel', 'Cosgrove' );
INSERT INTO user ( user_name, user_surname ) VALUES ( 'Sumatran', 'RatMonkey' );
INSERT INTO user ( user_name, user_surname ) VALUES ( 'Uncle', 'Les' );

SELECT * FROM user;
/*
* END USER
*/



/*
* START OUTPUT
*/
SHOW TABLES;
/*
* END OUTPUT
*/
