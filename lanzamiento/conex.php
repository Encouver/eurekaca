<?php 

class Conexion
{
	private static $usuario="eureka";
	private static $clave="eureka";
	private static $db_host="localhost";
	private static $bd_nombre="eureka";
	private static $port = 5432;
	private $count=0;
	private static $link;
	
	private function __construct()
    {
    }
	
	public static function singleton()
    {
        if (!isset(self::$link)) {
            //echo 'Creating new instance.';
            $className = __CLASS__;
            $string = 'host='.self::$db_host.' port='.self::$port.' dbname='.self::$bd_nombre.' user='.self::$usuario.' password='.self::$clave;
            //echo $string;
            self::$link = pg_connect($string) or die ("Error conectando a la base de datos.");
			//pg_client_encoding('utf8', self::$link);
			pg_set_client_encoding(self::$link, 'utf8');
        }
        return self::$link;
    }
	
	 public function increment()
    {
        return $this->count++;
    }
	
	public function conector()
	{
		return self::$link;	
	}
		

}
?>