<?php

namespace App\Controller;

use App\Model\AccessoryManager;
use App\Model\CupcakeManager;
use App\Service\ColorGenerator;

/**
 * Class CupcakeController
 *
 */
class CupcakeController extends AbstractController
{
    public const MAX_LENGTH = 255;
    public const COLOR_LENGTH = 7;
    /**
     * Display cupcake creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {
        $errors = [];
        $cupcake = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cupcake = array_map('trim', $_POST);

            if (empty($cupcake['name'])) {
                $errors[] = 'Please enter a Cupcake name.';
            } elseif (strlen($cupcake['name']) > self::MAX_LENGTH) {
                $errors[] = 'The name must not exceed ' . self::MAX_LENGTH . ' characters.';
            }
            if (empty($cupcake['color1'])) {
                $errors[] = 'Please choose the color 1.';
            } elseif (strlen($cupcake['color1']) != self::COLOR_LENGTH) {
                $errors[] = 'The color must have ' . self::COLOR_LENGTH . ' characters.';
            }
            if (empty($cupcake['color2'])) {
                $errors[] = 'Please choose the color 2.';
            } elseif (strlen($cupcake['color2']) > self::COLOR_LENGTH) {
                $errors[] = 'The color must have ' . self::COLOR_LENGTH . ' characters.';
            }
            if (empty($cupcake['color3'])) {
                $errors[] = 'Please choose the color 3.';
            } elseif (strlen($cupcake['color3']) > self::COLOR_LENGTH) {
                $errors[] = 'The color must have ' . self::COLOR_LENGTH . ' characters.';
            }
            if (empty($cupcake['accessory'])) {
                $errors[] = 'Please choose the accessory .';
            } elseif (strlen($cupcake['accessory']) > self::MAX_LENGTH) {
                $errors[] = 'The accessory must not exceed ' . self::MAX_LENGTH . ' characters.';
            }
            if (empty($errors)) {
                $cupcakeController = new CupcakeManager();
                $cupcakeController->insert($cupcake);
                header('Location:/cupcake/list');
            }
        }
        $accessoryManager = new AccessoryManager();
        $accessories = $accessoryManager->selectAll();
        return $this->twig->render('Cupcake/add.html.twig', [
            'cupcake' => $cupcake,
            'errors' => $errors,
            'accessories' => $accessories,
        ]);
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function list()
    {
        $accessoryManager = new AccessoryManager();
        $cupcakes = $accessoryManager->selectByAccessory();
        return $this->twig->render('Cupcake/list.html.twig', [
            'cupcakes' => $cupcakes,
        ]);
    }

    public function show(int $id)
    {
        $cupcakeManager = new CupcakeManager();
        $cupcake = $cupcakeManager->selectByCupcakeId($id);
        $colorGenerator = new ColorGenerator();
        $color = $colorGenerator->generateBackground([$cupcake['color1'], $cupcake['color2'], $cupcake['color3']]);
        $invertColor = $colorGenerator->invertColor($color);
        return $this->twig->render('Cupcake/show.html.twig', [
            'cupcake' => $cupcake,
            'color' => $color,
            'invert_color' => $invertColor,
        ]);
    }
}
