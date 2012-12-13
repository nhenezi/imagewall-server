<html>
<head>
</head>
<body>
<?php echo $error;?>
<?php echo $value;?>
<h3>Lista</h3>
<ul>
<?php foreach ($data as $dat):?>
<li><img src="../server/upload/<?php echo "{$dat->id}.{$dat->extension}";?>"></li>
<?php endforeach; ?>
</ul>

</body>
</html>
