<?php
$page_title=$menu_actif='categories';
$admin_prenom=$_SESSION['prenom']??'Super'; $admin_nom=$_SESSION['nom']??'Admin'; $admin_email=$_SESSION['email']??'admin@prestalink.ci';
$topbar_titre='Catégories de services'; $topbar_sous_titre='Gérez les catégories proposées sur la plateforme';
$topbar_btn_label='+ Nouvelle catégorie'; $topbar_btn_href='/dashboard/admin/categories.php?action=new';
$extra_css='<link rel="stylesheet" href="../../../public/css/dashboard.css"/>
            <link rel="stylesheet" href="../../../public/css/admin.css"/>';
$extra_js='<script src="../../../public/js/admin.js"></script>';
require_once __DIR__.'/../../layout/header.php';
require_once __DIR__.'/../../layout/sidebar_admin.php';
require_once __DIR__.'/../../layout/topbar.php';

$categories = [
    ['id'=>1, 'nom'=>'Plomberie',    'icon'=>'🔧','nb_services'=>48,'nb_prestataires'=>12,'actif'=>true],
    ['id'=>2, 'nom'=>'Électricité',  'icon'=>'⚡','nb_services'=>35,'nb_prestataires'=>8, 'actif'=>true],
    ['id'=>3, 'nom'=>'Ménage',       'icon'=>'🧹','nb_services'=>92,'nb_prestataires'=>23,'actif'=>true],
    ['id'=>4, 'nom'=>'Jardinage',    'icon'=>'🌿','nb_services'=>27,'nb_prestataires'=>6, 'actif'=>true],
    ['id'=>5, 'nom'=>'Peinture',     'icon'=>'🎨','nb_services'=>41,'nb_prestataires'=>9, 'actif'=>true],
    ['id'=>6, 'nom'=>'Mécanique',    'icon'=>'🚗','nb_services'=>30,'nb_prestataires'=>7, 'actif'=>false],
    ['id'=>7, 'nom'=>'Déménagement', 'icon'=>'📦','nb_services'=>19,'nb_prestataires'=>4, 'actif'=>true],
    ['id'=>8, 'nom'=>'Informatique', 'icon'=>'💻','nb_services'=>55,'nb_prestataires'=>14,'actif'=>true],
    ['id'=>9, 'nom'=>'Coiffure',     'icon'=>'💇','nb_services'=>38,'nb_prestataires'=>10,'actif'=>true],
    ['id'=>10,'nom'=>'Garde enfants','icon'=>'👶','nb_services'=>22,'nb_prestataires'=>5, 'actif'=>true],
    ['id'=>11,'nom'=>'Laverie',      'icon'=>'👗','nb_services'=>15,'nb_prestataires'=>3, 'actif'=>true],
];

// Formulaire ajout/édition (si ?action=new ou ?action=edit)
$show_form = isset($_GET['action']) && in_array($_GET['action'], ['new','edit']);
?>
<main class="ml-64 min-h-screen bg-surface">
<div class="px-8 py-8">

    <?php if($show_form): ?>
    <!-- Formulaire ajout/édition catégorie -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8 max-w-lg">
        <h2 class="font-display font-600 text-dark mb-5">
            <?= ($_GET['action']==='new') ? 'Nouvelle catégorie' : 'Modifier la catégorie' ?>
        </h2>
        <form action="/dashboard/admin/categories.php" method="POST" class="space-y-4">
            <input type="hidden" name="action" value="<?= $_GET['action'] ?>"/>
            <div>
                <label class="block text-sm font-medium text-dark mb-1.5">Nom de la catégorie</label>
                <input type="text" name="nom" placeholder="ex: Plomberie" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all bg-surface"/>
            </div>
            <div>
                <label class="block text-sm font-medium text-dark mb-1.5">Icône (emoji)</label>
                <input type="text" name="icon" placeholder="ex: 🔧" maxlength="2"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all bg-surface"/>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-xl text-sm font-medium">Enregistrer</button>
                <a href="/dashboard/admin/categories.php" class="px-6 py-2.5 rounded-xl text-sm font-medium border border-gray-200 text-muted hover:border-gray-300 transition-colors">Annuler</a>
            </div>
        </form>
    </div>
    <?php endif; ?>

    <!-- Grille catégories -->
    <div class="grid grid-cols-3 gap-5">
        <?php foreach($categories as $cat): ?>
        <div class="bg-white rounded-2xl border <?= $cat['actif']?'border-gray-100':'border-red-100' ?> shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <span class="text-3xl"><?= $cat['icon'] ?></span>
                    <div>
                        <p class="font-display font-600 text-dark"><?= $cat['nom'] ?></p>
                        <span class="text-xs <?= $cat['actif']?'text-green-500':'text-red-400' ?>">
                            <?= $cat['actif']?'Active':'Inactive' ?>
                        </span>
                    </div>
                </div>
                <!-- Toggle actif/inactif -->
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" <?= $cat['actif']?'checked':'' ?>
                           onchange="toggleCategorie(<?= $cat['id'] ?>, this.checked)"/>
                    <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:bg-primary transition-colors after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-4"></div>
                </label>
            </div>
            <div class="flex gap-4 text-center mb-4">
                <div class="flex-1">
                    <p class="font-display font-700 text-lg text-dark"><?= $cat['nb_services'] ?></p>
                    <p class="text-xs text-muted">Services</p>
                </div>
                <div class="w-px bg-gray-100"></div>
                <div class="flex-1">
                    <p class="font-display font-700 text-lg text-dark"><?= $cat['nb_prestataires'] ?></p>
                    <p class="text-xs text-muted">Prestataires</p>
                </div>
            </div>
            <div class="flex gap-2 pt-3 border-t border-gray-50">
                <a href="/dashboard/admin/categories.php?action=edit&id=<?= $cat['id'] ?>"
                   class="flex-1 text-center text-xs font-medium py-2 rounded-xl border border-gray-200 text-muted hover:border-primary hover:text-primary transition-colors">
                    Modifier
                </a>
                <a href="/dashboard/admin/categories.php?action=supprimer&id=<?= $cat['id'] ?>"
                   onclick="return confirm('Supprimer cette catégorie ?')"
                   class="flex-1 text-center text-xs font-medium py-2 rounded-xl border border-red-100 text-red-400 hover:bg-red-50 transition-colors">
                    Supprimer
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</main>
<?php require_once __DIR__.'/../../layout/footer.php'; ?>