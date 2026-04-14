<?php
$page_title=$menu_actif='supprimes';
$admin_prenom=$_SESSION['prenom']??'Super'; $admin_nom=$_SESSION['nom']??'Admin'; $admin_email=$_SESSION['email']??'admin@prestalink.ci';
$topbar_titre='Comptes supprimés'; $topbar_sous_titre='Historique des comptes supprimés de la plateforme';
$extra_css='<link rel="stylesheet" href="../../../public/css/dashboard.css"/>
            <link rel="stylesheet" href="../../../public/css/admin.css"/>';
$extra_js='<script src="../../../public/js/admin.js"></script>';
require_once __DIR__.'/../../layout/header.php';
require_once __DIR__.'/../../layout/sidebar_admin.php';
require_once __DIR__.'/../../layout/topbar.php';

$supprimes = [
    ['nom'=>'Jean Dupont',    'email'=>'jean@email.com',  'type'=>'Client',      'raison'=>'Demande utilisateur','date_supp'=>'01 Avr. 2026','date_insc'=>'10 Jan. 2026'],
    ['nom'=>'Paul Aka',       'email'=>'paul@email.com',  'type'=>'Prestataire', 'raison'=>'Violation des CGU',  'date_supp'=>'28 Mar. 2026','date_insc'=>'05 Fév. 2026'],
    ['nom'=>'Marie Cissé',    'email'=>'marie@email.com', 'type'=>'Client',      'raison'=>'Inactivité prolongée','date_supp'=>'15 Mar. 2026','date_insc'=>'20 Déc. 2025'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
<div class="px-8 py-8">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-surface border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Utilisateur</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Type</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Raison</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Inscrit le</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Supprimé le</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach($supprimes as $s): ?>
                <tr class="hover:bg-surface transition-colors opacity-70">
                    <td class="px-6 py-4">
                        <p class="text-sm font-medium text-dark"><?= $s['nom'] ?></p>
                        <p class="text-xs text-muted"><?= $s['email'] ?></p>
                    </td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $s['type'] ?></td>
                    <td class="px-6 py-4">
                        <span class="text-xs bg-red-50 text-red-400 font-medium px-2.5 py-1 rounded-full"><?= $s['raison'] ?></span>
                    </td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $s['date_insc'] ?></td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $s['date_supp'] ?></td>
                    <td class="px-6 py-4">
                        <a href="/dashboard/admin/supprimes.php?action=restaurer&email=<?= urlencode($s['email']) ?>"
                           onclick="return confirm('Restaurer ce compte ?')"
                           class="text-xs font-medium text-primary hover:underline">Restaurer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if(empty($supprimes)): ?>
        <div class="text-center py-16">
            <p class="text-3xl mb-3">🗑️</p>
            <p class="text-sm text-muted">Aucun compte supprimé pour le moment.</p>
        </div>
        <?php endif; ?>
    </div>
</div>
</main>
<?php require_once __DIR__.'/../../layout/footer.php'; ?>