<?php
ob_start()
?>
<p> Nom : <?= ($profile->name)?></p>
    <table>
        <tr>
        <td class="border-4 border-light-gray-500">role</td>
        </tr>
        <?php foreach ($roles as $role): ?>
            <tr>
                <td class="border-4 border-light-gray-500"><?= $role->name ?></td>
            </tr>
        <?php
        endforeach ?>
    </table>
<br>
    <br>

    <table>
        <tr>
        <td class="border-4 border-light-gray-500">status</td>
        </tr>
        <?php foreach ($states as $state): ?>

            <tr>
                <td class="border-4 border-light-gray-500"><?= $state->name ?></td>
            </tr>
        <?php
        endforeach ?>
    </table>
    <br>
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