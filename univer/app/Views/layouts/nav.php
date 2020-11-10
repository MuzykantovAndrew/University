<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?=site_url('/index')?>">Univer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
             <li class="nav-item">
               <a class="nav-link" href="<?=site_url('/index')?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=site_url('/about')?>">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=site_url('/contacts')?>">Contacts</a>
              </li>
            </ul>
            <ul class="navbar-nav mr-right">
                <?php if (empty(session('user'))): ?>
                    <li class="nav-item" style="margin-right:50px">
                        <a class="nav-link active">Приветсвуем Вас, Гость</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('/signin')?>">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('/signup')?>">Регистрация</a>
                    </li>
                <?php else: ?> 
                    <li class="nav-item" style="margin-right:50px">
                        <a class="nav-link active">Приветсвуем Вас, <?= session('user')?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('/signout')?>">Выход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('/profile')?>">Профиль</a>
                    </li>
                <?php endif ?>  
            </ul>
        </div>
    </div>
</nav>