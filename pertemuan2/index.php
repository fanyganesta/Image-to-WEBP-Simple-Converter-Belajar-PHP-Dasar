<?php 
    /* 
    1. Tujuan utama: Pembuatan aplikasi konverter image (apapun ekstensinya) ke PHP dan langsung terdownload oleh user.
    2. Detail ada di description pertemuan2
    */
    require 'process.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title> Image to WEBP Converter </title>
</head>
<body>

    <?php if( isset($_GET['error'] ) ) : ?>
        <p style="color: red; font-style: italic;"> <?= $_GET['error']; ?>
    <?php elseif( isset($_GET['message'])) : ?>
        <p style="color: green; font-style: italic"> <?= $_GET['message']; ?>
    <?php endif ?>
    
    <h3> Upload Gambar Anda </h3>
    <p style="font-style: italic"> File: JPEG, JPG, PNG, AFIF </p>
    <br><br>
    <form action="" method="POST" enctype="multipart/form-data"> 
        <table>
            <tr> 
                <td>
                    <label for="img"> Upload File: </label> 
                </td>
                <td> 
                    <input id="img" name="img" type="file" required> 
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 7px">
                    <button type="submit" name="konversi"> Konversi </button> 
                </td> 
            </tr> 
        </table>
    </form>
</body>
</html>