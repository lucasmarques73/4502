<a class="button_top_admin" href="?q=admin/destaques/new">Adicionar</a>
<h1 class="title_page">Destaques</h1>

<table class="table" id="table_destaques" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>
                Titulo
            </th>
            <th>
                Descricao
            </th>
            <th>
                Editar
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->destaques as $destaque) {
        ?>
        <tr>
            <td><?= $destaque->getTitulo() ?></td>
            <td><?= $destaque->getDescricao() ?></td>
            <td>
                <a class="button_top_admin" href="?q=admin/destaques/edit/<?= $destaque->getId() ?>">Editar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
