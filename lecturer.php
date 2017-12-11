<?php

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';

/** @var Application\LecturerCollection $lecturers */
$lecturers = require __DIR__.'/db.php';

$selectedLecturer = null;

foreach ($lecturers->getLecturers() as $lecturer) {
    /** @var $lecturer Application\Lecturer */
    $name = $_GET['lecturer'];
    if (!$lecturer->is($name)) {
        continue;
    }
    $selectedLecturer = $lecturer;
}

if ($selectedLecturer === null) {
    throw new Exception('Lecturer not found');
}
?>

<!Doctype html>
<html>
<head>
</head>
<body>
    <h1><?= $selectedLecturer->getName() ?></h1>
</body>
</html>
