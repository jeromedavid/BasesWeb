<?php

//session_start();

session_unset();

function addmessage($code,$type,$valid) {
    $_SESSION['msg'][] = array('code' => $code, 'type' => $type, 'lib' => $valid );
}



addmessage(0,'UPLOAD_ERR_OK','Aucune erreur, le téléchargement est correct.');
addmessage(1,'UPLOAD_ERR_INI_SIZE','La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini');
addmessage(2,'UPLOAD_ERR_FORM_SIZE','La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML. ');
addmessage(3,'UPLOAD_ERR_PARTIAL','Le fichier n\'a été que partiellement téléchargé. ');
addmessage(4,'UPLOAD_ERR_NO_FILE','Aucun fichier n\'a été téléchargé. ');
addmessage(6,'UPLOAD_ERR_NO_TMP_DIR','Un dossier temporaire est manquant. Introduit en PHP 5.0.3.');

header('Location: index.php?page=sessionsReg');   





