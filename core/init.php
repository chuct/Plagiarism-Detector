<?php
session_start();
error_reporting(0);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/userInit.php';
require 'functions/courseInit.php';
require 'functions/studentInit.php';
require 'functions/assignInit.php';
require 'functions/emailStudentInit.php';
$errors = array();
?>