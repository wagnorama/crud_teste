<?php
require_once "/../model/pdo/class.wpdo.php";


class clientesController
{
    public $db = '';
    public $config = array();
    public $tabela = 'clientes';


    public function __construct()
    {
        $this->db = new wpdo();
    }

    public function redirect($location)
    {
        header('Location: ' . $location);
    }

    /**
     * Operações CRUD do controller
     *
     */

    public function handleRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL;
        try {
            if (!$op || $op == 'list') {
                $this->listAll();
            } elseif ($op == 'new') {
                $this->save();
            } elseif ($op == 'delete') {
                $this->delete();
            } elseif ($op == 'edit') {
                $this->edit();
            } elseif ($op == 'ini') {
                $this->redirect(DIR . '/index.php');
            } else {
                $this->showError("Pagina não encontrada", "Não foi localizado a pagina requisitada.");
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    /**
     * Listar regitros
     * @return array|bool|PDOStatement
     *
     */

    public function listAll()
    {

        $clientes = $this->db->list_rows($this->tabela, '');
        include '/../view/clientes/list.php';

    }

    /**
     * Adicionar Registro
     * @param $dados
     * @return array
     */

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados = $_POST;

            //Pasta de destino das imagens dos clientes
            $destino = $_SERVER['DOCUMENT_ROOT'] . DIR . DIR_IMG . $_FILES['imagem']['name'];

            $arquivo_tmp = $_FILES['imagem']['tmp_name'];

            $dados['imagem'] = $_FILES['imagem']['name'];

            // Verifica se é uma imagem
            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES['imagem']['type'])) {
                $error[] = "Erro: Não foi possivel incluir a imagem, favor inclua apenas imagens.";
            }


            if (!isset($error)) {
                move_uploaded_file($arquivo_tmp, $destino);
                try {
                    $this->db->insert($this->tabela, $dados);
                    $this->listAll();
                    return;
                } catch (ValidationException $e) {
                    $errors = $e->getErrors();
                }
            }

        }

        include '/../view/clientes/add.php';
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        if (!$id) {
            throw new Exception('Internal error.');
        }
        $condition = array('id' => $id);

        $cliente = $this->db->list_one($this->tabela, $condition);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = $_POST;

            if (!empty($_FILES['imagem']['name'])) {
                //Pasta de destino das imagens dos clientes
                $destino = $_SERVER['DOCUMENT_ROOT'] . DIR . DIR_IMG . $_FILES['imagem']['name'];

                $arquivo_tmp = $_FILES['imagem']['tmp_name'];

                $dados['imagem'] = $_FILES['imagem']['name'];

                // Verifica se é uma imagem
                if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_FILES['imagem']['type'])) {
                    $error[] = "Erro: Não foi possivel incluir a imagem, favor inclua apenas imagens.";
                }

                if(!isset($error)) {
                    // Removendo imagem da pasta img/
                    unlink($_SERVER['DOCUMENT_ROOT'] . DIR . DIR_IMG . $cliente['imagem'] . "");

                    //Salvando a nova imagem
                    move_uploaded_file($arquivo_tmp, $destino);
                }

            }

            try {
                $this->db->update($this->tabela, $dados, $condition);
                $this->listAll();
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include '/../view/clientes/edit.php';
    }

    public function delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        if (!$id) {
            throw new Exception('Internal error.');
        }
        $condition = array('id' => $id);

        //Removendo a foto do cliente
        $cliente = $this->db->list_one($this->tabela, $condition);

        // Removendo imagem da pasta img/
        unlink($_SERVER['DOCUMENT_ROOT'] . DIR . DIR_IMG . $cliente['imagem'] . "");

        $this->db->delete($this->tabela, $condition);
        $this->listAll();

    }

    /**
     * Mostrar Pagina de erro
     * @param $title
     * @param $message
     */
    public  function showError($title, $message)
    {

        include '/../view/error.php';
    }
}