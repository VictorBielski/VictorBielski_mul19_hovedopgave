<?php 

// Stopper den aktive brugeres session og logger ud

session_start();
session_unset();
session_destroy();
header("Location: ../index.php");