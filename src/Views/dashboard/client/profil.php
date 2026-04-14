<?php
$page_title = $menu_actif = 'profil';
$user_type = 'client';
$user_prenom = $_SESSION['prenom'] ?? 'Aya';
$user_nom = $_SESSION['nom'] ?? 'Kouassi';
$user_email = $_SESSION['email'] ?? 'aya@email.com';
$topbar_titre = 'Mon profil';
$topbar_sous_titre = 'Gérez vos informations personnelles';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8 max-w-3xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <!-- Bandeau avatar -->
            <div class="h-24 bg-gradient-to-r from-primary to-blue-400 relative">
                <div class="absolute -bottom-8 left-8">
                    <div class="w-16 h-16 rounded-2xl bg-white border-4 border-white shadow-md flex items-center justify-center bg-gradient-to-br from-primary to-blue-400">
                        <span class="font-display font-700 text-white text-xl">
                            <?= strtoupper(substr($user_prenom, 0, 1) . substr($user_nom, 0, 1)) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="pt-12 px-8 pb-8">
                <form action="/dashboard/client/profil/update" method="POST" class="space-y-5">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Prénom</label>
                            <input type="text" name="prenom" value="<?= htmlspecialchars($user_prenom) ?>"
                                class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Nom</label>
                            <input type="text" name="nom" value="<?= htmlspecialchars($user_nom) ?>"
                                class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5">Email</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($user_email) ?>"
                            class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5">Téléphone</label>
                        <input type="tel" name="telephone" value="+225 07 00 00 00 00"
                            class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5">Quartier</label>
                        <input type="text" name="quartier" value="Cocody, Abidjan"
                            class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all" />
                    </div>
                    <div class="pt-2 flex gap-3">
                        <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm font-medium">
                            Enregistrer les modifications
                        </button>
                        <button type="reset" class="px-6 py-2.5 rounded-xl text-sm font-medium border border-gray-200 text-muted hover:border-gray-300 transition-colors">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Changer mot de passe -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 mt-5">
            <h3 class="font-display font-600 text-dark mb-5">Changer le mot de passe</h3>
            <form action="/dashboard/client/profil/password" method="POST" class="space-y-4">
                <?php foreach ([['Mot de passe actuel', 'current_password'], ['Nouveau mot de passe', 'new_password'], ['Confirmer le nouveau', 'confirm_password']] as [$lbl, $name]): ?>
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5"><?= $lbl ?></label>
                        <input type="password" name="<?= $name ?>" placeholder="••••••••"
                            class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all" />
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn-accent px-6 py-2.5 rounded-xl text-sm font-medium">
                    Mettre à jour le mot de passe
                </button>
            </form>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>