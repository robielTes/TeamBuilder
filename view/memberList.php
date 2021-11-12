<?php
ob_start()
?>
    <table>
        <?php if (!empty($members)): ?>
            <?php foreach ($members as $member): ?>
                <tr>
                    <td class="hover:bg-gray-200">
                       <a href="?action=member&id=<?=$member->id?>"> <?= $member->name ?></a>
                    </td>
                    <td>
                        <?php foreach ($member->teams() as $team): ?>
                            <span><?= $team->name ?></span>
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
<?php
$content = ob_get_clean();
require_once 'homepage.php';
?>