<?php 
//update

$id = filter_input(INPUT_GET,'med_record_number');

if(isset($id)){
    $raw = getPasienById($id);
    $pasien = $raw->fetch();
}
$submitted = filter_input(INPUT_POST,'updatebtn');

if (isset($submitted)){
    $no = filter_input(INPUT_POST,'txtNo');
    $id = filter_input(INPUT_POST,'txtID');
    $name = filter_input(INPUT_POST,'txtName');
    $alamat = filter_input(INPUT_POST,'txtAlamat');
    $kota = filter_input(INPUT_POST,'txtKota');
    $tanggal = filter_input(INPUT_POST,'txtTanggal');
    $jenis = filter_input(INPUT_POST,'NamaAsuransi');
    updatePasien($no,$id,$name,$alamat,$kota,$tanggal,$jenis);
    header("location:index.php?menu=pasien");
}

?>
<br/>
<br/>
<Form action="" method="post" >
    <fieldset>
    <legend><b>Update Pasien</b></legend>
    <table>
        <tr>
            <td>No Pasien</td>
            <td>:</td>
            <td><input type="text" placeholder="No Pasien" readonly="" name="txtNo" value="<?= $pasien['med_record_number']?>"></td>
        </tr>
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><input type="text" placeholder="ID Pasien" name="txtID" value="<?= $pasien['citizen_id_number']?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" placeholder="Nama Pasien" name="txtName" value="<?= $pasien['name']?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" placeholder="Alamat Pasien" name="txtAlamat" value="<?= $pasien['address']?>"></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input type="text" placeholder="Tempat Lahir Pasien" name="txtKota" value="<?= $pasien['birth_place']?>"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="date" name="txtTanggal" value="<?= $pasien['birth_date']?>"></td>
        </tr>
        <tr>
            <td>Jenis Asuransi</td>
            <td>:</td>
            <!-- <input type="text" placeholder="Jenis Asuransi" name="txtJenis"> -->
            <td><select name="NamaAsuransi">
            <?php
                $dataasuransi = getAllAsuransi();
                foreach ($dataasuransi as $asuransi){
                    echo '<option value="' . $asuransi['id'] . '">'.$asuransi['name_class'].'</option>';
                }
            ?>
            </select>
            </td>
        </tr>
    </table>
    <br/>
    <input type="submit" name="updatebtn" value="UPDATE"/>
    </fieldset>
</Form>
<br/>
<br/>
