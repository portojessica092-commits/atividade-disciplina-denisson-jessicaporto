<?php
class Conexao {
   private static  $instancia=null;

   public static  function getConecao(){
      if(self::$instancia===null){
         try {
            self::$instancia = new PDO("mysql:host;dbname=novo;charset=utf8", "jessica", "123456");
            self::$instancia->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch ( PDOException $e) {
               die ("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
      }
      return self::$instancia;
   }
}
?>