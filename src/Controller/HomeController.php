<?php

namespace App\Controller;

use App\Repository\MaisonRepository;
use App\Repository\ConfigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        MaisonRepository $maisonRepository,
        ConfigRepository $configRepository
    ): Response
    {
        $maisons = $maisonRepository->findAll();

        // We only need one configuration
        $config = $configRepository->findOneBy([]);

        return $this->render('home/index.html.twig', [
            'maisons' => $maisons,
            'config' => $config,
            'titresection' => 'Nos Maisons',
        ]);
    }
}