<?php
/**
 * Vue both — onglet client : messages
 * Charge la vue client correspondante en forçant user_type=both
 * et en préservant le paramètre role=client dans la sidebar.
 */
$user_type   = 'both';
$active_role = 'client';

// On charge le contenu de la vue client/messages
// en réutilisant exactement le même fichier
require_once __DIR__ . '/../client/messages.php';
