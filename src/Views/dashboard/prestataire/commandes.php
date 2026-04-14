<?php
$page_title = $menu_actif = 'commandes';
$user_type = 'prestataire';
$user_prenom = $_SESSION['prenom'] ?? 'Konan';
$user_nom = $_SESSION['nom'] ?? 'Didier';
$user_email = $_SESSION['email'] ?? 'konan@email.com';
$topbar_titre = 'Commandes reçues';
$topbar_sous_titre = 'Gérez toutes les commandes de vos clients';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
$commandes = [
    ['id' => '#2041', 'client' => 'Aya Kouassi',  'service' => 'Dépannage urgence',      'date' => '05 Avr. 2026', 'montant' => '15 000 F', 'statut' => 'En attente', 'sc' => 'bg-blue-50 text-primary',     'av' => 'AK', 'cl' => 'from-primary to-blue-400'],
    ['id' => '#2040', 'client' => 'Fatou Diallo',  'service' => 'Installation robinetterie', 'date' => '03 Avr. 2026', 'montant' => '20 000 F', 'statut' => 'En cours',  'sc' => 'bg-orange-50 text-orange-500', 'av' => 'FD', 'cl' => 'from-orange-400 to-orange-600'],
    ['id' => '#2039', 'client' => 'Moussa Traoré', 'service' => 'Détection de fuites',    'date' => '28 Mar. 2026', 'montant' => '18 000 F', 'statut' => 'Terminée',  'sc' => 'bg-green-50 text-green-600',  'av' => 'MT', 'cl' => 'from-green-400 to-green-600'],
    ['id' => '#2038', 'client' => 'Koffi Serge',   'service' => 'Dépannage urgence',      'date' => '22 Mar. 2026', 'montant' => '25 000 F', 'statut' => 'Terminée',  'sc' => 'bg-green-50 text-green-600',  'av' => 'KS', 'cl' => 'from-teal-400 to-teal-600'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">
        <!-- Filtres -->
        <div class="flex gap-2 mb-6">
            <?php foreach (['Toutes', 'En attente', 'En cours', 'Terminées'] as $f): ?>
                <button class="text-xs font-medium px-4 py-2 rounded-full border transition-all <?= $f === 'Toutes' ? 'bg-primary text-white border-primary' : 'border-gray-200 text-muted hover:border-primary hover:text-primary bg-white' ?>">
                    <?= $f ?>
                </button>
            <?php endforeach; ?>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100 bg-surface">
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">N°</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Client</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Prestation</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Date</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Montant</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Statut</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-muted">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($commandes as $c): ?>
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-6 py-4 text-xs text-muted font-mono"><?= $c['id'] ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br <?= $c['cl'] ?> flex items-center justify-center text-white text-xs font-700 flex-shrink-0"><?= $c['av'] ?></div>
                                    <span class="text-sm text-dark"><?= $c['client'] ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-muted"><?= $c['service'] ?></td>
                            <td class="px-6 py-4 text-sm text-muted"><?= $c['date'] ?></td>
                            <td class="px-6 py-4 text-sm font-display font-600 text-dark"><?= $c['montant'] ?></td>
                            <td class="px-6 py-4"><span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $c['sc'] ?>"><?= $c['statut'] ?></span></td>
                            <td class="px-6 py-4">
                                <?php if ($c['statut'] === 'En attente'): ?>
                                    <div class="flex gap-2">
                                        <a href="#" class="text-xs font-medium text-green-500 hover:underline">Accepter</a>
                                        <a href="#" class="text-xs font-medium text-red-400 hover:underline">Refuser</a>
                                    </div>
                                <?php else: ?>
                                    <a href="#" class="text-xs text-primary hover:underline font-medium">Détail</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>