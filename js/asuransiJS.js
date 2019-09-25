function deleteAsuransi(id) {
    var confirmation = window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location="index.php?menu=asuransi&deletebtn=1&id="+id;
    }
}

function updateAsuransi(id) {
        window.location="index.php?menu=asuransiupdate&updatebtn=1&id="+id;
}
