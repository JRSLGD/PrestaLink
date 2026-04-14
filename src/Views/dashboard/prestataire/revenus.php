<?php
$page_title = $menu_actif = 'revenus';
$user_type = 'prestataire';
$user_prenom = $_SESSION['prenom'] ?? 'Konan';
$user_nom = $_SESSION['nom'] ?? 'Didier';
$user_email = $_SESSION['email'] ?? 'konan@email.com';
$topbar_titre = 'Mes revenus';
$topbar_sous_titre = 'Suivi de vos gains sur PrestaLink';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
$mois = [
    ['mois' => 'Janv.', 'montant' => 95000, 'pct' => 38],
    ['mois' => 'Févr.', 'montant' => 120000, 'pct' => 48],
    ['mois' => 'Mars', 'montant' => 165000, 'pct' => 66],
    ['mois' => 'Avr.', 'montant' => 185000, 'pct' => 74],
];
$transactions = [
    ['client' => 'Aya Kouassi',  'service' => 'Dépannage urgence', 'date' => '03 Avr.', 'montant' => '+15 000 F', 'type' => 'credit'],
    ['client' => 'Fatou Diallo',  'service' => 'Installation',     'date' => '01 Avr.', 'montant' => '+20 000 F', 'type' => 'credit'],
    ['client' => 'Moussa Traoré', 'service' => 'Détection fuites', 'date' => '28 Mar.', 'montant' => '+18 000 F', 'type' => 'credit'],
    ['client' => 'PrestaLink',    'service' => 'Commission (5%)',  'date' => '28 Mar.', 'montant' => '-900 F',   'type' => 'debit'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">
        <div class="grid grid-cols-3 gap-6 mb-8">
            <!-- Carte total -->
            <div class="col-span-2 bg-primary rounded-2xl p-6 text-white">
                <p class="text-sm text-blue-200 mb-1">Revenus totaux (Avril 2026)</p>
                <p class="font-display font-700 text-4xl">185 000 <span class="text-xl font-400 text-blue-200">FCFA</span></p>
                <div class="flex items-center gap-2 mt-2">
                    <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    <span class="text-sm text-green-300">+12% par rapport à mars</span>
                </div>
                <!-- Mini graphe barres -->
                <div class="mt-6 flex items-end gap-3">
                    <?php foreach ($mois as $m): ?>
                        <div class="flex-1 text-center">
                            <div class="bg-white/20 rounded-t-lg mx-auto" style="height:<?= $m['pct'] ?>px; width:100%"></div>
                            <p class="text-xs text-blue-200 mt-1"><?= $m['mois'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Objectif -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <p class="text-sm font-medium text-dark mb-4">Objectif mensuel</p>
                <div class="flex items-center justify-center">
                    <div class="relative w-32 h-32">
                        <svg class="w-32 h-32 -rotate-90" viewBox="0 0 36 36">
                            <circle cx="18" cy="18" r="15.9" fill="none" stroke="#F1F5F9" stroke-width="3" />
                            <circle cx="18" cy="18" r="15.9" fill="none" stroke="#1B4FD8" stroke-width="3"
                                stroke-dasharray="74 100" stroke-linecap="round" />
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <p class="font-display font-700 text-2xl text-dark">74%</p>
                            <p class="text-xs text-muted">atteint</p>
                        </div>
                    </div>
                </div>
                <p class="text-center text-xs text-muted mt-4">185 000 / 250 000 FCFA</p>
                <div class="mt-4 pt-4 border-t border-gray-50 space-y-2">
                    <div class="flex justify-between text-xs"><span class="text-muted">Commandes terminées</span><span class="font-medium text-dark">28</span></div>
                    <div class="flex justify-between text-xs"><span class="text-muted">Taux de réussite</span><span class="font-medium text-green-500">96%</span></div>
                </div>
            </div>
        </div>

        <!-- Transactions récentes -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-display font-600 text-dark">Transactions récentes</h2>
            </div>
            <div class="divide-y divide-gray-50">
                <?php foreach ($transactions as $t): ?>
                    <div class="flex items-center gap-4 px-6 py-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                    <?= $t['type'] === 'credit' ? 'bg-green-50' : 'bg-red-50' ?>">
                            <svg class="w-5 h-5 <?= $t['type'] === 'credit' ? 'text-green-500' : 'text-red-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $t['type'] === 'credit' ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' ?>" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-dark"><?= $t['client'] ?></p>
                            <p class="text-xs text-muted"><?= $t['service'] ?> · <?= $t['date'] ?></p>
                        </div>
                        <p class="font-display font-600 text-sm <?= $t['type'] === 'credit' ? 'text-green-500' : 'text-red-400' ?>"><?= $t['montant'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>