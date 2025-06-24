<?php
// Configurações da primeira base de dados
$host1 = 'localhost';
$db1 = 'database1';
$user1 = 'user1';
$pass1 = 'password1';

// Configurações da segunda base de dados
$host2 = 'localhost';
$db2 = 'database2';
$user2 = 'user2';
$pass2 = 'password2';

// Conexão com a primeira base de dados
$conn1 = new mysqli($host1, $user1, $pass1, $db1);
if ($conn1->connect_error) {
    die("Conexão falhou: " . $conn1->connect_error);
}

// Conexão com a segunda base de dados
$conn2 = new mysqli($host2, $user2, $pass2, $db2);
if ($conn2->connect_error) {
    die("Conexão falhou: " . $conn2->connect_error);
}

// Dados a serem inseridos
$nome = 'João';
$email = 'joao@example.com';

// Inserção na primeira base de dados
$sql1 = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
if ($conn1->query($sql1) === TRUE) {
    echo "Registro inserido com sucesso na primeira base de dados.<br>";
} else {
    echo "Erro ao inserir na primeira base de dados: " . $conn1->error . "<br>";
}

// Inserção na segunda base de dados
$sql2 = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
if ($conn2->query($sql2) === TRUE) {
    echo "Registro inserido com sucesso na segunda base de dados.<br>";
} else {
    echo "Erro ao inserir na segunda base de dados: " . $conn2->error . "<br>";
}

// Fechar conexões
$conn1->close();
$conn2->close();
?>
