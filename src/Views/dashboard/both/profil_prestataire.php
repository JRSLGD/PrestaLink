<?php
/**
 * Vue both — onglet prestataire : profil
 * Charge la vue prestataire correspondante en forçant user_type=both
 * et en préservant le paramètre role=prestataire dans la sidebar.
 */
$user_type   = 'both';
$active_role = 'prestataire';

require_once __DIR__ . '/../prestataire/profil.php';
