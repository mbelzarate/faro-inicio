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
?>