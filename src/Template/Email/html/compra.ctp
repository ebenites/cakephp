<p>Muchas gracias <b><?= $nombres ?></b> por su compra:</p>
<p style="text-align: center; padding: 10px; font-size: 16px; font-weight: bold;"><?= $producto ?></p>

<?php
$content = explode("\n", $content);

foreach ($content as $line):
    echo '<p> ' . $line . "</p>\n";
endforeach;
?>

<p><i>Muchas Gracias</i></p>