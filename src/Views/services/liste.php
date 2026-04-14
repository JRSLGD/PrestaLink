<?php
$page_title        = 'Services disponibles';
$public_url = '../../..';
$src_url = '../../..';
$page_home = '../../../public/index.php';
$extra_css         = '<link rel="stylesheet" href="../../public/css/services.css"/>';
$extra_js          = '<script src="../../public/js/services.js"></script>';
require_once __DIR__ . '/../../../templates/header.php';

// Ces données viendront du ServiceController + Model
$categories = [
    ['id' => 1, 'nom' => 'Plomberie',    'icon' => '🔧', 'count' => 48],
    ['id' => 2, 'nom' => 'Électricité',  'icon' => '⚡', 'count' => 35],
    ['id' => 3, 'nom' => 'Ménage',       'icon' => '🧹', 'count' => 92],
    ['id' => 4, 'nom' => 'Jardinage',    'icon' => '🌿', 'count' => 27],
    ['id' => 5, 'nom' => 'Peinture',     'icon' => '🎨', 'count' => 41],
    ['id' => 6, 'nom' => 'Mécanique',    'icon' => '🚗', 'count' => 30],
    ['id' => 7, 'nom' => 'Déménagement', 'icon' => '📦', 'count' => 19],
    ['id' => 8, 'nom' => 'Informatique', 'icon' => '💻', 'count' => 55],
];

$prestations = [
    ['id' => 1, 'titre' => 'Dépannage plomberie urgence', 'cat' => 'Plomberie',   'cat_icon' => '🔧', 'prix' => 15000, 'note' => 4.9, 'avis' => 28, 'presta' => 'Konan Didier', 'ville' => 'Cocody',  'avatar' => 'KD', 'color' => 'from-primary to-blue-400',   'desc' => 'Intervention rapide 7j/7. Fuites, robinetterie, canalisations.'],
    ['id' => 2, 'titre' => 'Installation électrique',    'cat' => 'Électricité', 'cat_icon' => '⚡', 'prix' => 25000, 'note' => 4.8, 'avis' => 15, 'presta' => 'Bamba Seydou', 'ville' => 'Plateau', 'avatar' => 'BS', 'color' => 'from-yellow-400 to-yellow-600', 'desc' => 'Tableau électrique, prises, éclairage. Certifié.'],
    ['id' => 3, 'titre' => 'Ménage complet appartement', 'cat' => 'Ménage',      'cat_icon' => '🧹', 'prix' => 8000, 'note' => 4.7, 'avis' => 63, 'presta' => 'Adjoua Marie', 'ville' => 'Marcory', 'avatar' => 'AM', 'color' => 'from-green-400 to-green-600',  'desc' => 'Nettoyage complet, repassage, vitres inclus.'],
    ['id' => 4, 'titre' => 'Jardinage et entretien',     'cat' => 'Jardinage',   'cat_icon' => '🌿', 'prix' => 12000, 'note' => 4.6, 'avis' => 19, 'presta' => 'Coulibaly I.', 'ville' => 'Yopougon', 'avatar' => 'CI', 'color' => 'from-emerald-400 to-emerald-600', 'desc' => 'Taille, tonte, désherbage, arrosage automatique.'],
    ['id' => 5, 'titre' => 'Peinture intérieure',        'cat' => 'Peinture',    'cat_icon' => '🎨', 'prix' => 35000, 'note' => 5.0, 'avis' => 11, 'presta' => 'Diallo Mamou', 'ville' => 'Cocody',  'avatar' => 'DM', 'color' => 'from-pink-400 to-pink-600',    'desc' => 'Peinture murale, plafond, finitions soignées.'],
    ['id' => 6, 'titre' => 'Dépannage informatique',     'cat' => 'Informatique', 'cat_icon' => '💻', 'prix' => 10000, 'note' => 4.8, 'avis' => 42, 'presta' => 'Traoré Ibr.',  'ville' => 'Plateau', 'avatar' => 'TI', 'color' => 'from-indigo-400 to-indigo-600', 'desc' => 'Virus, panne, installation logiciels, réseau.'],
];
?>

