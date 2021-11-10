<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>TeamBuilder</title>
</head>
<body>
<header class="bg-green-400 p-6">
    <h1 class="text-6xl font-bold text-center">TeamBuilder</h1>
    <p class="text-right -mb-3 text-xl"><?=$_SESSION['user']->name?></p>
</header>
<br><a class="bg-green-800 hover:bg-green-600 text-white font-bold py-3 px-4 rounded mx-4" href="?controller=listMember">MemberList</a>

<div class="mx-10 my-6">
    <?= $content ?>
</div>

</body>
</html>