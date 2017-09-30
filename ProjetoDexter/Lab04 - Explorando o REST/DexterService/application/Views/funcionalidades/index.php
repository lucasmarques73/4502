<a class="button_top_admin" href="?q=admin/funcionalidades/new">Adicionar</a>
<h1 class="title_page">Funcionalidades</h1>

<table class="table" id="table_funcionalidades" border="0" cellspacing="0" cellpadding="0">
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
        foreach ($this->funcionalidades as $funcionalidade) {
        ?>
        <tr>
            <td><?= $funcionalidade->getTitulo() ?></td>
            <td><?= $funcionalidade->getDescricao() ?></td>
            <td>
                <a class="button_top_admin" href="?q=admin/funcionalidades/edit/<?= $funcionalidade->getId() ?>">Editar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
