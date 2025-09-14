<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            text-align: center;
            padding: 40px;
            max-width: 600px;
            width: 90%;
        }
        img.logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 15px;
        }
        p {
            color: #555;
            font-size: 1.1em;
            margin-bottom: 30px;
        }
        a.button {
            display: inline-block;
            padding: 15px 30px;
            background: #28a745;
            color: white;
            font-size: 1.2em;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }
        a.button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <img src="assets/img/logo_2.png" alt="Mi Logo" class="logo">

        <!-- Título -->
        <h1>Bienvenido a mi sitio web</h1>

        <!-- Descripción -->
        <p>
            Este es un espacio personal donde comparto proyectos, pruebas y ejercicios de programación.  
            Aquí podrás jugar a un clásico reinventado: el <b>Juego del Ahorcado</b> con mensajes únicos. 😎
        </p>

        <!-- Botón al juego -->
        <a href="ahorcado.php" class="button">Ir al Juego del Ahorcado</a>
    </div>
</body>
</html>
