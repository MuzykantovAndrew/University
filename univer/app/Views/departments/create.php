<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

<h2>Добавление кафедры <?=$fid?></h2>

<form id="form2" action="<?=site_url('departments/create/'.$fid)?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Название:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="employees">Сотрудники:</label>
        <input type="text" name="employees" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="specialties">Специальности:</label>
        <input type="text" name="specialties" class="form-control" required>
    </div>
        <label for="status">Статус:</label>
        <input type="text" name="status" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Отправить">
        <input type="reset" class="btn btn-danger" value="Очистить">
    </div>
</form>

<style>
    #form2 {
        text-align: left;
    }
</style>


<?=$this->endSection()?>