<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ShopManager;

class ShopController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $shopManager = new ShopManager();
        if (isset($_GET['marque'])) {
            $scooters = $shopManager->selectByMarque($_GET['marque']);
        } else {
            $scooters = $shopManager->selectAllWithMarque();
        }
        $marques = $shopManager->selectAllMarques();

        return $this->twig->render('Shop/index.html.twig', ['scooters' => $scooters, 'marques' => $marques]);
    }
}
