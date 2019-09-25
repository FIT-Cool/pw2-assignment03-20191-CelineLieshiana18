<?php
//update
$id = filter_input(INPUT_GET,'id');
if(isset($id)){
    $raw = getAsuransiById($id);
    $asuransi = $raw->fetch();
}
$submitted = filter_input(INPUT_POST,'updatebtn');

if (isset($submitted)){
    // $id = filter_input(INPUT_POST,'txtID');
    $name = filter_input(INPUT_POST,'txtName');
    updateAsuransi($id,$name);
    header("location:index.php?menu=asuransi");
}
?>
<Form action="" method="post">
    <fieldset>
    <legend><p>Tambah Asuransi</p></legend>
    <input type="text" placeholder="Nama Jenis Asuransi" name="txtName" value="<?= $asuransi['name_class']?>">
    <input type="submit" name="updatebtn" value="UPDATE">
    </fieldset>
</Form>
