<?php
/**
 * Vue both — onglet client : profil
 * Charge la vue client correspondante en forçant user_type=both
 * et en préservant le paramètre role=client dans la sidebar.
 */
$user_type   = 'both';
$active_role = 'client';

// On charge le contenu de la vue client/profil
// en réutilisant exactement le même fichier
require_once __DIR__ . '/../client/profil.php';
