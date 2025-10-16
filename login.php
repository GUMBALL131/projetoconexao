<?php
session_start();
include('conexao.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $email = $_POST['email'];
 $senha = $_POST['senha'];
 
 $sql = "SELECT * FROM usuarios WHERE email = '$email'";
 $resultado = $conn->query($sql);
 if ($resultado->num_rows > 0) {
 $usuario = $resultado->fetch_assoc();

 if (password_verify($senha, $usuario['senha'])) {

 
 $_SESSION['usuario'] = $usuario['nome'];
 echo "<script>alert('Login realizado com sucesso!'); window.location.href='index.html';</script>";
 } else {
 echo "<script>alert('Senha incorreta!'); window.location.href='login.html';</script>";
 }
 } else {
 echo "<script>alert('Usuário não encontrado!'); window.location.href='login.html';</script>";
 }
 $conn->close();
}
?>
