<?php 

    // 1. Buat form upload gambar
    // 2. Rubah ekstensi dan ukuran gambar yang diupload ke WEBP
    // 3. Simpan gambar yang diupload ke server
    // 4. Simpan gambar yangt telah dirubah dengan tambahan nama menjadi: 'converted-nama_asli.webp'
    if ( isset($_POST['convert']) ){

        $imageFromJPEG = imagecreatefromjpeg($_FILES['img']['tmp_name']);
        $imgName = explode('.', $_FILES['img']['name'])[0];
        $alamatPenyimpanan = 'img/converted-' . $imgName . '.webp';
        $webpFromJPEG = imagewebp($imageFromJPEG, $alamatPenyimpanan, -1);
    
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title> Rubah Image to WEBP </title>
</head>
<body>
    <h3> Upload Gambar JPEG untuk Dirubah ke WEBP </h3>
    <form method="POST" action="" enctype="multipart/form-data">
        <table> 
            <tr> 
                <td> 
                    <label for="img"> Upload File: </label> 
                </td>
                <td> 
                    <input type="file" id="img" name="img"> 
                </td> 
            </tr>
            <tr> 
                <td colspan="2" style="text-align: center"> 
                    <button type="submit" name="convert"> Convert </button> 
                </td> 
        </table>
    </form>
</body>
</html>