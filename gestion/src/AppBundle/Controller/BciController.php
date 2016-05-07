<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Bci;
use AppBundle\Form\BciType;

/**
 * Bci controller.
 *
 * @Route("/bci")
 */
class BciController extends Controller
{
    /**
     * Lists all Bci entities.
     *
     * @Route("/", name="bci_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bcis = $em->getRepository('AppBundle:Bci')->findAll();

        return $this->render('bci/index.html.twig', array(
            'bcis' => $bcis,
        ));
    }

    /**
     * Creates a new Bci entity.
     *
     * @Route("/new", name="bci_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bci = new Bci();
        $form = $this->createForm('AppBundle\Form\BciType', $bci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bci);
            $em->flush();

            return $this->redirectToRoute('bci_show', array('id' => $bci->getIdbci()));
        }

        return $this->render('bci/new.html.twig', array(
            'bci' => $bci,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bci entity.
     *
     * @Route("/{id}", name="bci_show")
     * @Method("GET")
     */
    public function showAction(Bci $bci)
    {
        $deleteForm = $this->createDeleteForm($bci);

        return $this->render('bci/show.html.twig', array(
            'bci' => $bci,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bci entity.
     *
     * @Route("/{id}/edit", name="bci_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bci $bci)
    {
        $deleteForm = $this->createDeleteForm($bci);
        $editForm = $this->createForm('AppBundle\Form\BciType', $bci);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bci);
            $em->flush();

            return $this->redirectToRoute('bci_edit', array('id' => $bci->getIdbci()));
        }

        return $this->render('bci/edit.html.twig', array(
            'bci' => $bci,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Bci entity.
     *
     * @Route("/{id}", name="bci_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bci $bci)
    {
        $form = $this->createDeleteForm($bci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bci);
            $em->flush();
        }

        return $this->redirectToRoute('bci_index');
    }

    /**
     * Creates a form to delete a Bci entity.
     *
     * @param Bci $bci The Bci entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bci $bci)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bci_delete', array('id' => $bci->getIdbci())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
