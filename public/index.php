<?php
// Titre de la page (lu par templates/header.php)
$page_title = 'Accueil';
$public_url = '../';
$src_url = '../';
$login_register = '../src/Views/auth/Login_register.php';
require_once __DIR__ . '/../templates/header.php';
?>

<!-- ======= HERO ======= -->
<section class="hero-bg relative min-h-screen flex items-center pt-20 overflow-hidden">
    <div class="blob w-96 h-96 bg-primary top-10 -left-32"></div>
    <div class="blob w-80 h-80 bg-accent bottom-10 right-0"></div>

    <div class="max-w-6xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-16 items-center">
        <div>
            <div class="anim-1 inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-primary text-xs font-medium px-4 py-1.5 rounded-full mb-6">
                <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                Plateforme de services en Côte d'Ivoire
            </div>

            <h1 class="anim-2 font-display font-800 text-5xl md:text-6xl leading-tight text-dark mb-6">
                Trouvez le bon<br />
                <span class="hero-underline text-primary">prestataire</span><br />
                près de chez vous
            </h1>

            <p class="anim-3 text-muted text-lg leading-relaxed mb-10 max-w-md">
                PrestaLink met en relation clients et prestataires de services qualifiés. Plomberie, électricité, ménage, jardinage — trouvez l'expert qu'il vous faut en quelques clics.
            </p>

            <div class="anim-4 flex flex-wrap gap-4">
                <a href="../src/Views/auth/Login_register.php?tab=inscription" class="btn-accent font-medium px-8 py-3.5 rounded-full text-sm">Trouver un service</a>
                <a href="../src/Views/auth/Login_register.php?tab=inscription" class="btn-primary font-medium px-8 py-3.5 rounded-full text-sm">Proposer mes services</a>
            </div>

            <!-- Stats -->
            <div class="anim-fade mt-14 flex gap-10">
                <div>
                    <p class="font-display font-800 text-3xl text-dark">500+</p>
                    <p class="text-xs text-muted mt-1">Prestataires actifs</p>
                </div>
                <div class="w-px bg-gray-200"></div>
                <div>
                    <p class="font-display font-800 text-3xl text-dark">2 400+</p>
                    <p class="text-xs text-muted mt-1">Services réalisés</p>
                </div>
                <div class="w-px bg-gray-200"></div>
                <div>
                    <p class="font-display font-800 text-3xl text-dark">4.8 ★</p>
                    <p class="text-xs text-muted mt-1">Note moyenne</p>
                </div>
            </div>
        </div>


        <!-- Côté droit Hero : image + carte flottante -->
        <div class="anim-3 relative hidden md:flex justify-center items-end min-h-[600px]">

            <!-- Image grande en arrière-plan -->
            <img
                src="../public/img/Hero/homme-tablette.png"
                alt="Utilisateur PrestaLink"
                class="absolute bottom-0 right-0 h-[580px] w-auto object-contain object-bottom z-0" />

            <!-- Carte flottante par-dessus l'image -->
            <div class="relative z-10 mb-16 mr-40 bg-white rounded-2xl shadow-2xl p-6 border border-gray-100 w-80">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-display font-600 text-dark text-sm">Commande confirmée</p>
                        <p class="text-xs text-muted">Plomberie — Abidjan Plateau</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-surface rounded-xl">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center text-white text-sm font-600">KD</div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-dark">Konan Didier</p>
                        <p class="text-xs text-muted">Plombier certifié · ⭐ 4.9</p>
                    </div>
                    <span class="text-xs bg-green-50 text-green-600 font-medium px-2 py-1 rounded-full">En route</span>
                </div>
            </div>

            <!-- Badge haut -->
            <div class="absolute top-10 left-10 z-20 bg-accent text-white text-xs font-600 px-3 py-2 rounded-xl shadow-lg font-display">
                +120 services ce mois
            </div>

            <!-- Badge bas -->
            <div class="absolute bottom-4 left-4 z-20 bg-white border border-gray-100 shadow-lg rounded-xl px-4 py-3 flex items-center gap-2">
                <div class="flex -space-x-2">
                    <div class="w-7 h-7 rounded-full bg-blue-300 border-2 border-white"></div>
                    <div class="w-7 h-7 rounded-full bg-orange-300 border-2 border-white"></div>
                    <div class="w-7 h-7 rounded-full bg-green-300 border-2 border-white"></div>
                </div>
                <p class="text-xs text-muted font-medium">+200 clients satisfaits</p>
            </div>

        </div>

    </div>
