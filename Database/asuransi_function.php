<?php 
function getAllAsuransi(){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM insurance";
    $result = $link->query($query);
    return $result;
}

function addAsuransi($name){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "INSERT INTO insurance (name_class) VALUES (?)";
    $statement = $link->prepare($query);
    $statement->bindParam(1,$name, PDO::PARAM_STR);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;

    header("location:index.php?menu=asuransi");

}


function deleteAsuransi($id){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM insurance WHERE id=?";
    $statement = $link->prepare($query);
    $statement->bindParam(1,$id, PDO::PARAM_INT);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;

    header("location:index.php?menu=asuransi");
}

function updateAsuransi($id,$name){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE insurance SET name_class=? WHERE id=?";
    $statement = $link->prepare($query);
    $statement->bindParam(1,$name, PDO::PARAM_STR);
    $statement->bindParam(2,$id, PDO::PARAM_INT);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;

    header("location:index.php?menu=asuransi");
}


function getAsuransiById($id){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "SELECT * FROM insurance WHERE id=?";
    $statement = $link->prepare($query);;
    $statement->bindParam(1,$id, PDO::PARAM_INT);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;
    return $statement;
}

?>