//default config, don't edit this file, please set you application config in APP_PATH/config/config.php
<?php
class Config {
    
    public static $GLOBAL = array(
        'name' => 'mcp',
        'debug' => true,
        'cache' => false,        
    );
    
    public static $DB = array(
        'database' => 'mysql',
        'dbhost' => 'localhost',
        'dbuser' => 'root',
        'dbpassword' => '',
        'dbname' => 'test',
    );
}

