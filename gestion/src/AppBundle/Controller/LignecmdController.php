<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Lignecmd;
use AppBundle\Form\LignecmdType;

/**
 * Lignecmd controller.
 *
 * @Route("/lignecmd")
 */
class LignecmdController extends Controller
{
    /**
     * Lists all Lignecmd entities.
     *
     * @Route("/", name="lignecmd_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lignecmds = $em->getRepository('AppBundle:Lignecmd')->findAll();

        return $this->render('lignecmd/index.html.twig', array(
            'lignecmds' => $lignecmds,
        ));
    }

    /**
     * Creates a new Lignecmd entity.
     *
     * @Route("/new", name="lignecmd_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lignecmd = new Lignecmd();
        $form = $this->createForm('AppBundle\Form\LignecmdType', $lignecmd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lignecmd);
            $em->flush();

            return $this->redirectToRoute('lignecmd_show', array('id' => $lignecmd->getId()));
        }

        return $this->render('lignecmd/new.html.twig', array(
            'lignecmd' => $lignecmd,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Lignecmd entity.
     *
     * @Route("/{id}", name="lignecmd_show")
     * @Method("GET")
     */
    public function showAction(Lignecmd $lignecmd)
    {
        $deleteForm = $this->createDeleteForm($lignecmd);

        return $this->render('lignecmd/show.html.twig', array(
            'lignecmd' => $lignecmd,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Lignecmd entity.
     *
     * @Route("/{id}/edit", name="lignecmd_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lignecmd $lignecmd)
    {
        $deleteForm = $this->createDeleteForm($lignecmd);
        $editForm = $this->createForm('AppBundle\Form\LignecmdType', $lignecmd);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lignecmd);
            $em->flush();

            return $this->redirectToRoute('lignecmd_edit', array('id' => $lignecmd->getId()));
        }

        return $this->render('lignecmd/edit.html.twig', array(
            'lignecmd' => $lignecmd,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Lignecmd entity.
     *
     * @Route("/{id}", name="lignecmd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lignecmd $lignecmd)
    {
        $form = $this->createDeleteForm($lignecmd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lignecmd);
            $em->flush();
        }

        return $this->redirectToRoute('lignecmd_index');
    }

    /**
     * Creates a form to delete a Lignecmd entity.
     *
     * @param Lignecmd $lignecmd The Lignecmd entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lignecmd $lignecmd)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lignecmd_delete', array('id' => $lignecmd->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
