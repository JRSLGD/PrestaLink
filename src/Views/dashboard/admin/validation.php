<?php
$page_title = $menu_actif = 'validation';
$admin_prenom = $_SESSION['prenom'] ?? 'Super';
$admin_nom = $_SESSION['nom'] ?? 'Admin';
$admin_email = $_SESSION['email'] ?? 'admin@prestalink.ci';
$topbar_titre = 'Prestataires à valider';
$topbar_sous_titre = 'Examinez et validez les nouveaux comptes prestataires';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>
            <link rel="stylesheet" href="../../../public/css/admin.css"/>';
$extra_js = '<script src="../../../public/js/admin.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar_admin.php';
require_once __DIR__ . '/../../layout/topbar.php';

$prestataires = [
    ['id' => 1, 'nom' => 'Konan Didier', 'email' => 'konan@email.com', 'tel' => '+225 07 11 11 11', 'service' => 'Plomberie',   'zone' => 'Cocody, Plateau', 'date' => '05 Avr. 2026', 'bio' => 'Plombier certifié avec 8 ans d\'expérience.'],
    ['id' => 2, 'nom' => 'Bamba Seydou', 'email' => 'bamba@email.com', 'tel' => '+225 07 22 22 22', 'service' => 'Électricité', 'zone' => 'Yopougon',       'date' => '04 Avr. 2026', 'bio' => 'Électricien diplômé, intervention rapide.'],
    ['id' => 3, 'nom' => 'Traoré Ibr.',  'email' => 'traore@email.com', 'tel' => '+225 07 33 33 33', 'service' => 'Informatique', 'zone' => 'Plateau, Marcory', 'date' => '03 Avr. 2026', 'bio' => 'Technicien informatique, dépannage PC et réseau.'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
    <div class="px-8 py-8">

        <?php if (empty($prestataires)): ?>
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-100">
                <p class="text-4xl mb-3">✅</p>
                <p class="font-display font-600 text-dark">Aucun prestataire en attente</p>
                <p class="text-sm text-muted mt-1">Tous les comptes ont été traités.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-2 gap-5">
                <?php foreach ($prestataires as $p): ?>
                    <div class="bg-white rounded-2xl border border-orange-100 shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div class="px-6 pt-6 pb-4 border-b border-gray-100">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center text-white font-display font-700 text-lg flex-shrink-0">
                                    <?= strtoupper(substr($p['nom'], 0, 1) . substr(strrchr($p['nom'], ' '), 1, 1)) ?>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-0.5">
                                        <p class="font-display font-600 text-dark"><?= $p['nom'] ?></p>
                                        <span class="text-xs bg-orange-50 text-orange-500 font-medium px-2 py-0.5 rounded-full">En attente</span>
                                    </div>
                                    <p class="text-xs text-muted"><?= $p['email'] ?> · <?= $p['tel'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Détails -->
                        <div class="px-6 py-4 space-y-3">
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <p class="text-xs text-muted mb-0.5">Service proposé</p>
                                    <p class="text-sm font-medium text-dark"><?= $p['service'] ?></p>
                                </div>
                                <div>
                                    <p class="text-xs text-muted mb-0.5">Zone d'intervention</p>
                                    <p class="text-sm font-medium text-dark"><?= $p['zone'] ?></p>
                                </div>
                                <div>
                                    <p class="text-xs text-muted mb-0.5">Date d'inscription</p>
                                    <p class="text-sm font-medium text-dark"><?= $p['date'] ?></p>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-muted mb-0.5">Biographie</p>
                                <p class="text-sm text-dark leading-relaxed"><?= $p['bio'] ?></p>
                            </div>
                        </div>
                        <!-- Actions -->
                        <div class="px-6 py-4 bg-surface flex gap-3 border-t border-gray-100">
                            <a href="/dashboard/admin/validation.php?action=valider&id=<?= $p['id'] ?>"
                                class="flex-1 text-center py-2.5 rounded-xl bg-green-500 text-white text-sm font-medium hover:bg-green-600 transition-colors">
                                ✓ Valider le compte
                            </a>
                            <a href="/dashboard/admin/validation.php?action=refuser&id=<?= $p['id'] ?>"
                                onclick="return confirm('Refuser ce prestataire ?')"
                                class="flex-1 text-center py-2.5 rounded-xl border border-red-200 text-red-500 text-sm font-medium hover:bg-red-50 transition-colors">
                                ✕ Refuser
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>