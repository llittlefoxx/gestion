<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commande;
use AppBundle\Entity\Lignecmd;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you needs
        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
    }

    /**
     * @Route("/", name="cmd")
     */
    public function cmdAction(Request $request) {


        return $this->render('default/cmd.html.twig');
    }

    /**
     * Creates a new Commande entity.
     *
     * @Route("/cmd_new", name="cmd_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $commande = new Commande();
        $lignecmd = new Lignecmd();
        $lform = $this->createForm('AppBundle\Form\LignecmdType', $lignecmd);
        $em = $this->getDoctrine()->getManager();
        $em->persist($commande);
        $em->flush();
        $x = $commande->getIdcmd();
        echo $x;

        $produitServices = $em->getRepository('AppBundle:ProduitService')->findAll();

        return $this->render('default/cmd.html.twig', array(
                    'produitServices' => $produitServices,
                    'edit_form' => $lform->createView(),
                    'x' => $x
        ));
    }

    /**
     * Creates a new Lignecmd entity.
     *
     * @Route("/lc/{x}/{idp}/{qte}",defaults={"qte" = 1}, options = { "expose" = true },  name="lc")
     * @Method({"GET", "POST"})
     */
    public function newlcAction($x, $idp, $qte) {
        
        $em = $this->getDoctrine()->getManager();
        
       
        $lignecmd = new Lignecmd();
        $lignecmd->setIdcmd($em->getRepository('AppBundle:Commande')->find($x));
       
        $lignecmd->setIdprod($em->getRepository('AppBundle:ProduitService')->find($idp));
        $lignecmd->setQte($qte);
        echo " ****************** ".$idp;
        $em->persist($lignecmd);
        $em->flush();
             $produitServices = $em->getRepository('AppBundle:ProduitService')->findAll();

        return $this->render('default/cmd.html.twig', array(
                    'produitServices' => $produitServices,
                    'x' => $x
        ));
    }

}
