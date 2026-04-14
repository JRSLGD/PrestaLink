// =============================================
//  PrestaLink — Scripts Messagerie
// =============================================

// Ouvrir une conversation
function ouvrirConv(index) {
    document.querySelectorAll('.conv-item').forEach((item, i) => {
        item.classList.toggle('bg-blue-50', i === index);
    });
}

// Envoyer un message (front uniquement — le vrai envoi passe par le Controller)
function envoyerMessage() {
    const input  = document.getElementById('msg-input');
    const body   = document.getElementById('chat-body');
    const texte  = input.value.trim();
    if (!texte) return;

    // Créer la bulle
    const now    = new Date();
    const heure  = now.getHours().toString().padStart(2,'0') + ':' + now.getMinutes().toString().padStart(2,'0');
    const bulle  = document.createElement('div');
    bulle.className = 'flex justify-end';
    bulle.innerHTML = `
        <div class="max-w-xs">
            <div class="px-4 py-2.5 rounded-2xl rounded-br-sm text-sm leading-relaxed bg-primary text-white">
                ${texte}
            </div>
            <p class="text-xs text-muted mt-1 text-right">${heure}</p>
        </div>`;
    body.appendChild(bulle);

    // Reset input + scroll
    input.value = '';
    body.scrollTop = body.scrollHeight;
}

// Envoyer avec la touche Entrée
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('msg-input');
    if (input) {
        input.addEventListener('keydown', e => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                envoyerMessage();
            }
        });
    }

    // Scroll automatique vers le bas au chargement
    const body = document.getElementById('chat-body');
    if (body) body.scrollTop = body.scrollHeight;
});