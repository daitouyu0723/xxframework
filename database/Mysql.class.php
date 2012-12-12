<?php
class Mysql extends DB {
    /**
     * 数据库链接
     * @var resource
     */
    private static $link = NULL;
    
    public $sql = '';
    
    public function __construct() {
        if(empty(self::$link)) {
            
        }
    }
    
    private function connect() {
        
    }
    
    public function fields() {
        
    }
    
    public function where() {
        
    }
    
    public function order() {
        
    }
    
    public function group() {
        
    }
    
    public function update() {
        
    }
    
    public function excute() {
        
    }
    
    public function query() {
        
    }
    
    public function getFiled() {
        
    }
}