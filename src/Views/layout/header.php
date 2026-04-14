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
  <link rel="stylesheet" href="../public/css/style.css"/>
  <?= $extra_css ?? '' ?>
</head>