<?php
include_once("../libs/global.php");

// define("TAMANHO_RG", 8);
define('VAZIO', '');

class Cliente extends persist
{
  //private int $id;
  private string $nome;
  private string $sobrenome;
  private string $rg = '';
  private string $passaporte = '';
  private string $email;
  // private string $documentoIdentifi;

  static $local_filename = "clientes.txt";

  public function __construct(string $nome, string $sobrenome, string $documentoIdentifi,string $email)
  {
    $this->setNome($nome);
    $this->setSobrenome($sobrenome);
    $this->setEmail($email);
    $this->setDocumentoIdentificacao($documentoIdentifi);
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome(string $nome)
  {
    $this->nome = $nome;
  }

  public function getSobrenome()
  {
    return $this->sobrenome;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setEmail(string $email){
    $this->email = $email;
  }

  public function setSobrenome(string $sobrenome)
  {
    $this->sobrenome = $sobrenome;
  }

  public function getDocumentoIdentificacao()
  {
    if ($this->rg == VAZIO) {
      return $this->getPassaporte();
    } else {
      return $this->getRg();
    }
  }

  public function setDocumentoIdentificacao(string $documentoIdentificacao)
  {
    // Vamos aceitar o rg so com numeros, tipo 11111111, oito digitos sem ponto ou hifen
    // O passaporte tem duas letras no começo, tipo AA11111.
    if (is_numeric($documentoIdentificacao)) {
      $this->setRg($documentoIdentificacao);
    } else {
      $this->setPassaporte($documentoIdentificacao);
    }
  }

  public function getRg()
  {
    return $this->rg;
  }

  public function setRg(string $rg)
  {
    $this->rg = $rg;
  }

  public function getPassaporte()
  {
    return $this->passaporte;
  }

  public function setPassaporte(string $passaporte)
  {
    $this->passaporte = $passaporte;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
