<?php

namespace Projeto\Pratico\model;

/**
 * @Entity
 * @table(name="usuario")
 */
class Usuario implements \JsonSerializable
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nome;
    /**
     * @Column(type="string")
     */
    private $senha;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    public function senhaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'senha' => $this->getSenha(),
        ];
    }
}