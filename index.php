<?php
    require 'connPDO.php';
    $pdo = new connPDO();
    $db = $pdo->conn();

    $sql = $db->prepare("
        SELECT eleve.nom, eleve.prenom, eleve_information.rue, eleve_information.cp, eleve_information.ville, eleve_information.pays
        FROM eleve
        INNER JOIN eleve_information ON eleve.information_id = eleve_information.id 
    ");

    $sql->execute();
    echo "<pre>";
    print_r($sql->fetchAll());
    echo "</pre>";

    $sql = $db->prepare("
        SELECT eleve.nom, eleve.prenom, competence.titre, eleve_competence.niveau
        FROM eleve_competence
        INNER JOIN competence ON eleve_competence.competence_id = competence.id
        INNER JOIN eleve ON eleve_competence.eleve_id = eleve.id
    ");

    $sql->execute();
    echo "<pre>";
    print_r($sql->fetchAll());
    echo "</pre>";

