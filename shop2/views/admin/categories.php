<h2>Управление категориями</h2>
<h3>
   
    <table border="1" width="50%" align="center">
    <tr>
    <th>Id</th>
    <th>Категория</th>
    <th>Управление</th>
    </tr>
    <?php foreach($categories as $item) { ?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['name']?></td>
            <td>
            |
            <a href="/<?=BASEDIR?>/admin/del_category/<?=$item['id']?>">Удалить </a>
            |
            <a href="/<?=BASEDIR?>/admin/edit_category/<?=$item['id']?>">Изменить </a>
            |
            </td>
        </tr>
    <?php }?>
    </table>
</h3>