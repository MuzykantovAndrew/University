<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

<h2><?=$title?></h2>


<form id="form3" action="<?=site_url('/faculties/create')?>" method="post">
    <div class="form-group">
        <label for="name">Название:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="alias">Аббревиатура:</label>
        <input type="text" name="alias" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="logo">Логотип:</label>
        <input type="file" name="logo" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Изображение:</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="about"Описание:</label>
        <textarea name="about" rows="10" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="status"Статус:</label>
        <input type="text" name="status" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Отправить">
        <input type="reset" class="btn btn-danger" value="Очистить">
    </div>
</form>

<style>
    #form3 {
        text-align: left;
        width: 50%;
    }
</style>


<?=$this->endSection()?>