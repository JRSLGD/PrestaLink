<?php
$page_title        = 'Mes commandes';
$menu_actif        = 'commandes';
$user_type         = 'client';
$user_prenom       = $_SESSION['prenom'] ?? 'Aya';
$user_nom          = $_SESSION['nom']    ?? 'Kouassi';
$user_email        = $_SESSION['email']  ?? 'aya@email.com';
$topbar_titre      = 'Mes commandes';
$topbar_sous_titre = 'Suivez toutes vos commandes en temps réel';
$topbar_btn_label  = '+ Nouvelle commande';
$topbar_btn_href   = '/services';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js  = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';

$commandes = [
    ['id' => '#1024', 'service' => 'Plomberie',   'presta' => 'Konan Didier', 'date' => '03 Avr. 2026', 'montant' => '15 000 F', 'statut' => 'En cours', 'sc' => 'bg-orange-50 text-orange-500', 'icon' => '🔧'],
    ['id' => '#1023', 'service' => 'Électricité', 'presta' => 'Bamba Seydou', 'date' => '28 Mar. 2026', 'montant' => '22 000 F', 'statut' => 'Terminée', 'sc' => 'bg-green-50 text-green-600',  'icon' => '⚡'],
    ['id' => '#1022', 'service' => 'Ménage',      'presta' => 'Adjoua Marie', 'date' => '20 Mar. 2026', 'montant' => '8 000 F', 'statut' => 'Terminée', 'sc' => 'bg-green-50 text-green-600',  'icon' => '🧹'],
    ['id' => '#1021', 'service' => 'Jardinage',   'presta' => 'Coulibaly I.', 'date' => '10 Mar. 2026', 'montant' => '12 000 F', 'statut' => 'Annulée',  'sc' => 'bg-red-50 text-red-500',      'icon' => '🌿'],
    ['id' => '#1020', 'service' => 'Peinture',    'presta' => 'Diallo Mamou', 'date' => '01 Mar. 2026', 'montant' => '35 000 F', 'statut' => 'Terminée', 'sc' => 'bg-green-50 text-green-600',  'icon' => '🎨'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">

        <!-- Filtres -->
        <div class="flex gap-2 mb-6">
            <?php foreach (['Toutes', 'En cours', 'Terminées', 'Annulées'] as $f): ?>
                <button onclick="filtrerCommandes('<?= $f ?>')"
                    class="filtre-btn text-xs font-medium px-4 py-2 rounded-full border transition-all <?= $f === 'Toutes' ? 'bg-primary text-white border-primary' : 'border-gray-200 text-muted hover:border-primary hover:text-primary bg-white' ?>">
                    <?= $f ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Tableau commandes -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100 bg-surface">
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">N°</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Service</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Prestataire</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Date</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Montant</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Statut</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($commandes as $c): ?>
                        <tr class="commande-row hover:bg-surface transition-colors" data-statut="<?= $c['statut'] ?>">
                            <td class="px-6 py-4 text-xs text-muted font-mono"><?= $c['id'] ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span><?= $c['icon'] ?></span>
                                    <span class="text-sm font-medium text-dark"><?= $c['service'] ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-muted"><?= $c['presta'] ?></td>
                            <td class="px-6 py-4 text-sm text-muted"><?= $c['date'] ?></td>
                            <td class="px-6 py-4 text-sm font-display font-600 text-dark"><?= $c['montant'] ?></td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $c['sc'] ?>"><?= $c['statut'] ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/dashboard/client/commandes/<?= ltrim($c['id'], '#') ?>"
                                    class="text-xs text-primary hover:underline font-medium">Détail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>