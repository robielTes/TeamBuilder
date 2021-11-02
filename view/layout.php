<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/main.css">
    <title>TeamBuilder</title>
</head>
<body>
<header>
    <h1>TeamBuilder</h1>
    <p class="user"><?=$_SESSION['user']->name?></p>
</header>
<br><a class="btn btn-primary" href="?controller=listMember">MemberList</a>
<br>
<?= $content ?>


</body>
</html>