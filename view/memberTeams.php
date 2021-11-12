<?php
ob_start()
?>
    <table class="table-fixed border-4 border-light-blue-500">
        <thead class="text-center border-4 border-light-blue-500">
            <tr>
                <th class="w-1/4 border-4 border-light-blue-500">Nom</th>
                <th class="w-1/4 border-4 border-light-blue-500">Nombre de membres</th>
                <th class="w-1/4 border-4 border-light-blue-500">Capitaine</th>
                <th class="w-1/4 border-4 border-light-blue-500">State</th>
            </tr>
        </thead>
        <tbody class="text-center border-4 border-light-blue-500">
        <?php foreach ($teams as $team): ?>
            <tr>
                <td class="border-4 border-light-gray-500 hover:bg-gray-200 "><a href="?action=myTeam/teamId"><?= $team->name ?></a></td>
                <td class="border-4 border-light-gray-500"><?= count($team->members())?></td>
                <td class="border-4 border-light-gray-500"><?= $team->captain()->name ?></td>
                <td class="border-4 border-light-gray-500"><?= $team->state_id ?></td>
            </tr>
        <?php
        endforeach ?>
        </tbody>
    </table>
<?php
$content = ob_get_clean();
require_once 'homepage.php';
?>