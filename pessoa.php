<?php
// Inclui o arquivo de conexão para garantir que a classe Conexao esteja disponível
require_once 'conexao.php';

// Declaração da classe Pessoa para manipular os dados da entidade pessoa
class Pessoa {
    // Atributos privados correspondentes aos campos da tabela no banco
    private $id;
    private $nome;
    private $user;
    private $email;

    // Construtor da classe para inicializar os atributos com valores opcionais
    public function __construct($id = null, $nome = null, $user = null, $email = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->user = $user;
        $this->email = $email;
    }

    // Método para inserir um novo registro no banco de dados (Create)
    public function inserir() {
        try {
            // Obtém a instância da conexão PDO através da classe Conexao
            $pdo = Conexao::getConexao();
            // Define a instrução SQL com marcadores para prevenir SQL Injection
            $sql = "INSERT INTO pessoa (nome, user, email) VALUES (:nome, :user, :email)";
            // Prepara a query SQL no PDO
            $stmt = $pdo->prepare($sql);
            
            // Executa a query passando um array associativo vinculando os valores aos marcadores
            $stmt->execute([
                ':nome' => $this->nome,
                ':user' => $this->user,
                ':email' => $this->email
            ]);

            // Retorna verdadeiro se pelo menos uma linha foi inserida com sucesso
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Retorna falso caso ocorra algum erro na execução
            return false;
        }
    }

    // Método estático para listar todos os registros cadastrados (Read)
    public static function listarTodos() {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT id, nome, user, email FROM pessoa";
            $stmt = $pdo->query($sql);
            // Retorna todos os registros obtidos em formato de array associativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // Método estático para buscar um registro específico filtrando pelo ID (Read por ID)
    public static function buscarPorId($id) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT id, nome, user, email FROM pessoa WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            // Retorna um único registro encontrado como array associativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    // Método para atualizar os dados de um registro existente (Update)
    public function atualizar() {
        try {
            $pdo = Conexao::getConexao();
            $sql = "UPDATE pessoa SET nome = :nome, user = :user, email = :email WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':id' => $this->id,
                ':nome' => $this->nome,
                ':user' => $this->user,
                ':email' => $this->email
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Método estático para excluir um registro com base no ID (Delete)
    public static function deletar($id) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "DELETE FROM pessoa WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>