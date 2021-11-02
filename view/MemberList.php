<?php
ob_start()
?>
    <table>
        <?php foreach ($members as $member): ?>
            <tr>
                <td>
                    <?= $member->name ?>
                </td>
                <td>
                    <?php foreach ($member->teams() as $team): ?>
                        <span><?= $team->name ?></span>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php
$content = ob_get_clean();
require_once 'layout.php';
?>