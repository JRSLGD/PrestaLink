<?php
// prestations.php
$page_title = $menu_actif = 'prestations';
$user_type = 'prestataire';
$user_prenom = $_SESSION['prenom'] ?? 'Konan';
$user_nom = $_SESSION['nom'] ?? 'Didier';
$user_email = $_SESSION['email'] ?? 'konan@email.com';
$topbar_titre = 'Mes prestations';
$topbar_sous_titre = 'Gérez vos offres de services';
$topbar_btn_label = '+ Ajouter une prestation';
$topbar_btn_href = '/dashboard/prestataire/prestations/new';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
$prestations = [
    ['titre' => 'Dépannage plomberie urgence', 'cat' => 'Plomberie', 'prix' => '15 000 F', 'commandes' => 18, 'note' => 4.9, 'actif' => true],
    ['titre' => 'Installation robinetterie',  'cat' => 'Plomberie', 'prix' => '20 000 F', 'commandes' => 9, 'note' => 4.8, 'actif' => true],
    ['titre' => 'Détection de fuites',        'cat' => 'Plomberie', 'prix' => '12 000 F', 'commandes' => 5, 'note' => 5.0, 'actif' => false],
    ['titre' => 'Rénovation salle de bain',   'cat' => 'Plomberie', 'prix' => '80 000 F', 'commandes' => 2, 'note' => 4.7, 'actif' => true],
];
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">
        <div class="grid grid-cols-2 gap-5">
            <?php foreach ($prestations as $p): ?>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1 min-w-0">
                            <p class="font-display font-600 text-dark"><?= $p['titre'] ?></p>
                            <p class="text-xs text-muted mt-0.5"><?= $p['cat'] ?></p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer ml-3 flex-shrink-0">
                            <input type="checkbox" class="sr-only peer" <?= $p['actif'] ? 'checked' : '' ?>>
                            <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:bg-primary transition-colors after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-4"></div>
                        </label>
                    </div>
                    <div class="flex items-center gap-4 mt-4">
                        <div class="text-center">
                            <p class="font-display font-700 text-lg text-dark"><?= $p['prix'] ?></p>
                            <p class="text-xs text-muted">Prix</p>
                        </div>
                        <div class="w-px h-8 bg-gray-100"></div>
                        <div class="text-center">
                            <p class="font-display font-700 text-lg text-dark"><?= $p['commandes'] ?></p>
                            <p class="text-xs text-muted">Commandes</p>
                        </div>
                        <div class="w-px h-8 bg-gray-100"></div>
                        <div class="text-center">
                            <p class="font-display font-700 text-lg text-dark"><?= $p['note'] ?>★</p>
                            <p class="text-xs text-muted">Note</p>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4 pt-4 border-t border-gray-50">
                        <a href="#" class="flex-1 text-center text-xs font-medium py-2 rounded-xl border border-gray-200 text-muted hover:border-primary hover:text-primary transition-colors">Modifier</a>
                        <a href="#" class="flex-1 text-center text-xs font-medium py-2 rounded-xl border border-red-100 text-red-400 hover:bg-red-50 transition-colors">Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>