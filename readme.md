# PHP SQL Reporting example

This is an example of using php to quickly deploy SQL Server reports. 

## Requirements

This relies on the [Microsoft SQL Server Driver for PHP](https://www.php.net/manual/en/book.sqlsrv.php) and uses the [W3 CSS framework](https://www.w3schools.com/w3css/) and [jQuery Datatables](https://datatables.net/) to display data in a useful way.

## Security

This example has been designed to be run on an internal network using folder-based security. The SQL credentials are stored in the file `sql-login.php` and should include server, database, and user information with read-only permissions for the database. 

## Usage

The `example.php` file shows how this works. 

1. Set the `$title` variable (page title and name)
2. Set the html form to take the input you need
3. Set the php `$_GET` to pull the input into variables
4. Pass variables into a parameterized query within the `$params` array
5. Accept parameters into sql variables
6. Use variables within the `where` clause to display the information you need


The php is meant to use the sql variable names as column names and display the result set as a datatable. 
