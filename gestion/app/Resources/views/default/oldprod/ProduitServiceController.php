<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProduitService;
use AppBundle\Form\ProduitServiceType;

/**
 * ProduitService controller.
 *
 * @Route("/produitservice")
 */
class ProduitServiceController extends Controller
{
    /**
     * Lists all ProduitService entities.
     *
     * @Route("/", name="produitservice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produitServices = $em->getRepository('AppBundle:ProduitService')->findAll();

        return $this->render('produitservice/index.html.twig', array(
            'produitServices' => $produitServices,
        ));
    }

    /**
     * Creates a new ProduitService entity.
     *
     * @Route("/new", name="produitservice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $produitService = new ProduitService();
        $form = $this->createForm('AppBundle\Form\ProduitServiceType', $produitService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produitService);
            $em->flush();

            return $this->redirectToRoute('produitservice_show', array('id' => $produitService->getIdprod()));
        }

        return $this->render('produitservice/new.html.twig', array(
            'produitService' => $produitService,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProduitService entity.
     *
     * @Route("/{id}", name="produitservice_show")
     * @Method("GET")
     */
    public function showAction(ProduitService $produitService)
    {
        $deleteForm = $this->createDeleteForm($produitService);

        return $this->render('produitservice/show.html.twig', array(
            'produitService' => $produitService,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProduitService entity.
     *
     * @Route("/{id}/edit", name="produitservice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProduitService $produitService)
    {
        $deleteForm = $this->createDeleteForm($produitService);
        $editForm = $this->createForm('AppBundle\Form\ProduitServiceType', $produitService);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produitService);
            $em->flush();

            return $this->redirectToRoute('produitservice_edit', array('id' => $produitService->getIdprod()));
        }

        return $this->render('produitservice/edit.html.twig', array(
            'produitService' => $produitService,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProduitService entity.
     *
     * @Route("/{id}", name="produitservice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProduitService $produitService)
    {
        $form = $this->createDeleteForm($produitService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produitService);
            $em->flush();
        }

        return $this->redirectToRoute('produitservice_index');
    }

    /**
     * Creates a form to delete a ProduitService entity.
     *
     * @param ProduitService $produitService The ProduitService entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProduitService $produitService)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produitservice_delete', array('id' => $produitService->getIdprod())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Deletes a contact entity.
     *
     * @Route("/{id}/e", name="produitservice_del")
     * @Method({"GET", "POST"})
     */
        public function delAction($id) {

        $produit = new ProduitService();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('AppBundle:ProduitService')->find($id);
     
        if ($em->remove($produit)){
            echo "1";
            
        }
        //commit
        $em->flush();
        //refresh
        $produits = $em->getRepository('AppBundle:ProduitService')->findAll();


        return $this->render('produitservice/index.html.twig', array(
                    'produitServices' => $produits,
                    
        ));
    }
}