<!-- Navbar héritée du header -->
<div class="pt-20">

    <!-- Hero section services -->
    <div class="bg-gradient-to-br from-blue-50 to-white py-14 px-6 border-b border-gray-100">
        <div class="max-w-6xl mx-auto text-center">
            <span class="text-xs font-medium text-accent uppercase tracking-widest">Nos services</span>
            <h1 class="font-display font-700 text-4xl text-dark mt-3 mb-4">Tous les services disponibles</h1>
            <p class="text-muted max-w-xl mx-auto mb-8">Trouvez le prestataire idéal parmi nos professionnels vérifiés partout en Côte d'Ivoire.</p>

            <!-- Barre de recherche -->
            <div class="max-w-lg mx-auto relative">
                <div class="absolute left-4 top-1/2 -translate-y-1/2">
                    <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    type="text"
                    id="search-services"
                    placeholder="Rechercher un service, un prestataire..."
                    class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-200 bg-white text-sm shadow-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all"
                    oninput="rechercherServices(this.value)" />
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="flex gap-8">

            <!-- Sidebar filtres -->
            <aside class="w-56 flex-shrink-0">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 sticky top-24">
                    <p class="font-display font-600 text-dark text-sm mb-4">Catégories</p>
                    <div class="space-y-1">
                        <button onclick="filtrerCategorie('Toutes')"
                            id="cat-Toutes"
                            class="cat-btn w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm transition-all bg-primary text-white font-medium">
                            <span>Toutes</span>
                            <span class="text-xs opacity-75"><?= array_sum(array_column($categories, 'count')) ?></span>
                        </button>
                        <?php foreach ($categories as $cat): ?>
                            <button onclick="filtrerCategorie('<?= $cat['nom'] ?>')"
                                id="cat-<?= $cat['nom'] ?>"
                                class="cat-btn w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm transition-all text-muted hover:bg-surface hover:text-dark">
                                <span><?= $cat['icon'] ?></span>
                                <span class="flex-1 text-left"><?= $cat['nom'] ?></span>
                                <span class="text-xs"><?= $cat['count'] ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Filtre prix -->
                    <div class="mt-6 pt-5 border-t border-gray-100">
                        <p class="font-display font-600 text-dark text-sm mb-3">Budget max</p>
                        <input type="range" id="prix-max" min="5000" max="100000" step="5000" value="100000"
                            class="w-full accent-primary" oninput="filtrerPrix(this.value)" />
                        <div class="flex justify-between text-xs text-muted mt-1">
                            <span>5 000 F</span>
                            <span id="prix-label" class="font-medium text-primary">100 000 F</span>
                        </div>
                    </div>

                    <!-- Filtre note -->
                    <div class="mt-5 pt-5 border-t border-gray-100">
                        <p class="font-display font-600 text-dark text-sm mb-3">Note minimum</p>
                        <div class="space-y-1">
                            <?php foreach ([['Toutes notes', 0], ['4★ et plus', 4], ['4.5★ et plus', 4.5], ['5★ uniquement', 5]] as [$lbl, $val]): ?>
                                <label class="flex items-center gap-2 cursor-pointer py-1">
                                    <input type="radio" name="note-min" value="<?= $val ?>" class="accent-primary" <?= $val === 0 ? 'checked' : '' ?>
                                        onchange="filtrerNote(<?= $val ?>)" />
                                    <span class="text-xs text-muted hover:text-dark"><?= $lbl ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Grille prestations -->
            <div class="flex-1">
                <!-- Tri -->
                <div class="flex items-center justify-between mb-5">
                    <p class="text-sm text-muted"><span id="count-results"><?= count($prestations) ?></span> prestations trouvées</p>
                    <select onchange="trierPrestations(this.value)"
                        class="text-sm border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:border-primary bg-white text-dark">
                        <option value="pertinence">Pertinence</option>
                        <option value="prix-asc">Prix croissant</option>
                        <option value="prix-desc">Prix décroissant</option>
                        <option value="note">Meilleures notes</option>
                    </select>
                </div>

                <div id="grid-prestations" class="grid grid-cols-2 gap-5">
                    <?php foreach ($prestations as $p): ?>
                        <div class="prestation-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:-translate-y-1 hover:shadow-md transition-all duration-200"
                            data-cat="<?= $p['cat'] ?>"
                            data-prix="<?= $p['prix'] ?>"
                            data-note="<?= $p['note'] ?>">

                            <!-- Header carte -->
                            <div class="px-5 pt-5 pb-4">
                                <div class="flex items-start justify-between mb-3">
                                    <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-blue-50 text-primary">
                                        <?= $p['cat_icon'] ?> <?= $p['cat'] ?>
                                    </span>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span class="text-xs font-medium text-dark"><?= $p['note'] ?></span>
                                        <span class="text-xs text-muted">(<?= $p['avis'] ?>)</span>
                                    </div>
                                </div>

                                <h3 class="font-display font-600 text-dark mb-2"><?= $p['titre'] ?></h3>
                                <p class="text-xs text-muted leading-relaxed"><?= $p['desc'] ?></p>
                            </div>

                            <!-- Footer carte -->
                            <div class="px-5 pb-5 border-t border-gray-50 pt-4 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br <?= $p['color'] ?> flex items-center justify-center text-white text-xs font-700 font-display">
                                        <?= $p['avatar'] ?>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-dark"><?= $p['presta'] ?></p>
                                        <p class="text-xs text-muted"><?= $p['ville'] ?></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-display font-700 text-primary"><?= number_format($p['prix'], 0, ',', ' ') ?> F</p>
                                    <!-- /services/<?= $p['id'] ?> -->
                                    <a href="#" class="text-xs text-accent hover:underline font-medium">Voir détail →</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- État vide -->
                <div id="empty-state" class="hidden text-center py-20">
                    <p class="text-5xl mb-4">🔍</p>
                    <p class="font-display font-600 text-dark">Aucune prestation trouvée</p>
                    <p class="text-sm text-muted mt-2">Essayez d'autres filtres ou une autre recherche.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../../templates/footer.php'; ?>