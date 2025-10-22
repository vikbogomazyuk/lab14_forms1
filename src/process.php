<?php

require __DIR__ . '/../vendor/autoload.php';

use Respect\Validation\Validator as v;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $errors = [];

    if (!v::stringType()->notEmpty()->validate($name)) {
        $errors[] = 'Поле "Ім\'я" не може бути порожнім.';
    }

    if (!v::email()->validate($email)) {
        $errors[] = 'Введіть коректний email.';
    }

    if ($errors) {
        echo '<p class="error">Виникли помилки:</p>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul>';
        echo '<p><a href="./public/form.html">Назад до форми</a></p>';
    } else {
        echo '<p>Дякуємо, ' . htmlspecialchars($name) . '</p>';
        echo '<p>Ви успішно заповнили форму. ' . htmlspecialchars($email) . '</p>';
    }
} else {
    echo '<p>Будь ласка, відкрийте <a href="./public/form.html">форму</a></p>';
}

?>