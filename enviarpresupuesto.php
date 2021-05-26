<?php
if (isset($_POST['enviar'])) {
    if (is_array($_POST['servicio'])) {
        $selected = '';
        $num_servicio = count($_POST['servicio']);
        $current = 0;
        foreach ($_POST['servicio'] as $key => $value) {
            if ($current != $num_servicio-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }
    }
    else {
        $selected = 'Debes seleccionar al menos un servicio';
    }

    echo '<div>Presupuestar los servicios: '.$selected.'</div>';
}    



if (empty($_POST["nombre"])) {
    exit("Falta el nombre");
}

if (empty($_POST["apellido"])) {
    exit("Falta el apellido");
}

if (empty($_POST["correo"])) {
    exit("Falta el correo electronico");
}



$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];


$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
if (!$correo) {
    echo "Correo inválido. Intenta con otro correo.";
    exit;
}

$asunto = "Nuevo mensaje de sitio web";

$datos = "De: $nombre\nCorreo: $correo\napellido: $apellido";
$mensaje = "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\n$datos";

$destinatario = "creativos.faro@gmail.com"; # aquí la persona que recibirá los mensajes

$encabezados .= "De: $nombre <" . $correo . ">\r\n";
$encabezados .= "Reply-To: $nombre <$correo>\r\n";
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados);


if ($resultado) {
    echo "<h1>Mensaje enviado, ¡Gracias por contactarnos!</h1>";
    echo "<p>Tu mensaje se ha enviado correctamente.</p><h2>Importante</h2><p>Revisa tu bandeja de SPAM, en ocasiones mis respuestas quedan ahí. </p>";
} else {
    echo "Tu mensaje no se ha enviado. Intenta de nuevo.";
}


?>