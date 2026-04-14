<?php
$page_title        = 'Détail commande';
$menu_actif        = 'commandes';
$user_type         = $_SESSION['user_type'] ?? 'client';
$user_prenom       = $_SESSION['prenom']    ?? 'Aya';
$user_nom          = $_SESSION['nom']       ?? 'Kouassi';
$user_email        = $_SESSION['email']     ?? 'aya@email.com';
$topbar_titre      = 'Détail de la commande';
$topbar_sous_titre = 'Commande #1024 — 03 Avril 2026';
$extra_css         = '<link rel="stylesheet" href="../../public/css/dashboard.css"/>';
$extra_js          = '<script src="../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../../templates/header.php';
require_once __DIR__ . '/../layout/sidebar.php';

// Ces données viendront du CommandeController via l'id en URL
$commande = [
    'id'          => 1024,
    'date'        => '03 Avril 2026',
    'statut'      => 'En cours',
    'sc'          => 'bg-orange-50 text-orange-500',
    'adresse'     => 'Cocody Angré, Rue des Jardins, Abidjan',
    'description' => 'Fuite d\'eau sous l\'évier de la cuisine, besoin d\'intervention rapide.',
    'date_souhaitee' => '04 Avril 2026',
    'montant'     => 15000,
];

$prestation = [
    'titre'    => 'Dépannage plomberie urgence',
    'cat'      => 'Plomberie',
    'cat_icon' => '🔧',
    'prix'     => 15000,
];

$prestataire = [
    'prenom' => 'Konan',
    'nom'    => 'Didier',
    'avatar' => 'KD',
    'color'  => 'from-primary to-blue-400',
    'tel'    => '+225 07 00 00 00 00',
    'note'   => 4.9,
];

