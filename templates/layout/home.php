<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<title>Profile</title> 
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,viewport-fit=cover" />
<?= $this->Html->css(['style','all.min.css','bootstrap.min.css']) ?>
<?=$this->Html->script(['bootstrap.bundle.min']);?>
</head>
<body id="profile">
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?> 
</body>
</html>
