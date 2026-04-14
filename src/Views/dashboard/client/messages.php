<?php
$page_title=$menu_actif='messages'; $user_type='client';
$user_prenom=$_SESSION['prenom']??'Aya'; $user_nom=$_SESSION['nom']??'Kouassi'; $user_email=$_SESSION['email']??'aya@email.com';
$topbar_titre='Messagerie'; $topbar_sous_titre='Vos conversations avec les prestataires';
$extra_css='<link rel="stylesheet" href="../../../public/css/dashboard.css"/>';
$extra_js='<script src="../../../public/js/messages.js"></script>';
require_once __DIR__.'/../../layout/header.php';
require_once __DIR__.'/../../layout/sidebar.php';
$conversations=[
    ['nom'=>'Konan Didier',  'service'=>'Plomberie',   'dernier'=>'Je serai là à 9h demain.','heure'=>'10:32','non_lu'=>2,'avatar'=>'KD','color'=>'from-primary to-blue-400'],
    ['nom'=>'Bamba Seydou',  'service'=>'Électricité', 'dernier'=>'Merci pour votre confiance !','heure'=>'Hier','non_lu'=>0,'avatar'=>'BS','color'=>'from-green-400 to-green-600'],
    ['nom'=>'Adjoua Marie',  'service'=>'Ménage',      'dernier'=>'Le ménage est terminé.','heure'=>'Lun.','non_lu'=>1,'avatar'=>'AM','color'=>'from-orange-400 to-orange-600'],
];
$messages_actifs=[
    ['from'=>'presta','txt'=>'Bonjour ! Je confirme votre rendez-vous demain à 9h.','heure'=>'10:28'],
    ['from'=>'client','txt'=>'Parfait, merci beaucoup !','heure'=>'10:30'],
    ['from'=>'presta','txt'=>'Je serai là à 9h demain.','heure'=>'10:32'],
];
?>
<main class="ml-64 min-h-screen bg-surface flex flex-col" style="height:100vh;">
<?php require_once __DIR__.'/../../layout/topbar.php'; ?>
<div class="flex flex-1 overflow-hidden px-8 py-6 gap-6">

    <!-- Liste conversations -->
    <div class="w-72 bg-white rounded-2xl border border-gray-100 shadow-sm flex flex-col overflow-hidden flex-shrink-0">
        <div class="px-4 py-3 border-b border-gray-100">
            <input type="text" placeholder="Rechercher..." class="w-full text-sm px-3 py-2 rounded-xl bg-surface border border-gray-100 focus:outline-none focus:border-primary transition-colors placeholder-gray-400"/>
        </div>
        <div class="flex-1 overflow-y-auto divide-y divide-gray-50">
            <?php foreach($conversations as $i=>$conv): ?>
            <div onclick="ouvrirConv(<?= $i ?>)"
                 class="conv-item flex items-center gap-3 px-4 py-3.5 cursor-pointer transition-colors <?= $i===0?'bg-blue-50':'' ?> hover:bg-surface">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br <?= $conv['color'] ?> flex items-center justify-center text-white text-xs font-700 font-display flex-shrink-0">
                    <?= $conv['avatar'] ?>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-dark"><?= $conv['nom'] ?></p>
                        <p class="text-xs text-muted"><?= $conv['heure'] ?></p>
                    </div>
                    <p class="text-xs text-muted truncate mt-0.5"><?= $conv['dernier'] ?></p>
                </div>
                <?php if($conv['non_lu']>0): ?>
                <span class="bg-accent text-white text-xs font-600 w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0">
                    <?= $conv['non_lu'] ?>
                </span>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Zone de chat -->
    <div class="flex-1 bg-white rounded-2xl border border-gray-100 shadow-sm flex flex-col overflow-hidden">
        <!-- Header chat -->
        <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-100">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center text-white text-xs font-700 font-display">KD</div>
            <div>
                <p class="font-medium text-dark text-sm">Konan Didier</p>
                <p class="text-xs text-muted">Plombier · En ligne</p>
            </div>
            <div class="ml-auto flex items-center gap-1.5">
                <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                <span class="text-xs text-green-500">En ligne</span>
            </div>
        </div>
        <!-- Messages -->
        <div class="flex-1 overflow-y-auto px-6 py-5 space-y-4" id="chat-body">
            <?php foreach($messages_actifs as $m): ?>
            <div class="flex <?= $m['from']==='client'?'justify-end':'' ?>">
                <div class="max-w-xs">
                    <div class="px-4 py-2.5 rounded-2xl text-sm leading-relaxed
                        <?= $m['from']==='client'
                            ? 'bg-primary text-white rounded-br-sm'
                            : 'bg-surface text-dark rounded-bl-sm' ?>">
                        <?= $m['txt'] ?>
                    </div>
                    <p class="text-xs text-muted mt-1 <?= $m['from']==='client'?'text-right':'' ?>"><?= $m['heure'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Input message -->
        <div class="px-6 py-4 border-t border-gray-100">
            <div class="flex items-center gap-3">
                <input type="text" id="msg-input" placeholder="Écrire un message..."
                       class="flex-1 text-sm px-4 py-3 rounded-xl bg-surface border border-gray-100 focus:outline-none focus:border-primary transition-colors placeholder-gray-400"/>
                <button onclick="envoyerMessage()" class="btn-primary px-5 py-3 rounded-xl text-sm font-medium">
                    Envoyer
                </button>
            </div>
        </div>
    </div>
</div>
</main>
<?php require_once __DIR__.'/../../layout/footer.php'; ?>