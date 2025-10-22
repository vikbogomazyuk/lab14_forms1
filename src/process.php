// process.php
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $email = trim($email);
    $errors = [];

    // Валідація
    if (trim($email) === '') {
        $errors[] = "Поле 'Email' не може бути порожнім.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть коректний email.";
    }

    if ($errors) {
        echo "<p>Виникли помилки:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='form.html'>Назад до форми</a></p>";
    } else {
        echo "<p>Дякуємо, " . htmlspecialchars($email) . "</p>";
        echo "<p>Ви успішно заповнили форму. " . htmlspecialchars($email) . "</p>";
    }

    echo "<p>Будь ласка, відкрийте <a href='form.html'>форму</a></p>";
}

?>