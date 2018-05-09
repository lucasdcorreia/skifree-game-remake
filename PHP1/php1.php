<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Formulário de Contato</h1>
        <p>
            Por favor, preencha o formulário abaixo e clique no botão Enviar Mensagem. Agradecemos por seu contato.
        </p>
        <form action="script.php"> <!-- Script php que ira ser processado quando do envio do formulário -->
            <fieldset>
                <legend>Dados Básicos</legend>
                <label for="nome">Nome</label>
                <input type="text" name="nome">
                <br>
                <label for="email">Email</label>
                <input type="email" name="email">
                <br>
                <label for="Website">Website</label>
                <input type="url" name="website" value="http://">
                <br>
                
            </fieldset>
            <fieldset>
                <legend>Digite sua Mensagem</legend>
                <textarea name="mensagem" rows="4" cols="50">Este é o valor padrão!
                </textarea>
            </fieldset>
            <p>
                <input type="reset" value="Resetar Dados">
                <input type="submit" value="Enviar Mensagem">
            </p>
        </form>
    </body>
</html>