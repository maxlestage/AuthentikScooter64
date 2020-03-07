<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\RechercheManager;
use App\Model\ShopManager;

class RechercheController extends AbstractController
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
        $rechercheManager = new RechercheManager();
        $shopManager = new ShopManager();
        if (!empty($_POST['q'])) {
            $results = $rechercheManager->search($_POST['q']);
        } else {
            $results = $shopManager->selectAllWithMarque();
        }


        return $this->twig->render('Recherche/recherche.html.twig', ['results' => $results]);
    }
}
