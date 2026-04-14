<?php
$page_title = 'Détail de la prestation';
$extra_css  = '<link rel="stylesheet" href="../../public/css/services.css"/>';
$extra_js   = '<script src="../../public/js/services.js"></script>';
require_once __DIR__ . '/../../../templates/header.php';

// Ces données viendront du ServiceController via l'id en URL
$prestation = [
    'id'          => 1,
    'titre'       => 'Dépannage plomberie urgence',
    'cat'         => 'Plomberie',
    'cat_icon'    => '🔧',
    'prix'        => 15000,
    'note'        => 4.9,
    'avis'        => 28,
    'desc_courte' => 'Intervention rapide 7j/7. Fuites, robinetterie, canalisations.',
    'desc_longue' => 'Je propose un service de dépannage plomberie rapide et fiable, disponible tous les jours de la semaine. Qu\'il s\'agisse d\'une fuite d\'eau, d\'un robinet à changer, d\'une canalisation bouchée ou d\'une installation complète, j\'interviens dans les meilleurs délais. Certifié et expérimenté, je garantis un travail soigné avec des matériaux de qualité.',
    'inclus'      => ['Déplacement inclus','Diagnostic gratuit','Matériel fourni','Garantie 30 jours'],
    'delai'       => 'Moins de 2 heures',
    'zone'        => 'Abidjan — Cocody, Plateau, Marcory, Treichville',
];

$prestataire = [
    'prenom'      => 'Konan',
    'nom'         => 'Didier',
    'avatar'      => 'KD',
    'color'       => 'from-primary to-blue-400',
    'note'        => 4.9,
    'avis'        => 28,
    'commandes'   => 87,
    'membre_depuis'=> 'Janvier 2024',
    'bio'         => 'Plombier certifié avec 8 ans d\'expérience à Abidjan. Sérieux, ponctuel et professionnel.',
    'disponible'  => true,
];

$avis_clients = [
    ['nom'=>'Aya K.',   'note'=>5,'date'=>'03 Avr. 2026','txt'=>'Intervention très rapide, problème réglé en 30 min. Je recommande !'],
    ['nom'=>'Fatou D.', 'note'=>5,'date'=>'28 Mar. 2026','txt'=>'Très professionnel, matériel de qualité. Tarif honnête.'],
    ['nom'=>'Moussa T.','note'=>4,'date'=>'15 Mar. 2026','txt'=>'Bon travail, un peu de retard mais bon résultat final.'],
];
?>

