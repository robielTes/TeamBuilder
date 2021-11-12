<?php
ob_start()
?>

    <div class="flex py-4 -mx-10 ">
        <a class="bg-green-800 hover:bg-green-600 text-white font-bold py-3 px-4 rounded mx-4" href="?action=editMember&id=<?=$profile->id?>"">Edit</a>
    </div>

<p> Nom : <?= ($profile->name)?></p>
<p> Role : <?= ($role->name)?></p>
<p> State : <?= ($state->name )?></p>
<br>

<?php if (!empty($profile->teams())): ?>
    <table class="table-fixed border-4 border-light-blue-500">
        <thead class="text-center border-4 border-light-blue-500">
        <tr>
            <th class="w-2/4 border-4 border-light-blue-500">Capitaine</th>
            <th class="w-2/4 border-4 border-light-blue-500">equipe</th>
        </tr>
        </thead>
        <tbody class="text-center border-4 border-light-blue-500">
        <?php foreach ($profile->teams() as $team): ?>
            <tr>
                <td class="border-4 border-light-gray-500"><?= $team->captain()->name ?></td>
                <td class="border-4 border-light-gray-500"><?= $team->name ?></td>
            </tr>
        <?php
        endforeach ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Inscrit dans aucune équipe</p>
<?php endif ?>




<?php
$content = ob_get_clean();
require_once 'homepage.php';
?>