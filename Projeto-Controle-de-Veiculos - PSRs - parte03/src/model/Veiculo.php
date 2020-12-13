<?php


namespace Projeto\Pratico\model;

/**
 * @Entity
 * @table(name="veiculo")
 */
class veiculo implements \JsonSerializable
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
    private $descricao;

    /**
     * @Column(type="string")
     */
    private $marca;

    /**
     * @Column(type="string")
     */
    private $ano;

    /**
     * @Column(type="string")
     */
    private $modelo;

    /**
     * @Column(type="string")
     */
    private $cor;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano): void
    {
        $this->ano = $ano;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor): void
    {
        $this->cor = $cor;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'descricao' => $this->getDescricao(),
            'marca' => $this->getMarca(),
            'ano' => $this->getAno(),
            'modelo' => $this->getModelo(),
            'cor' => $this->getCor(),
        ];
    }
}