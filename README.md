# GlutenOff
some description of project

## Table of Contents
- [GlutenOff](#glutenoff)
  - [Table of Contents](#table-of-contents)
  - [Requirements](#requirements)
  - [Recommended Modules](#recommended-modules)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Database Management](#database-management)
    - [Accessing the Database with pgAdmin](#accessing-the-database-with-pgadmin)
    - [Importing Database from File](#importing-database-from-file)
  - [FAQ](#faq)
    - [Q: Frequently Asked Question 1?](#q-frequently-asked-question-1)
    - [Q: Frequently Asked Question 2?](#q-frequently-asked-question-2)
  - [Maintainers](#maintainers)

## Requirements
Ensure your system meets the following requirements before setting up the project:
- Docker installed
- Web browser with HTML5 and JavaScript support
- PHP version 7.0 or higher
- PostgreSQL database

## Recommended Modules
no special modules are required

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/Erfik8/WDPAI_Erfik8
    cd your-repository
    ```

2. Build and run Docker containers:
    ```bash
    docker-compose build
    docker-compose up -d
    ```

3. Access the website in your browser at [http://localhost:8080](http://localhost:8080).

## Configuration
Adjust the configuration settings as needed:
1. Open the `.env` file, if you would like to change database credentials.
2. In `docker\` location are DockerFiles for every component required for running website.
3. Edit `docker\php\DockerFile` to use other PHP version or modules
4. Edit `docker\nginx\nginx.conf` to change server and connection settings. After every update restart server
5. To add modules to website, database credentials or connecton settings, edit `docker-compose.yml` 

## Database Management
### Accessing the Database with pgAdmin
1. Access to `pgAdmin` is provided with instalation. 
2. Connect to PDadmin by [http://localhost:5432](http://localhost:5432).
3. login with credentials (credentials avaliable in `docker-compose.yml`)
4. Navigate to the "Databases" section and select your database.
5. You can now view, query, and manage your database using pgAdmin.

### Importing Database from File
1. In pgAdmin, right-click on your target database.
2. Choose "Restore..." from the context menu.
3. Select the format of your backup file (e.g., plain SQL).
4. Browse and select your database backup file.
5. Click "Restore" to import the database.


## FAQ
### Q: Frequently Asked Question 1?
A: Answer to the question.

### Q: Frequently Asked Question 2?
A: Answer to the question.

## Maintainers
- [Erfik8](https://github.com/Erfik8)

Feel free to contribute by submitting bug reports, feature requests, or pull requests!