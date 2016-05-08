<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Tax;
use AppBundle\Form\TaxType;

/**
 * Tax controller.
 *
 * @Route("/tax")
 */
class TaxController extends Controller
{
    /**
     * Lists all Tax entities.
     *
     * @Route("/", name="tax_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $taxes = $em->getRepository('AppBundle:Tax')->findAll();

        return $this->render('tax/index.html.twig', array(
            'taxes' => $taxes,
        ));
    }

    /**
     * Creates a new Tax entity.
     *
     * @Route("/new", name="tax_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tax = new Tax();
        $form = $this->createForm('AppBundle\Form\TaxType', $tax);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tax);
            $em->flush();

            return $this->redirectToRoute('tax_show', array('id' => $tax->getIdtax()));
        }

        return $this->render('tax/new.html.twig', array(
            'tax' => $tax,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tax entity.
     *
     * @Route("/{id}", name="tax_show")
     * @Method("GET")
     */
    public function showAction(Tax $tax)
    {
        $deleteForm = $this->createDeleteForm($tax);

        return $this->render('tax/show.html.twig', array(
            'tax' => $tax,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tax entity.
     *
     * @Route("/{id}/edit", name="tax_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tax $tax)
    {
        $deleteForm = $this->createDeleteForm($tax);
        $editForm = $this->createForm('AppBundle\Form\TaxType', $tax);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tax);
            $em->flush();

            return $this->redirectToRoute('tax_edit', array('id' => $tax->getIdtax()));
        }

        return $this->render('tax/edit.html.twig', array(
            'tax' => $tax,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tax entity.
     *
     * @Route("/{id}", name="tax_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tax $tax)
    {
        $form = $this->createDeleteForm($tax);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tax);
            $em->flush();
        }

        return $this->redirectToRoute('tax_index');
    }

    /**
     * Creates a form to delete a Tax entity.
     *
     * @param Tax $tax The Tax entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tax $tax)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tax_delete', array('id' => $tax->getIdtax())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
         /**
     * Deletes a contact entity.
     *
     * @Route("/{id}/e", name="tax_del")
     * @Method({"GET", "POST"})
     */
        public function delAction($id) {

        $tax = new Tax();
        $em = $this->getDoctrine()->getManager();
        $tax = $em->getRepository('AppBundle:Tax')->find($id);
     
        if ($em->remove($tax)){
            echo "1";
            
        }
        //commit
        $em->flush();
        //refresh
        $taxs = $em->getRepository('AppBundle:Tax')->findAll();


        return $this->render('tax/index.html.twig', array(
                    'taxes' => $taxs,
                    
        ));
    }
}
