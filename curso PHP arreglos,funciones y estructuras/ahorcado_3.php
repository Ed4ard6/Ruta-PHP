<?php
session_start();

// palabras posibles
$palabras = ['casa', 'perro', 'gato', 'elefante', 'jirafa'];
define('MAX_INTENTOS', 6);

// Inicializa el juego en sesión
function init_game() {
    global $palabras;
    $_SESSION['palabra'] = $palabras[array_rand($palabras)];
    $_SESSION['descubiertas'] = str_repeat('_', mb_strlen($_SESSION['palabra']));
    $_SESSION['intentos'] = 0;
    $_SESSION['letras'] = [];
    $_SESSION['flash'] = '';
}

// Redirección al mismo script (PRG)
function redirect_to_self() {
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Reset (botón)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    session_unset();
    session_destroy();
    session_start();
    init_game();
    redirect_to_self();
}

// Si no hay juego inicializado, lo inicializamos
if (!isset($_SESSION['palabra'])) {
    init_game();
}

// Procesar intento de letra (solo vía POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('letra', $_POST)) {
    $letra_raw = isset($_POST['letra']) ? $_POST['letra'] : '';
    $mensaje = '';

    // Validaciones tal como en tu versión original: vacío, más de 1 caracter, no letra
    if ($letra_raw === '') {
        $mensaje = "¡¡¡Tu es que eres BRUTO o te la das escribe una letra sopla picha!!!";
        $_SESSION['intentos'] += 2;
        $restantes = max(0, MAX_INTENTOS - $_SESSION['intentos']);
        $mensaje .= "\nPor esa gracia pierdes 2 intentos por loca y te van quedando $restantes intentos.";
    } elseif (mb_strlen($letra_raw) !== 1) {
        $mensaje = "Te dije UNA letra nada más caremonda.";
        $_SESSION['intentos'] += 2;
        $restantes = max(0, MAX_INTENTOS - $_SESSION['intentos']);
        $mensaje .= "\nPor esa gracia pierdes 2 intentos por loca y te van quedando $restantes intentos.";
    } elseif (!preg_match('/^[a-zA-Z]$/u', $letra_raw)) {
        $mensaje = "¿Acaso '$letra_raw' es una letra careverga?";
        $_SESSION['intentos'] += 2;
        $restantes = max(0, MAX_INTENTOS - $_SESSION['intentos']);
        $mensaje .= "\nPor esa gracia pierdes 2 intentos por loca y te van quedando $restantes intentos.";
    } else {
        // letra válida (1 carácter alfabético)
        $letra = mb_strtolower($letra_raw, 'UTF-8');

        if (in_array($letra, $_SESSION['letras'])) {
            $mensaje = "Ya probaste la letra '$letra', no seas bruto.";
        } else {
            $_SESSION['letras'][] = $letra;
            $palabra = $_SESSION['palabra'];

            // arreglos multibyte para índices correctos
            $pal_chars = preg_split('//u', $palabra, -1, PREG_SPLIT_NO_EMPTY);
            $desc_chars = preg_split('//u', $_SESSION['descubiertas'], -1, PREG_SPLIT_NO_EMPTY);

            if (in_array($letra, $pal_chars, true)) {
                // revelar todas las ocurrencias
                foreach ($pal_chars as $i => $ch) {
                    if ($ch === $letra) $desc_chars[$i] = $letra;
                }
                $_SESSION['descubiertas'] = implode('', $desc_chars);
                $mensaje = "Bien! Has revelado la letra '$letra'.";
            } else {
                $_SESSION['intentos']++;
                $restantes = max(0, MAX_INTENTOS - $_SESSION['intentos']);
                $mensaje = "Lo siento, la letra '$letra' no está en la palabra. Te van quedando $restantes intentos.";
            }
        }
    }

    // limitar intentos al máximo
    if ($_SESSION['intentos'] > MAX_INTENTOS) $_SESSION['intentos'] = MAX_INTENTOS;

    // guardamos mensaje en "flash" para mostrar después de la redirección
    $_SESSION['flash'] = $mensaje;
    // PRG: redirigimos para que un refresh no vuelva a enviar el POST
    redirect_to_self();
}

