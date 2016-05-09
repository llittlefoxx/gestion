<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Comptebancaire;
use AppBundle\Form\ComptebancaireType;

/**
 * Comptebancaire controller.
 *
 * @Route("/comptebancaire")
 */
class ComptebancaireController extends Controller
{
    /**
     * Lists all Comptebancaire entities.
     *
     * @Route("/", name="comptebancaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comptebancaires = $em->getRepository('AppBundle:Comptebancaire')->findAll();

        return $this->render('comptebancaire/index.html.twig', array(
            'comptebancaires' => $comptebancaires,
        ));
    }

    /**
     * Creates a new Comptebancaire entity.
     *
     * @Route("/new", name="comptebancaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comptebancaire = new Comptebancaire();
        $form = $this->createForm('AppBundle\Form\ComptebancaireType', $comptebancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comptebancaire);
            $em->flush();
//test
            return $this->redirectToRoute('comptebancaire_show', array('id' => $comptebancaire->getIdcompte()));
        }

        return $this->render('comptebancaire/new.html.twig', array(
            'comptebancaire' => $comptebancaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comptebancaire entity.
     *
     * @Route("/{id}", name="comptebancaire_show")
     * @Method("GET")
     */
    public function showAction(Comptebancaire $comptebancaire)
    {
        $deleteForm = $this->createDeleteForm($comptebancaire);

        return $this->render('comptebancaire/show.html.twig', array(
            'comptebancaire' => $comptebancaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comptebancaire entity.
     *
     * @Route("/{id}/edit", name="comptebancaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comptebancaire $comptebancaire)
    {
        $deleteForm = $this->createDeleteForm($comptebancaire);
        $editForm = $this->createForm('AppBundle\Form\ComptebancaireType', $comptebancaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comptebancaire);
            $em->flush();

            return $this->redirectToRoute('comptebancaire_edit', array('id' => $comptebancaire->getIdcompte()));
        }

        return $this->render('comptebancaire/edit.html.twig', array(
            'comptebancaire' => $comptebancaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comptebancaire entity.
     *
     * @Route("/{id}", name="comptebancaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comptebancaire $comptebancaire)
    {
        $form = $this->createDeleteForm($comptebancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comptebancaire);
            $em->flush();
        }

        return $this->redirectToRoute('comptebancaire_index');
    }

    /**
     * Creates a form to delete a Comptebancaire entity.
     *
     * @param Comptebancaire $comptebancaire The Comptebancaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comptebancaire $comptebancaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comptebancaire_delete', array('id' => $comptebancaire->getIdcompte())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
         /**
     * Deletes a contact entity.
     *
     * @Route("/{id}/e", name="comptebancaire_del")
     * @Method({"GET", "POST"})
     */
        public function delAction($id) {

        $nature = new Comptebancaire();
        $em = $this->getDoctrine()->getManager();
        $nature = $em->getRepository('AppBundle:Comptebancaire')->find($id);
     
        if ($em->remove($nature)){
            echo "1";
            
        }
        //commit
        $em->flush();
        //refresh
        $natures = $em->getRepository('AppBundle:Comptebancaire')->findAll();


        return $this->render('comptebancaire/index.html.twig', array(
                    'comptebancaires' => $natures,
                    
        ));
    }
}
