# php-data-service

  RESTful web service in PHP, talks to mysql, returns JSON.
  
  A node.js example i wrote here : https://github.com/Jody-Geers/node-rest =-)

## Installation

  There is a class in the config directory to get a connection.

	const LINK = 'localhost:3306';
	const DB = 'test';
	const UN = 'root';
	const PW = 'root';

## API

	// GET all of a type - returns [{}]
	http://localhost:8080/User/get
	
	// GET type by params - returns [{}]
	http://localhost:8080/User/?user_name='jimmy'
  
	// GET type by PK id - returns {}
	http://localhost:8080/User/?user_id=1

## Note
  HTTP Headders for returns are listed in index.
  
  Can be used out the box, simply copy 'Data Type' files from controller, model and service to extend.
  
  At indervidual controller level you can overide data interaction functions to add custom logic, rules, validation etc. At index one could add a security layer.
  
  There is a .sql in config to match a db to example.
  
## License

  MIT
