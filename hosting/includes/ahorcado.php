<?php 
session_start();

// Ajustamos las rutas porque ahora estamos en "includes/"
include "../functions/ahorcado_functions.php";
include "header.php"; 
?>

<div class="card">
    <header>
        <h1>🎮 Juego del Ahorcado</h1>
        <button class="reset" onclick="window.location.href='?reset=1'">Reiniciar</button>
    </header>
    <p class="subtitle">Adivina la palabra secreta antes de quedarte sin intentos</p>

    <div class="main">
        <!-- Estado palabra -->
        <div class="word">
            <div class="letters">
                <?php foreach(str_split($_SESSION['discovered_letters']) as $l): ?>
                    <div class="letter">
                        <?= $l === '_' ? "<span class='underscore'>_</span>" : $l ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Panel lateral -->
        <div class="panel">
            <div class="dots">
                <?php for($i=0; $i<MAX_INTENTOS; $i++): ?>
                    <div class="dot <?= $i < $_SESSION['attempts'] ? 'used' : '' ?>"></div>
                <?php endfor; ?>
            </div>
            <p class="used-letters">
                Letras usadas: <?= empty($_SESSION['used_letters']) ? "ninguna" : implode(", ", $_SESSION['used_letters']); ?>
            </p>
        </div>
    </div>

    <!-- Mensaje de jugada -->
    <?php if(isset($_SESSION['mensaje'])): ?>
        <div class="mensaje <?= $_SESSION['tipo_mensaje'] ?>">
            <?= $_SESSION['mensaje'] ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <?php if(!$_SESSION['game_over']): ?>
        <form method="post" class="controls">
            <input type="text" name="letter" maxlength="1" autofocus>
            <button type="submit">Probar letra</button>
        </form>
    <?php endif; ?>

    <!-- Mensaje final -->
    <?php if($_SESSION['game_over']): ?>
        <p class="final"><?= $_SESSION['final_message']; ?></p>
    <?php endif; ?>
</div>

<!-- Footer -->
<div class="footer">
    <p>Desarrollado por Eduardo 🚀 | Juego del Ahorcado</p>
</div>

<?php include "footer.php"; ?>
