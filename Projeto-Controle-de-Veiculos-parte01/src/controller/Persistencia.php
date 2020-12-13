<?php


namespace Projeto\Pratico\controller;


use Doctrine\ORM\EntityManagerInterface;
use Projeto\Pratico\infra\EntityManagerCreator;
use Projeto\Pratico\model\Motorista;
use Projeto\Pratico\model\Usuario;
use Projeto\Pratico\model\veiculo;

class Persistencia implements InterfaceControleDeRequisicao
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function requisicao(): void
    {

        if ($_POST['identificador'] === 'motorista') {
            $motorista = new Motorista();
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (!is_null($id) && $id !== false) {
                //alterar motorista
                $motorista->setId($id);
                $motorista->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
                $motorista->setTelefone(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
                $motorista->setEndereco(filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING));
                $motorista->setNumero(filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING));
                $motorista->setCnh(filter_input(INPUT_POST, 'cnh', FILTER_SANITIZE_STRING));
                $this->entityManager->merge($motorista);
            } else {
                //cadastrar motorista
                $motorista->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
                $motorista->setTelefone(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
                $motorista->setEndereco(filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING));
                $motorista->setNumero(filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING));
                $motorista->setCnh(filter_input(INPUT_POST, 'cnh', FILTER_SANITIZE_STRING));
                $this->entityManager->persist($motorista);
            }
            $this->entityManager->flush();
            header('Location: /listar-motorista', true, 302);


        }
        if ($_POST['identificador'] === 'veiculo') {
            $veiculo = new veiculo();
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (!is_null($id) && $id !== false) {
                //alterar veiculo
                $veiculo->setId($id);
                $veiculo->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
                $veiculo->setMarca(filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING));
                $veiculo->setAno(filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING));
                $veiculo->setModelo(filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING));
                $veiculo->setCor(filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING));
                $this->entityManager->merge($veiculo);
            } else {
                //Cadastrar veiculo
                $veiculo->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
                $veiculo->setMarca(filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING));
                $veiculo->setAno(filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING));
                $veiculo->setModelo(filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING));
                $veiculo->setCor(filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING));
                $this->entityManager->persist($veiculo);
            }
            $this->entityManager->flush();
            header('Location: /listar-veiculo', true, 302);
        }
        if ($_POST['identificador'] === 'usuario') {
            $usuario = new Usuario();
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
            $senhaHash = password_hash($senha, PASSWORD_ARGON2I);
            if (!is_null($id) && $id !== false) {
                //alterar usuario
                $usuario->setId($id);
                $usuario->setNome(filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING));
                $usuario->setSenha($senhaHash);
                $this->entityManager->merge($usuario);
            } else {
                //cadastrar usuario
                $usuario->setNome(filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING));
                $usuario->setSenha($senhaHash);
                $this->entityManager->persist($usuario);
            }
            $this->entityManager->flush();
            header('Location: /lista-usuario',true,302);

        }
    }
}
