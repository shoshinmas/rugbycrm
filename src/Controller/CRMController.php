<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CRMController extends AbstractController
{
    #[Route('/', name: 'app_mainpage')]
    public function index(): Response
    {
        return $this->render('crm/index.html.twig', [
            'controller_name' => 'CRMController',
        ]);
    }
}
