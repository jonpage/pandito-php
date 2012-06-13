# Pando: Economics Experiment System #

The goal of **Pando** is to provide a framework for the deployment of online synchronous economics experiments. The current version is very rough and was rushed to completion by unrealistic externally imposed deadlines. As a result, the documentation is poor and much refactoring needs to be done.

## Setting up Pando ##

- Download [CodeIgniter](http://codeigniter.com/)
- Import [pando\_schema.sql](https://github.com/jonpage/pando/blob/master/pando_schema.sql) and [pando\_treatment\_country.sql](https://github.com/jonpage/pando/blob/master/pando_treatment_country.sql) into the MySQL database which appears in  
*application/config/config.php*.
- Modify *routes.php* so that:  
`$rout ['default_controller'] = "login";`
