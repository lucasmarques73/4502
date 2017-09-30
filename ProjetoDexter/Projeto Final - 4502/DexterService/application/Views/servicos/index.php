<a class="button_top_admin" href="?q=admin/servicos/new">Adicionar</a>
<h1 class="title_page">Serviços</h1>

<table class="table" id="table_usuarios" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>
                Titulo
            </th>
            <th>
                Descricao
            </th>
            <th>
                Home?
            </th>
            <th>
                Editar
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->servicos as $servico) {
        ?>
        <tr>
            <td><?= $servico->getTitulo() ?></td>
            <td><?= $servico->getDescricao() ?></td>
            <td><?= $servico->getShowHome() ? 'Y' : 'N' ?></td>
            <td>
                <a class="button_top_admin" href="?q=admin/servicos/edit/<?= $servico->getId() ?>">Editar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
