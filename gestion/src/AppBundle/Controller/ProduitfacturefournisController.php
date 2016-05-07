<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Produitfacturefournis;
use AppBundle\Form\ProduitfacturefournisType;

/**
 * Produitfacturefournis controller.
 *
 * @Route("/produitfacturefournis")
 */
class ProduitfacturefournisController extends Controller
{
    /**
     * Lists all Produitfacturefournis entities.
     *
     * @Route("/", name="produitfacturefournis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produitfacturefournis = $em->getRepository('AppBundle:Produitfacturefournis')->findAll();

        return $this->render('produitfacturefournis/index.html.twig', array(
            'produitfacturefournis' => $produitfacturefournis,
        ));
    }

    /**
     * Creates a new Produitfacturefournis entity.
     *
     * @Route("/new", name="produitfacturefournis_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $produitfacturefourni = new Produitfacturefournis();
        $form = $this->createForm('AppBundle\Form\ProduitfacturefournisType', $produitfacturefourni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produitfacturefourni);
            $em->flush();

            return $this->redirectToRoute('produitfacturefournis_show', array('id' => $produitfacturefourni->getId()));
        }

        return $this->render('produitfacturefournis/new.html.twig', array(
            'produitfacturefourni' => $produitfacturefourni,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Produitfacturefournis entity.
     *
     * @Route("/{id}", name="produitfacturefournis_show")
     * @Method("GET")
     */
    public function showAction(Produitfacturefournis $produitfacturefourni)
    {
        $deleteForm = $this->createDeleteForm($produitfacturefourni);

        return $this->render('produitfacturefournis/show.html.twig', array(
            'produitfacturefourni' => $produitfacturefourni,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Produitfacturefournis entity.
     *
     * @Route("/{id}/edit", name="produitfacturefournis_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Produitfacturefournis $produitfacturefourni)
    {
        $deleteForm = $this->createDeleteForm($produitfacturefourni);
        $editForm = $this->createForm('AppBundle\Form\ProduitfacturefournisType', $produitfacturefourni);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produitfacturefourni);
            $em->flush();

            return $this->redirectToRoute('produitfacturefournis_edit', array('id' => $produitfacturefourni->getId()));
        }

        return $this->render('produitfacturefournis/edit.html.twig', array(
            'produitfacturefourni' => $produitfacturefourni,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produitfacturefournis entity.
     *
     * @Route("/{id}", name="produitfacturefournis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Produitfacturefournis $produitfacturefourni)
    {
        $form = $this->createDeleteForm($produitfacturefourni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produitfacturefourni);
            $em->flush();
        }

        return $this->redirectToRoute('produitfacturefournis_index');
    }

    /**
     * Creates a form to delete a Produitfacturefournis entity.
     *
     * @param Produitfacturefournis $produitfacturefourni The Produitfacturefournis entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produitfacturefournis $produitfacturefourni)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produitfacturefournis_delete', array('id' => $produitfacturefourni->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
