<?php
$page_title = 'Connexion / Inscription';
$public_url = '../../..';
$src_url = '';
$page_home = $public_url . '/public/index.php';
$extra_css   = '<link rel="stylesheet" href="' . $public_url . '/public/css/auth.css"/>'; // ← ajoute
$extra_js    = '<script src="' . $public_url . '/public/js/auth.js"></script>';           // ← ajoute
require_once __DIR__ . '/../layout/header.php';
?>

<section class="min-h-screen bg-surface flex items-center justify-center py-24 px-4 ">

    <!-- Blobs décoratifs -->
    <div class="blob w-96 h-96 bg-primary top-0 -left-32 absolute"></div>
    <div class="blob w-80 h-80 bg-accent bottom-0 right-0 absolute"></div>

    <div class="relative z-10 w-full max-w-md">

        <!-- Logo centré -->
        <div class="text-center mb-8">
            <a href="<?= $page_home ?>" class="inline-flex items-center gap-2">
                <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-display font-700 text-2xl text-dark">Presta<span class="text-primary">Link</span></span>
            </a>
        </div>

        <!-- Carte principale -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            <!-- Onglets -->
            <div class="flex">
                <button
                    onclick="switchTab('connexion')"
                    id="tab-connexion"
                    class="tab-btn flex-1 py-4 text-sm font-medium transition-all duration-200 border-b-2 border-primary text-primary bg-blue-50">
                    Connexion
                </button>
                <button
                    onclick="switchTab('inscription')"
                    id="tab-inscription"
                    class="tab-btn flex-1 py-4 text-sm font-medium transition-all duration-200 border-b-2 border-transparent text-muted hover:text-dark">
                    Inscription
                </button>
            </div>

            <div class="p-8">

                <!-- ===== FORMULAIRE CONNEXION ===== -->
                <div id="form-connexion">
                    <div class="mb-6">
                        <h2 class="font-display font-700 text-2xl text-dark">Bon retour !</h2>
                        <p class="text-muted text-sm mt-1">Connectez-vous à votre compte PrestaLink</p>
                    </div>

                    <form action="/auth/login" method="POST" class="space-y-4">
                        <?php if (isset($error_login)): ?>
                            <div class="bg-red-50 border border-red-100 text-red-600 text-sm px-4 py-3 rounded-xl">
                                <?= htmlspecialchars($error_login) ?>
                            </div>
                        <?php endif; ?>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Adresse email</label>
                            <div class="relative">
                                <div class="absolute left-3 top-1/2 -translate-y-1/2">
                                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="votre@email.com"
                                    required
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <label class="block text-sm font-medium text-dark">Mot de passe</label>
                                <a href="/auth/forgot-password" class="text-xs text-primary hover:underline">Mot de passe oublié ?</a>
                            </div>
                            <div class="relative">
                                <div class="absolute left-3 top-1/2 -translate-y-1/2">
                                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password"
                                    id="pwd-login"
                                    placeholder="••••••••"
                                    required
                                    class="input-field w-full pl-10 pr-10 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                                <button type="button" onclick="togglePassword('pwd-login', 'eye-login')" class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <svg id="eye-login" class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Se souvenir de moi -->
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-gray-300 text-primary accent-primary" />
                            <label for="remember" class="text-sm text-muted">Se souvenir de moi</label>
                        </div>

                        <button type="submit" class="btn-primary w-full py-3.5 rounded-xl font-medium text-sm mt-2">
                            Se connecter
                        </button>
                    </form>

                    <p class="text-center text-sm text-muted mt-6">
                        Pas encore de compte ?
                        <button onclick="switchTab('inscription')" class="text-primary font-medium hover:underline">S'inscrire</button>
                    </p>
                </div>

                <!-- ===== FORMULAIRE INSCRIPTION ===== -->
                <div id="form-inscription" class="hidden">
                    <div class="mb-6">
                        <h2 class="font-display font-700 text-2xl text-dark">Créer un compte</h2>
                        <p class="text-muted text-sm mt-1">Rejoignez PrestaLink gratuitement</p>
                    </div>

                    <!-- Type de compte -->
                    <div class="grid grid-cols-2 gap-3 mb-5">
                        <label class="account-type-label cursor-pointer">
                            <input type="radio" name="type_compte" value="client" class="hidden peer" checked />
                            <div class="peer-checked:border-primary peer-checked:bg-blue-50 peer-checked:text-primary border-2 border-gray-200 rounded-xl p-3 text-center transition-all">
                                <div class="text-2xl mb-1">👤</div>
                                <p class="text-xs font-medium">Je suis client</p>
                                <p class="text-xs text-muted mt-0.5">Je cherche un service</p>
                            </div>
                        </label>
                        <label class="account-type-label cursor-pointer">
                            <input type="radio" name="type_compte" value="prestataire" class="hidden peer" />
                            <div class="peer-checked:border-primary peer-checked:bg-blue-50 peer-checked:text-primary border-2 border-gray-200 rounded-xl p-3 text-center transition-all">
                                <div class="text-2xl mb-1">🔧</div>
                                <p class="text-xs font-medium">Je suis prestataire</p>
                                <p class="text-xs text-muted mt-0.5">Je propose un service</p>
                            </div>
                        </label>
                    </div>

                    <form action="/auth/register" method="POST" class="space-y-4">
                        <?php if (isset($error_register)): ?>
                            <div class="bg-red-50 border border-red-100 text-red-600 text-sm px-4 py-3 rounded-xl">
                                <?= htmlspecialchars($error_register) ?>
                            </div>
                        <?php endif; ?>

                        <!-- Nom & Prénom -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium text-dark mb-1.5">Nom</label>
                                <input
                                    type="text"
                                    name="nom"
                                    placeholder="Konan"
                                    required
                                    class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark mb-1.5">Prénom</label>
                                <input
                                    type="text"
                                    name="prenom"
                                    placeholder="Didier"
                                    required
                                    class="input-field w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Adresse email</label>
                            <div class="relative">
                                <div class="absolute left-3 top-1/2 -translate-y-1/2">
                                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="votre@email.com"
                                    required
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Téléphone</label>
                            <div class="relative">
                                <div class="absolute left-3 top-1/2 -translate-y-1/2">
                                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input
                                    type="tel"
                                    name="telephone"
                                    placeholder="+225 07 00 00 00 00"
                                    required
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Mot de passe</label>
                            <div class="relative">
                                <div class="absolute left-3 top-1/2 -translate-y-1/2">
                                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password"
                                    id="pwd-register"
                                    placeholder="••••••••"
                                    required
                                    minlength="8"
                                    class="input-field w-full pl-10 pr-10 py-3 rounded-xl border border-gray-200 text-sm text-dark placeholder-gray-400 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" />
                                <button type="button" onclick="togglePassword('pwd-register', 'eye-register')" class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <svg id="eye-register" class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <!-- Indicateur force mot de passe -->
                            <div class="mt-2 flex gap-1">
                                <div class="strength-bar h-1 flex-1 rounded-full bg-gray-200" id="bar1"></div>
                                <div class="strength-bar h-1 flex-1 rounded-full bg-gray-200" id="bar2"></div>
                                <div class="strength-bar h-1 flex-1 rounded-full bg-gray-200" id="bar3"></div>
                                <div class="strength-bar h-1 flex-1 rounded-full bg-gray-200" id="bar4"></div>
                            </div>
                            <p class="text-xs text-muted mt-1" id="strength-label">Minimum 8 caractères</p>
                        </div>

                        <!-- CGU -->
                        <div class="flex items-start gap-2">
                            <input type="checkbox" name="cgu" id="cgu" required class="w-4 h-4 mt-0.5 rounded border-gray-300 accent-primary" />
                            <label for="cgu" class="text-xs text-muted leading-relaxed">
                                J'accepte les <a href="/cgu" class="text-primary hover:underline">conditions d'utilisation</a> et la <a href="/confidentialite" class="text-primary hover:underline">politique de confidentialité</a>
                            </label>
                        </div>

                        <button type="submit" class="btn-accent w-full py-3.5 rounded-xl font-medium text-sm mt-2">
                            Créer mon compte
                        </button>
                    </form>

                    <p class="text-center text-sm text-muted mt-6">
                        Déjà un compte ?
                        <button onclick="switchTab('connexion')" class="text-primary font-medium hover:underline">Se connecter</button>
                    </p>
                </div>

            </div>
        </div>

        <!-- Retour accueil -->
        <p class="text-center text-xs text-muted mt-6">
            <a href="<?= $page_home ?? 'index.php' ?>" class="hover:text-primary transition-colors">← Retour à l'accueil</a>
        </p>

    </div>
</section>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>