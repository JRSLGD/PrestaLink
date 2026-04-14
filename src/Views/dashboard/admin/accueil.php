<?php
$page_title  = 'Administration PrestaLink';
$menu_actif  = 'accueil';
$admin_prenom = $_SESSION['prenom'] ?? 'Super';
$admin_nom    = $_SESSION['nom']    ?? 'Admin';
$admin_email  = $_SESSION['email']  ?? 'admin@prestalink.ci';
$topbar_titre      = 'Tableau de bord';
$topbar_sous_titre = 'Vue globale de la plateforme PrestaLink';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>
              <link rel="stylesheet" href="../../../public/css/admin.css"/>';
$extra_js  = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar_admin.php';
require_once __DIR__ . '/../../layout/topbar.php';
?>

<main class="ml-64 min-h-screen bg-surface">
    <div class="px-8 py-8">

        <!-- Stats globales -->
        <div class="grid grid-cols-4 gap-5 mb-8">
            <?php $stats = [
                ['label' => 'Utilisateurs total',       'value' => '1 248', 'sub' => '+23 ce mois',       'color' => 'bg-blue-50',  'text' => 'text-primary',    'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                ['label' => 'Prestataires validés',     'value' => '312',  'sub' => '8 en attente',       'color' => 'bg-orange-50', 'text' => 'text-accent',     'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Demandes ce mois',         'value' => '847',  'sub' => '+12% vs mois préc.', 'color' => 'bg-green-50', 'text' => 'text-green-500',  'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'Catégories de services',   'value' => '14',   'sub' => 'Toutes actives',     'color' => 'bg-purple-50', 'text' => 'text-purple-500', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
            ];
            foreach ($stats as $s): ?>
                <div class="stat-card bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-xs text-muted font-medium"><?= $s['label'] ?></p>
                        <div class="w-9 h-9 <?= $s['color'] ?> rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 <?= $s['text'] ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="<?= $s['icon'] ?>" />
                            </svg>
                        </div>
                    </div>
                    <p class="font-display font-700 text-2xl text-dark"><?= $s['value'] ?></p>
                    <p class="text-xs text-muted mt-1"><?= $s['sub'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="grid grid-cols-3 gap-6">

            <!-- Prestataires en attente de validation -->
            <div class="col-span-2 bg-white rounded-2xl border border-red-100 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center gap-2">
                        <h2 class="font-display font-600 text-dark">Prestataires à valider</h2>
                        <span class="bg-red-500 text-white text-xs font-600 px-2 py-0.5 rounded-full">8</span>
                    </div>
                    <a href="/dashboard/admin/validation.php" class="text-xs text-primary hover:underline">Voir tout</a>
                </div>
                <div class="divide-y divide-gray-50">
                    <?php $prestataires = [
                        ['nom' => 'Konan Didier',  'service' => 'Plomberie',   'date' => '05 Avr. 2026', 'email' => 'konan@email.com'],
                        ['nom' => 'Bamba Seydou',  'service' => 'Électricité', 'date' => '04 Avr. 2026', 'email' => 'bamba@email.com'],
                        ['nom' => 'Traoré Ibr.',   'service' => 'Informatique', 'date' => '03 Avr. 2026', 'email' => 'traore@email.com'],
                    ];
                    foreach ($prestataires as $p): ?>
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0">
                                <?= strtoupper(substr($p['nom'], 0, 1) . substr(strrchr($p['nom'], ' '), 1, 1)) ?>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-dark"><?= $p['nom'] ?></p>
                                <p class="text-xs text-muted"><?= $p['email'] ?> · <?= $p['service'] ?> · <?= $p['date'] ?></p>
                            </div>
                            <div class="flex gap-2">
                                <a href="/dashboard/admin/validation.php?action=valider&email=<?= urlencode($p['email']) ?>"
                                    class="text-xs font-medium px-3 py-1.5 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors">
                                    Valider
                                </a>
                                <a href="/dashboard/admin/validation.php?action=refuser&email=<?= urlencode($p['email']) ?>"
                                    class="text-xs font-medium px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 transition-colors">
                                    Refuser
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Activité récente -->
            <div class="space-y-5">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-display font-600 text-dark text-sm">Activité récente</h2>
                    </div>
                    <div class="p-4 space-y-3">
                        <?php $activites = [
                            ['icon' => '👤', 'txt' => 'Nouveau compte client', 'sub' => 'Aya Kouassi — il y a 5 min', 'color' => 'bg-blue-50'],
                            ['icon' => '🔧', 'txt' => 'Prestataire inscrit',  'sub' => 'Konan Didier — il y a 12 min', 'color' => 'bg-orange-50'],
                            ['icon' => '📋', 'txt' => 'Nouvelle demande',      'sub' => 'Plomberie — il y a 18 min', 'color' => 'bg-green-50'],
                            ['icon' => '⭐', 'txt' => 'Avis laissé',           'sub' => 'Note 5/5 — il y a 25 min', 'color' => 'bg-yellow-50'],
                            ['icon' => '🗑️', 'txt' => 'Compte supprimé',       'sub' => 'Par admin — il y a 1h', 'color' => 'bg-red-50'],
                        ];
                        foreach ($activites as $a): ?>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 <?= $a['color'] ?> rounded-xl flex items-center justify-center text-sm flex-shrink-0">
                                    <?= $a['icon'] ?>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-medium text-dark truncate"><?= $a['txt'] ?></p>
                                    <p class="text-xs text-muted"><?= $a['sub'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Répartition statuts demandes -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <h2 class="font-display font-600 text-dark text-sm mb-4">Statuts des demandes</h2>
                    <div class="space-y-3">
                        <?php foreach (
                            [
                                ['En attente', '245', 'bg-blue-400',  29],
                                ['Acceptées', '389', 'bg-green-400', 46],
                                ['Terminées', '213', 'bg-gray-300',  25],
                            ] as [$lbl, $cnt, $color, $pct]
                        ): ?>
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-muted"><?= $lbl ?></span>
                                    <span class="font-medium text-dark"><?= $cnt ?></span>
                                </div>
                                <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full <?= $color ?> rounded-full" style="width:<?= $pct ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>