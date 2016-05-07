<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Facturefour;
use AppBundle\Form\FacturefourType;

/**
 * Facturefour controller.
 *
 * @Route("/facturefour")
 */
class FacturefourController extends Controller
{
    /**
     * Lists all Facturefour entities.
     *
     * @Route("/", name="facturefour_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $facturefours = $em->getRepository('AppBundle:Facturefour')->findAll();

        return $this->render('facturefour/index.html.twig', array(
            'facturefours' => $facturefours,
        ));
    }

    /**
     * Creates a new Facturefour entity.
     *
     * @Route("/new", name="facturefour_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $facturefour = new Facturefour();
        $form = $this->createForm('AppBundle\Form\FacturefourType', $facturefour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facturefour);
            $em->flush();

            return $this->redirectToRoute('facturefour_show', array('id' => $facturefour->getId()));
        }

        return $this->render('facturefour/new.html.twig', array(
            'facturefour' => $facturefour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Facturefour entity.
     *
     * @Route("/{id}", name="facturefour_show")
     * @Method("GET")
     */
    public function showAction(Facturefour $facturefour)
    {
        $deleteForm = $this->createDeleteForm($facturefour);

        return $this->render('facturefour/show.html.twig', array(
            'facturefour' => $facturefour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Facturefour entity.
     *
     * @Route("/{id}/edit", name="facturefour_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Facturefour $facturefour)
    {
        $deleteForm = $this->createDeleteForm($facturefour);
        $editForm = $this->createForm('AppBundle\Form\FacturefourType', $facturefour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facturefour);
            $em->flush();

            return $this->redirectToRoute('facturefour_edit', array('id' => $facturefour->getId()));
        }

        return $this->render('facturefour/edit.html.twig', array(
            'facturefour' => $facturefour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Facturefour entity.
     *
     * @Route("/{id}", name="facturefour_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Facturefour $facturefour)
    {
        $form = $this->createDeleteForm($facturefour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($facturefour);
            $em->flush();
        }

        return $this->redirectToRoute('facturefour_index');
    }

    /**
     * Creates a form to delete a Facturefour entity.
     *
     * @param Facturefour $facturefour The Facturefour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Facturefour $facturefour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('facturefour_delete', array('id' => $facturefour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