<div class="pt-20 bg-surface min-h-screen">
    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-muted mb-8">
            <a href="/" class="hover:text-primary transition-colors">Accueil</a>
            <span>/</span>
            <a href="/services" class="hover:text-primary transition-colors">Services</a>
            <span>/</span>
            <span class="text-dark"><?= $prestation['titre'] ?></span>
        </nav>

        <div class="grid grid-cols-3 gap-8">

            <!-- Colonne principale -->
            <div class="col-span-2 space-y-6">

                <!-- Carte principale -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                    <div class="flex items-start justify-between mb-5">
                        <div>
                            <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-blue-50 text-primary mb-3 inline-block">
                                <?= $prestation['cat_icon'] ?> <?= $prestation['cat'] ?>
                            </span>
                            <h1 class="font-display font-700 text-3xl text-dark leading-tight">
                                <?= $prestation['titre'] ?>
                            </h1>
                        </div>
                        <div class="flex items-center gap-1.5 bg-yellow-50 px-3 py-1.5 rounded-xl flex-shrink-0">
                            <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="font-display font-700 text-sm text-dark"><?= $prestation['note'] ?></span>
                            <span class="text-xs text-muted">(<?= $prestation['avis'] ?> avis)</span>
                        </div>
                    </div>

                    <p class="text-muted leading-relaxed mb-6"><?= $prestation['desc_longue'] ?></p>

                    <!-- Ce qui est inclus -->
                    <div class="grid grid-cols-2 gap-3">
                        <?php foreach($prestation['inclus'] as $inc): ?>
                        <div class="flex items-center gap-2 bg-green-50 px-3 py-2 rounded-xl">
                            <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-xs font-medium text-green-700"><?= $inc ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Infos pratiques -->
                    <div class="grid grid-cols-2 gap-4 mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-muted">Délai d'intervention</p>
                                <p class="text-sm font-medium text-dark"><?= $prestation['delai'] ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-orange-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-muted">Zone d'intervention</p>
                                <p class="text-sm font-medium text-dark"><?= $prestation['zone'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profil prestataire -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h2 class="font-display font-600 text-dark mb-5">Le prestataire</h2>
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br <?= $prestataire['color'] ?> flex items-center justify-center text-white font-display font-700 text-lg flex-shrink-0">
                            <?= $prestataire['avatar'] ?>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-1">
                                <p class="font-display font-600 text-dark"><?= $prestataire['prenom'].' '.$prestataire['nom'] ?></p>
                                <?php if($prestataire['disponible']): ?>
                                <span class="inline-flex items-center gap-1 text-xs font-medium px-2 py-0.5 rounded-full bg-green-50 text-green-600">
                                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full"></span>
                                    Disponible
                                </span>
                                <?php endif; ?>
                            </div>
                            <p class="text-sm text-muted mb-4"><?= $prestataire['bio'] ?></p>
                            <div class="flex gap-6">
                                <div class="text-center">
                                    <p class="font-display font-700 text-lg text-dark"><?= $prestataire['note'] ?>★</p>
                                    <p class="text-xs text-muted">Note</p>
                                </div>
                                <div class="w-px bg-gray-100"></div>
                                <div class="text-center">
                                    <p class="font-display font-700 text-lg text-dark"><?= $prestataire['avis'] ?></p>
                                    <p class="text-xs text-muted">Avis</p>
                                </div>
                                <div class="w-px bg-gray-100"></div>
                                <div class="text-center">
                                    <p class="font-display font-700 text-lg text-dark"><?= $prestataire['commandes'] ?></p>
                                    <p class="text-xs text-muted">Missions</p>
                                </div>
                                <div class="w-px bg-gray-100"></div>
                                <div class="text-center">
                                    <p class="font-display font-700 text-sm text-dark"><?= $prestataire['membre_depuis'] ?></p>
                                    <p class="text-xs text-muted">Membre depuis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Avis clients -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h2 class="font-display font-600 text-dark mb-5">Avis clients (<?= count($avis_clients) ?>)</h2>
                    <div class="space-y-4">
                        <?php foreach($avis_clients as $a): ?>
                        <div class="p-4 bg-surface rounded-xl">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-sm font-medium text-dark"><?= $a['nom'] ?></p>
                                <div class="flex items-center gap-2">
                                    <div class="flex gap-0.5">
                                        <?php for($i=0;$i<5;$i++): ?>
                                        <svg class="w-3.5 h-3.5 <?= $i<$a['note']?'text-accent':'text-gray-200' ?>" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="text-xs text-muted"><?= $a['date'] ?></span>
                                </div>
                            </div>
                            <p class="text-sm text-muted leading-relaxed">"<?= $a['txt'] ?>"</p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Colonne commande (sticky) -->
            <div class="col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6 sticky top-24">
                    <p class="font-display font-700 text-3xl text-primary mb-1">
                        <?= number_format($prestation['prix'],0,',',' ') ?> <span class="text-base font-400 text-muted">FCFA</span>
                    </p>
                    <p class="text-xs text-muted mb-6">Prix indicatif — à confirmer avec le prestataire</p>

                    <!-- Formulaire commande -->
                    <form action="/commandes/new" method="POST" class="space-y-4">
                        <input type="hidden" name="id_prestation" value="<?= $prestation['id'] ?>"/>

                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Date souhaitée</label>
                            <input type="date" name="date_souhaitee" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all bg-surface"/>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Adresse d'intervention</label>
                            <input type="text" name="adresse" placeholder="Votre adresse complète" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all bg-surface placeholder-gray-400"/>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Description du problème</label>
                            <textarea name="description" rows="3" placeholder="Décrivez brièvement votre besoin..."
                                      class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition-all bg-surface placeholder-gray-400 resize-none"></textarea>
                        </div>

                        <button type="submit" class="btn-accent w-full py-3.5 rounded-xl font-medium text-sm">
                            Commander maintenant
                        </button>
                        <a href="/dashboard/client/messages?presta=<?= $prestataire['prenom'] ?>"
                           class="flex items-center justify-center gap-2 w-full py-3 rounded-xl border border-gray-200 text-sm text-muted hover:border-primary hover:text-primary transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Contacter le prestataire
                        </a>
                    </form>

                    <!-- Garanties -->
                    <div class="mt-5 pt-5 border-t border-gray-100 space-y-2">
                        <?php foreach(['Paiement sécurisé','Prestataire vérifié','Satisfaction garantie'] as $g): ?>
                        <div class="flex items-center gap-2 text-xs text-muted">
                            <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <?= $g ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../../templates/footer.php'; ?>