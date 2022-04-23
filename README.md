
### Alola – Exercice VueJs php : autocomplete 


![crud](https://www.olive-craft.com/alola/Capture.PNG "VUEJS PHP")


## How to start

``` bash
#git clone https://github.com/issam1987/alola.git

#cd alola

# create database "alola"

# create table adresse
CREATE TABLE IF NOT EXISTS `adresse` (
  `label` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Edit the  php/database.php and add DB params
 class database
    {
        private $host = "127.0.0.1";
        private $database_name = "alola";
        private $username = "root";
        private $password = "";

# Check on browser
http://localhost/alola

