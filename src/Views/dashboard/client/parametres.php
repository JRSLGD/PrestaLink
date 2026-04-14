<?php
$page_title = $menu_actif = 'parametres';
$user_type = 'client';
$user_prenom = $_SESSION['prenom'] ?? 'Aya';
$user_nom = $_SESSION['nom'] ?? 'Kouassi';
$user_email = $_SESSION['email'] ?? 'aya@email.com';
$topbar_titre = 'Paramètres';
$topbar_sous_titre = 'Personnalisez votre expérience PrestaLink';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8 max-w-2xl space-y-5">

        <!-- Notifications -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="font-display font-600 text-dark mb-4">Notifications</h3>
            <div class="space-y-4">
                <?php foreach (
                    [
                        ['Email pour nouvelles commandes', 'notif_email_commande', true],
                        ['SMS de confirmation', 'notif_sms', true],
                        ['Rappels de rendez-vous', 'notif_rappel', true],
                        ['Newsletter PrestaLink', 'notif_newsletter', false],
                    ] as [$lbl, $name, $checked]
                ): ?>
                    <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                        <p class="text-sm text-dark"><?= $lbl ?></p>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="<?= $name ?>" class="sr-only peer" <?= $checked ? 'checked' : '' ?>>
                            <div class="w-10 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:bg-primary transition-colors after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-4"></div>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Devenir prestataire -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="font-display font-600 text-dark mb-2">Devenir prestataire</h3>
            <p class="text-sm text-muted mb-4">Activez le mode prestataire pour proposer vos services et avoir accès aux deux tableaux de bord simultanément.</p>
            <a href="/settings/become-prestataire" class="btn-accent inline-block px-6 py-2.5 rounded-xl text-sm font-medium">
                Activer le mode prestataire
            </a>
        </div>

        <!-- Zone danger -->
        <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-6">
            <h3 class="font-display font-600 text-red-500 mb-2">Zone de danger</h3>
            <p class="text-sm text-muted mb-4">La suppression de votre compte est irréversible. Toutes vos données seront effacées.</p>
            <button class="px-6 py-2.5 rounded-xl text-sm font-medium border border-red-200 text-red-500 hover:bg-red-50 transition-colors">
                Supprimer mon compte
            </button>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>