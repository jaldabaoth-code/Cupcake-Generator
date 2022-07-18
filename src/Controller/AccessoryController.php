<?php

namespace App\Controller;

use App\Model\AccessoryManager;

/**
 * Class AccessoryController
 *
 */
class AccessoryController extends AbstractController
{
    public const MAX_LENGTH = 255;

    /**
     * Display accessory creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {
        $errors = [];
        $accessory = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accessory = array_map('trim', $_POST);
            if (empty($accessory['name'])) {
                $errors[] = 'Please enter Accessory name.';
            } elseif (strlen($accessory['name']) > self::MAX_LENGTH) {
                $errors[] = 'The name must not exceed ' . self::MAX_LENGTH . ' characters.';
            }
            if (empty($accessory['url'])) {
                $errors[] = 'Please enter URL for Accessory image.';
            } elseif (strlen($accessory['url']) > self::MAX_LENGTH) {
                $errors[] = 'The URL for Accessory image must not exceed ' . self::MAX_LENGTH . ' characters.';
            } elseif (!filter_var($accessory['url'], FILTER_VALIDATE_URL)) {
                $errors[] = 'Please enter a valid URL for Accessory image.';
            }
            if (empty($errors)) {
                $accessoryManager = new AccessoryManager();
                $accessoryManager->insert($accessory);
                header('Location:/accessory/list');
            }
        }
        return $this->twig->render('Accessory/add.html.twig', [
            'accessory' => $accessory,
            'errors' => $errors,
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
        $accessories = $accessoryManager->selectAll();
        return $this->twig->render('Accessory/list.html.twig', [
            'accessories' => $accessories,
        ]);
    }
}
