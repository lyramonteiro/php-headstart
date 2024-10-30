<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto 01 | Cards</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php include 'layout/header.php'; ?>

    <main class="main__cards">
        <?php
        // Lê o arquivo JSON
        $jsonData = file_get_contents('data/cards.json');
        $data = json_decode($jsonData, true);

        // Verifica se existem cards
        if (isset($data['cards']) && is_array($data['cards'])) {
            // Loop para exibir os cards
            foreach ($data['cards'] as $card) {
                // Estrutura do card
                echo sprintf('<a href="card.php?id=%s" class="person__card">', htmlspecialchars($card['id']));

                echo sprintf('<img src="%s" alt="%s" class="cover">', htmlspecialchars($card['imagem']), htmlspecialchars($card['nome']));

                echo sprintf('<p class="name">%s</p>', htmlspecialchars($card['nome']));
                echo '</a>';
            }
        }
        ?>
    </main>

    <?php include 'layout/footer.php'; ?>
</body>
</html>
