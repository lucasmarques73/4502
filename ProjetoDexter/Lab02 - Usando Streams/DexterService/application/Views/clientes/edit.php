<h1 class="title_page">Editar Cliente</h1>
<form method="post" class="form_model">
    <fieldset>
        <input type="hidden" value="<?= $this->cliente->getId() ?>" id="id" name="id" />
        <div class="line_form">
            <label for="nome" class="label_form">Nome</label>
            <input 
                type="text"
                class="input_text_form"
                id="nome"
                name="nome"
                value="<?= $this->cliente->getNome() ?>"/>
        </div>
        <div class="line_form">
            <label for="cpf_cnpj" class="label_form">Cpf/Cnpj</label>
            <input 
                type="text"
                class="input_text_form"
                id="cpf_cnpj"
                name="cpf_cnpj"
                value="<?= $this->cliente->getCpfCnpj() ?>"/>
        </div>
        <div class="line_form">
            <label for="telefone" class="label_form">Telefone</label>
            <input 
                type="text"
                class="input_text_form"
                id="telefone"
                name="telefone"
                value="<?= $this->cliente->getTelefone() ?>"/>
        </div>
        <div class="line_form">
            <label for="celular" class="label_form">Celular</label>
            <input 
                type="text"
                class="input_text_form"
                id="celular"
                name="celular"
                value="<?= $this->cliente->getCelular() ?>"/>
        </div>
        <div class="line_form">
            <label for="email" class="label_form">Email</label>
            <input 
                type="text"
                class="input_text_form"
                id="email"
                name="email"
                value="<?= $this->cliente->getEmail() ?>"/>
        </div>
        <div class="line_form">
            <label for="cep" class="label_form">CEP</label>
            <input 
                type="text"
                class="input_text_form"
                id="cep"
                name="cep"
                value="<?= $this->cliente->getCep() ?>"/>
        </div>
        <div class="line_form">
            <label for="estado" class="label_form">Estado</label>
            <input 
                type="text"
                class="input_text_form"
                id="estado"
                name="estado"
                value="<?= $this->cliente->getEstado() ?>"/>
        </div>
        <div class="line_form">
            <label for="bairro" class="label_form">Bairro</label>
            <input 
                type="text"
                class="input_text_form"
                id="bairro"
                name="bairro"
                value="<?= $this->cliente->getBairro() ?>"/>
        </div>
        <div class="line_form">
            <label for="endereco" class="label_form">Endereço</label>
            <input 
                type="text"
                class="input_text_form"
                id="endereco"
                name="endereco"
                value="<?= $this->cliente->getEndereco() ?>"/>
        </div>
        <div class="line_form">
            <label for="cidade" class="label_form">Cidade</label>
            <input 
                type="text"
                class="input_text_form"
                id="cidade"
                name="cidade"
                value="<?= $this->cliente->getCidade() ?>"/>
        </div>
        <div class="line_form">
            <input type="submit" class="button_model input_submit_form" value="Salvar" />
        </div>
        <span><?= $this->msg ?></span>
   </fieldset>
</form>
