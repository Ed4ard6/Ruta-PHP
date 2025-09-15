<?php
// Incluir el encabezado común para todas las páginas
include 'includes/header.php';

// Mostrar los mensajes de estado del formulario
$status = $_GET['status'] ?? '';
if ($status === 'success') {
    echo '<div class="status-message status-success">¡Gracias por tu mensaje! Me pondré en contacto contigo pronto.</div>';
} elseif ($status === 'error') {
    echo '<div class="status-message status-error">Hubo un problema al enviar tu mensaje. Inténtalo de nuevo más tarde.</div>';
}
?>

<section class="hero">
    <h1>Hola, soy Eduardo Machacón 👋</h1>
    <p>
        Desarrollador web enfocado en crear soluciones
        innovadoras y funcionales. Aquí puedes explorar mis proyectos más recientes.
    </p>
    <a href="#proyectos" class="btn">Ver Proyectos</a>
</section>

<section id="proyectos" class="projects-section">
    <h2>Mis Proyectos</h2>
    <div class="projects-container">
        <a href="ahorcado/" class="project-card">
            <h3>El Juego del Ahorcado</h3>
            <p>Un clásico juego de adivinanzas implementado en PHP.</p>
        </a>
        </div>
</section>

<section id="contacto" class="contact-section">
    <h2>Contacto</h2>
    <div class="contact-form-container">
        <form action="send_contact.php" method="POST" class="contact-form">
            <input type="text" name="name" placeholder="Tu Nombre" required>
            <input type="email" name="email" placeholder="Tu Correo Electrónico" required>
            <textarea name="message" placeholder="Tu Mensaje" required></textarea>
            <button type="submit" class="btn">Enviar Mensaje</button>
        </form>
    </div>
</section>

<?php
// Incluir el pie de página común para todas las páginas
include 'includes/footer.php';
?>