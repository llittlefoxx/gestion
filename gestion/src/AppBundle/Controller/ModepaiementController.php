<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Modepaiement;
use AppBundle\Form\ModepaiementType;

/**
 * Modepaiement controller.
 *
 * @Route("/modepaiement")
 */
class ModepaiementController extends Controller
{
    /**
     * Lists all Modepaiement entities.
     *
     * @Route("/", name="modepaiement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modepaiements = $em->getRepository('AppBundle:Modepaiement')->findAll();

        return $this->render('modepaiement/index.html.twig', array(
            'modepaiements' => $modepaiements,
        ));
    }

    /**
     * Creates a new Modepaiement entity.
     *
     * @Route("/new", name="modepaiement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $modepaiement = new Modepaiement();
        $form = $this->createForm('AppBundle\Form\ModepaiementType', $modepaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modepaiement);
            $em->flush();

            return $this->redirectToRoute('modepaiement_show', array('id' => $modepaiement->getIdpaiement()));
        }

        return $this->render('modepaiement/new.html.twig', array(
            'modepaiement' => $modepaiement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Modepaiement entity.
     *
     * @Route("/{id}", name="modepaiement_show")
     * @Method("GET")
     */
    public function showAction(Modepaiement $modepaiement)
    {
        $deleteForm = $this->createDeleteForm($modepaiement);

        return $this->render('modepaiement/show.html.twig', array(
            'modepaiement' => $modepaiement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Modepaiement entity.
     *
     * @Route("/{id}/edit", name="modepaiement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Modepaiement $modepaiement)
    {
        $deleteForm = $this->createDeleteForm($modepaiement);
        $editForm = $this->createForm('AppBundle\Form\ModepaiementType', $modepaiement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modepaiement);
            $em->flush();

            return $this->redirectToRoute('modepaiement_edit', array('id' => $modepaiement->getIdpaiement()));
        }

        return $this->render('modepaiement/edit.html.twig', array(
            'modepaiement' => $modepaiement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Modepaiement entity.
     *
     * @Route("/{id}", name="modepaiement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Modepaiement $modepaiement)
    {
        $form = $this->createDeleteForm($modepaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modepaiement);
            $em->flush();
        }

        return $this->redirectToRoute('modepaiement_index');
    }

    /**
     * Creates a form to delete a Modepaiement entity.
     *
     * @param Modepaiement $modepaiement The Modepaiement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Modepaiement $modepaiement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modepaiement_delete', array('id' => $modepaiement->getIdpaiement())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
      /**
     * Deletes a contact entity.
     *
     * @Route("/{id}/e", name="modepaiement_del")
     * @Method({"GET", "POST"})
     */
        public function delAction($id) {

        $modepaiement = new Modepaiement();
        $em = $this->getDoctrine()->getManager();
        $modepaiement = $em->getRepository('AppBundle:Modepaiement')->find($id);
     
        if ($em->remove($modepaiement)){
            echo "1";
            
        }
        //commit
        $em->flush();
        //refresh
        $modepaiements = $em->getRepository('AppBundle:Modepaiement')->findAll();


        return $this->render('modepaiement/index.html.twig', array(
                    'modepaiements' => $modepaiements,
                    
        ));
    }
}
