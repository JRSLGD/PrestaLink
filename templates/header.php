<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $page_title ?? 'PrestaLink' ?> — Mise en relation clients et prestataires</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary:        '#1B4FD8',
            'primary-dark': '#1340B0',
            accent:         '#F97316',
            'accent-dark':  '#EA6C0A',
            dark:           '#0F1729',
            muted:          '#64748B',
            surface:        '#F8FAFF',
          },
          fontFamily: {
            display: ['Syne', 'sans-serif'],
            body:    ['DM Sans', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <link rel="stylesheet" href="<?= $public_url . "/public/css/style.css"?>"/>
  <?= $extra_css ?? '' ?>
</head>
<body class="bg-white text-dark overflow-x-hidden">

  <!-- NAVBAR -->
  <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
      <a href="<?= $page_home ?? 'index.php'?>" class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
          </svg>
        </div>
        <span class="font-display font-700 text-xl text-dark">Presta<span class="text-primary">Link</span></span>
      </a>

      <div class="hidden md:flex items-center gap-8">
        <a href="<?= $public_url . "/public/index.php#services"?>"    class="text-sm text-muted hover:text-primary transition-colors">Services</a>
        <a href="<?= $public_url . "/public/index.php#description"?>"     class="text-sm text-muted hover:text-primary transition-colors">Comment ça marche</a>
        <a href="<?= $public_url . "/public/index.php#temoignages"?>" class="text-sm text-muted hover:text-primary transition-colors">Témoignages</a>
        <a href="<?= $public_url . "/public/index.php#contact"?>"     class="text-sm text-muted hover:text-primary transition-colors">Contact</a>
      </div>

      <div class="flex items-center gap-3">
        <a href="<?= $src_url . "/src/Views/auth/Login_register.php?tab=connexion"?>" class="text-sm font-medium text-primary hover:text-primary-dark transition-colors">Connexion</a>
        <a href="<?= $src_url . "/src/Views/auth/Login_register.php?tab=inscription"?>" class="btn-accent text-sm font-medium px-5 py-2 rounded-full">S'inscrire</a>
      </div>
    </div>
  </nav>