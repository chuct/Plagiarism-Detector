<?php
include 'core/init.php';
$courseId = $_GET['courseId'];
$assnId = $_GET['assnId'];

//When this code is working, move back to following function:
email_assignment_to_students($courseId, $assnId);


?>