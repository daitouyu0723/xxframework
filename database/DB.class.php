<?php
/**
 * 负责获取数据库配置信息和数据库驱动的实例化
 * @author wangwei <daitouyu0723@sina.com>
 * @version 1.0 2012-12-12
 * @copyright 2012 (c) wangwei
 */
class DB {
    /**
     * 数据库配置
     * @var array
     */
    protected static $config = array();

    public static function getInstance() {
        self::$config = Config::$DB;
        if(isset(self::$config['dbtype'])) {
            $dbdriver = ucfirst(self::$config['dbtype']);
            $dbdriver_file = FW_PATH.'/database/'.$dbdriver.'.class.php';
            if(file_exists($dbdriver_file)) {
                require_once $dbdriver_file;
                return new $dbdriver;
            } else {
                throw new Exception(self::$config['dbtype'].' driver not found', 1001);
            }
        } else {
            throw new Exception('database config was not be find in config file', 1005);
        }
    }
}
