<?php
//delete
$deleteBtn = filter_input(INPUT_GET,'deletebtn');
if (isset($deleteBtn)){
    $id = filter_input(INPUT_GET,'id');
    deleteAsuransi($id);
}

//add
$add = filter_input(INPUT_POST,'btnSubmit');
if (isset($add)){
    $name = filter_input(INPUT_POST,'txtName');
    addAsuransi($name);
}
?>
<Form action="" method="post">
    <fieldset>
    <legend><p>Tambah Asuransi</p></legend>
    <input type="text" placeholder="Nama Jenis Asuransi" name="txtName">
    <button type="submit" name="btnSubmit">ADD</button>
    </fieldset>
</Form>

<br/>
<table id="myTable" text-align="center">
    <thead>
    <tr>
        <th>Action</th>
        <th>ID</th>
        <th>Nama Jenis Asuransi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        $data = getAllAsuransi();
        foreach($data as $dataasuransi){
            echo '<tr>';
            echo '<td><button onclick="deleteAsuransi('.$dataasuransi['id'].');">Delete</button><button onclick="updateAsuransi('.$dataasuransi['id'].');">Update</button></td>';
            echo '<td>'.$dataasuransi['id'].'</td>';
            echo '<td>'.$dataasuransi['name_class'].'</td>';
            echo '</tr>';
        }
    ?>
    </tbody>
</table>
