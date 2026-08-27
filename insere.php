<?php
         ini_set('display_erros', 1); ini_set('display_startup_erros', 1); erro_reporting(E_ALL);
         
        //verifica se existe conexao com bd,caso nao tenta criar uma nova
        $conexao = mysqli_connect("localhost","root","") //porta, usuario, senha
        or die("Erro na conexao com banco de dados");//caso nao consiga conectar mostra a 
                                                    //mensagem de erro mostrada na conexao

        $select_db = mysqli_select_db($conexao, "novo"); //seleciona o banco de dados

        //abaixo atribuimos os valores provenientes do formulario pelo metodo POST
        $nome = $_POST["nome"];
        $user = $_POST["user"];
        $eamail = $_POST["email"];

        $string_sql = "INSERT INTO pessoa (id,nome,user,email) VALUE (null, '$nome', '$user','$email')";
        
        mysqli_query($conexao, $string_sql); //realizar a consulta

        if (mysqli_affected_rows($conexao) == 1) { // Verifica se foi afetada alguma linha, nesse caso inserida alguma linha
    echo "<p>Cadastro feito com sucesso.</p>";
    echo '<a href="index.html">Voltar para pagina principal da empresa</a>'; // Apenas um link para retornar para o site da empresa
} else {
    echo "Erro, não foi possível inserir no banco de dados";
}
 mysqli_close($conexao); //fechar conexao com banco de dados
?>




?>