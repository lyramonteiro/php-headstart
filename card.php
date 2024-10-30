<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Card</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body> 
    <?php include 'layout/header.php'; ?>

    <main class="page__character__detail">
        <?php
        // Verifica se um ID foi fornecido
        if (!isset($_GET['id'])) {
            echo '<section class="error__id">';
            echo '<h2 class="text">Erro: ID não fornecido</h2>';
            echo '<a href="index.php" class="button">Voltar para a página inicial</a>';
            echo '</section>';
            exit;
        }

        // Lê o arquivo JSON
        $jsonData = file_get_contents('data/cards.json');
        $data = json_decode($jsonData, true);

        // Procura o card com o ID correspondente
        $cardEncontrado = null;
        foreach ($data['cards'] as $card) {
            if ($card['id'] == $_GET['id']) {
                $cardEncontrado = $card;
                break;
            }
        }

        // Verifica se o card foi encontrado
        if ($cardEncontrado) {
            echo '<section class="character__detail">';
            echo sprintf('<h2>%s</h2>', htmlspecialchars($card['nome']));
            echo sprintf('<img src="%s" alt="%s" class="cover">', htmlspecialchars($card['imagem']), htmlspecialchars($card['nome']));
            echo '</section>';
        } else {
            echo '<section class="error__id">';
            echo '<h2 class="text">Erro: ID não fornecido</h2>';
            echo '<a href="index.php" class="button">Voltar para a página inicial</a>';
            echo '</section>';
        }
        ?>
    </main>

    <?php include 'layout/footer.php'; ?>
</body>
</html>
