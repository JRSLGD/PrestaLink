<?php
$page_title=$menu_actif='demandes';
$admin_prenom=$_SESSION['prenom']??'Super'; $admin_nom=$_SESSION['nom']??'Admin'; $admin_email=$_SESSION['email']??'admin@prestalink.ci';
$topbar_titre='Toutes les demandes'; $topbar_sous_titre='Supervision de toutes les demandes de service';
$extra_css='<link rel="stylesheet" href="../../../public/css/dashboard.css"/>
            <link rel="stylesheet" href="../../../public/css/admin.css"/>';
$extra_js='<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__.'/../../layout/header.php';
require_once __DIR__.'/../../layout/sidebar_admin.php';
require_once __DIR__.'/../../layout/topbar.php';

$demandes = [
    ['id'=>'#1024','client'=>'Aya Kouassi',  'presta'=>'Konan Didier', 'service'=>'Plomberie',   'date'=>'03 Avr. 2026','montant'=>'15 000 F','statut'=>'En attente','sc'=>'bg-blue-50 text-primary'],
    ['id'=>'#1023','client'=>'Fatou Diallo',  'presta'=>'Bamba Seydou', 'service'=>'Électricité', 'date'=>'28 Mar. 2026','montant'=>'22 000 F','statut'=>'Acceptée', 'sc'=>'bg-orange-50 text-orange-500'],
    ['id'=>'#1022','client'=>'Moussa Traoré', 'presta'=>'Adjoua Marie', 'service'=>'Ménage',      'date'=>'20 Mar. 2026','montant'=>'8 000 F', 'statut'=>'Terminée', 'sc'=>'bg-green-50 text-green-600'],
    ['id'=>'#1021','client'=>'Koffi Serge',   'presta'=>'Diallo Mamou', 'service'=>'Peinture',    'date'=>'15 Mar. 2026','montant'=>'35 000 F','statut'=>'Terminée', 'sc'=>'bg-green-50 text-green-600'],
    ['id'=>'#1020','client'=>'Aya Kouassi',   'presta'=>'Traoré Ibr.',  'service'=>'Informatique','date'=>'10 Mar. 2026','montant'=>'10 000 F','statut'=>'En attente','sc'=>'bg-blue-50 text-primary'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
<div class="px-8 py-8">

    <!-- Filtres statut -->
    <div class="flex gap-2 mb-6">
        <?php foreach(['Toutes','En attente','Acceptées','Terminées'] as $f): ?>
        <button onclick="filtrerCommandes('<?= $f ?>')"
                class="filtre-btn text-xs font-medium px-4 py-2 rounded-full border transition-all
                    <?= $f==='Toutes'?'bg-dark text-white border-dark':'border-gray-200 text-muted hover:border-dark hover:text-dark bg-white' ?>">
            <?= $f ?>
        </button>
        <?php endforeach; ?>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-surface border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">N°</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Client</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Prestataire</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Service</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Date</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Montant</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach($demandes as $d): ?>
                <tr class="commande-row hover:bg-surface transition-colors" data-statut="<?= $d['statut'] ?>">
                    <td class="px-6 py-4 text-xs text-muted font-mono"><?= $d['id'] ?></td>
                    <td class="px-6 py-4 text-sm text-dark font-medium"><?= $d['client'] ?></td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $d['presta'] ?></td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $d['service'] ?></td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $d['date'] ?></td>
                    <td class="px-6 py-4 text-sm font-display font-600 text-dark"><?= $d['montant'] ?></td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $d['sc'] ?>"><?= $d['statut'] ?></span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
<?php require_once __DIR__.'/../../layout/footer.php'; ?>