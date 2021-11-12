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
    <p class="text-right -mb-3 text-xl">Vous êtes connecté en tant que : <strong><?=$_SESSION['user']->name?></strong></p>
</header>
<p class="text-xs">Robiel Tesfazghi CPNV</p>
<div class="flex pt-4">
    <a class="bg-green-800 hover:bg-green-600 text-white font-bold py-3 px-4 rounded mx-4" href="?action=listMember">MemberList</a>
    <a class="bg-green-800 hover:bg-green-600 text-white font-bold py-3 px-4 rounded mx-4" href="?action=listTeam">Mes équipes</a>
</div>

<div class="mx-10 my-6">
    <?= $content ?>
</div>

</body>
</html>