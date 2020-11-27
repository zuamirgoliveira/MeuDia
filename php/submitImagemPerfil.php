<?php
if(isset($_POST["submit"]))
{
    $target_dir = "../css/img/";
    $file = $_FILES['fileToUpload']['name'];
    $target_file = $target_dir . $file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if($check !== false) {
			echo "<p>File is an image - " . $check['mime'] . ".</p>";
            $uploadOk = 1;
        } else {
            echo "<p>File is not an image.</p>";
            $uploadOk = 0;
        }
}
?>