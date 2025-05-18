<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use App\Entity\Covoiturage;
use App\Entity\Marque;
use App\Entity\User;
use App\Entity\Voiture;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class AdminDashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();

        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EcoRide ECF');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section("Gestion des utilisateurs");
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::section("Gestion des covoiturages");
        yield MenuItem::linkToCrud('Covoiturages','fas fa-flag-checkered', Covoiturage::class);
        yield MenuItem::linkToCrud('Voiture','fas fa-car', Voiture::class);
        yield MenuItem::linkToCrud('Marque','fas fa-trademark', Marque::class);
        yield MenuItem::section("Gestion des avis");
        yield MenuItem::linkToCrud('Avis','fas fa-star', Avis::class);
    }
}
