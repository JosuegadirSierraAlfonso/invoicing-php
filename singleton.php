<?php
trait getInstance{
    static $instace;
    //function __construct(private $name, public $age){} //TODO: Declaro directamente la construccion
    static function getInstance(){
        $arg = func_get_arg();
        $arg = array_pop($arg);
        if (self::$instance == null){
            self::$instace = new self(...(array) func_get_arg());
        }
        return self::$instace;
    }
}
//declare(strict_types=1); //TODO: es para que las funciones o metodos no puedan realizar conversiones
class humano{
    
    public function getName(){
        return $this->name;
    }
    static function ropa(){
        return "Camisa negra";
    }
}
var_dump(humano::ropa());
//*$obj = new humano("Gadir", 22);
//*var_dump($obj->getName());







/* trait getInstance{
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