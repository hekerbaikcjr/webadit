<?php
if(isset($_FILES["pdfFile"]) && $_FILES["pdfFile"]["error"] == 0){
    $allowedExtensions = array("pdf");
    $fileExtension = pathinfo($_FILES["pdfFile"]["name"], PATHINFO_EXTENSION);
    if(in_array($fileExtension, $allowedExtensions)){
        $uploadDir = "uploads/";
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }
        $fileName = basename($_FILES["pdfFile"]["name"]);
        $filePath = $uploadDir . $fileName;
        if(move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $filePath)){
            echo "File has been uploaded successfully.";
        } else {
            echo "There was an error uploading the file, please try again.";
        }
    } else {
        echo "Invalid file extension. Only PDF files are allowed.";
    }
} else {
    echo "Please select a file to upload.";
}
?>