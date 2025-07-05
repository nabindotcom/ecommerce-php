<?php
$con = mysqli_connect('localhost', 'root', '', 'mystoredemo');
if (!$con) {
      die(mysqli_error($con));
}