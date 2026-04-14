// =============================================
//  PrestaLink — Scripts Dashboard (global)
// =============================================

// Animation d'entrée des cartes stat
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.stat-card');
    cards.forEach((card, i) => {
        setTimeout(() => card.classList.add('visible'), 80 * i);
    });
});

// Filtrage des lignes du tableau commandes
function filtrerCommandes(statut) {
    // Mettre à jour les boutons
    document.querySelectorAll('.filtre-btn').forEach(btn => {
        const isActif = btn.textContent.trim() === statut;
        btn.classList.toggle('actif',         isActif);
        btn.classList.toggle('bg-primary',    isActif);
        btn.classList.toggle('text-white',    isActif);
        btn.classList.toggle('border-primary',isActif);
        btn.classList.toggle('bg-white',      !isActif);
        btn.classList.toggle('text-muted',    !isActif);
        btn.classList.toggle('border-gray-200',!isActif);
    });

    // Filtrer les lignes
    document.querySelectorAll('.commande-row').forEach(row => {
        const rowStatut = row.dataset.statut ?? '';
        if (statut === 'Toutes' || rowStatut === statut) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}