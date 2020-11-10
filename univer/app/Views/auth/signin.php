<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

<h2>Вход</h2>

<form id="form1" action="<?=site_url('/signin')?>" method="post">
    <div class="form-group">
        <label for="login">Логин:</label>
        <input type="text" name="login" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Отправить">
        <input type="reset" class="btn btn-danger" value="Очистить">
    </div>
</form>

<?=$this->endSection()?>