 <?php 
 $name = $_POST["name"];
 $email = $_POST["email"];
 $message = $_POST["message"];
 $to = 'your-email@example.com';
 $subject = 'New message from Website';
 $headers = "From: $email";
 mail($to, $subject, $message, $headers);
 ?>