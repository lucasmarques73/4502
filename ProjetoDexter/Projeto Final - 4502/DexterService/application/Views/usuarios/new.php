<h1 class="title_page">Novo Usuário</h1>
<form method="post" class="form_model">
    <fieldset>
        <div class="line_form">
            <label for="login_usuario" class="label_form">Login</label>
            <input type="text" class="input_text_form" id="login_usuario" name="login_usuario" />
        </div>
        <div class="line_form">
            <label for="senha_usuario" class="label_form">Senha do Usuário</label>
            <input type="password" class="input_text_form" id="senha_usuario" name="senha_usuario" />
        </div>
        <div class="line_form">
            <label for="conf_senha_usuario" class="label_form">Confirmar Senha do Usuário</label>
            <input type="password" class="input_text_form" id="conf_senha_usuario" name="conf_senha_usuario" />
        </div>
        <div class="line_form">
            <input type="submit" class="button_model input_submit_form" value="Salvar" />
        </div>
        <span><?= $this->msg ?></span>
    </fieldset>
</form>
