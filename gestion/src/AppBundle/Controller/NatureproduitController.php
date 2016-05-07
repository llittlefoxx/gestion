<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Natureproduit;
use AppBundle\Form\NatureproduitType;

/**
 * Natureproduit controller.
 *
 * @Route("/natureproduit")
 */
class NatureproduitController extends Controller
{
    /**
     * Lists all Natureproduit entities.
     *
     * @Route("/", name="natureproduit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $natureproduits = $em->getRepository('AppBundle:Natureproduit')->findAll();

        return $this->render('natureproduit/index.html.twig', array(
            'natureproduits' => $natureproduits,
        ));
    }

    /**
     * Creates a new Natureproduit entity.
     *
     * @Route("/new", name="natureproduit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $natureproduit = new Natureproduit();
        $form = $this->createForm('AppBundle\Form\NatureproduitType', $natureproduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($natureproduit);
            $em->flush();

            return $this->redirectToRoute('natureproduit_show', array('id' => $natureproduit->getId()));
        }

        return $this->render('natureproduit/new.html.twig', array(
            'natureproduit' => $natureproduit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Natureproduit entity.
     *
     * @Route("/{id}", name="natureproduit_show")
     * @Method("GET")
     */
    public function showAction(Natureproduit $natureproduit)
    {
        $deleteForm = $this->createDeleteForm($natureproduit);

        return $this->render('natureproduit/show.html.twig', array(
            'natureproduit' => $natureproduit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Natureproduit entity.
     *
     * @Route("/{id}/edit", name="natureproduit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Natureproduit $natureproduit)
    {
        $deleteForm = $this->createDeleteForm($natureproduit);
        $editForm = $this->createForm('AppBundle\Form\NatureproduitType', $natureproduit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($natureproduit);
            $em->flush();

            return $this->redirectToRoute('natureproduit_edit', array('id' => $natureproduit->getId()));
        }

        return $this->render('natureproduit/edit.html.twig', array(
            'natureproduit' => $natureproduit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Natureproduit entity.
     *
     * @Route("/{id}", name="natureproduit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Natureproduit $natureproduit)
    {
        $form = $this->createDeleteForm($natureproduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($natureproduit);
            $em->flush();
        }

        return $this->redirectToRoute('natureproduit_index');
    }

    /**
     * Creates a form to delete a Natureproduit entity.
     *
     * @param Natureproduit $natureproduit The Natureproduit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Natureproduit $natureproduit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('natureproduit_delete', array('id' => $natureproduit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
