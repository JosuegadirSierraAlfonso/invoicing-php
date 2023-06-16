<?php
    trait getInstance{
        public static $instance;
        public static function getInstance() {
            $arg = func_get_args();
            $arg = array_pop($arg);
            return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
        }
        function __set($name, $value){
            $this->$name = $value;
        }
        function __get($name){
            return $this->$name;
        }
    }
    function autoload($class) {
        // Directorios donde buscar archivos de clases
        $directories = [
            dirname(__DIR__).'/scripts/bill/',
            dirname(__DIR__).'/scripts/client/',
            dirname(__DIR__).'/scripts/product/',
            dirname(__DIR__).'/scripts/seller/',
            dirname(__DIR__).'/scripts/db/'
        ];
        // Convertir el nombre de la clase en un nombre de archivo relativo
        $classFile = str_replace('\\', '/', $class) . '.php';
    
        // Recorrer los directorios y buscar el archivo de la clase
        foreach ($directories as $directory) {
            $file = $directory.$classFile;
            // Verificar si el archivo existe y cargarlo
            if (file_exists($file)) {
                require $file;
                break;
            }
        }
    }
    spl_autoload_register('autoload');

    client::getInstance(json_decode(file_get_contents("php://input"), true));








/* class apiSuperPerrona{
    use getInstance;
    public function __construct(private $_METHOD, public $_HEADER, private $_DATA){
        switch ($_METHOD) {
            case 'POST':
                info::getInstance($_DATA['info']);
                break;
        }
    }

}
$data = [
    "_METHOD"=>$_SERVER['REQUEST_METHOD'], 
    "_HEADER"=> apache_request_headers(), 
    "_DATA" => json_decode(file_get_contents("php://input"), true)
];
apiSuperPerrona::getInstance($data); */









/*  AUROLOAD: |En PHP, el autoloading (carga automática) es una técnica que permite cargar automáticamente las
clases cuando son necesarias, sin tener que incluir manualmente los archivos de clase en cada punto
del código. 

trait getInstance{
    public static $instance;
    public static function getInstance() {
        $arg = func_get_args();
        $arg = array_pop($arg);
        return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
    }
}
function autoload($class) {
    // Directorios donde buscar archivos de clases
    $directories = [
        dirname(__DIR__).'/scripts/db/',
        dirname(__DIR__).'/scripts/user/',
    ];
    // Convertir el nombre de la clase en un nombre de archivo relativo
    $classFile = str_replace('\\', '/', $class) . '.php';

    // Recorrer los directorios y buscar el archivo de la clase
    foreach ($directories as $directory) {
        $file = $directory.$classFile;
        var_dump($file);
        // Verificar si el archivo existe y cargarlo
        if (file_exists($file)) {
            require $file;
            break;
        }
    }
}
spl_autoload_register('autoload'); */

?>