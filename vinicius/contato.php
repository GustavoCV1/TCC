<div class = "row">
    <div class = "col-1"></div>
    <div class = "col-10">
        <form method="POST" action="Contato.controller.php" > 
            <div class="form-group">
                <br/>
                <br/>
                <label for="nome"> Nome:</label> <input type="text" name="nome" class = "form-control" placeholder="Digite seu nome" />
                <br/>
            </div>
            <div class="form-group">
                <label for="email"> Email: </label> <input type="text" name="email" class = "form-control" placeholder="Digite seu email" />
                <br/>
            </div>
            <div class="form-group">
                <label for="assunto"> Mensagem: </label> <textarea name = "assunto" rows="5" class="form-control" placeholder="Digite sua Mensagem"></textarea>
                <br/>
            </div>
            <button type="submit" class="btn btn-dark" name = "acao" /> Enviar </button>
        </form>
    </div>
    <div class = "col-1"></div>
</div>

<br/>