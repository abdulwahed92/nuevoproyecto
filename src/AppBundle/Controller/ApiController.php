<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiController extends FOSRestController
{
    /**
     * @Get("/prueba")
     **/
    public function pruebaAction()
    {
        $datos = array("dato1", "dato2");
        
        $view = $this->view($datos, 200);
        return $this->handleView($view);
    }
    
    /**
     * 
     * @ApiDoc(
     *  resource=true,
     *  description="Lista los álbumes"
     * )
     * 
     * @Get("/list")
     **/
    public function listAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repositorioAlbum = $entityManager->getRepository("AppBundle:Album");
        $albums = $repositorioAlbum->findAll();
        
        $view = $this->view($albums, 200);
        return $this->handleView($view);
    }
}