// En GET mostramos la página y recuperamos el mensaje flash (si existe)
$mensaje = '';
if (!empty($_SESSION['flash'])) {
    $mensaje = $_SESSION['flash'];
    $_SESSION['flash'] = '';
}

// Valores actuales del juego
$palabra = isset($_SESSION['palabra']) ? $_SESSION['palabra'] : '';
$descubiertas = isset($_SESSION['descubiertas']) ? $_SESSION['descubiertas'] : '';
$intentos = isset($_SESSION['intentos']) ? $_SESSION['intentos'] : 0;
$letras = isset($_SESSION['letras']) ? $_SESSION['letras'] : [];

// Estado final
$estado_final = null;
if ($intentos >= MAX_INTENTOS && $descubiertas === str_repeat('_', mb_strlen($palabra))) {
    $estado_final = "Debe ser uno muy bruto en la vida para que con " . MAX_INTENTOS . " intentos no pegar ni una HP letra";
} elseif ($intentos >= MAX_INTENTOS) {
    $estado_final = "¡Has perdido! La palabra era '" . htmlspecialchars($palabra, ENT_QUOTES, 'UTF-8') . "'.";
} elseif ($descubiertas === $palabra) {
    $estado_final = "¡Felicidades! Has adivinado la palabra '" . htmlspecialchars($palabra, ENT_QUOTES, 'UTF-8') . "'.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ahorcado - Eduardo Machacón</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        :root{
            --bg:#0f1724;
            --card:#0b1220;
            --accent:#7c3aed;
            --accent-2:#2563eb;
            --muted:#94a3b8;
            --danger:#ef4444;
            --success:#16a34a;
            --glass: rgba(255,255,255,0.03);
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background: linear-gradient(180deg, #071022 0%, #0b1020 50%);
            color:#e6eef8;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            padding:24px;
        }
        .card{
            width:100%;
            max-width:820px;
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.015));
            border:1px solid rgba(255,255,255,0.04);
            border-radius:12px;
            padding:28px;
            box-shadow: 0 10px 30px rgba(2,6,23,0.7);
        }
        header{ display:flex; align-items:center; justify-content:space-between; gap:16px; }
        header h1{ margin:0; font-size:20px; letter-spacing:0.6px; display:flex; align-items:center; gap:10px;}
        .subtitle{ color:var(--muted); font-size:13px; margin-top:6px;}
        .main{
            display:grid;
            grid-template-columns: 1fr 320px;
            gap:20px;
            margin-top:20px;
        }

        /* estado palabra */
        .word {
            background: var(--glass);
            padding:18px;
            border-radius:10px;
            display:flex;
            flex-direction:column;
            gap:14px;
            min-height:180px;
            justify-content:center;
        }
        .letters {
            display:flex;
            gap:10px;
            flex-wrap:wrap;
            justify-content:center;
        }
        .letter {
            width:48px;
            height:64px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-weight:700;
            font-size:28px;
            border-radius:8px;
            background:rgba(255,255,255,0.02);
            border:1px solid rgba(255,255,255,0.03);
            box-shadow: inset 0 -6px 12px rgba(0,0,0,0.25);
            color:#e6eef8;
        }
        .underscore { opacity:0.45; font-size:18px; }

        /* barra intentos */
        .panel {
            background: rgba(255,255,255,0.02);
            padding:16px;
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.03);
            display:flex;
            flex-direction:column;
            gap:12px;
            align-items:center;
        }
        .dots { display:flex; gap:8px; }
        .dot{
            width:18px;height:18px;border-radius:50%;
            border:2px solid rgba(255,255,255,0.08);
            background:transparent;
        }
        .dot.used{ background: var(--danger); border-color:var(--danger); box-shadow:0 0 6px rgba(239,68,68,0.3); }

        .used-letters { font-size:14px; color:var(--muted); text-align:center; }
        .mensaje { padding:10px 12px; border-radius:8px; font-weight:600; }
        .mensaje.penalty { background: rgba(239,68,68,0.08); color:var(--danger); border:1px solid rgba(239,68,68,0.06); }
        .mensaje.ok { background: rgba(34,197,94,0.06); color:var(--success); border:1px solid rgba(34,197,94,0.06); }
        .controls{ display:flex; gap:10px; align-items:center; justify-content:center; margin-top:14px; flex-wrap:wrap; }
        input[type="text"]{
            padding:10px 12px;
            border-radius:8px;
            border:1px solid rgba(255,255,255,0.06);
            background: rgba(255,255,255,0.02);
            color: #e6eef8;
            width:120px;
            font-size:16px;
            text-align:center;
        }
        button{
            padding:10px 14px;
            border-radius:10px;
            border: none;
            background: linear-gradient(90deg, var(--accent-2), var(--accent));
            color:white;
            cursor:pointer;
            font-weight:700;
        }
        .reset {
            background: transparent;
            border:1px solid rgba(255,255,255,0.06);
            color:var(--muted);
            padding:8px 12px;
            border-radius:8px;
            cursor:pointer;
        }
        .final { text-align:center; font-weight:700; margin-top:12px; }

        @media (max-width:800px){
            .main{ grid-template-columns: 1fr; }
            .panel{ flex-direction:row; padding:12px; gap:10px; justify-content:space-between; }
        }
    </style>
