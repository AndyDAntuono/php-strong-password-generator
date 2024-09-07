<?php
// Funzione per generare la password
function generaPassword($lunghezza) {
    $caratteri = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=";
    $password = "";
    $caratteri_length = strlen($caratteri);

    for ($i = 0; $i < $lunghezza; $i++) {
        $random_index = rand(0, $caratteri_length - 1);
        $password .= $caratteri[$random_index];
    }

    return $password;
}

// Variabile per la password generata
$password_generata = '';

// Verifica se il parametro "lunghezza" è stato inviato tramite GET
if (isset($_GET['lunghezza'])) {
    $lunghezza = intval($_GET['lunghezza']);

    // Genera la password solo se la lunghezza è valida
    if ($lunghezza > 0) {
        $password_generata = generaPassword($lunghezza);
    }
}
?>
