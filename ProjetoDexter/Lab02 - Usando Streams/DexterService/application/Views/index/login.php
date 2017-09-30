<main id="login" class="website">

    <!-- INÍCIO - CORPO DO SITE -->
    <div id="login_website">
        <a href="/?q=index.html" title="Dexter Courier" id="logo_admin">
            <img src="admin/assets/images/logo_dexter.png" alt="Dexter Courier" />
        </a>

        <!-- INÍCIO - FORMULÁRIO DE LOGIN -->
        <form method="post" id="form_login">
            <fieldset>
                <div>
                    <label for="user_login">Usuário:</label>
                    <input class="input_form_login" type="text" name="user_login" id="user_login" />
                </div>
                <div>
                    <label for="pass_login">Senha:</label>
                    <input class="input_form_login" type="password" name="pass_login" id="pass_login" />
                </div>
                <div>
                    <input type="submit" class="button_model" value="Acessar" />
                </div>
                <div>
                    <span class="msg_login msg_login_error">
                        <?= $this->msg ?>
                        <!-- 

                        ESPAÇO PARA MENSAGEM DE ERRO DE LOGIN E LOGOUT
                        PARA ERRO - ATRIBUIR CLASSE msg_login_error
                        PARA LOGOUT - ATRIBUIR CLASSE msg_login_ok

                        -->
                    </span>
                </div>
            </fieldset>
        </form>
        <!-- FIM - FORMULÁRIO DE LOGIN -->
    </div>
    <!-- FIM - CORPO DO SITE -->

</main>
