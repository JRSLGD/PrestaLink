<?php
$page_title=$menu_actif='utilisateurs';
$admin_prenom=$_SESSION['prenom']??'Super'; $admin_nom=$_SESSION['nom']??'Admin'; $admin_email=$_SESSION['email']??'admin@prestalink.ci';
$topbar_titre='Utilisateurs'; $topbar_sous_titre='Gérez tous les comptes de la plateforme';
$extra_css='<link rel="stylesheet" href="../../../public/css/dashboard.css"/>
            <link rel="stylesheet" href="../../../public/css/admin.css"/>';
$extra_js='<script src="../../../public/js/dashboard.js"></script>
           <script src="../../../public/js/admin.js"></script>';
require_once __DIR__.'/../../layout/header.php';
require_once __DIR__.'/../../layout/sidebar_admin.php';
require_once __DIR__.'/../../layout/topbar.php';

$utilisateurs = [
    ['id'=>1,'nom'=>'Aya Kouassi',   'email'=>'aya@email.com',   'type'=>'Client',       'statut'=>'Actif',   'date'=>'01 Jan. 2026','sc'=>'bg-blue-50 text-primary'],
    ['id'=>2,'nom'=>'Konan Didier',  'email'=>'konan@email.com', 'type'=>'Prestataire',  'statut'=>'Validé',  'date'=>'15 Jan. 2026','sc'=>'bg-green-50 text-green-600'],
    ['id'=>3,'nom'=>'Fatou Diallo',  'email'=>'fatou@email.com', 'type'=>'Client',       'statut'=>'Actif',   'date'=>'20 Fév. 2026','sc'=>'bg-blue-50 text-primary'],
    ['id'=>4,'nom'=>'Bamba Seydou',  'email'=>'bamba@email.com', 'type'=>'Prestataire',  'statut'=>'En attente','date'=>'03 Avr. 2026','sc'=>'bg-orange-50 text-orange-500'],
    ['id'=>5,'nom'=>'Moussa Traoré', 'email'=>'moussa@email.com','type'=>'Client/Presta','statut'=>'Validé',  'date'=>'10 Mar. 2026','sc'=>'bg-purple-50 text-purple-600'],
    ['id'=>6,'nom'=>'Adjoua Marie',  'email'=>'adjoua@email.com','type'=>'Prestataire',  'statut'=>'Suspendu','date'=>'05 Mar. 2026','sc'=>'bg-red-50 text-red-500'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
<div class="px-8 py-8">

    <!-- Filtres + recherche -->
    <div class="flex items-center gap-3 mb-6">
        <div class="relative flex-1 max-w-sm">
            <svg class="w-4 h-4 text-muted absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" placeholder="Rechercher un utilisateur..."
                   class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-gray-200 text-sm bg-white focus:outline-none focus:border-primary transition-all"/>
        </div>
        <?php foreach(['Tous','Clients','Prestataires','En attente','Suspendus'] as $f): ?>
        <button class="filtre-btn text-xs font-medium px-3 py-2 rounded-full border transition-all <?= $f==='Tous'?'bg-dark text-white border-dark':'border-gray-200 text-muted hover:border-dark hover:text-dark bg-white' ?>">
            <?= $f ?>
        </button>
        <?php endforeach; ?>
    </div>

    <!-- Tableau utilisateurs -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-surface border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Utilisateur</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Type</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Inscription</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Statut</th>
                    <th class="text-left px-6 py-3 text-xs font-medium text-muted">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach($utilisateurs as $u): ?>
                <tr class="hover:bg-surface transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0">
                                <?= strtoupper(substr($u['nom'],0,1).substr(strrchr($u['nom'],' '),1,1)) ?>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-dark"><?= $u['nom'] ?></p>
                                <p class="text-xs text-muted"><?= $u['email'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $u['type'] ?></td>
                    <td class="px-6 py-4 text-sm text-muted"><?= $u['date'] ?></td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full <?= $u['sc'] ?>"><?= $u['statut'] ?></span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="/dashboard/admin/utilisateurs.php?action=voir&id=<?= $u['id'] ?>"
                               class="text-xs font-medium text-primary hover:underline">Voir</a>
                            <?php if($u['statut']==='Suspendu'): ?>
                            <a href="/dashboard/admin/utilisateurs.php?action=reactiver&id=<?= $u['id'] ?>"
                               class="text-xs font-medium text-green-500 hover:underline">Réactiver</a>
                            <?php else: ?>
                            <a href="/dashboard/admin/utilisateurs.php?action=suspendre&id=<?= $u['id'] ?>"
                               class="text-xs font-medium text-orange-500 hover:underline">Suspendre</a>
                            <?php endif; ?>
                            <a href="/dashboard/admin/utilisateurs.php?action=supprimer&id=<?= $u['id'] ?>"
                               onclick="return confirm('Supprimer ce compte définitivement ?')"
                               class="text-xs font-medium text-red-500 hover:underline">Supprimer</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
<?php require_once __DIR__.'/../../layout/footer.php'; ?>