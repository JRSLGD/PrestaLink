<?php
$page_title = 'Dashboard Prestataire';
$menu_actif = 'accueil';
$user_type = 'prestataire';
$user_prenom = $_SESSION['prenom'] ?? 'Konan';
$user_nom = $_SESSION['nom'] ?? 'Didier';
$user_email = $_SESSION['email'] ?? 'konan@email.com';
$topbar_titre = "Bonjour, {$user_prenom} 👋";
$topbar_sous_titre = 'Gérez vos prestations et commandes';
$topbar_btn_label = '+ Nouvelle prestation';
$topbar_btn_href = '/dashboard/prestataire/prestations/new';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">

        <!-- Stats -->
        <div class="grid grid-cols-4 gap-5 mb-8">
            <?php $stats = [
                ['label' => 'Prestations actives', 'value' => '6',         'sub' => 'En ligne',          'color' => 'bg-blue-50',  'text' => 'text-primary',    'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['label' => 'Commandes reçues',   'value' => '34',        'sub' => '+5 ce mois',        'color' => 'bg-orange-50', 'text' => 'text-accent',     'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'Revenus ce mois',    'value' => '185 000 F', 'sub' => '+12% vs mars',      'color' => 'bg-green-50', 'text' => 'text-green-500',  'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Note moyenne',       'value' => '4.9 ★',    'sub' => 'Sur 28 avis',       'color' => 'bg-yellow-50', 'text' => 'text-yellow-500', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
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
            <!-- Dernières commandes reçues -->
            <div class="col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <h2 class="font-display font-600 text-dark">Commandes récentes</h2>
                    <a href="/dashboard/prestataire/commandes" class="text-xs text-primary hover:underline">Voir tout</a>
                </div>
                <div class="divide-y divide-gray-50">
                    <?php $cmds = [
                        ['client' => 'Aya Kouassi',   'date' => '05 Avr.', 'montant' => '15 000 F', 'statut' => 'En attente', 'sc' => 'bg-blue-50 text-primary',     'av' => 'AK', 'cl' => 'from-primary to-blue-400'],
                        ['client' => 'Fatou Diallo',   'date' => '03 Avr.', 'montant' => '20 000 F', 'statut' => 'En cours',  'sc' => 'bg-orange-50 text-orange-500', 'av' => 'FD', 'cl' => 'from-orange-400 to-orange-600'],
                        ['client' => 'Moussa Traoré',  'date' => '28 Mar.', 'montant' => '18 000 F', 'statut' => 'Terminée',  'sc' => 'bg-green-50 text-green-600',   'av' => 'MT', 'cl' => 'from-green-400 to-green-600'],
                        ['client' => 'Koffi Serge',    'date' => '22 Mar.', 'montant' => '25 000 F', 'statut' => 'Terminée',  'sc' => 'bg-green-50 text-green-600',   'av' => 'KS', 'cl' => 'from-teal-400 to-teal-600'],
                    ];
                    foreach ($cmds as $c): ?>
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br <?= $c['cl'] ?> flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0"><?= $c['av'] ?></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-dark"><?= $c['client'] ?></p>
                                <p class="text-xs text-muted"><?= $c['date'] ?></p>
                            </div>
                            <p class="text-sm font-display font-600 text-dark"><?= $c['montant'] ?></p>
                            <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $c['sc'] ?>"><?= $c['statut'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Mes prestations + revenus -->
            <div class="space-y-5">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                        <h2 class="font-display font-600 text-dark text-sm">Mes prestations</h2>
                        <a href="/dashboard/prestataire/prestations" class="text-xs text-primary hover:underline">Gérer</a>
                    </div>
                    <div class="p-4 space-y-2">
                        <?php foreach ([['Dépannage urgence', '15 000 F', true], ['Installation robinetterie', '20 000 F', true], ['Détection de fuites', '12 000 F', false]] as [$t, $p, $a]): ?>
                            <div class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-surface transition-colors">
                                <span class="w-2 h-2 rounded-full flex-shrink-0 <?= $a ? 'bg-green-400' : 'bg-gray-300' ?>"></span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-dark truncate"><?= $t ?></p>
                                    <p class="text-xs text-muted"><?= $p ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <h2 class="font-display font-600 text-dark text-sm mb-3">Revenus — Avril 2026</h2>
                    <p class="font-display font-700 text-3xl text-dark">185 000 <span class="text-base font-400 text-muted">F</span></p>
                    <div class="flex items-center gap-1 mt-1 mb-4">
                        <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        <span class="text-xs text-green-500 font-medium">+12% vs mars</span>
                    </div>
                    <div class="flex justify-between text-xs text-muted mb-1.5"><span>Objectif</span><span>185k / 250k</span></div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width:74%"></div>
                    </div>
                    <a href="/dashboard/prestataire/revenus" class="block text-center text-xs text-primary hover:underline mt-4">Voir le détail →</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>