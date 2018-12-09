<?php
function sanitize($data) {
    global $mysqli;
    return $mysqli->real_escape_string($data);
}
?>