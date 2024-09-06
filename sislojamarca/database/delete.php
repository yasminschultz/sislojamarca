<?php
require_once "../database/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $area = $_POST['area'];

    $sql = '';
    

    if ($area === 'usuario') {
        try {        
            $sql = "DELETE FROM usuario WHERE IDSuap = :IDSuap";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':IDSuap', $IDSuap, PDO::PARAM_STR); 
        
            if ($stm->execute()) {
                echo "<script>alert('Registro excluído com sucesso!')<script>";
                header('location: ../' . $area . '.php');
            } else {
                echo "Erro ao excluir registro: " . $stmt->errorInfo()[2];
                header('location: ../' . $area . '.php');
            }
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    } elseif ($area === 'marca') {
        try {
            $conn->beginTransaction();
    
            // Seleciona os IDs dos celulares associados à marca
            $stm = $conn->prepare("SELECT CBarra FROM produto WHERE IDMarca = :IDMarca");
            $stm->bindParam(':IDMarca', $id);
            $stm->execute();
            $produto = $stm->fetchAll(PDO::FETCH_COLUMN);
    
            // Deleta os celulares
            foreach ($produto as $CBarra) {
                $stm = $conn->prepare("DELETE FROM produto WHERE CBarra = :CBarra");
                $stm->bindParam(':CBarra', $CBarra);
                $stm->execute();
            }
    
            // Deleta a marca
            $stm = $conn->prepare("DELETE FROM marca WHERE IDMarca = :IDMarca");
            $stm->bindParam(':IDMarca', $IDMarca);
            $stm->execute();
    
            $conn->commit();
            echo '<script>alert("Marca e produtos associados excluídos com sucesso!");</script>';
            header('location: ../../' . $area . '.php');
        } catch (PDOException $e) {
            $conn->rollBack();
            echo 'Erro ao deletar marca: ' . $e->getMessage();
        } catch (Exception $e) {
            $conn->rollBack();
            echo 'Erro inesperado: ' . $e->getMessage();
        }
        //AINDA NÃO MECHI APARTI DAQUI DEBAIXO
    } elseif ($area === 'produto') {
        $stm = $conn->prepare("SELECT COUNT(*) FROM venda WHERE celular_id = :id");
        $stm->bindParam(':id', $id);
        $stm->execute();
        $count = $stm->fetchColumn();
    
        if ($count > 0) {
            $sql = "DELETE FROM venda WHERE celular_id = :id";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id', $id);
            if (!$stm->execute()) {
                die("Erro ao deletar as vendas: " . $stm->errorInfo()[2]);
            }
        }
    
        // Deletar o produto
        $sql = "DELETE FROM produto WHERE CBarra = :CBarra";
        $stm = $conn->prepare($sql);
        $stm->bindParam(':CBarra', $id);
        if ($stm->execute()) {
            echo '<script>alert("Produto deletado com sucesso!");</script>';
            header('location: ../../' . $area . '.php');
            exit();
        } else {
            echo '<script>alert("Erro ao deletar o produto: ' . $stmt->errorInfo()[2] . "</script>";
        }
    }
    } 
