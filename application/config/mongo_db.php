<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------------
| This file will contain the settings needed to access your Mongo database.
|
|
| ------------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| ------------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['write_concerns'] Default is 1: acknowledge write operations.  ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['journal'] Default is TRUE : journal flushed to disk. ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['read_preference'] Set the read preference for this connection. ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|	['read_preference_tags'] Set the read preference for this connection.  ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|
| The $config['mongo_db']['active'] variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
*/

$config['mongo_db']['active'] = (ENVIRONMENT !== 'production')?'local':'server';

$config['mongo_db']['server']['no_auth'] = FALSE;
$config['mongo_db']['server']['hostname'] = 'ds143539.mlab.com';
$config['mongo_db']['server']['port'] = '43539';
$config['mongo_db']['server']['username'] = 'root';
$config['mongo_db']['server']['password'] = 'mkr5htgi';
$config['mongo_db']['server']['database'] = 'tracking';
$config['mongo_db']['server']['db_debug'] = TRUE;
$config['mongo_db']['server']['return_as'] = 'array';
$config['mongo_db']['server']['write_concerns'] = (int)1;
$config['mongo_db']['server']['journal'] = FALSE;
$config['mongo_db']['server']['read_preference'] = NULL;
$config['mongo_db']['server']['read_preference_tags'] = NULL;

$config['mongo_db']['local']['no_auth'] = TRUE;
$config['mongo_db']['local']['hostname'] = 'localhost';
$config['mongo_db']['local']['port'] = '27017';
$config['mongo_db']['local']['username'] = 'root';
$config['mongo_db']['local']['password'] = 'mkr5htgi';
$config['mongo_db']['local']['database'] = 'tracking';
$config['mongo_db']['local']['db_debug'] = TRUE;
$config['mongo_db']['local']['return_as'] = 'array';
$config['mongo_db']['local']['write_concerns'] = (int)1;
$config['mongo_db']['local']['journal'] = FALSE;
$config['mongo_db']['local']['read_preference'] = NULL;
$config['mongo_db']['local']['read_preference_tags'] = NULL;

/* End of file database.php */
/* Location: ./application/config/database.php */
