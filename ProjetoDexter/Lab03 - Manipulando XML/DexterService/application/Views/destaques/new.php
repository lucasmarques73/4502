<h1 class="title_page">Novo Destaque</h1>
<form method="post" class="form_model">
    <fieldset>
        <div class="line_form">
            <label for="titulo" class="label_form">Titulo</label>
            <input 
                type="text"
                class="input_text_form"
                id="titulo"
                name="titulo" />
        </div>
        <div class="line_form">
            <label for="descricao" class="label_form">Descricao</label>
            <input 
                type="text"
                class="input_text_form"
                id="descricao"
                name="descricao" />
        </div>
        <div class="line_form">
            <label for="imagem" class="label_form">Imagem</label>
            <input 
                type="text"
                class="input_text_form"
                id="imagem"
                name="imagem" />
        </div>
        <div class="line_form">
            <input type="submit" class="button_model input_submit_form" value="Salvar" />
        </div>
        <span><?= $this->msg ?></span>
   </fieldset>
</form>
