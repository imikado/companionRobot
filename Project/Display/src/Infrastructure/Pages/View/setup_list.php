<?php

use App\Infrastructure\Pages\SetupPage;

?>
<style>
    table tr th,
    table tr td {
        border-collapse: collapse;
        border: 1px solid white;
    }
</style>
<h1>Contacts</h1>
<table>
    <tr>
        <thead>
            <th>Name</th>
            <th>Url</th>
            <th>Action</th>
        </thead>
    </tr>

    <?php if (!empty($this->contextList['contactList'])): ?>
        <?php foreach ($this->contextList['contactList'] as $keyLoop => $contactLoop): ?>
            <tr>
                <tbody>
                    <td><?php echo $contactLoop->name ?></td>
                    <td><?php echo $contactLoop->url ?></td>
                    <td><a href="<?php echo getLink(SetupPage::PAGE_EDIT, ['id' => $keyLoop]) ?>">Edit</a></td>

                </tbody>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <tbody>
                <td colspan="3">no contact</td>
            </tbody>
        </tr>
    <?php endif; ?>

</table>
<form action="" method="POST"><input type="hidden" name="action" value="<?php echo SetupPage::ACTION_ADD ?>" /><input type="submit" value="Add" /></form>