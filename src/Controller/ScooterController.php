<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\ScooterManager;

/**
 * Class ItemController
 *
 */
class ScooterController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $scooterManager = new ScooterManager();
        $scooters = $scooterManager->selectAll();
//var_dump($scooters);exit;
        return $this->twig->render('Scooter/index.html.twig', ['scooters' => $scooters]);
    }

    /**
     * Display item informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show(int $id)
    {
        $scooterManager = new ScooterManager();
        $scooter = $scooterManager->selectOneById($id);
        $marques = $scooterManager->selectAllMarque();

        return $this->twig->render('Scooter/edit.html.twig', ['scooter' => $scooter, 'marques' => $marques]);
    }

    /**
     * Display item edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function edit(int $id): string
    {
        $scooterManager = new ScooterManager();
        $scooter = $scooterManager->selectScootById($id);
        $marques = $scooterManager->selectAllMarque();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $scooterManager->update($_POST);
            header('Location:/scooter/edit/'.$id);
        }

        return $this->twig->render('Scooter/edit.html.twig', ['scooter' => $scooter, 'marques' => $marques]);
    }


    /**
     * Display item creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {
        $scooterManager = new ScooterManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $scooterManager->insert($_POST);
            header('Location:/scooter/edit/' . $id);
        }

        $marques = $scooterManager->selectAllMarque();

        return $this->twig->render('Scooter/add.html.twig', ['marques' => $marques]);
    }


    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $scooterManager = new ScooterManager();
        $scooterManager->delete($id);
        header('Location:/scooter/index');
    }
}
