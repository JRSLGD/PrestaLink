// =============================================
//  PrestaLink — Scripts page Auth
// =============================================

// Basculer entre les onglets Connexion / Inscription
function switchTab(tab) {
    const formConnexion   = document.getElementById('form-connexion');
    const formInscription = document.getElementById('form-inscription');
    const tabConnexion    = document.getElementById('tab-connexion');
    const tabInscription  = document.getElementById('tab-inscription');

    if (tab === 'connexion') {
        formConnexion.classList.remove('hidden');
        formInscription.classList.add('hidden');

        tabConnexion.classList.add('border-primary', 'text-primary', 'bg-blue-50');
        tabConnexion.classList.remove('border-transparent', 'text-muted');

        tabInscription.classList.remove('border-primary', 'text-primary', 'bg-blue-50');
        tabInscription.classList.add('border-transparent', 'text-muted');
    } else {
        formInscription.classList.remove('hidden');
        formConnexion.classList.add('hidden');

        tabInscription.classList.add('border-primary', 'text-primary', 'bg-blue-50');
        tabInscription.classList.remove('border-transparent', 'text-muted');

        tabConnexion.classList.remove('border-primary', 'text-primary', 'bg-blue-50');
        tabConnexion.classList.add('border-transparent', 'text-muted');
    }
}

// Afficher / masquer le mot de passe
function togglePassword(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const eye   = document.getElementById(eyeId);

    if (input.type === 'password') {
        input.type = 'text';
        eye.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7
                a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878
                l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59
                m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0
                01-4.132 5.411m0 0L21 21"/>`;
    } else {
        input.type = 'password';
        eye.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542
                7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
    }
}

// Indicateur de force du mot de passe
const pwdInput = document.getElementById('pwd-register');
if (pwdInput) {
    pwdInput.addEventListener('input', function () {
        const val      = this.value;
        const bars     = [document.getElementById('bar1'), document.getElementById('bar2'),
                          document.getElementById('bar3'), document.getElementById('bar4')];
        const label    = document.getElementById('strength-label');
        let score      = 0;

        if (val.length >= 8)               score++;
        if (/[A-Z]/.test(val))             score++;
        if (/[0-9]/.test(val))             score++;
        if (/[^A-Za-z0-9]/.test(val))      score++;

        const colors = ['', '#EF4444', '#F97316', '#EAB308', '#22C55E'];
        const labels = ['', 'Très faible', 'Faible', 'Moyen', 'Fort'];

        bars.forEach((bar, i) => {
            bar.style.background = i < score ? colors[score] : '#E5E7EB';
        });

        label.textContent = val.length === 0 ? 'Minimum 8 caractères' : labels[score];
        label.style.color = val.length === 0 ? '' : colors[score];
    });
}

// Ouvrir sur le bon onglet si paramètre URL présent (?tab=inscription)
const params = new URLSearchParams(window.location.search);
if (params.get('tab') === 'inscription') {
    switchTab('inscription');
}

let lastScroll = 0;
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > lastScroll) {
        // Scroll vers le bas → cacher la navbar
        navbar.classList.add("-translate-y-full");
    } else {
        // Scroll vers le haut → afficher la navbar
        navbar.classList.remove("-translate-y-full");
    }

    lastScroll = currentScroll;
});