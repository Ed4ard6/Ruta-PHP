<?php
$mensaje = $_SESSION['flash'] ?? '';
$_SESSION['flash'] = '';

$palabra = $_SESSION['palabra'];
$descubiertas = $_SESSION['descubiertas'];
$intentos = $_SESSION['intentos'];
$letras = $_SESSION['letras'];

$estado_final = null;
if ($intentos >= MAX_INTENTOS && $descubiertas === str_repeat('_', mb_strlen($palabra))) {
    $estado_final = "Perdiste sin adivinar una sola letra.";
} elseif ($intentos >= MAX_INTENTOS) {
    $estado_final = "¡Has perdido! La palabra era '$palabra'.";
} elseif ($descubiertas === $palabra) {
    $estado_final = "¡Felicidades! Adivinaste la palabra '$palabra'.";
}
?>
<div class="main">
    <div class="word">
        <div class="letters">
            <?php
            $desc_chars = preg_split('//u', $descubiertas, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($desc_chars as $ch):
            ?>
                <div class="letter"><?= $ch === '_' ? '<span class="underscore">_</span>' : htmlspecialchars($ch) ?></div>
            <?php endforeach; ?>
        </div>

        <?php if ($mensaje): ?>
            <div class="mensaje"><?= nl2br(htmlspecialchars($mensaje)) ?></div>
        <?php endif; ?>

        <?php if ($estado_final): ?>
            <div class="final"><?= htmlspecialchars($estado_final) ?></div>
        <?php endif; ?>
    </div>

    <aside class="panel">
        <div class="dots">
            <?php for ($i = 0; $i < MAX_INTENTOS; $i++): ?>
                <span class="dot <?= $i < $intentos ? 'used' : '' ?>"></span>
            <?php endfor; ?>
        </div>
        <div class="used-letters">Letras usadas: <?= htmlspecialchars(implode(', ', $letras)) ?></div>

        <?php if (!$estado_final): ?>
            <form method="post">
                <input type="text" name="letra" maxlength="2" placeholder="Letra" autofocus>
                <div class="controls">
                    <button type="submit">Probar letra</button>
                    <button class="reset" type="submit" name="reset">Reiniciar</button>
                </div>
            </form>
        <?php else: ?>
            <form method="post">
                <button class="reset" type="submit" name="reset">🔄 Reiniciar</button>
            </form>
        <?php endif; ?>
    </aside>
</div>