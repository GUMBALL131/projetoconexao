<?php
include('conexao.php') ; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $endereco = $_POST['endereco'];
    $cpf = $_POST ['cpf'];
    $cep = $_POST['cep'];
    $sql = "INSERT INTO usuarios (nome, email, senha, endereco, cpf, cep) VALUES ('$nome', '$email', '$senha', '$endereco', '$cpf', '$cep')";
                                      
IF ($conn->query($sql) === TRUE) {

    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.html' ;</script>";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
}
?>