<?php
$page_title = 'Mon espace';
$menu_actif = 'accueil';
$user_type = 'both';
$user_prenom = $_SESSION['prenom'] ?? 'Aya';
$user_nom = $_SESSION['nom'] ?? 'Kouassi';
$user_email = $_SESSION['email'] ?? 'aya@email.com';
$active_role = $_GET['role'] ?? 'client';
$topbar_titre = "Bonjour, {$user_prenom} 👋";
$topbar_sous_titre = $active_role === 'prestataire' ? 'Vue prestataire — vos prestations et commandes reçues' : 'Vue client — vos commandes et services';
$topbar_btn_label = $active_role === 'prestataire' ? '+ Nouvelle prestation' : '+ Nouvelle commande';
$topbar_btn_href = $active_role === 'prestataire' ? '/dashboard/prestataire/prestations/new?role=prestataire' : '/services';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar_both.php';
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">

        <?php if ($active_role === 'prestataire'): ?>
            <!-- ===== VUE PRESTATAIRE ===== -->
            <div class="grid grid-cols-4 gap-5 mb-8">
                <?php $stats = [
                    ['label' => 'Prestations actives', 'value' => '6',        'sub' => 'En ligne',    'color' => 'bg-blue-50',  'text' => 'text-primary',   'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['label' => 'Commandes reçues',   'value' => '34',       'sub' => '+5 ce mois',  'color' => 'bg-orange-50', 'text' => 'text-accent',    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['label' => 'Revenus ce mois',    'value' => '185 000 F', 'sub' => '+12% vs mars', 'color' => 'bg-green-50', 'text' => 'text-green-500', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['label' => 'Note moyenne',       'value' => '4.9 ★',   'sub' => '28 avis',     'color' => 'bg-yellow-50', 'text' => 'text-yellow-500', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
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
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <h2 class="font-display font-600 text-dark">Commandes reçues récentes</h2>
                    <a href="/dashboard/prestataire/commandes?role=prestataire" class="text-xs text-primary hover:underline">Voir tout</a>
                </div>
                <div class="divide-y divide-gray-50">
                    <?php foreach (
                        [
                            ['Aya Kouassi', '05 Avr.', '15 000 F', 'En attente', 'bg-blue-50 text-primary', 'AK', 'from-primary to-blue-400'],
                            ['Fatou Diallo', '03 Avr.', '20 000 F', 'En cours', 'bg-orange-50 text-orange-500', 'FD', 'from-orange-400 to-orange-600'],
                        ] as [$cl, $dt, $mt, $st, $sc, $av, $co]
                    ): ?>
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br <?= $co ?> flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0"><?= $av ?></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-dark"><?= $cl ?></p>
                                <p class="text-xs text-muted"><?= $dt ?></p>
                            </div>
                            <p class="text-sm font-display font-600 text-dark"><?= $mt ?></p>
                            <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $sc ?>"><?= $st ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php else: ?>
            <!-- ===== VUE CLIENT ===== -->
            <div class="grid grid-cols-4 gap-5 mb-8">
                <?php $stats = [
                    ['label' => 'Commandes totales', 'value' => '12',  'sub' => '+2 ce mois',  'color' => 'bg-blue-50',  'text' => 'text-primary',   'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['label' => 'En cours',         'value' => '2',   'sub' => 'À suivre',    'color' => 'bg-orange-50', 'text' => 'text-accent',    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['label' => 'Terminées',        'value' => '9',   'sub' => 'Bien passées', 'color' => 'bg-green-50', 'text' => 'text-green-500', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['label' => 'Note moy. donnée', 'value' => '4.7★', 'sub' => 'Vos avis',   'color' => 'bg-yellow-50', 'text' => 'text-yellow-500', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
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
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <h2 class="font-display font-600 text-dark">Mes dernières commandes</h2>
                    <a href="/dashboard/client/commandes?role=client" class="text-xs text-primary hover:underline">Voir tout</a>
                </div>
                <div class="divide-y divide-gray-50">
                    <?php foreach (
                        [
                            ['🔧', 'Plomberie', 'Konan Didier', '03 Avr.', '15 000 F', 'En cours', 'bg-orange-50 text-orange-500'],
                            ['⚡', 'Électricité', 'Bamba Seydou', '28 Mar.', '22 000 F', 'Terminée', 'bg-green-50 text-green-600'],
                        ] as [$ic, $sv, $pr, $dt, $mt, $st, $sc]
                    ): ?>
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="w-10 h-10 rounded-xl bg-surface flex items-center justify-center text-lg flex-shrink-0"><?= $ic ?></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-dark"><?= $sv ?></p>
                                <p class="text-xs text-muted"><?= $pr ?> · <?= $dt ?></p>
                            </div>
                            <p class="text-sm font-display font-600 text-dark"><?= $mt ?></p>
                            <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $sc ?>"><?= $st ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>