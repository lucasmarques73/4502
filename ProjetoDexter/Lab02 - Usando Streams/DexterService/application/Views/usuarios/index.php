<a class="button_top_admin" href="?q=admin/usuarios/new">Adicionar</a>
<h1 class="title_page">Usuários</h1>

<table class="table" id="table_usuarios" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>
                Login
            </th>
            <th>
                Editar
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->users as $user) {
        ?>
        <tr>
            <td><?= $user->getLogin() ?></td>
            <td>
                <a class="button_top_admin" href="?q=admin/usuarios/edit/<?= $user->getId() ?>">Editar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
