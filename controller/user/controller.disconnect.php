<?php
session_unset(); // Suppresion de toutes les variables
session_destroy(); // Suppresion de la session
header( 'Location: /' ); // Retour à l'index du site
?>