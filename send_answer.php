<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plazma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET["id"];

if(isset($_POST['answer'])) {
  $answer = $_POST['answer'];

  $sql = "SELECT contact FROM messages WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contact = $row["contact"];

    $to = $contact;
    $subject = "Ответ на ваш вопрос";
    $message = "Уважаемый " . $row["name"] . ",\n\n" . $answer;
    $headers = "From: nikitinvadimveiger@gmail.com";

    if(mail($to, $subject, $message, $headers)) {
      echo "Ответ отправлен успешно!";
    } else {
      echo "Ошибка отправки ответа";
    }
  } else {
    echo "Ошибка получения контактных данных";
  }
}
?>