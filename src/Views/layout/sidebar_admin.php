<?php

/**
 * Sidebar Admin
 * Variables attendues : $menu_actif, $admin_nom, $admin_email
 */

$menu_admin = [
    ['id' => 'accueil',    'label' => 'Tableau de bord',      'href' => '../../dashboard/admin/accueil.php',     'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ['id' => 'utilisateurs', 'label' => 'Utilisateurs',        'href' => '../../dashboard/admin/utilisateurs.php', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
    ['id' => 'validation', 'label' => 'Prestataires à valider', 'href' => '../../dashboard/admin/validation.php', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'badge' => 'new'],
    ['id' => 'categories', 'label' => 'Catégories',           'href' => '../../dashboard/admin/categories.php',  'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
    ['id' => 'demandes',   'label' => 'Demandes',              'href' => '../../dashboard/admin/demandes.php',    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
    ['id' => 'supprimes',  'label' => 'Comptes supprimés',     'href' => '../../dashboard/admin/supprimes.php',   'icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'],
];
?>

<aside class="fixed top-0 left-0 h-screen w-64 bg-dark flex flex-col z-40 overflow-hidden">

    <!-- Logo -->
    <div class="px-6 py-5 border-b border-white/10 flex-shrink-0">
        <a href="/" class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-red-500 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <span class="font-display font-700 text-lg text-white">Presta<span class="text-red-400">Admin</span></span>
        </a>
    </div>

    <!-- Badge admin -->
    <div class="px-4 py-3 border-b border-white/10 flex-shrink-0">
        <span class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1 rounded-full bg-red-500/20 text-red-300">
            <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
            Administrateur
        </span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-5 space-y-0.5 overflow-y-auto">
        <?php foreach ($menu_admin as $item): ?>
            <?php $active = ($menu_actif ?? '') === $item['id']; ?>
            <a href="<?= $item['href'] ?>"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all
               <?= $active ? 'bg-red-500 text-white font-medium shadow-sm' : 'text-slate-400 hover:bg-white/10 hover:text-white' ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="<?= $item['icon'] ?>" />
                </svg>
                <span class="flex-1"><?= $item['label'] ?></span>
                <?php if (!empty($item['badge'])): ?>
                    <span class="bg-red-500 text-white text-xs font-600 px-2 py-0.5 rounded-full animate-pulse">
                        Nouveau
                    </span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <!-- Profil admin + déconnexion -->
    <div class="px-4 py-4 border-t border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/10 transition-all cursor-pointer mb-1">
            <div class="w-9 h-9 rounded-full bg-red-500 flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0">
                <?= strtoupper(substr($admin_prenom ?? 'A', 0, 1) . substr($admin_nom ?? '', 0, 1)) ?>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate"><?= htmlspecialchars(($admin_prenom ?? 'Admin') . ' ' . ($admin_nom ?? '')) ?></p>
                <p class="text-xs text-slate-400 truncate"><?= htmlspecialchars($admin_email ?? '') ?></p>
            </div>
        </div>
        <a href="/auth/logout" class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm text-slate-400 hover:bg-red-500/10 hover:text-red-400 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Déconnexion
        </a>
    </div>
</aside>