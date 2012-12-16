<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/uploadImage/test/12/2');?>

<input type="file" name="userfile" size="20" />
<input type="text" name="test" />
<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
