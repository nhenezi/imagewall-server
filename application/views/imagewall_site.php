<html>
<head>
</head>
<body>
<?php
echo $error;
echo $value;
?>
<h3>Lista</h3>
<ul>
<?php foreach ($data as $dat):?>
<li><img src="<?php echo base_url().'images/'."{$dat->id}.{$dat->extension}";?>"></li>
<?php endforeach; ?>
</ul>

</body>
</html>
