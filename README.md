# Project: Show information of most starred PHP Projects on Github

## Introduction:
The project using Github API to get the json file which contains the most starred PHP projects information created on Github. https://api.github.com/search/repositories?q=PHP+language:PHP&sort=stars&order=desc
Use PHP cURL to get Json file and save to array.
Create MySQL connection to save array into database, this step could do repeatedly to update a new table of projects.

## Getting Started:
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

## Tools required:
Install Xampp web server,
Use an IDE to edit the code.
Enable cURL support in php.init,
Create database name "GITHUB_PHP" and user information with accessible previleges,

## Running the tests
Use Visual Studio Code to load the project folder.
Open the API to see the json file data https://api.github.com/search/repositories?q=PHP+language:PHP&sort=stars&order=desc.
Open the path to file api_data_extract.php in localhost to extract json file into array.
Open the path to file save_to_database.php in localhost to save array into MySQL database. You can check database in localhost to see the tables.
Open the path to file star_php_project.php in localhost to view the table of projects on browser.

## Versioning
v 1.0

## Authors
Xuan Cong Tran

## License
