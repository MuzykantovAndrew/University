<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

<h2>Регистрация</h2>

<form id="form1" action="<?=site_url('/signup')?>" method="post">
    <div class="form-group">
        <label for="login">Логин:</label>
        <input type="text" name="login" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password1">Пароль:</label>
        <input type="password" name="password1" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password2">Повтор:</label>
        <input type="password" name="password2" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="login">E-Mail:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Отправить">
        <input type="reset" class="btn btn-danger" value="Очистить">
    </div>
</form>


<?=$this->endSection()?>