<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Banque;
use AppBundle\Form\BanqueType;

/**
 * Banque controller.
 *
 * @Route("/banque")
 */
class BanqueController extends Controller
{
    /**
     * Lists all Banque entities.
     *
     * @Route("/", name="banque_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banques = $em->getRepository('AppBundle:Banque')->findAll();

        return $this->render('banque/index.html.twig', array(
            'banques' => $banques,
        ));
    }

    /**
     * Creates a new Banque entity.
     *
     * @Route("/new", name="banque_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $banque = new Banque();
        $form = $this->createForm('AppBundle\Form\BanqueType', $banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banque);
            $em->flush();

            return $this->redirectToRoute('banque_show', array('id' => $banque->getIdbanque()));
        }

        return $this->render('banque/new.html.twig', array(
            'banque' => $banque,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Banque entity.
     *
     * @Route("/{id}", name="banque_show")
     * @Method("GET")
     */
    public function showAction(Banque $banque)
    {
        $deleteForm = $this->createDeleteForm($banque);

        return $this->render('banque/show.html.twig', array(
            'banque' => $banque,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Banque entity.
     *
     * @Route("/{id}/edit", name="banque_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Banque $banque)
    {
        $deleteForm = $this->createDeleteForm($banque);
        $editForm = $this->createForm('AppBundle\Form\BanqueType', $banque);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banque);
            $em->flush();

            return $this->redirectToRoute('banque_edit', array('id' => $banque->getIdbanque()));
        }

        return $this->render('banque/edit.html.twig', array(
            'banque' => $banque,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Banque entity.
     *
     * @Route("/{id}", name="banque_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Banque $banque)
    {
        $form = $this->createDeleteForm($banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($banque);
            $em->flush();
        }

        return $this->redirectToRoute('banque_index');
    }

    /**
     * Creates a form to delete a Banque entity.
     *
     * @param Banque $banque The Banque entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Banque $banque)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('banque_delete', array('id' => $banque->getIdbanque())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
     /**
     * Deletes a contact entity.
     *
     * @Route("/{id}/e", name="banque_del")
     * @Method({"GET", "POST"})
     */
        public function delAction($id) {

        $banque = new Banque();
        $em = $this->getDoctrine()->getManager();
        $banque = $em->getRepository('AppBundle:Banque')->find($id);
     
        if ($em->remove($banque)){
            echo "1";
            
        }
        //commit
        $em->flush();
        //refresh
        $banques = $em->getRepository('AppBundle:Banque')->findAll();


        return $this->render('banque/index.html.twig', array(
                    'banques' => $banques,
                    
        ));
    }
}
