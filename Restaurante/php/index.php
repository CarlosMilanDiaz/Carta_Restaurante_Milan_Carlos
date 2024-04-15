<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    $menu = simplexml_load_file('../xml/carta.xml');
    $tipo_plato = array();
    
    foreach ($menu->plato as $plato) {
        $tipo = (string)$plato['tipo'];
        $tipo_plato[$tipo][] = $plato;
}


    foreach (array('Tapas') as $tipo) {
        echo '<div class="columna">';
        echo '<h2>' . ucfirst($tipo) . '</h2>';
        foreach ($tipo_plato[$tipo] as $plato) {
        imprimirPlato($plato);
        }
    echo '</div>';
}
    function imprimirPlato($plato) {
    echo '<div class="plato">';
    echo '<h3>' . $plato->nombre . '</h3>';
        if (!empty($plato->imagen)) {
        echo $plato->nombre . '">';
    }
    echo '<p><strong>Precio:</strong> ' . $plato->precio . '</p>';
    echo '<p><strong>Descripción:</strong> ' . $plato->descripcion . '</p>';
    echo '<p><strong>Calorías:</strong> ' . $plato->cal . '</p>';
    echo '<p><strong>Características:</strong>';
    echo '<ul>';
        foreach ($plato->ingredientes->categoria as $categoria) {
            echo '<li>' . $categoria . '</li>';
        }
    echo '</ul></p>';
    echo '</div>';
}
    ?>
    <div class="columnas">
    <?php
    foreach (array('Parrilla', 'Pescado') as $tipo) {
        echo '<div class="columna">';
        echo '<h2>' . ucfirst($tipo) . '</h2>';
            foreach ($tipo_plato[$tipo] as $plato) {
            imprimirPlato($plato);
        }   
        echo '</div>';
    }

                ?>
            </div>
            <div class="columnas-container">
            <div class="columnas">
                <?php
                // Imprimir refrescos en columnas
                foreach ($tipo_plato['Postres'] as $plato) {
                    echo '<div class="columna">';
                    echo '<h2>Postres</h2>';
                    imprimirPlato($plato);
                    echo '</div>';
                }
                ?>
            </div>
            <div class="columnas">
                <?php
                // Imprimir vinos en columnas
                foreach ($tipo_plato['Bebida'] as $plato) {
                    echo '<div class="columna">';
                    echo '<h2>Bebida</h2>';
                    imprimirPlato($plato);
                    echo '</div>';
                }
                ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>