// Étapes du suivi
$etapes = [
    ['label'=>'Commande passée',     'date'=>'03 Avr. 10:12','done'=>true],
    ['label'=>'Commande acceptée',   'date'=>'03 Avr. 10:45','done'=>true],
    ['label'=>'Prestataire en route','date'=>'04 Avr. 08:50','done'=>true],
    ['label'=>'Intervention en cours','date'=>'En cours',    'done'=>false,'active'=>true],
    ['label'=>'Terminée',            'date'=>'—',            'done'=>false],
];
?>
<main class="ml-64 min-h-screen bg-surface">
<?php require_once __DIR__ . '/../layout/topbar.php'; ?>
<div class="px-8 py-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs text-muted mb-6">
        <a href="/dashboard/<?= $user_type ?>/commandes" class="hover:text-primary transition-colors">Mes commandes</a>
        <span>/</span>
        <span class="text-dark">Commande #<?= $commande['id'] ?></span>
    </nav>

    <div class="grid grid-cols-3 gap-6">

        <!-- Colonne principale -->
        <div class="col-span-2 space-y-5">

            <!-- Suivi commande -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-display font-600 text-dark">Suivi de la commande</h2>
                    <span class="text-xs font-medium px-3 py-1 rounded-full <?= $commande['sc'] ?>"><?= $commande['statut'] ?></span>
                </div>
                <div class="relative">
                    <!-- Ligne verticale -->
                    <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-100"></div>
                    <div class="space-y-6">
                        <?php foreach($etapes as $e): ?>
                        <div class="flex items-start gap-4 relative">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 z-10
                                <?= $e['done'] ? 'bg-primary' : (isset($e['active']) ? 'bg-accent' : 'bg-gray-100') ?>">
                                <?php if($e['done']): ?>
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                <?php elseif(isset($e['active'])): ?>
                                <div class="w-2.5 h-2.5 bg-white rounded-full animate-pulse"></div>
                                <?php else: ?>
                                <div class="w-2.5 h-2.5 bg-gray-300 rounded-full"></div>
                                <?php endif; ?>
                            </div>
                            <div class="pt-1">
                                <p class="text-sm font-medium <?= $e['done']||isset($e['active']) ? 'text-dark' : 'text-muted' ?>">
                                    <?= $e['label'] ?>
                                </p>
                                <p class="text-xs text-muted mt-0.5"><?= $e['date'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Détails de la prestation -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="font-display font-600 text-dark mb-5">Détails de la prestation</h2>
                <div class="flex items-center gap-3 p-4 bg-surface rounded-xl mb-5">
                    <span class="text-3xl"><?= $prestation['cat_icon'] ?></span>
                    <div class="flex-1">
                        <p class="font-medium text-dark"><?= $prestation['titre'] ?></p>
                        <p class="text-xs text-muted mt-0.5"><?= $prestation['cat'] ?></p>
                    </div>
                    <p class="font-display font-700 text-primary"><?= number_format($prestation['prix'],0,',',' ') ?> F</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-muted mb-1">Adresse d'intervention</p>
                        <p class="text-sm font-medium text-dark"><?= $commande['adresse'] ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-muted mb-1">Date souhaitée</p>
                        <p class="text-sm font-medium text-dark"><?= $commande['date_souhaitee'] ?></p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-xs text-muted mb-1">Description du problème</p>
                        <p class="text-sm text-dark leading-relaxed"><?= $commande['description'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Laisser un avis (si terminée) -->
            <?php if($commande['statut']==='Terminée'): ?>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="font-display font-600 text-dark mb-4">Laisser un avis</h2>
                <form action="/commandes/<?= $commande['id'] ?>/avis" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-dark mb-2">Note</label>
                        <div class="flex gap-2" id="star-rating">
                            <?php for($i=1;$i<=5;$i++): ?>
                            <button type="button" onclick="noterCommande(<?= $i ?>)"
                                    class="star-btn text-3xl transition-transform hover:scale-110">⭐</button>
                            <?php endfor; ?>
                        </div>
                        <input type="hidden" name="evaluation" id="note-value" value="0"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5">Commentaire</label>
                        <textarea name="commentaire" rows="3" placeholder="Partagez votre expérience..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all bg-surface resize-none placeholder-gray-400"></textarea>
                    </div>
                    <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm font-medium">
                        Publier mon avis
                    </button>
                </form>
            </div>
            <?php endif; ?>
        </div>

        <!-- Colonne droite -->
        <div class="space-y-5">

            <!-- Prestataire -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="font-display font-600 text-dark text-sm mb-4">Prestataire</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br <?= $prestataire['color'] ?> flex items-center justify-center text-white font-display font-700 flex-shrink-0">
                        <?= $prestataire['avatar'] ?>
                    </div>
                    <div>
                        <p class="font-medium text-dark"><?= $prestataire['prenom'].' '.$prestataire['nom'] ?></p>
                        <p class="text-xs text-muted"><?= $prestataire['note'] ?>★ · Plombier</p>
                    </div>
                </div>
                <a href="/dashboard/<?= $user_type ?>/messages"
                   class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl border border-gray-200 text-sm text-muted hover:border-primary hover:text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Envoyer un message
                </a>
            </div>

            <!-- Récapitulatif montant -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="font-display font-600 text-dark text-sm mb-4">Récapitulatif</h3>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-muted">Prestation</span>
                        <span class="text-dark"><?= number_format($commande['montant'],0,',',' ') ?> F</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-muted">Frais de service</span>
                        <span class="text-dark">0 F</span>
                    </div>
                    <div class="flex justify-between text-sm font-medium pt-2 border-t border-gray-100">
                        <span class="text-dark">Total</span>
                        <span class="text-primary font-display font-700"><?= number_format($commande['montant'],0,',',' ') ?> F</span>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <?php if($commande['statut']==='En attente'): ?>
            <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-5">
                <h3 class="font-display font-600 text-dark text-sm mb-3">Actions</h3>
                <a href="/commandes/<?= $commande['id'] ?>/annuler"
                   onclick="return confirm('Annuler cette commande ?')"
                   class="flex items-center justify-center w-full py-2.5 rounded-xl border border-red-200 text-sm text-red-500 hover:bg-red-50 transition-colors">
                    Annuler la commande
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</main>
<?php require_once __DIR__ . '/../../../templates/footer.php'; ?>