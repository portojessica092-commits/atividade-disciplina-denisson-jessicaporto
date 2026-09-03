<?php
class Conexao {private static  $instancia=null;
public static  function getConecao(){
   if(self::$instancia===null){
      try {
           <self::$instancia = new PDO("mysql:host;dbname=novo;jessica123456
           self::$instancia->setAtribut(PDO::attr::errmode,
           PDO::errmode_exception,
           