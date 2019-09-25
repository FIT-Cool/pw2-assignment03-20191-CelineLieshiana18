<?php 
include_once 'Database/asuransi_function.php';
include_once 'Database/pasien_function.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="datatables.min.css">
    <script type="text/javascript" src="datatables.min.js"></script>
    <script src="js/asuransiJS.js"></script>
    <script src="js/pasienJS.js"></script>
    <title>Praktikum 1 - 1772005</title>

</head>
<body>
    <nav>
    <a href="?menu=pasien"> Data Pasien</a>
    <a href="?menu=asuransi"> Data Asuransi </a>
    </nav>
    <main>
        <?php 
            $targetmenu = filter_input(INPUT_GET,'menu');

            switch($targetmenu){
                case 'pasien':
                    include_once 'view/pasien.php';
                    break;
                case 'asuransi':
                    include_once 'view/asuransi.php';
                    break;
                case 'updatepasien':
                    include_once 'view/pasien_update.php';
                    break;
                case 'asuransiupdate':
                    include_once 'view/asuransi_update.php';
                    break;
                default:
                    include_once 'index.php';
                    break;
            }
        ?>
    </main>
</body>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</html>