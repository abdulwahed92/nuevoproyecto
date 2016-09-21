<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Album;
use AppBundle\Form\AlbumType;

/**
 * Album controller.
 *
 * @Route("/album")
 */
class AlbumController extends Controller
{

    /**
     * Creates a new Album entity.
     *
     * @Route("/new", name="album_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $album = new Album();
        $form = $this->createForm('AppBundle\Form\AlbumType', $album);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($album);
            $em->flush();

            return $this->redirectToRoute('album_show', array('id' => $album->getId()));
        }

        return $this->render('album/new.html.twig', array(
            'album' => $album,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Album entity.
     *
     * @Route("/{id}", name="album_show")
     * @Method("GET")
     */
    public function showAction(Album $album)
    {
        return $this->render('album/show.html.twig', array(
            'album' => $album,
        ));
    }
}
