<?php

namespace Projeto\Pratico\model;

/**
 * @Entity
 * @table(name="motorista")
 */
class Motorista implements \JsonSerializable
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
    private $telefone;
    /**
     * @Column(type="string")
     */
    private $endereco;
    /**
     * @Column(type="string")
     */
    private $numero;
    /**
     * @Column(type="string")
     */
    private $cnh;

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

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    public function getCnh()
    {
        return $this->cnh;
    }

    public function setCnh($cnh): void
    {
        $this->cnh = $cnh;
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'telefone' => $this->getTelefone(),
            'endereco' => $this->getEndereco(),
            'numero' => $this->getNumero(),
            'cnh' => $this->getCnh(),
        ];
    }
}