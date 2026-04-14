// =============================================
//  PrestaLink — Scripts Services
// =============================================

let filtreCategorie = 'Toutes';
let filtrePrixMax   = 100000;
let filtreNoteMin   = 0;
let filtreRecherche = '';

function appliquerFiltres() {
    const cards  = document.querySelectorAll('.prestation-card');
    let visible  = 0;

    cards.forEach(card => {
        const cat   = card.dataset.cat   ?? '';
        const prix  = parseInt(card.dataset.prix ?? 0);
        const note  = parseFloat(card.dataset.note ?? 0);
        const titre = card.querySelector('h3')?.textContent.toLowerCase() ?? '';

        const okCat    = filtreCategorie === 'Toutes' || cat === filtreCategorie;
        const okPrix   = prix <= filtrePrixMax;
        const okNote   = note >= filtreNoteMin;
        const okSearch = filtreRecherche === '' || titre.includes(filtreRecherche);

        const afficher = okCat && okPrix && okNote && okSearch;
        card.style.display = afficher ? '' : 'none';
        if (afficher) visible++;
    });

    // Mise à jour compteur
    const counter = document.getElementById('count-results');
    if (counter) counter.textContent = visible;

    // État vide
    const empty = document.getElementById('empty-state');
    if (empty) empty.classList.toggle('hidden', visible > 0);
}

function filtrerCategorie(cat) {
    filtreCategorie = cat;

    // Mettre à jour les boutons
    document.querySelectorAll('.cat-btn').forEach(btn => {
        const isCat = btn.id === 'cat-' + cat;
        btn.classList.toggle('actif', isCat);
        btn.classList.toggle('bg-primary', isCat);
        btn.classList.toggle('text-white', isCat);
        btn.classList.toggle('font-medium', isCat);
        btn.classList.toggle('text-muted', !isCat);
    });

    appliquerFiltres();
}

function filtrerPrix(val) {
    filtrePrixMax = parseInt(val);
    const label = document.getElementById('prix-label');
    if (label) label.textContent = parseInt(val).toLocaleString('fr-FR') + ' F';
    appliquerFiltres();
}

function filtrerNote(val) {
    filtreNoteMin = parseFloat(val);
    appliquerFiltres();
}

function rechercherServices(val) {
    filtreRecherche = val.toLowerCase();
    appliquerFiltres();
}

function trierPrestations(critere) {
    const grid  = document.getElementById('grid-prestations');
    if (!grid) return;
    const cards = Array.from(grid.querySelectorAll('.prestation-card'));

    cards.sort((a, b) => {
        if (critere === 'prix-asc')  return parseInt(a.dataset.prix)  - parseInt(b.dataset.prix);
        if (critere === 'prix-desc') return parseInt(b.dataset.prix)  - parseInt(a.dataset.prix);
        if (critere === 'note')      return parseFloat(b.dataset.note) - parseFloat(a.dataset.note);
        return 0;
    });

    cards.forEach(card => grid.appendChild(card));
}

// =============================================
//  Notation commande (étoiles)
// =============================================
function noterCommande(note) {
    const stars = document.querySelectorAll('.star-btn');
    stars.forEach((s, i) => s.classList.toggle('active', i < note));
    const input = document.getElementById('note-value');
    if (input) input.value = note;
}