<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">
        <ul>
            <li class="logo">
                <img src="<?= site_url(); ?>public/img/mushroom-mario.png" width="35" /> 
                    <span style="font-weight: bold;color:crimson;font-size:1.2em;">Mi Gestión de Videojuegos!</span>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>">Inicio</a></li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>jugando">Jugando</a></li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>ranking-anios">Resultados por año</a></li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>ranking-sistemas">Sistemas mas usados</a></li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>sistemas">Sistemas</a></li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>logout">Salir</a></li>
        </ul>
    </div>

</header>