</head>
<body>
    <div class="card">
        <header>
            <div>
                <h1>🎮 El juego del Ahorcado de Eduardo </h1>
            </div>
            <div style="text-align:right; color:var(--muted);">
                <div>Intentos: <strong><?= $intentos ?>/<?= MAX_INTENTOS ?></strong></div>
                <div style="font-size:13px; margin-top:6px;">Palabra: <strong><?= mb_strlen($palabra) ?> letras</strong></div>
            </div>
        </header>

        <div class="main">
            <div class="word">
                <div class="letters" aria-hidden="true">
                    <?php
                    $desc_chars = preg_split('//u', $descubiertas, -1, PREG_SPLIT_NO_EMPTY);
                    foreach ($desc_chars as $ch):
                    ?>
                        <div class="letter">
                            <?php if ($ch === '_'): ?>
                                <span class="underscore">_</span>
                            <?php else: ?>
                                <?= htmlspecialchars($ch, ENT_QUOTES, 'UTF-8') ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($mensaje !== ''): 
                    // mostramos la notificación; si contiene la palabra "pierdes" asumimos penalty
                    $isPenalty = stripos($mensaje, 'pierdes') !== false || stripos($mensaje, 'pierde') !== false;
                ?>
                    <div class="mensaje <?= $isPenalty ? 'penalty' : 'ok' ?>">
                        <?= nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8')) ?>
                    </div>
                <?php endif; ?>

                <?php if ($estado_final !== null): ?>
                    <div class="final"><?= htmlspecialchars($estado_final, ENT_QUOTES, 'UTF-8') ?></div>
                <?php endif; ?>
            </div>

            <aside class="panel">
                <div style="width:100%; text-align:center;">
                    <div style="margin-bottom:8px;">Progreso de intentos</div>
                    <div class="dots" role="progressbar" aria-valuemin="0" aria-valuemax="<?= MAX_INTENTOS ?>">
                        <?php for ($i=0;$i<MAX_INTENTOS;$i++): ?>
                            <span class="dot <?= $i < $intentos ? 'used' : '' ?>"></span>
                        <?php endfor; ?>
                    </div>
                    <div style="margin-top:10px;" class="used-letters">Letras usadas: <?= htmlspecialchars(implode(', ', $letras), ENT_QUOTES, 'UTF-8') ?></div>
                </div>

                <div style="width:100%;">
                    <?php if ($estado_final === null): ?>
                        <form method="post" style="display:flex; flex-direction:column; gap:8px; align-items:center;">
                            <input type="text" name="letra" maxlength="2" placeholder="Escribe una letra" autofocus>
                            <div class="controls">
                                <button type="submit">Probar letra</button>
                                <button class="reset" type="submit" name="reset">Reiniciar</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <form method="post" style="display:flex; gap:8px; justify-content:center;">
                            <button class="reset" type="submit" name="reset">🔄 Reiniciar juego</button>
                        </form>
                    <?php endif; ?>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>
