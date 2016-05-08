<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Unite;
use AppBundle\Form\UniteType;

/**
 * Unite controller.
 *
 * @Route("/unite")
 */
class UniteController extends Controller
{
    /**
     * Lists all Unite entities.
     *
     * @Route("/", name="unite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $unites = $em->getRepository('AppBundle:Unite')->findAll();

        return $this->render('unite/index.html.twig', array(
            'unites' => $unites,
        ));
    }

    /**
     * Creates a new Unite entity.
     *
     * @Route("/new", name="unite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $unite = new Unite();
        $form = $this->createForm('AppBundle\Form\UniteType', $unite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unite);
            $em->flush();

            return $this->redirectToRoute('unite_show', array('id' => $unite->getIdunite()));
        }

        return $this->render('unite/new.html.twig', array(
            'unite' => $unite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Unite entity.
     *
     * @Route("/{id}", name="unite_show")
     * @Method("GET")
     */
    public function showAction(Unite $unite)
    {
        $deleteForm = $this->createDeleteForm($unite);

        return $this->render('unite/show.html.twig', array(
            'unite' => $unite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Unite entity.
     *
     * @Route("/{id}/edit", name="unite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Unite $unite)
    {
        $deleteForm = $this->createDeleteForm($unite);
        $editForm = $this->createForm('AppBundle\Form\UniteType', $unite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unite);
            $em->flush();

            return $this->redirectToRoute('unite_edit', array('id' => $unite->getIdunite()));
        }

        return $this->render('unite/edit.html.twig', array(
            'unite' => $unite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Unite entity.
     *
     * @Route("/{id}", name="unite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Unite $unite)
    {
        $form = $this->createDeleteForm($unite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($unite);
            $em->flush();
        }

        return $this->redirectToRoute('unite_index');
    }

    /**
     * Creates a form to delete a Unite entity.
     *
     * @param Unite $unite The Unite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Unite $unite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('unite_delete', array('id' => $unite->getIdunite())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
          /**
     * Deletes a contact entity.
     *
     * @Route("/{id}/e", name="unite_del")
     * @Method({"GET", "POST"})
     */
        public function delAction($id) {

        $unite = new Unite();
        $em = $this->getDoctrine()->getManager();
        $unite = $em->getRepository('AppBundle:Unite')->find($id);
     
        if ($em->remove($unite)){
            echo "1";
            
        }
        //commit
        $em->flush();
        //refresh
        $unites = $em->getRepository('AppBundle:Unite')->findAll();


        return $this->render('unite/index.html.twig', array(
                    'unites' => $unites,
                    
        ));
    }
}
