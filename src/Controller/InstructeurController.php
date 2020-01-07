<?php


namespace App\Controller;


use App\Entity\Lessen;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class InstructeurController extends AbstractController
{
    /**
     * @Route("/instructeur/activiteit", name="edit_act")
     */
    public function editEntity()
    {
        $les = $this->getDoctrine()
            ->getRepository(Lessen::class)
            ->findAll();

        if (!$les) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render("/instructeur/activiteitEdit.html.twig", [
            'lessen' => $les]);
    }


    /**
     * @Route("/instructeur/{id}" , name="delete_activiteit")
     */
    public function deleteAction($id)
    {
        $les = $this->getDoctrine()
            ->getRepository(Lessen::class)
            ->find($id);
        if (!$les) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }
        $enitymanager = $this->getDoctrine()->getManager();
        $enitymanager->remove($les);
        $enitymanager->flush();

return $this->redirectToRoute("edit_act");
}
    /**
     * @Route("/instructeur/{id}" , name="aanpassen")
     */
    public function updateAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $les = $entityManager->getRepository(Lessen::class)->find($id);

        if (!$les) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $les->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('edit_act', [
            'lesa' => $les->getId()
        ]);
    }
}
