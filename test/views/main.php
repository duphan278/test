<a href="<?= BASE_URL . '?action=create' ?>">them san pham</a>
<table border="1">
    <tr>
        <td>stt</td>
        <td>ten</td>
        <td>tuoi</td>
        <td>anh</td>
    </tr>

    <?php foreach($userList as $item){ ?>
        <tr>
            <td><?= $item['ID'] ?></td>
            <td><?= $item['Name'] ?></td>
            <td><?= $item['Age'] ?></td>
            <td><img src="<?= BASE_ASSETS_UPLOADS . $item['Avatar_url'] ?>" alt="" width="400">
        </td>
            <td><a href="<?= BASE_URL . '?action=chitiet&ID=' . $item['ID'] ?>">CHITIET</a></td>
            <td><a href="<?= BASE_URL . '?action=delete&ID=' . $item['ID'] ?>">XOA</a></td>
            
        </tr>
        <?php } ?>
</table>