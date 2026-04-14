<?php
$page_title        = 'Mes commandes';
$menu_actif        = 'commandes';
$user_type         = $_SESSION['user_type'] ?? 'client';
$user_prenom       = $_SESSION['prenom']    ?? 'Aya';
$user_nom          = $_SESSION['nom']       ?? 'Kouassi';
$user_email        = $_SESSION['email']     ?? 'aya@email.com';
$topbar_titre      = 'Mes commandes';
$topbar_sous_titre = $user_type === 'prestataire'
    ? 'Toutes les commandes reçues pour vos prestations'
    : 'Suivez toutes vos commandes en temps réel';
$topbar_btn_label  = $user_type !== 'prestataire' ? '+ Nouvelle commande' : null;
$topbar_btn_href   = '/services';
$extra_css         = '<link rel="stylesheet" href="../../public/css/dashboard.css"/>';
$extra_js          = '<script src="../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../../templates/header.php';
require_once __DIR__ . '/../layout/sidebar.php';

$commandes = [
    ['id'=>'#1024','service'=>'Plomberie',   'tiers'=>'Konan Didier', 'date'=>'03 Avr. 2026','montant'=>'15 000 F','statut'=>'En cours',  'sc'=>'bg-orange-50 text-orange-500','icon'=>'🔧'],
    ['id'=>'#1023','service'=>'Électricité', 'tiers'=>'Bamba Seydou', 'date'=>'28 Mar. 2026','montant'=>'22 000 F','statut'=>'Terminée',  'sc'=>'bg-green-50 text-green-600',  'icon'=>'⚡'],
    ['id'=>'#1022','service'=>'Ménage',      'tiers'=>'Adjoua Marie', 'date'=>'20 Mar. 2026','montant'=>'8 000 F', 'statut'=>'Terminée',  'sc'=>'bg-green-50 text-green-600',  'icon'=>'🧹'],
    ['id'=>'#1021','service'=>'Jardinage',   'tiers'=>'Coulibaly I.', 'date'=>'10 Mar. 2026','montant'=>'12 000 F','statut'=>'Annulée',   'sc'=>'bg-red-50 text-red-500',      'icon'=>'🌿'],
    ['id'=>'#1020','service'=>'Peinture',    'tiers'=>'Diallo Mamou', 'date'=>'01 Mar. 2026','montant'=>'35 000 F','statut'=>'Terminée',  'sc'=>'bg-green-50 text-green-600',  'icon'=>'🎨'],
    ['id'=>'#1019','service'=>'Informatique','tiers'=>'Traoré Ibr.',  'date'=>'20 Fév. 2026','montant'=>'10 000 F','statut'=>'En attente','sc'=>'bg-blue-50 text-primary',     'icon'=>'💻'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
<?php require_once __DIR__ . '/../layout/topbar.php'; ?>
<div class="px-8 py-8">

    <!-- Stats rapides -->
    <div class="grid grid-cols-4 gap-4 mb-8">
        <?php foreach([
            ['Toutes',       count($commandes),                                             'bg-gray-50  text-muted'],
            ['En attente',   count(array_filter($commandes,fn($c)=>$c['statut']==='En attente')),  'bg-blue-50  text-primary'],
            ['En cours',     count(array_filter($commandes,fn($c)=>$c['statut']==='En cours')),    'bg-orange-50 text-orange-500'],
            ['Terminées',    count(array_filter($commandes,fn($c)=>$c['statut']==='Terminée')),    'bg-green-50  text-green-600'],
        ] as [$lbl,$count,$color]): ?>
        <button onclick="filtrerCommandes('<?= $lbl ?>')"
                class="filtre-btn bg-white rounded-2xl border border-gray-100 p-4 text-left hover:shadow-sm transition-all">
            <p class="font-display font-700 text-2xl text-dark"><?= $count ?></p>
            <span class="text-xs font-medium px-2 py-0.5 rounded-full <?= $color ?> mt-1 inline-block"><?= $lbl ?></span>
        </button>
        <?php endforeach; ?>
    </div>

    <!-- Tableau -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-display font-600 text-dark">Liste des commandes</h2>
            <div class="flex gap-2">
                <?php foreach(['Toutes','En attente','En cours','Terminées','Annulées'] as $f): ?>
                <button onclick="filtrerCommandes('<?= $f ?>')"
                        class="filtre-btn text-xs font-medium px-3 py-1.5 rounded-full border transition-all
                            <?= $f==='Toutes'?'bg-primary text-white border-primary':'border-gray-200 text-muted hover:border-primary hover:text-primary bg-white' ?>">
                    <?= $f ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr class="bg-surface border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">N°</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Service</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted"><?= $user_type==='prestataire'?'Client':'Prestataire' ?></th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Date</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Montant</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Statut</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach($commandes as $c): ?>
                <tr class="commande-row hover:bg-surface transition-colors" data-statut="<?= $c['statut'] ?>">
                    <td class="px-6 py-4 text-xs text-muted font-mono"><?= $c['id'] ?></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span><?= $c['icon'] ?></span>
                            <span class="text-sm font-medium text-dark"><?= $c['service'] ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $c['tiers'] ?></td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $c['date'] ?></td>
                    <td class="px-6 py-4 text-sm font-display font-600 text-dark"><?= $c['montant'] ?></td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $c['sc'] ?>"><?= $c['statut'] ?></span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/commandes/<?= ltrim($c['id'],'#') ?>" class="text-xs text-primary hover:underline font-medium">Voir détail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
<?php require_once __DIR__ . '/../../../templates/footer.php'; ?>