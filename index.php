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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>php-strong-password-generator</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="./index.php" method="GET">
                    <div class="row">
                        <div class="col-6">
                            <h3>Premi il pulsante per generare una password randomica</h3>
                            <button type="button" class="btn btn-primary">Primary</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>