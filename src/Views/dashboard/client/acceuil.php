<?php
$page_title      = 'Mon espace client';
$menu_actif      = 'accueil';
$user_type       = 'client';
$user_prenom     = $_SESSION['prenom'] ?? 'Aya';
$user_nom        = $_SESSION['nom']    ?? 'Kouassi';
$user_email      = $_SESSION['email']  ?? 'aya@email.com';
$topbar_titre    = "Bonjour, {$user_prenom} 👋";
$topbar_sous_titre = 'Voici un résumé de votre activité';
$topbar_btn_label  = '+ Nouvelle commande';
$topbar_btn_href   = '/services';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js  = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">

        <!-- Stats -->
        <div class="grid grid-cols-4 gap-5 mb-8">
            <?php $stats = [
                ['label' => 'Commandes totales', 'value' => '12', 'sub' => '+2 ce mois',    'color' => 'bg-blue-50',  'text' => 'text-primary',    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'En cours',         'value' => '2', 'sub' => 'À suivre',      'color' => 'bg-orange-50', 'text' => 'text-accent',     'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Terminées',        'value' => '9', 'sub' => 'Bien passées',  'color' => 'bg-green-50', 'text' => 'text-green-500',  'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Note moy. donnée', 'value' => '4.7★', 'sub' => 'Sur vos avis', 'color' => 'bg-yellow-50', 'text' => 'text-yellow-500', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
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
            <!-- Dernières commandes -->
            <div class="col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <h2 class="font-display font-600 text-dark">Dernières commandes</h2>
                    <a href="/dashboard/client/commandes" class="text-xs text-primary hover:underline">Voir tout</a>
                </div>
                <div class="divide-y divide-gray-50">
                    <?php $commandes = [
                        ['service' => 'Plomberie',  'presta' => 'Konan Didier', 'date' => '03 Avr. 2026', 'montant' => '15 000 F', 'statut' => 'En cours', 'sc' => 'bg-orange-50 text-orange-500', 'icon' => '🔧'],
                        ['service' => 'Électricité', 'presta' => 'Bamba Seydou', 'date' => '28 Mar. 2026', 'montant' => '22 000 F', 'statut' => 'Terminée', 'sc' => 'bg-green-50 text-green-600',  'icon' => '⚡'],
                        ['service' => 'Ménage',     'presta' => 'Adjoua Marie', 'date' => '20 Mar. 2026', 'montant' => '8 000 F', 'statut' => 'Terminée', 'sc' => 'bg-green-50 text-green-600',  'icon' => '🧹'],
                        ['service' => 'Jardinage',  'presta' => 'Coulibaly I.', 'date' => '10 Mar. 2026', 'montant' => '12 000 F', 'statut' => 'Annulée',  'sc' => 'bg-red-50 text-red-500',      'icon' => '🌿'],
                    ];
                    foreach ($commandes as $c): ?>
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="w-10 h-10 rounded-xl bg-surface flex items-center justify-center text-lg flex-shrink-0"><?= $c['icon'] ?></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-dark"><?= $c['service'] ?></p>
                                <p class="text-xs text-muted"><?= $c['presta'] ?> · <?= $c['date'] ?></p>
                            </div>
                            <p class="text-sm font-display font-600 text-dark"><?= $c['montant'] ?></p>
                            <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $c['sc'] ?>"><?= $c['statut'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Services populaires + avis -->
            <div class="space-y-5">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-display font-600 text-dark text-sm">Services populaires</h2>
                    </div>
                    <div class="p-4 space-y-1">
                        <?php foreach ([['🧹', 'Ménage', '92'], ['💻', 'Informatique', '55'], ['🔧', 'Plomberie', '48'], ['🎨', 'Peinture', '41']] as [$ic, $nm, $ct]): ?>
                            <a href="/services/<?= strtolower($nm) ?>" class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-surface transition-colors">
                                <span class="text-xl"><?= $ic ?></span>
                                <span class="text-sm text-dark flex-1"><?= $nm ?></span>
                                <span class="text-xs text-muted"><?= $ct ?> presta.</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-display font-600 text-dark text-sm">Mes derniers avis</h2>
                    </div>
                    <div class="p-4 space-y-3">
                        <?php foreach ([['Plomberie', 5, 'Excellent travail !'], ['Ménage', 4, 'Bon service.']] as [$svc, $note, $txt]): ?>
                            <div class="p-3 bg-surface rounded-xl">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="text-xs font-medium text-dark"><?= $svc ?></p>
                                    <div class="flex gap-0.5">
                                        <?php for ($i = 0; $i < 5; $i++): ?><svg class="w-3 h-3 <?= $i < $note ? 'text-accent' : 'text-gray-200' ?>" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg><?php endfor; ?>
                                    </div>
                                </div>
                                <p class="text-xs text-muted"><?= $txt ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>