<?php
    $mysqli = new mysqli("localhost", "root", "", "albumi");
    if($mysqli->connect_errno) {
        echo "<script>alert('Error connecting.')</script>";
        exit;
    }
    $naziv = $_GET['ime'];
    $mysqli->begin_transaction();

    if($naziv == 'other side of the moon') {

        try {
            $sql = "UPDATE album SET stanje=stanje - 1 WHERE naziv='other side of the moon'";
            $mysqli->query($sql); 
            $sql = "DELETE FROM album WHERE stanje <= 0";
            $mysqli->query($sql);
            $mysqli->commit();
            $mysqli->close(); }
        catch(Exception $e) {    
            $mysqli->rollback();
            echo "error: " . $e->getMessage();
        }
    }

    if($naziv == 'strange trails') {

        try {
            $sql = "UPDATE album SET stanje=stanje - 1 WHERE naziv='strange trails'";
            $mysqli->query($sql); 
            $sql = "DELETE FROM album WHERE stanje <= 0";
            $mysqli->query($sql);
            $mysqli->commit();
            $mysqli->close(); }
        catch(Exception $e) {    
            $mysqli->rollback();
            echo "error: " . $e->getMessage();
        }
    }

    if($naziv == 'foreplay') {

        try {
            $sql = "UPDATE album SET stanje=stanje - 1 WHERE naziv='foreplay'";
            $mysqli->query($sql); 
            $sql = "DELETE FROM album WHERE stanje <= 0";
            $mysqli->query($sql);
            $mysqli->commit();
            $mysqli->close(); }
        catch(Exception $e) {    
            $mysqli->rollback();
            echo "error: " . $e->getMessage();
        }
    }
?>