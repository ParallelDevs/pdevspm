Project Management
=======
[![Build Status](https://travis-ci.org/ParallelDevs/pdevspm.svg)](https://travis-ci.org/ParallelDevs/pdevspm) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/ac94b623-50e7-4932-8c78-c53446da8602/mini.png)](https://insight.sensiolabs.com/projects/ac94b623-50e7-4932-8c78-c53446da8602)

## Description
**THIS IS A WORK IN PROGRESS**

## Installation

### Database
First you need a database (duh! obviously) but seriously you need to have your database already created because when you
install the php dependencies it will ask you the database credentials as part of the installation process. Don worry 
about the schema, you can create that part later.

### PHP
First Install your php dependencies by running ```composer install```. After it finnish the installation process it'll
ask you for your database credentials. If you dont enter the correct credentials the installation process will fail. 
After that it'll ask you for mailer options. Just hit enter until stops asking you things. If any of this fails, don't 
worry, you can edit ```app/config/parameters.yml``` later and run ```composer install``` again.
 
### Schema
This step is very easy, just run the following commands:

```bash
./bin/console doctrine:schema:create --env=test
./bin/console doctrine:fixtures:load -n --env=test
```

This first one will create the schema and the second one will create all the need it data to checkout the project or 
just start development. This will also create a user for testing proposes. **Dont use it in production!**

```bash
username: admin
password: admin
```

### Assets
At this point the app is running but it doesn't look good. Don't panic! You just need to compile the assets. For that 
you need to have [node/npm](https://nodejs.org), [gulp](http://gulpjs.com/) and (bower)[http://bower.io/] installed 
globally in your machine. If that's the case just run the following commands:
```bash
npm install
bower install
gulp
```