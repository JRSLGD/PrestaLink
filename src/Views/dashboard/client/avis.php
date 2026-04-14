<?php
$page_title = $menu_actif = 'avis';
$user_type = 'client';
$user_prenom = $_SESSION['prenom'] ?? 'Aya';
$user_nom = $_SESSION['nom'] ?? 'Kouassi';
$user_email = $_SESSION['email'] ?? 'aya@email.com';
$topbar_titre = 'Mes avis';
$topbar_sous_titre = 'Les évaluations que vous avez laissées';
$extra_css = '<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js = '<script src="../../../public/js/dashboard.js"></script>';
require_once __DIR__ . '/../../layout/header.php';
require_once __DIR__ . '/../../layout/sidebar.php';
$avis = [
    ['service' => 'Plomberie',  'presta' => 'Konan Didier', 'date' => '03 Avr.', 'note' => 5, 'txt' => 'Excellent travail, très rapide et professionnel !'],
    ['service' => 'Ménage',     'presta' => 'Adjoua Marie', 'date' => '20 Mar.', 'note' => 4, 'txt' => 'Bon service, appartement bien nettoyé.'],
    ['service' => 'Électricité', 'presta' => 'Bamba Seydou', 'date' => '28 Mar.', 'note' => 5, 'txt' => 'Très compétent, je recommande vivement.'],
    ['service' => 'Peinture',   'presta' => 'Diallo Mamou', 'date' => '01 Mar.', 'note' => 3, 'txt' => 'Travail correct mais délai un peu long.'],
];
?>
<main class="ml-64 min-h-screen bg-surface">
    <?php require_once __DIR__ . '/../../layout/topbar.php'; ?>
    <div class="px-8 py-8">
        <div class="grid grid-cols-2 gap-5">
            <?php foreach ($avis as $a): ?>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="font-display font-600 text-dark"><?= $a['service'] ?></p>
                            <p class="text-xs text-muted mt-0.5">Par <?= $a['presta'] ?> · <?= $a['date'] ?></p>
                        </div>
                        <div class="flex gap-0.5">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <svg class="w-4 h-4 <?= $i < $a['note'] ? 'text-accent' : 'text-gray-200' ?>" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <p class="text-sm text-muted leading-relaxed">"<?= $a['txt'] ?>"</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/../../layout/footer.php'; ?>