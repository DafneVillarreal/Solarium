<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['correo'];
        $conn = new mysqli('localhost', 'root', '', 'solarium');
        
        $stmt = $conn->prepare('SELECT id_empleado FROM empleados WHERE Email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $token = bin2hex(random_bytes(50)); 

            $stmt = $conn->prepare('UPDATE empleados SET token = ?, token_expira = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id_empleado = ?');
            $stmt->bind_param('si', $token, $user['id_empleado']);
            $stmt->execute();

            // Enviar el correo
            $subject="Recuperación de contraseña";
            $resetLink = "https://localhost/Solarium/validar_token.php?token=" . $token;
            $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: " . $resetLink;
            $headers='From: solar.energy.solarium@gmail.com'."\r\n". 
            'Reply-To: solar.energy.solarium@gmail.com';

            if(mail($email,$subject,$message,$headers)){
                echo "el correo enviado a $to fue exitoso";
            }else{
                echo "el correo no se pudo enviar";
            }

            header("Location: index.php");

            header("Location: index.php");
        } else {
            echo "El correo no está registrado.";
        }
    }
?>
