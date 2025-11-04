<h2>Criação de páginas</h2>
<form action="?pg=criarpagina" method="post">
    <label>Nome da produto:</label><br>
    <input type="text" name ="produto"><br>
    <label >Descrição:</label><br>
    <input type="text" name="descricao"><br>
    <label>Preço:</label><br>
    <input type="number" name="preco"><br>
    <label>Imagem do produto (URL):</label><br>
    <input type="text" name="imagem"><br>
    <label>Texto do produto:</label><br>
    <textarea rows="10" cols="50" name="texto"></textarea><br>
    <br>
    <input type="submit" value="Criar página"><br><br>
    <a href="?pg=paginas">Voltar</a>
</form>