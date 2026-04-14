<?php
$page_title=$menu_actif='profil'; $user_type='prestataire';
$user_prenom=$_SESSION['prenom']??'Konan'; $user_nom=$_SESSION['nom']??'Didier'; $user_email=$_SESSION['email']??'konan@email.com';
$topbar_titre='Mon profil'; $topbar_sous_titre='Gérez votre fiche prestataire';
$extra_css='<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js='<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__.'/../../layout/sidebar.php';
?>
<main class="ml-64 min-h-screen bg-surface">
<?php require_once __DIR__.'/../../layout/topbar.php'; ?>
<div class="px-8 py-8 max-w-3xl space-y-5">

    <!-- Infos personnelles -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="h-24 bg-gradient-to-r from-accent to-orange-400 relative">
            <div class="absolute -bottom-8 left-8">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-accent to-orange-400 border-4 border-white shadow-md flex items-center justify-center">
                    <span class="font-display font-700 text-white text-xl"><?= strtoupper(substr($user_prenom,0,1).substr($user_nom,0,1)) ?></span>
                </div>
            </div>
        </div>
        <div class="pt-12 px-8 pb-8">
            <div class="flex items-center gap-2 mb-5">
                <p class="font-display font-700 text-dark"><?= htmlspecialchars($user_prenom.' '.$user_nom) ?></p>
                <span class="inline-flex items-center gap-1 text-xs font-medium px-2 py-0.5 rounded-full bg-accent/10 text-accent">🔧 Prestataire</span>
            </div>
            <form action="/dashboard/prestataire/profil/update" method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5">Prénom</label>
                        <input type="text" name="prenom" value="<?= htmlspecialchars($user_prenom) ?>" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all"/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark mb-1.5">Nom</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($user_nom) ?>" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all"/>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark mb-1.5">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user_email) ?>" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark mb-1.5">Téléphone</label>
                    <input type="tel" name="telephone" value="+225 07 00 00 00 00" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark mb-1.5">Zone d'intervention</label>
                    <input type="text" name="zone" value="Abidjan — Cocody, Plateau, Marcory" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark mb-1.5">Biographie / Description</label>
                    <textarea name="bio" rows="3" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all resize-none">Plombier certifié avec 8 ans d'expérience. Intervention rapide 7j/7.</textarea>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm font-medium">Enregistrer</button>
                    <button type="reset" class="px-6 py-2.5 rounded-xl text-sm font-medium border border-gray-200 text-muted hover:border-gray-300 transition-colors">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mot de passe -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
        <h3 class="font-display font-600 text-dark mb-5">Changer le mot de passe</h3>
        <form action="/dashboard/prestataire/profil/password" method="POST" class="space-y-4">
            <?php foreach([['Mot de passe actuel','current_password'],['Nouveau mot de passe','new_password'],['Confirmer','confirm_password']] as [$lbl,$name]): ?>
            <div>
                <label class="block text-sm font-medium text-dark mb-1.5"><?= $lbl ?></label>
                <input type="password" name="<?= $name ?>" placeholder="••••••••" class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all"/>
            </div>
            <?php endforeach; ?>
            <button type="submit" class="btn-accent px-6 py-2.5 rounded-xl text-sm font-medium">Mettre à jour</button>
        </form>
    </div>
</div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>