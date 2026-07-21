<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Controller\Admin\MaisonCrudController;
use App\Controller\Admin\ConfigCrudController;
use App\Entity\Maison;
use App\Entity\Config;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
   public function __construct(
    private AdminUrlGenerator $adminUrlGenerator,
) {
}

public function index(): Response
{
    return $this->redirect(
        $this->adminUrlGenerator
            ->setController(MaisonCrudController::class)
            ->generateUrl()
    );
}

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('La Residence');
    }
    public function configureMenuItems(): iterable
{
    yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

    yield MenuItem::linkTo(
        MaisonCrudController::class,
        'Maisons',
        'fas fa-house'
    );

    yield MenuItem::linkTo(
        ConfigCrudController::class,
        'Config',
        'fas fa-address-book'
    );
}

   
}
