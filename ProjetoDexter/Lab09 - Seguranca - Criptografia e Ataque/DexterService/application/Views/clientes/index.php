<a class="button_top_admin" href="?q=admin/clientes/new">Adicionar</a>
<h1 class="title_page">Clientes</h1>

<table class="table" id="table_clientes" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>
                Nome
            </th>
            <th>
                CPF/CNPJ
            </th>
            <th>
                Email
            </th>
            <th>
                Editar
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->clientes as $cliente) {
        ?>
        <tr>
            <td><?= $cliente->getNome() ?></td>
            <td><?= $cliente->getCpfCnpj() ?></td>
            <td><?= $cliente->getEmail() ?></td>
            <td>
                <a class="button_top_admin" href="?q=admin/clientes/edit/<?= $cliente->getId() ?>">Editar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
