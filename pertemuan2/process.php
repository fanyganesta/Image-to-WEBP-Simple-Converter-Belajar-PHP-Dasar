<?php 

    // Cek apakah data sudah diupload
    if( isset( $_POST['konversi'] ) ){
        
        // Jalankan proses konversi
        webpConvertion($_FILES['img']);
        exit;
    }

    // Buat function webpConvertion
    function webpConvertion($data){

        // Tangkap data gambar
        $fileName = $data['name'];
        $filePath = $data['tmp_name'];

        // Ambil Extensi file
        $arrayName = explode('.', $fileName);
        $getExtention = end($arrayName);

        // Cek apakah file benar gambar yang diperbolehkan
        $allowedExtention = [
            'jpeg',
            'jpg',
            'png',
            'gif',
            'avif'
        ];

        if( !in_array( $getExtention, $allowedExtention ) ){
            header("Location: index.php?error=File anda salah");
            exit;
        }

        // Ambil $indexedImage berdasarkan extensi file
        $sameFunctionName = 'imagecreatefrom';
        ($getExtention == 'jpg') ? $getExtention = 'jpeg' : $getExtention;
        $fullFunctionName = $sameFunctionName . $getExtention;
        $indexedImage = $fullFunctionName($filePath);
        if( $getExtention == 'png' || $getExtention == 'gif'){
            imagepalettetotruecolor($indexedImage);
        }
        

        // Konversi gambar ke webp
        $downloadFileName = $arrayName[0] . '-converted.webp';
        
        // Download langsung file
        header("Content-Type: image/webp");
        header("Content-Disposition: attachment; filename=$downloadFileName");
        imagewebp( $indexedImage, null, -1);
    }






?>