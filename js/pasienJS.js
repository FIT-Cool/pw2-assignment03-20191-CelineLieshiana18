function deletePasien(id) {
    var confirmation = window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location="index.php?menu=pasien&deletebtn=1&med_record_number="+id;
    }
}

function updatePasienn(id) {
    window.location="index.php?menu=updatepasien&updatebtn=1&med_record_number="+id;
}