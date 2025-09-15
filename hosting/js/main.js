document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const logoImage = document.getElementById('logo-image');
    const darkLogoSrc = logoImage.getAttribute('data-logo-dark');
    const lightLogoSrc = logoImage.getAttribute('data-logo-light');

    const updateIcon = () => {
        if (body.classList.contains('light-theme')) {
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        } else {
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
    };

    const updateLogo = () => {
        if (body.classList.contains('light-theme')) {
            logoImage.src = lightLogoSrc;
        } else {
            logoImage.src = darkLogoSrc;
        }
    };

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'light-theme') {
        body.classList.add('light-theme');
    }
    updateIcon();
    updateLogo();

    themeToggle.addEventListener('click', () => {
        if (body.classList.contains('light-theme')) {
            body.classList.remove('light-theme');
            localStorage.setItem('theme', 'dark-theme');
        } else {
            body.classList.add('light-theme');
            localStorage.setItem('theme', 'light-theme');
        }
        updateIcon();
        updateLogo();
    });
});