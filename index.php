<?php

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';

/** @var Application\LecturerCollection $lecturers */
$lecturers = require __DIR__.'/db.php';
?>

<!Doctype html>
<html>
<head>
</head>
<body>
    <ul>
    <?php foreach ($lecturers->getLecturers() as $lecturer): /** @var $lecturer Application\Lecturer */ ?>
        <li>
            <?= $lecturer->getName() ?>
            <ul>
            <?php foreach ($lecturer->getLectures() as $lecture): ?>
                <li><?= $lecture ?></li>
            <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
