<?php 
function getAllPasien(){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "SELECT p.med_record_number,p.citizen_id_number,p.name,p.address,p.birth_place,p.phone_number,p.photo,p.birth_date,i.id,i.name_class FROM patient p JOIN insurance i ON p.insurance_id = i.id";
    $result = $link->query($query);
    return $result;
}

function addPasien($no,$id,$name,$alamat,$kota,$tanggal,$jenis){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "INSERT INTO patient (med_record_number,citizen_id_number,name,address,birth_place,birth_date,insurance_id) VALUES (?,?,?,?,?,?,?)";
    $statement = $link->prepare($query);;
    $statement->bindParam(1,$no, PDO::PARAM_STR);
    $statement->bindParam(2,$id, PDO::PARAM_INT);
    $statement->bindParam(3,$name, PDO::PARAM_STR);
    $statement->bindParam(4,$alamat, PDO::PARAM_STR);
    $statement->bindParam(5,$kota, PDO::PARAM_STR);
    $statement->bindParam(6,$tanggal, PDO::PARAM_STR);
    $statement->bindParam(7,$jenis, PDO::PARAM_INT);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;

    header("location:index.php?menu=pasien");

}

function deletePasien($id){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM patient WHERE med_record_number=?";
    $statement = $link->prepare($query);;
    $statement->bindParam(1,$id, PDO::PARAM_STR);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;

    header("location:index.php?menu=pasien");
}

function updatePasien($no,$id,$name,$alamat,$kota,$tanggal,$jenis){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE patient SET citizen_id_number=?,name=?,address=?,birth_place=?,birth_date=?,insurance_id=? WHERE med_record_number=?";
    $statement = $link->prepare($query);;
    $statement->bindParam(1,$id, PDO::PARAM_INT);
    $statement->bindParam(2,$name, PDO::PARAM_STR);
    $statement->bindParam(3,$alamat, PDO::PARAM_STR);
    $statement->bindParam(4,$kota, PDO::PARAM_STR);
    $statement->bindParam(5,$tanggal, PDO::PARAM_STR);
    $statement->bindParam(6,$jenis, PDO::PARAM_INT);
    $statement->bindParam(7,$no, PDO::PARAM_STR);
    if($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;

    header("location:index.php?menu=pasien");
}


function getPasienById($id){
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "SELECT * FROM patient WHERE med_record_number= ?";
    $statement = $link->prepare($query);;
    $statement->bindParam(1,$id, PDO::PARAM_STR);
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