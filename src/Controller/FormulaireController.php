<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Service\Mailer;

class FormulaireController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mailer = new Mailer();
            $message = $mailer->sendMail($_POST);
        }

        return $this->twig->render('Formulaire/formulaire.html.twig', ['message' => $message]);
    }
}
