<?php

    session_start();

    $mysqli = new mysqli('localhost', 'root', 'dtb456', 'data') or die(mysqli_error($mysqli));

    $id = 0;
    $update = false;
    $nazov = '';
    $popis = '';

    if(isset($_POST['save'])) {
        $nazov = $_POST['nazov'];
        $popis = $_POST['popis'];

        $mysqli->query("INSERT INTO data(nazov, popis) VALUES ('$nazov', '$popis')")
        or die($mysqli->error);

        $_SESSION['message'] = "Položka bola uložená!";
        $_SESSION['msg_type'] = "success";

        header("location: index.php");
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

        $_SESSION['message'] = "Položka bola vymazaná!";
        $_SESSION['msg_type'] = "danger";

        header("location: index.php");
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
        if (count([$result]) > 1) {
            $row = $result->fetch_array();
            $nazov = $row['nazov'];
            $popis = $row['popis'];
        }

    }

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $nazov = $_POST['nazov'];
        $popis = $_POST['popis'];

        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
        $mysqli->query("INSERT INTO data(nazov, popis) VALUES ('$nazov', '$popis')") or die($mysqli->error);
        //$mysqli->query("UPDATE data SET nazov='nazov', popis='popis' WHERE id=$id") or die($mysqli->error);

        $_SESSION['message'] = "Položka bola aktualizovaná!";
        $_SESSION['msg_type'] = "warning";

        header('location: index.php');

    }

