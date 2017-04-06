# php-rest

  RESTful web service, talks to mysql, returns JSON.

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
  
	// GET type by id - returns {}
	http://localhost:8080/User/?user_id=1

## Note
  Can be used out the box, simply copy 'Data Type' files from controller, model and service to extend.
  
  At indervidual controller level you can overide data interaction functions to add custom logic, rules, validation etc. At index one could add a security layer.
  
## License

  MIT
