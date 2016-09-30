<?php
namespace AppBundle\Services;

class FileUtils {
    protected $logger;
    
    public function __construct($logger) {
        $this->logger = $logger;
    }
    
    /**
     * Esta funcion descomprime...
     **/
    public function uncompress($file) {
        
        // TODO: Hacer código para descomprimir y devolver un array de ficheros descomprimidos
        $this->logger->info("Hemos descomprimido un fichero.");
        
        return array("fichero1", "fichero2");
    }
}



?>