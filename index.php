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
                <h1 class="m-auto mb-5">Generatore di Password Sicura</h1>
                <!-- Form per l'invio della lunghezza della password -->
                <div class="mb-5">
                    <form method="GET" action="">
                        <label for="lunghezza">Lunghezza password:</label>
                        <input type="number" id="lunghezza" name="lunghezza" min="1" max="100" required>
                        <button type="button">Genera Password</button>
                    </form>
                </div>
                <div class="mb-5">
                    <?php if (!empty($password_generata)): ?>
                        <h2>La tua password generata è:</h2>
                        <p><strong><?php echo $password_generata; ?></strong></p>
                        <?php elseif (isset($_GET['lunghezza']) && $lunghezza <= 0): ?>
                            <p>Inserisci una lunghezza valida.</p>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>