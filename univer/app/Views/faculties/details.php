<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

<h2><?=$title?></h2>
<div class="image">
    <img src="<?=base_url($faculty['logo'])?>" width="150">
</div>
<h3><?=$faculty['name']?></h3>
<div class="image">
    <img src="<?=base_url($faculty['logo'])?>" width="100%">
</div>
<h6><p><?=$faculty['about']?></p></h6>

<hr>

<section id="deps">
    <h3>Кафедры факультета</h3>
    <table border="1">
        <tr>
            <th class="c1">Название</th>
            <th class="c2">Сотрудники</th>
            <th class="c2">Специальности</th>
            <th class="c1">Управление</th>
        </tr>
        <?php foreach($departments as $d): ?>
            <tr>
                <td><?=$d['name']?></td>
                <td><?=$d['employees']?></td>
                <td><?=$d['specialties']?></td>
                <td>
                    <div>
                        <a href="<?=site_url('/departments/details/'.$d['id'])?>">Информация</a>
                        <?php if(session('user') === 'admin123'): ?>
                            <a href="<?=site_url('/departments/update/'.$d['id'])?>">Редактирование</a>
                            <a href="<?=site_url('/departments/delete/'.$d['id'])?>">Удаление</a>
                        <?php endif ?>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php if(session('user') === 'admin123'): ?>
            <p>
            <a href="<?=site_url('/departments/create/'.$faculty['id'])?>">Добавить кафедру</a>
            </p>
            <?php endif ?>
</section>



<style>
    .image{
        margin: 15px;
    }
    p{
        text-align: justify;
        text-indent: 45px;
    }
    section{
        border: 1px solid silver;
        border-radius: 15px;
        padding: 15px;    
    }

    section table{
        width: 100%;
    }
    section td,
    section tr{
        width: 10px;
    }

    .c1 {
        width: 30%;
    }
    .c2 {
        width: 20%;
    }

</style>
<?=$this->endSection()?>