<?php

include __DIR__.'/src/Lecturer.php';
include __DIR__.'/src/LecturerCollection.php';

/** @var LecturerCollection $lecturers */
$lecturers = include __DIR__.'/db.php';
?>

<!Doctype html>
<html>
<head>
</head>
<body>
    <ul>
    <?php foreach ($lecturers->getLecturers() as $lecturer): /** @var $lecturer Lecturer */ ?>
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
