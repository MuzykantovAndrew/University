<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

<h2><?=$title?></h2>

<hr>

<section id="deps">
    <h3>Группы</h3>
    <table border="1">
        <tr>
            <th class="c1">Название</th>
            <th class="c2">Учащиеся</th>
            <th class="c2">Староста</th>
            <th class="c1">Управление</th>
        </tr>
        <?php foreach($groups as $g): ?>
            <tr>
                <td><?=$g['name']?></td>
                <td><?=$g['students']?></td>
                <td><?=$g['headman']?></td>
                <td>
                    <div>
                        <a href="<?=site_url('/groups/details/'.$g['id'])?>">Информация</a>
                        <?php if(session('user') === 'admin123'): ?>
                            <a href="<?=site_url('/groups/update/'.$g['id'])?>">Редактирование</a>
                            <a href="<?=site_url('/groups/delete/'.$g['id'])?>">Удаление</a>
                        <?php endif ?>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php if(session('user') === 'admin123'): ?>
            <p>
            <a href="<?=site_url('/departments/create/'.$group['id'])?>">Добавить группу</a>
            </p>
            <?php endif ?>
</section>




<?=$this->endSection()?>