</section>

<!-- ======= DESCRIPTION ======= -->
<section id="description" class="bg-white py-24">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-xs font-medium text-accent uppercase tracking-widest">À propos</span>
                <h2 class="font-display font-700 text-4xl text-dark mt-3 mb-6 leading-tight">
                    La plateforme qui simplifie vos besoins du quotidien
                </h2>
                <p class="text-muted leading-relaxed mb-6">
                    PrestaLink est née d'un constat simple : trouver un prestataire fiable en Côte d'Ivoire prend trop de temps. Notre plateforme connecte directement les clients avec des professionnels vérifiés dans leur quartier.
                </p>
                <p class="text-muted leading-relaxed mb-8">
                    Que vous ayez besoin d'un électricien, d'une femme de ménage ou d'un jardinier, PrestaLink vous garantit rapidité, transparence et qualité de service.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dark">Prestataires vérifiés</p>
                            <p class="text-xs text-muted mt-0.5">Profils validés manuellement</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dark">Réponse rapide</p>
                            <p class="text-xs text-muted mt-0.5">En moins de 2 heures</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dark">Paiement sécurisé</p>
                            <p class="text-xs text-muted mt-0.5">Transactions protégées</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-dark">Service local</p>
                            <p class="text-xs text-muted mt-0.5">Dans votre quartier</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Étapes -->
            <div class="bg-surface rounded-2xl p-8 border border-gray-100">
                <p class="font-display font-700 text-dark text-lg mb-6">Comment PrestaLink vous aide</p>
                <div class="space-y-5">
                    <?php
                    $etapes = [
                        ['num' => '1', 'color' => 'bg-primary', 'titre' => 'Publiez votre besoin',  'desc' => 'Décrivez le service dont vous avez besoin'],
                        ['num' => '2', 'color' => 'bg-primary', 'titre' => 'Recevez des offres',    'desc' => 'Les prestataires proches vous contactent'],
                        ['num' => '3', 'color' => 'bg-accent',  'titre' => 'Choisissez et validez', 'desc' => 'Comparez les profils, choisissez le meilleur'],
                        ['num' => '4', 'color' => 'bg-accent',  'titre' => 'Évaluez le service',    'desc' => 'Donnez votre avis pour la communauté'],
                    ];
                    foreach ($etapes as $e): ?>
                        <div class="flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm">
                            <div class="w-10 h-10 rounded-full <?= $e['color'] ?> flex items-center justify-center text-white font-display font-700 text-sm flex-shrink-0"><?= $e['num'] ?></div>
                            <div>
                                <p class="text-sm font-medium text-dark"><?= $e['titre'] ?></p>
                                <p class="text-xs text-muted"><?= $e['desc'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= SERVICES ======= -->
<section id="services" class="bg-surface py-24">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-xs font-medium text-accent uppercase tracking-widest">Nos catégories</span>
            <h2 class="font-display font-700 text-4xl text-dark mt-3">Services disponibles</h2>
            <p class="text-muted mt-4 max-w-xl mx-auto">Découvrez l'ensemble des services proposés par nos prestataires certifiés partout en Côte d'Ivoire.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            <?php
            // Ces données viendront plus tard du ServiceController + Model
            $services = [
                ['icon' => '🔧', 'nom' => 'Plomberie',    'count' => '48 prestataires', 'border' => 'border-blue-100'],
                ['icon' => '⚡', 'nom' => 'Électricité',  'count' => '35 prestataires', 'border' => 'border-yellow-100'],
                ['icon' => '🧹', 'nom' => 'Ménage',       'count' => '92 prestataires', 'border' => 'border-green-100'],
                ['icon' => '🌿', 'nom' => 'Jardinage',    'count' => '27 prestataires', 'border' => 'border-emerald-100'],
                ['icon' => '🎨', 'nom' => 'Peinture',     'count' => '41 prestataires', 'border' => 'border-pink-100'],
                ['icon' => '🚗', 'nom' => 'Mécanique',    'count' => '30 prestataires', 'border' => 'border-slate-100'],
                ['icon' => '📦', 'nom' => 'Déménagement', 'count' => '19 prestataires', 'border' => 'border-orange-100'],
                ['icon' => '💻', 'nom' => 'Informatique', 'count' => '55 prestataires', 'border' => 'border-indigo-100'],
            ];
            // services/<?= strtolower($s['nom'])>
            foreach ($services as $s): ?>
                <a href="#" class="service-card bg-white border <?= $s['border'] ?> rounded-2xl p-6 text-center">
                    <div class="text-4xl mb-3"><?= $s['icon'] ?></div>
                    <p class="font-display font-600 text-dark text-sm"><?= $s['nom'] ?></p>
                    <p class="text-xs text-muted mt-1"><?= $s['count'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10">
            <a href="<?= $src_url . "/src/Views/services/liste.php" ?>" class="btn-primary inline-block font-medium px-8 py-3 rounded-full text-sm">Voir tous les services</a>
        </div>
    </div>
</section>

<!-- ======= TÉMOIGNAGES ======= -->
<section id="temoignages" class="bg-white py-24">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-xs font-medium text-accent uppercase tracking-widest">Avis clients</span>
            <h2 class="font-display font-700 text-4xl text-dark mt-3">Ce qu'ils disent de nous</h2>
            <p class="text-muted mt-4 max-w-xl mx-auto">Des milliers de clients satisfaits font confiance à PrestaLink.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <?php
            // Ces données viendront plus tard du Model Cibler (évaluation + commentaire)
            $temoignages = [
                ['nom' => 'Aya Kouassi',   'ville' => 'Abidjan, Cocody',   'note' => 5, 'avatar' => 'AK', 'color' => 'from-blue-400 to-blue-600',    'texte' => 'J\'ai trouvé un plombier en moins de 30 minutes. Travail impeccable et tarif transparent !'],
                ['nom' => 'Moussa Traoré', 'ville' => 'Abidjan, Yopougon', 'note' => 5, 'avatar' => 'MT', 'color' => 'from-orange-400 to-orange-600', 'texte' => 'Grâce à PrestaLink, j\'ai pu développer mon activité. Je reçois des commandes régulièrement.'],
                ['nom' => 'Fatou Diallo',  'ville' => 'Abidjan, Marcory',  'note' => 4, 'avatar' => 'FD', 'color' => 'from-green-400 to-green-600',   'texte' => 'Interface simple et intuitive. Très bonne expérience, je recommande vivement.'],
            ];
            foreach ($temoignages as $t): ?>
                <div class="testi-card bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                    <div class="flex gap-1 mb-4">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <svg class="w-4 h-4 <?= $i < $t['note'] ? 'text-accent' : 'text-gray-200' ?>" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-muted text-sm leading-relaxed mb-6">"<?= $t['texte'] ?>"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br <?= $t['color'] ?> flex items-center justify-center text-white text-xs font-700 font-display"><?= $t['avatar'] ?></div>
                        <div>
                            <p class="text-sm font-medium text-dark"><?= $t['nom'] ?></p>
                            <p class="text-xs text-muted"><?= $t['ville'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ======= CTA BANNER ======= -->
<section class="bg-primary py-20">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="font-display font-700 text-4xl text-white mb-4">Prêt à commencer ?</h2>
        <p class="text-blue-200 mb-10 text-lg">Rejoignez des milliers de clients et prestataires qui font confiance à PrestaLink.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?= $login_register ?? '' ?>" class="btn-accent font-medium px-8 py-3.5 rounded-full text-sm">Créer un compte gratuit</a>
            <a href="../src/Views/services/liste.php" class="bg-white/10 hover:bg-white/20 text-white font-medium px-8 py-3.5 rounded-full text-sm transition-colors">Explorer les services</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>