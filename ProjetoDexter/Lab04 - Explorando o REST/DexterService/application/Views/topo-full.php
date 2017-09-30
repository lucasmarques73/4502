<?php
include __DIR__ . '/topo.php';
?>

<!-- INÍCIO - TOPO DO SITE -->
<header id="header">
<h1 id="logo"><a target="_blank" href="/?q=index.html" title="Dexter Courier">Dexter Courier</a></h1> 

<a href="?q=index/logout" title="Logout" class="icon_nav icon_logout">&nbsp;</a>
</header>
<!-- FIM - TOPO DO SITE -->

<!-- INÍCIO - CORPO DO SITE -->
<div id="body_website">
    <aside>
        <!-- INÍCIO - MENU -->
        <nav>
        <ul>
            <li>
                <a href="?q=/admin" title="Página Inicial Administrador">
                    <span class="icon_nav icon_nav_home"></span>Página Inicial Administrador
                </a>
            </li>
            <li>
                <a title="Administrador">
                    <span class="icon_nav icon_nav_admin"></span>Administrador
                </a>
                <ul class="submenu">
                    <li>
                        <a href="?q=/admin/usuarios" title="Usuários">Usuários</a>
                    </li>
                    <li>
                        <a href="?q=/admin/clientes" title="Clientes">Clientes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="?q=/admin/mensagens" title="Mensagens">
                    <span class="icon_nav icon_nav_msgs"></span>Mensagens
                </a>
            </li>
            <li>
                <a href="?q=/admin/servicos" title="Serviços">
                    <span class="icon_nav icon_nav_servicos"></span>Serviços
                </a>
            </li>
            <li>
                <a title="Home Page Dexter">
                    <span class="icon_nav icon_nav_dexter"></span>Home Page Dexter
                </a>
                <ul class="submenu">
                    <li>
                        <a href="?q=/admin/destaques" title="Destaques">Destaques</a>
                    </li>
                    <li>
                        <a href="?q=/admin/funcionalidades" title="Funcionalidades">Funcionalidades</a>
                    </li>
                </ul>
            </li>
        </ul>
        </nav>
        <!-- FIM - MENU -->
</aside>
<section class="content">

