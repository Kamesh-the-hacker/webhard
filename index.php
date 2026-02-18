<?php

if(isset($_FILES['file'])){

    $upload_dir = "uploads/";
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Weak extension filter (intentional vulnerability)
    if($ext != "php"){
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.$filename);
        $message = "File uploaded successfully.";
    } else {
        $message = "File type not allowed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Nexus Secure Vault</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="card">
    <h2>Nexus Internal Secure Vault</h2>
    <p>Upload compliance documents (JPG, PNG, PDF)</p>

    <?php if(isset($message)) echo "<p>$message</p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload Document</button>
    </form>
</div>

</body>
</html>
