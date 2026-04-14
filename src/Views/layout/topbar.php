<?php

/**
 * Topbar dashboard
 * Variables attendues : $topbar_titre, $topbar_sous_titre, $topbar_btn_label, $topbar_btn_href
 */
?>
<div class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-30">
    <div>
        <h1 class="font-display font-700 text-xl text-dark"><?= $topbar_titre ?? '' ?></h1>
        <p class="text-xs text-muted mt-0.5"><?= $topbar_sous_titre ?? '' ?></p>
    </div>
    <?php if (!empty($topbar_btn_label)): ?>
        <a href="<?= $topbar_btn_href ?? '#' ?>" class="btn-accent text-sm font-medium px-5 py-2.5 rounded-full">
            <?= $topbar_btn_label ?>
        </a>
    <?php endif; ?>
</div>