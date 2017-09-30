<a class="button_top_admin" href="?q=admin/mensagens/new">Adicionar</a>
<h1 class="title_page">Mensagens</h1>

<table class="table" id="table_usuarios" border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>
                Nome
            </th>
            <th>
                Assunto
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
        foreach ($this->mensagens as $mensagem) {
        ?>
        <tr>
            <td><?= $mensagem->getNome() ?></td>
            <td><?= $mensagem->getAssunto() ?></td>
            <td><?= $mensagem->getEmail() ?></td>
            <td>
                <a class="button_top_admin" href="?q=admin/mensagens/edit/<?= $mensagem->getId() ?>">Editar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
