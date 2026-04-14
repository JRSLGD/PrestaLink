<?php

/**
 * Sidebar universelle
 * Variables attendues :
 *   $menu_actif               — id du lien actif
 *   $user_type                — 'client' | 'prestataire' | 'both'
 *   $user_prenom, $user_nom, $user_email
 */

$menu_client = [
    ['id' => 'accueil',   'label' => 'Tableau de bord',   'href' => '../../dashboard/client/acceuil.php',            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ['id' => 'commandes', 'label' => 'Mes commandes',      'href' => '../../dashboard/client/commandes.php',  'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
    ['id' => 'services',  'label' => 'Trouver un service', 'href' => '../../dashboard/client/services.php',                    'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
    ['id' => 'avis',      'label' => 'Mes avis',           'href' => '../../dashboard/client/avis.php',       'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
    ['id' => 'messages',  'label' => 'Messagerie',         'href' => '../../dashboard/client/messages.php',   'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'badge' => 3],
    ['id' => 'profil',    'label' => 'Mon profil',         'href' => '../../dashboard/client/profil.php',     'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
    ['id' => 'parametres', 'label' => 'Paramètres',         'href' => '../../dashboard/client/parametres.php', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
];

$menu_prestataire = [
    ['id' => 'accueil',    'label' => 'Tableau de bord',  'href' => '../../dashboard/prestataire/acceuil.php',              'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ['id' => 'prestations', 'label' => 'Mes prestations',  'href' => '../../dashboard/prestataire/prestations.php',  'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ['id' => 'commandes',  'label' => 'Commandes reçues', 'href' => '../../dashboard/prestataire/commandes.php',    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
    ['id' => 'revenus',    'label' => 'Mes revenus',      'href' => '../../dashboard/prestataire/revenus.php',      'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['id' => 'messages',   'label' => 'Messagerie',       'href' => '../../dashboard/prestataire/messages.php',     'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'badge' => 5],
    ['id' => 'profil',     'label' => 'Mon profil',       'href' => '../../dashboard/prestataire/profil.php',       'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
    ['id' => 'parametres', 'label' => 'Paramètres',       'href' => '../../dashboard/prestataire/parametres.php',   'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
];
$menu_both_client = [
    ['id' => 'accueil',   'label' => 'Tableau de bord',   'href' => '../../dashboard/both/accueil.php',               'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ['id' => 'commandes', 'label' => 'Mes commandes',      'href' => '../../dashboard/both/commandes_client',      'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
    ['id' => 'services',  'label' => 'Trouver un service', 'href' => '../..//services',                             'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
    ['id' => 'avis',      'label' => 'Mes avis',           'href' => '../../dashboard/both/avis_client',           'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
    ['id' => 'messages',  'label' => 'Messagerie',         'href' => '/dashboard/both/messages_client',       'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'badge' => 3],
    ['id' => 'profil',    'label' => 'Mon profil',         'href' => '../../dashboard/both/profil_client',         'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
    ['id' => 'parametres', 'label' => 'Paramètres',         'href' => '../../dashboard/both/parametres_client',     'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
];

$menu_both_prestataire = [
    ['id' => 'accueil',    'label' => 'Tableau de bord',  'href' => '/dashboard/both/accueil',                    'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ['id' => 'prestations', 'label' => 'Mes prestations',  'href' => '/dashboard/both/prestations_prestataire',    'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ['id' => 'commandes',  'label' => 'Commandes reçues', 'href' => '/dashboard/both/commandes_prestataire',      'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
    ['id' => 'revenus',    'label' => 'Mes revenus',      'href' => '/dashboard/both/revenus_prestataire',        'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    ['id' => 'messages',   'label' => 'Messagerie',       'href' => '/dashboard/both/messages_prestataire',       'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'badge' => 5],
    ['id' => 'profil',     'label' => 'Mon profil',       'href' => '/dashboard/both/profil_prestataire',         'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
    ['id' => 'parametres', 'label' => 'Paramètres',       'href' => '/dashboard/both/parametres_prestataire',     'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
];

$is_both = ($user_type ?? 'client') === 'both';
// Priorité : 1) vue both  2) param URL  3) défaut client
if (!isset($active_role)) {
    $active_role = $_GET['role'] ?? 'client';
}
$show_presta = ($is_both && $active_role === 'prestataire') || $user_type === 'prestataire';
$menu = $is_both
    ? ($show_presta ? $menu_both_prestataire : $menu_both_client)
    : ($show_presta ? $menu_prestataire : $menu_client);
$role_label  = $show_presta ? 'Prestataire' : 'Client';
// Les hrefs both incluent déjà le role dans leur URL
?>

<aside class="fixed top-0 left-0 h-screen w-64 bg-dark flex flex-col z-40 overflow-hidden">

    <!-- Logo -->
    <div class="px-6 py-5 border-b border-white/10 flex-shrink-0">
        <a href="/" class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span class="font-display font-700 text-lg text-white">Presta<span class="text-accent">Link</span></span>
        </a>
    </div>

    <!-- Switcher rôle (double statut) ou badge simple -->
    <div class="px-4 py-3 border-b border-white/10 flex-shrink-0">
        <?php if ($is_both): ?>
            <p class="text-xs text-slate-500 mb-2 px-1">Mode actif</p>
            <div class="grid grid-cols-2 gap-1 bg-white/5 p-1 rounded-xl">
                <a href="?role=client"
                    class="text-center text-xs font-medium py-2 rounded-lg transition-all <?= $active_role !== 'prestataire' ? 'bg-primary text-white shadow' : 'text-slate-400 hover:text-white' ?>">
                    👤 Client
                </a>
                <a href="?role=prestataire"
                    class="text-center text-xs font-medium py-2 rounded-lg transition-all <?= $active_role === 'prestataire' ? 'bg-accent text-white shadow' : 'text-slate-400 hover:text-white' ?>">
                    🔧 Prestataire
                </a>
            </div>
        <?php else: ?>
            <span class="inline-flex items-center gap-1.5 text-xs font-medium px-3 py-1 rounded-full
            <?= $show_presta ? 'bg-accent/20 text-accent' : 'bg-primary/20 text-blue-300' ?>">
                <span class="w-1.5 h-1.5 rounded-full <?= $show_presta ? 'bg-accent' : 'bg-blue-300' ?>"></span>
                <?= $role_label ?>
            </span>
        <?php endif; ?>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-5 space-y-0.5 overflow-y-auto">
        <?php foreach ($menu as $item): ?>
            <?php
            $href   = $item['href'] . ($is_both ? '?role=' . $active_role : '');
            $active = ($menu_actif ?? '') === $item['id'];
            ?>
            <a href="<?= $href ?>"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all
               <?= $active ? 'bg-primary text-white font-medium shadow-sm' : 'text-slate-400 hover:bg-white/10 hover:text-white' ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="<?= $item['icon'] ?>" />
                </svg>
                <span class="flex-1"><?= $item['label'] ?></span>
                <?php if (!empty($item['badge'])): ?>
                    <span class="bg-accent text-white text-xs font-600 w-5 h-5 rounded-full flex items-center justify-center">
                        <?= $item['badge'] ?>
                    </span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <!-- Profil + déconnexion -->
    <div class="px-4 py-4 border-t border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/10 transition-all cursor-pointer mb-1">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0">
                <?= strtoupper(substr($user_prenom ?? 'U', 0, 1) . substr($user_nom ?? '', 0, 1)) ?>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate"><?= htmlspecialchars(($user_prenom ?? '') . ' ' . ($user_nom ?? '')) ?></p>
                <p class="text-xs text-slate-400 truncate"><?= htmlspecialchars($user_email ?? '') ?></p>
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