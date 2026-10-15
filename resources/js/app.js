import './bootstrap';

const toggleButton = document.querySelector('#toggle-pass-visibility');
const passwordInput = document.querySelector('#cad-pass');
const passwordIcon = document.querySelector('#pass-icon');

if (toggleButton && passwordInput && passwordIcon) {
    toggleButton.addEventListener('click', () => {
        const showPassword = passwordInput.type === 'password';
        passwordInput.type = showPassword ? 'text' : 'password';
        passwordIcon.textContent = showPassword ? 'visibility_off' : 'visibility';
        toggleButton.setAttribute('aria-label', showPassword ? 'Ocultar clave' : 'Mostrar clave');
    });
}
