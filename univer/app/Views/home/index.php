<?=$this->extend('layouts/base.php')?>

<?=$this->section('content')?>

    <h3>Киевский национальный университет им. Тараса Шевченко</h3>
    <img src="<?=base_url('public/assets/img/logo1.jpg')?>"  width="100%">
    



    <div style="margin: 15px">
        <?php if(session('user') === 'admin123'): ?>
            <a href="<?=site_url('/faculties/create')?>">Добавить факультеты</a>
            <?php endif ?>
    </div>

   

        <div id="main-box" class="card-deck" style="margin-top: 10px">
            <?php foreach ($faculties as $f): ?>
            <div class="card">
                <img src="<?=base_url($f['logo'])?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$f['name']?></h5>
                    <p class="card-text"><?=$f['about']?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?=$f['status']?></small>
                    <div>
                        <a href="<?=site_url('/faculties/details/'.$f['id'   ])?>">Информация</a>
                        <?php if(session('user') === 'admin123'): ?>
                            <a href="<?=site_url('/faculties/update/'.$f['id'])?>">Редактирование</a>
                            <a href="<?=site_url('/faculties/delete/'.$f['id'])?>">Удаление</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    <style>
        #main-box img {
            width: 175px;
            height: 175px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
    

<?=$this->endSection()?>