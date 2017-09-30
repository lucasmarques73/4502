<h1 class="title_page">Editar Usuário</h1>
<form method="post" class="form_model">
    <fieldset>
        <input type="hidden" value="<?= $this->user->getId() ?>" id="id" name="id" />
        <div class="line_form">
            <label for="login_usuario" class="label_form">Login</label>
            <input 
                type="text"
                class="input_text_form"
                id="login_usuario"
                name="login_usuario"
                value="<?= $this->user->getLogin() ?>"/>
        </div>
        <div class="line_form">
            <input type="submit" class="button_model input_submit_form" value="Salvar" />
        </div>
        <span><?= $this->msg ?></span>
   </fieldset>
</form>
