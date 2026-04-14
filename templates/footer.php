<!-- ======= FOOTER ======= -->
  <footer id="contact" class="bg-dark text-white py-16">
    <div class="max-w-6xl mx-auto px-6">
      <div class="grid md:grid-cols-4 gap-10 mb-12">

        <!-- Logo & description -->
        <div class="md:col-span-2">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
              </svg>
            </div>
            <span class="font-display font-700 text-xl">Presta<span class="text-accent">Link</span></span>
          </div>
          <p class="text-slate-400 text-sm leading-relaxed max-w-xs">
            La plateforme de mise en relation entre clients et prestataires de services en Côte d'Ivoire.
          </p>
          <div class="flex gap-3 mt-6">
            <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-accent transition-colors flex items-center justify-center">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-accent transition-colors flex items-center justify-center">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
            </a>
          </div>
        </div>

        <!-- Navigation -->
        <div>
          <p class="font-display font-600 text-sm mb-4">Navigation</p>
          <ul class="space-y-2">
            <li><a href="<?= $public_url . "/public/index.php"?>"         class="text-slate-400 hover:text-white text-sm transition-colors">Accueil</a></li>
            <li><a href="<?= $public_url . "/public/index.php#services"?>" class="text-slate-400 hover:text-white text-sm transition-colors">Services</a></li>
            <li><a href="<?= $src_url . "/src/Views/auth/Login_register.php?tab=inscription"?>" class="text-slate-400 hover:text-white text-sm transition-colors">S'inscrire</a></li>
            <li><a href="<?= $src_url . "/src/Views/auth/Login_register.php?tab=connexion"?>"    class="text-slate-400 hover:text-white text-sm transition-colors">Connexion</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div>
          <p class="font-display font-600 text-sm mb-4">Contact</p>
          <ul class="space-y-3">
            <li class="flex items-center gap-2 text-slate-400 text-sm">
              <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              contact@prestalink.ci
            </li>
            <li class="flex items-center gap-2 text-slate-400 text-sm">
              <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
              </svg>
              +225 07 00 00 00 00
            </li>
            <li class="flex items-start gap-2 text-slate-400 text-sm">
              <svg class="w-4 h-4 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              </svg>
              Abidjan, Côte d'Ivoire
            </li>
          </ul>
        </div>
      </div>

      <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-slate-500 text-xs">© <?= date('Y') ?> PrestaLink. Tous droits réservés.</p>
        <div class="flex gap-6">
          <a href="#" class="text-slate-500 hover:text-white text-xs transition-colors">Confidentialité</a>
          <a href="#" class="text-slate-500 hover:text-white text-xs transition-colors">Conditions d'utilisation</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts JS globaux -->
  <script src="../public/js/app.js"></script>
  <?= $extra_js ?? '' ?>
</body>
</html>