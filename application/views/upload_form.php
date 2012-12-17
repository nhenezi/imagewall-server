<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>
<?php echo $db_error;?>

<?php echo form_open_multipart('upload/');?>

<input type="file" name="userfile" size="20" />
<input type="text" name="tag" />
<input type="text" name="x" />
<input type="text" name="y" />
<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
