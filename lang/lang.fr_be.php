<?php
/* Structure des liens */
define("LINK_METAL_QUOTES", "/achat/metaux"); 
define("LINK_DEEE_QUOTES", "/achat/deee");
define("LINK_CAT_ETAIN", "/achat/metaux/etain");
define("LINK_CAT_SPECIAL", "/achat/metaux/speciaux"); // NEW
define("LINK_CAT_ARGENTE", "/achat/metaux/metal-argent");
define("LINK_CAT_SILVER", "/achat/metaux/argent-massif"); // NEW
define("LINK_PRODUCT", "/achat/%s/%s/%s");
define("LINK_SEND", "/vendre/envoi-postal");
define("LINK_SELL", "/vendre/marchandise");
define("LINK_CATA", "/achat/catalyseur");
define("LINK_CATA_CATALOGUE", "/achat/catalyseur/catalogue");
define("LINK_RADIO", "/achat/radio-medicale");
define("LINK_CALC", "/achat/calculateur-moteur");
define("LINK_TURBO", "/achat/turbo-voiture");
define("LINK_SERVICES", "/services");
define("LINK_PICTURES", "/photos");
define("LINK_REGISTER", "/inscription");
define("LINK_FAQ", "/faq");
define("LINK_CONTACT", "/contact");
define("LINK_ACCOUNT", "/compte");
define("LINK_LOGOUT", "?logout=1");

// En relation avec LINK_METAL_QUOTES et LINK_DEEE_QUOTES
define("LINK_METAL_QUOTES_DEST", "metaux");
define("LINK_DEEE_QUOTES_DEST", "deee");
define("REFERER_BUY", "achat");

// currency
define("CURRENCY", "&euro;");

define ("MONTH1", "Janvier");
define ("MONTH2", "F�vrier");
define ("MONTH3", "Mars");
define ("MONTH4", "Avril");
define ("MONTH5", "Mai");
define ("MONTH6", "Juin");
define ("MONTH7", "Juillet");
define ("MONTH8", "Aout");
define ("MONTH9", "Septembre");
define ("MONTH10", "Octobre");
define ("MONTH11", "Novembre");
define ("MONTH12", "D�cembre");

// Title
define("TITLE_METAL_QUOTES", "Prix des m�taux sp�ciaux (non-ferreux) en Belgique");
define("TITLE_SERVICES", "Grossiste pour la r�cup�ration de m�taux sp�ciaux et D3E");
define("TITLE_SEND", "D�roulement de l'envoi postal s�curis� pour les petites quantit�s");
define("TITLE_PROCESS", "Instructions pour vendre de la marchandise chez Metalcash");
define("TITLE_PICTURES", "Photos Metalcash: R�cup�rateur de m�taux sp�ciaux et DEEE");
define("TITLE_CONTACT", "Contactez Metalcash - Num�ro de t�l�phone: +32 474 01 12 93");
define("TITLE_DEEE_QUOTES", "Achat des DEEE: Prix au kilo");
define("TITLE_ARGENTERIE", "M�tal Argent�: Achat � %s%s - Prix au kilo");
define("TITLE_ETAIN", "Achat d'�tain Pur � %s%s - Prix de l'�tain au kilo");
// Nouvelle cat�gorie
define("TITLE_CALC", "Achat de calculateur moteur voiture �lectronique toutes marques");
define("TITLE_CATA", "Achat catalyseur: Prix des pots catalytiques voitures");
define("TITLE_RADIO", "Achat radiographie m�dicale: Prix des radios d'h�pitaux");
define("TITLE_TURBO", "Achat turbo voiture cass�: Prix des turbos cass�s");
define("TITLE_SPECIAL", "Achat des m�taux Sp�ciaux et d�chets de poin�onnage - Prix au kilo");
// Standard
define("TITLE_SITEMAP", "Plan du site - Sitemap");
define("TITLE_REGISTER", "Inscription gratuite sur Metalcash");
define("TITLE_FAQ", "Foire aux questions - Achat, paiement et livraison Metalcash");
define("TITLE_DEFAULT", "Achat d'�tain, M�tal argent�, DEEE et Argent Massif");

// NEW TITRE
define("TITLE_LEGAL", "Mentions l�gales et Adresse de la Soci�t� Metalcash");
define("TITLE_SILVER", "Argent Massif: Achat � %s%s - Prix au kilo");

// Description
define("DESCRIPTION_METAL_QUOTES", "Nous achetons aux meilleurs prix les m�taux non-ferreux en Belgique.");
define("DESCRIPTION_SERVICES", "Metalcash est un grossiste en Belgique pour l'�tain, le m�tal argent� et les cartes �lectroniques D3E.");
define("DESCRIPTION_SEND", "Si vous souhaitez vendre de petites quantit�s de m�taux sp�ciaux, en toute s�curit�, toutes les informations sont sur cette page.");
define("DESCRIPTION_PROCESS", "Nous vous expliquons comment vendre votre marchandise chez Metalcash sur cette page");
define("DESCRIPTION_PICTURES", "Sur cette page sont affich�s les photos de denr�es r�cup�r�es quotidiennement chez Metalcash Belgique. Affichez les photos en cliquant dessus.");
define("DESCRIPTION_CONTACT", "Obtenez un rendez-vous en moins de 24 heures pour venir vendre vos m�taux en Belgique.");
define("DESCRIPTION_DEEE_QUOTES", "Achat au meilleur prix des DEEE - Nous achetons en petites ou grosses quantit�s toutes les cartes �lectroniques et composants D3E. Paiement cash.");
define("DESCRIPTION_ARGENTERIE", "Achat au meilleur prix du m�tal argent� - Nous achetons en petites ou grosses quantit�s les couverts et le m�tal argent�. Paiement cash.");
define("DESCRIPTION_ETAIN", "Achat au meilleur prix de l'�tain - Nous achetons en petites ou grosses quantit�s tous les objets et d�chets d'�tain.");
define("DESCRIPTION_REGISTER", "Inscrivez-vous gratuitement pour obtenir tous les prix des m�taux non-ferreux ainsi que les prix des DEEE.");
define("DESCRIPTION_FAQ", "FAQ: Ici se trouvent les questions fr�quemment pos�es sur le rachat des m�taux sp�ciaux et non-ferreux chez Metalcash.");
define("DESCRIPTION_DEFAULT", "Metalcash est le num�ro 1 de l'achat d'�tain, l'achat de m�tal argent� et l'achat de DEEE en Belgique avec un paiement imm�diat.");
// Nouvelle cat�gorie
define("DESCRIPTION_CALC", "Calculateur moteur: Nous achetons au meilleur prix les calculateurs moteurs �lectroniques toutes marques.");
define("DESCRIPTION_CATA", "Catalyseur: Nous achetons aux meilleurs prix les pots catalytiques toutes marques.");
define("DESCRIPTION_RADIO", "Radio m�dicale - Nous achetons aux meilleur prix les radiographies d'h�pital.");
define("DESCRIPTION_TURBO", "Turbo voiture: Nous achetons aux meilleur prix les turbos voitures cass�s.");
define("DESCRIPTION_SITEMAP", "Cette page vous permet de parcourir toutes les cat�gories de notre site rapidement.");
define("DESCRIPTION_SPECIAL", "Prix au kilo pour l'Hafnium, le Molybd�ne, Titane Iridium, les d�chets de poin�onnage Argent ou Or.");

// NEW TITRE
define("DESCRIPTION_LEGAL", "Les mentions l�gales et informations concernant la Soci�t� Metalcash");
define("DESCRIPTION_SILVER", "Les prix de de l'argent massif et tout les �l�ments qui contienent plus de 50% d'Argent contenu");

// Keywords
define("KEYWORDS_METAL_QUOTES", "achat m�taux, vente m�taux, cours des m�taux, prix des m�taux, vieux m�taux");
define("KEYWORDS_SERVICES", "grossiste m�taux, grossiste �tain, grossiste m�tal argent�, grossiste deee, enl�vement m�taux");
define("KEYWORDS_PICTURES", "m�taux sp�ciaux photo, photos m�talcash, photos �tain, photos m�tal argent�, photos DEEE");
define("KEYWORDS_SEND", "vente de m�taux, envoi postal metalcash, envoi de petite quantit� de m�taux");
define("KEYWORDS_PROCESS", "vendre m�taux, envoi m�taux, paiement m�taux");
define("KEYWORDS_CONTACT", "contact metalcash, metalcash, adresse metalcash, t�l�phone metalcash, cash metal");
define("KEYWORDS_DEEE_QUOTES", "achat deee, prix deee, cours deee, prix d3e, prix pcb classe 1");
define("KEYWORDS_ARGENTERIE", "achat m�tal argent�, prix m�tal argent�, prix argenterie, prix couverts en argent, prix pi�ces de forme en argent");
define("KEYWORDS_ETAIN", "achat �tain, prix �tain, prix �tain fran�ais, prix �tain allemand, prix viel �tain");
define("KEYWORDS_REGISTER", "inscription metalcash, meilleur prix metalcash, membre metalcash");
define("KEYWORDS_FAQ", "faq metalcash, questions metalcash, r�ponses metalcash, metalcash paiement, livraison metalcash");
define("KEYWORDS_DEFAULT", "metalcash, achat m�taux, �tain, m�tal argent�, deee");
// Nouvelle cat�gorie
define("KEYWORDS_CALC", "calculateur moteur, calculateur fer/alu, calculateur �lectronique");
define("KEYWORDS_CATA", "catalyseur, pots catalytiques");
define("KEYWORDS_RADIO", "radio, radiographie, radio X");
define("KEYWORDS_TURBO", "turbo, turbo voiture");
define("KEYWORDS_SPECIAL", "Hafnium, Molybd�ne, Iridium, Black Titane, Tantale");
define("KEYWORDS_SITEMAP", "sitemap, plan du site");

// Logo title
define("METALCASH_HOME", "Accueil");

// Header Menu
define("MENU_BUY", "Prix d'achat");
define("MENU_BUY_SUB", "du %s");
define("MENU_METAL_PRICE", "Prix de tous les m�taux");
define("MENU_DEEE_PRICE", "Prix des DEEE (WEEE)");
define("MENU_SPECIAL_PRICE", "Prix M�taux Sp�ciaux");
define("MENU_ETAIN_PRICE", "Prix d'achat de l'�tain");
define("MENU_ARGENTE_PRICE", "Prix du m�tal argent�");
define("MENU_SILVER_PRICE", "Prix de l'Argent Massif");
define("MENU_CALC_PRICE", "Prix calculateurs moteurs");
define("MENU_CATA_PRICE", "Prix catalyseurs voitures");
define("MENU_RADIO_PRICE", "Prix radios m�dicales");
define("MENU_TURBO_PRICE", "Prix turbo voitures");
define("MENU_SERVICES", "Recyclage");
define("MENU_SERVICES_SUB", "Infos & Services");
define("MENU_SELL", "D�roulement de l'achat");
define("MENU_SEND", "Informations sur l'envoi postal");
define("MENU_PICTURES", "Photos des denr�es r�cup�r�es");
define("MENU_REGISTRATION", "Inscription");
define("MENU_CONTACT_SUB", "Nous joindre");
define("MENU_RDV", "Formulaire de Contact");

// Global and menu
define("CONTACT_US", "Contact");
define("FAQ", "Foires aux questions");
define("SITEMAP", "Plan du site");
define("CALL_US", "Appelez-nous!");

// Subheader
define("SUBHEADER", "Metalcash offre le meilleur prix pour les m�taux sp�ciaux en Europe. Offre de prix sur-mesure � partir de 5,000kg");

define("OPENED_HORARY", "Horaires d'ouverture uniquement sur rendez-vous");
define("MON_TO_FRI", "Du lundi au vendredi");
define("SAT", "Le samedi");

define("SLIDE_TITLE", "Achat de m�taux et recyclage sp�cialis�");

define("SLIDE1_TITLE_ETAIN", "Vendre de l'�tain");
define("SLIDE1_TITLE_ARGENTE", "Vendre du m�tal argent�");
define("SLIDE1_TITLE_DEEE", "Vendre des DEEE");
define("SLIDE1_TITLE_CALC", "Vendre des calculateurs moteurs");
define("SLIDE1_TITLE_CATA", "Vendre des catalyseurs");
define("SLIDE1_TITLE_RADIO", "Vendre des radiographies m�dicales");
define("SLIDE1_TITLE_TURBO", "Vendre des turbos voitures");

define("SLIDE2_TITLE", "Analyse et mesure du poids transparent");
define("SLIDE2_SUB1", "Nous analysons la marchandise et pesons devant vous");

define("SLIDE3_TITLE", "Paiement imm�diat*");
define("SLIDE3_SUB1", "Les prix d'achat sont mis � jour toutes les 4 heures");
define("SLIDE3_SUB2", "*contactez-nous pour conna�tre les modalit�s de r�glement");

define("ACTUAL_PRICE", "Prix actuels");

define("TEXT_MA", "M�tal argent�");
define("TEXT_ETAIN_98", "�tain (99%)");
define("TEXT_ETAIN_90", "�tain (90%)");
define("TEXT_ETAIN_80", "�tain (80%)");
define("TEXT_SHOW_PRICE", "afficher le prix");
define("TEXT_SHOW_PRICES", "afficher les prix");

define("SMALL_QUANTITIES", "Petites quantit�s? Cliquez ici");
define("BIG_QUANTITIES", "Grosses quantit�s? Cliquez ici");

define("CONNECT_TO_ACCOUNT", "Connexion � votre compte");
define("AUTH_FAILED", "Authentification �chou�e!");
define("NO_ACCOUNT", "Pas de compte? Inscrivez-vous");
define("STAY_LOGGED", "Rester connect�");
define("CONNECTION", "Connexion");
define("NEWS", "Actualit�s Metalcash");

define("PERSONNAL_ACC", "Votre compte personnel");
define("WELCOME", "Connect�");
define("ACCOUNT_PENDING", "Les prix par d�faut sont affich�s.");
define("LOGOUT", "d�connexion");
define("LOGOUT_NOW", "D�connectez-vous");

define("NEWS2_TITLE", "Achat m�tal argent�");
define("NEWS2_DESCR", "Valorisez vos couverts en m�tal argent�! Nous achetons � %s%s du kilo vos couverts en plaqu�s argents.");

define("NEWS4_TITLE", "Foire aux questions");
define("NEWS4_DESCR", "Une page consacr�e aux questions fr�quemment pos�es sur nos diff�rents services et notre site Metal cash.");

define("NEWS_STATIC_TITLE", "Achat d'�tain au kg");
define("NEWS_STATIC_DESCR", "Nous achetons au prix fort l'�tain en gros. Livraison minimale de 100kg en nos locaux, pour les plus petites quantit�s, veuillez utiliser notre service d'envoi postal.");

define("FOOTER", "2012-%s Tous droits r�serv�s - <strong>Metalcash</strong>");
define("BOTTOMFOOTER", "Metalcash.be offre le meilleur prix d'achat pour l'�tain, le m�tal argent�, les D3E ainsi que pour le rachat de catalyseurs voiture usag�s.");
define("LEGAL_MENTIONS", "Mentions l�gales");

define("LEGAL_H2_1", "Identification du propri�taire du site");
define("LEGAL_H2_1_TEXT", "Le site %s appartient et est g�r� par la soci�t� METALCASH SPRL, soci�t� � responsabilit� limit�e immatricul�e au num�ro d'entreprise BE0556.643.111, dont le si�ge social est Avenue Andr� Ernst 3A � 4800 Verviers, en Belgique.");
define("LEGAL_H2_2_TEXT", "E-mail : <a href=\"%s\"><img src=\"imgs/static/email.png\" alt=\"email\" width=\"123\" height=\"14\"></a> | T�l�phone : %s");

define("LEGAL_H2_3", "Droits d�auteur");
define("LEGAL_H2_3_TEXT", "Le site internet, les textes, les illustrations et tout autre �l�ment composant le site sont la propri�t� de la soci�t� Metalcash. Toute copie, adaptation, traduction de tout ou d�une partie de ce site est strictement interdite.");

define("LEGAL_H2_4", "Marques");
define("LEGAL_H2_4_TEXT", "La d�nomination Metalcash et le logo Metalcash [MC] sont des marques d�pos�es prot�g�es � ce titre par le droit de la propri�t� intellectuelle.");

define("LEGAL_H2_5", "Respect de la vie priv�e");
define("LEGAL_H2_5_TEXT", "L�utilisateur peut consulter librement le site sans devoir fournir ses donn�es personnelles. Les informations collect�es par le site Metalcash notamment via l�e-mail de contact, le formulaire d�inscription, sont trait�es dans le respect de la vie priv�e et sont r�serv�es � l'usage exclusif de Metalcash. L'utisateur est libre de demander la rectification ou la suppression de ses donn�es par simple courriel.");

define("LEGAL_H2_6", "Cookies");
define("LEGAL_H2_6_TEXT", "Ce site utilise des cookies. Ceux-ci servent au bon fonctionnement du site Internet. Dans le cas ou vous ne souhaiteriez pas avoir des cookies install�s, ou r�cup�r�s, nous vous invitons � quitter ce site. Dans le cas contraire, vous acceptez l'installation de nos cookies sur votre appareil.");

define("WRONG_PASS", "Votre mot de passe n'est pas le m�me! Veuillez r�essayer svp");
define("WRONG_REPEAT_PASS", "Vous n'avez pas entr� de mot de passe! Veuillez r�essayer svp");

define("ACCOUNT_ACTIVATED", "Merci, votre compte est activ�!");
define("CONNECTED", "Vous �tes connect�");
define("FIRST_CONNECTION", "Comme c'est votre premi�re connexion et pour une question de s�curit�, vous devez red�finir le mot de passe de votre compte.");
define("NEW_PASS", "Nouveau mot de passe");
define("REPEAT_NEW_PASS", "Retaper le mot de passe");
define("CHANGE_PASS", "Changer le mot de passe");

// File account
define("CHANGE_ACC_PASS", "Changer le mot de passe du compte");
define("PASSWORD_CHANGED", "Mot de passe chang� avec succ�s!");
define("RETYPE_PASSWORD", "Vous avez mal retap� votre mot de passe");
define("CLICK_TO_CHANGE_PASS", "Cliquez ici pour changer votre mot de passe");
define("REDIRECTION", "Redirection en cours...");

// Default all page
define("PRINT_PRICE_REGISTER", "Pour afficher tous les prix, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: red;\">inscrire gratuitement</a>.");
define("CONTACT_FOR_BIG_QT", "<a href=\"%s\">Contactez-nous</a> pour une offre de prix personnalis�e pour les grosses quantit�s");
define("INSTRUCTION_TO_SELL", "Instructions pour la vente");
define("MORE_INFO_PRODUCTS", "Plus d'informations sur les produits que nous achetons");
define("MORE_INFO_PRODUCTS_VAR1", "Metalcash ach�te �galement d'autres produits");
define("REGISTER_TITLE", "Afficher tous les prix en vous inscrivant sur Metalcash");
define("WORD_PIECES", "pi�ces");
define("MORE_ON_PRODUCT", " En savoir plus l'achat de %s");
define("PRICE_OF", "Prix du");
define("AT", "�");
define("PRICE_UPDATE1", "Prix mis � jour �");
define("PRICE_UPDATE2", "Prix mis � jour le");
define("TON", "tonne");
define("KG", "kg");
define("TO", "du");
define("WORD_TIME", "Heure");
define("WORD_BOURSE", "Prix bourse");
define("WORD_PRICE", "Prix");
define("WORD_FOR", "pour");

define("WORD_ARGENTE1", "M�tal argent�");
define("WORD_DEEE1", "Cartes �lectroniques (D3E)");
define("WORD_DEEE2", "Cartes DEEE");
define("WORD_DEEE3", "DEEE");
define("WORD_ETAIN1", "�tain");
define("WORD_SILVER1", "Argent massif");
define("WORD_ETAIN2", "Viel �tain");
define("WORD_CALC1", "Calculateurs �lectroniques");
define("WORD_CALC2", "Calculateurs voitures");
define("WORD_CALC3", "Calculateurs moteurs");
define("WORD_CATA1", "Pots catalytiques");
define("WORD_CATA2", "Catalyseurs");
define("WORD_RADIO1", "Radiographies");
define("WORD_RADIO2", "Radios m�dicales");
define("WORD_TURBO1", "Turbo voitures");

define("BUY_ARGENTE1", "Achat de m�tal argent�");
define("BUY_DEEE1", "Achat de PCB �lectroniques");
define("BUY_ETAIN1", "Achat d'objets en �tain");
define("BUY_CATA1", "Achat de catalyseurs usag�s");
define("BUY_SILVER1", "Achat d'Argent massif");
define("BUY_RADIO1", "Achat d'ancienne radio m�dicale");
define("BUY_TURBO1", "Achat de turbo cass�s");
define("BUY_CALC1", "Achat de calculateurs cass�s");

define("BACK_TO_TOP", "Retour en haut de page");

// file calculator
define("H1_TITLE_CALC", "Achat de calculateurs moteur toutes marques");
define("H2_CALC_TITLE1", "Quel type de calculateur moteur achetons-nous?");
define("H2_CALC_TITLE1_TEXT", "Nous achetons tous les calculateurs moteurs <u>en aluminium</u>, m�me cass�s, au prix affich� ci-dessus. Pour les grosses quantit�s (plus d'une tonne), vous pouvez <a href=\"%s\">nous contacter</a> pour une offre de prix personnalis�e.");
define("H2_CALC_TITLE2", "Qu'est-ce qu'un calculateur moteur?");
define("H2_CALC_TITLE2_TEXT", "Un calculateur moteur �lectronique est une machine sous forme de boitier permettant d'am�liorer le rendement du moteur gr�ce � ses fonctions.");

// file cat-argente
define("PRINT_PRICE_MA_REGISTER", "Pour afficher tous les prix du m�tal argent�, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: green;\">inscrire</a>.");
define("H1_TITLE_CAT_MA", "Achat du m�tal argent� au kilo - Vendre du m�tal argent�");
define("H1_TITLE_CAT_MA_TEXT", "<strong>Metalcash</strong>, grossiste en m�tal argent�, ach�te au meilleur prix tous les couverts ainsi que les <strong>pi�ces de forme en m�tal argent�</strong>, m�me ab�m�s. Le <strong>prix au kilo du m�tal argent�</strong> varie en fonction de la qualit� de l'objet et du cours de l'argent (Ag). Nous ne valorisons pas les objets qui sont aimant�s (contiennent du fer) ou compl�tement d�sargent�s. Les prix affich�s sont pour la quantit� minimale affich�es, pour les plus petites quantit�s, les prix d'achats sont moins �lev�s, <a href=\"%s\">contactez-nous</a> pour conna�tre nos tarifs d'achat pour particulier.");
define("INSTRUCTION_TO_SELL_MA", "Instructions pour la vente de m�tal argent�");

define("H2_TITLE_CAT_MA", "Prix du m�tal argent� au %s");
define("H2_TITLE1_CAT_MA", "Comment reconna�tre les couverts en m�tal argent�");
define("H2_TITLE1_CAT_MA_TEXT1", "Les couverts et les objets en m�tal argent� (plaqu�s d'argent) sont identifi�s par des poin�ons carr�s, losanges ou bornes. Le pourcentage d'argent utilis� pour plaquer les couverts y est parfois inscrit.");
define("H2_TITLE1_CAT_MA_TEXT2", "Sont inscrits � l'int�rieur de ce poin�on:");
define("H2_TITLE1_CAT_MA_TEXT3", "<li>Le chiffre I ou II correspondant � la qualit� de la fabrication.</li><li>Le symbole propre � l'orf�vre qui a fabriqu� la pi�ce.</li><li>Un chiffre indiquant la quantit� d'argent (facultatif).</li><li>Les initiales ou nom de l'orf�vre.</li>");

define("H2_TITLE2_CAT_MA", "Cours de l'argent (Ag) de cette ann�e");
define("H2_TITLE2_CAT_MA_TEXT", "Le cours de l'argent varie selon le London Metal Exchange (LME) qui est le centre mondial industriel du commerce des m�taux. Le cours est mis � jour du lundi au vendredi. Il est a noter que pendant certains jours f�ri�s, la bourse du London Metal Exchange est ferm�e.<p>Le 18 Mai 2024 le cours de l'Argent s'envole � son plus haut depuis les 10 derni�res ann�es �coul�es. La performance extraordinaire du M�tal Blanc r�agit fasse aux diff�rentes pression politique et � l'inflation. Ce n'est pas moins de 10% d'augmentation en une semaine pour ce m�tal encore fort sous-estim�.");
define("H2_TITLE3_CAT_MA", "Exemple de poin�ons de m�tal argent�");

define("UP", "MAJ");
define("DISCLAIMER_SILVER1", "Contactez-nous au %s pour vendre de l'argenterie");
define("DISCLAIMER_SILVER2", "Pour afficher tous les <u>prix de l'argenterie</u>, veuillez vous connecter ou vous inscrire");

// file cat-etain
define("PRINT_PRICE_ETAIN_REGISTER", "Pour afficher tous les prix de l'�tain, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: green;\">inscrire gratuitement</a>");

define("H1_TITLE_CAT_ETAIN", "Achat d'�tain au kilo pour le recyclage - Vendre de l'�tain");
define("H1_TITLE_CAT_ETAIN_TEXT", "<strong>Metalcash</strong>, grossiste en �tain, ach�te au kilo tous les <strong>objets en �tain</strong>, vieux ou anciens, m�me cass�s ou ab�m�s. Le <strong>prix de l'�tain</strong> varie en fonction de la qualit� de l'objet et du cours. Il faut savoir que les objets en �tain ne sont jamais purs, ils contiennent entre 65%% et 95%% d'�tain. Nous achetons l'�tain (symbole <i>Sn</i>) sur base d'un pourcentage moyen de 80%% dans l'alliage. Les prix affich�s sont pour la quantit� minimale affich�e, pour les plus petites quantit�s, les prix d'achats sont moins �lev�s, <a href=\"%s\">contactez-nous</a> pour conna�tre nos tarifs d'achat pour particulier.");
define("INSTRUCTION_TO_SELL_ETAIN", "Instructions pour la vente d'�tain");
define("H2_TITLE_CAT_ETAIN", "Prix de l'�tain au %s");
define("H2_TITLE1_CAT_ETAIN", "O� trouvez de l'�tain?");
define("H2_TITLE1_CAT_ETAIN_TEXT", "L'<strong>�tain</strong> est pr�sent dans de nombreux vieux objets, cela comprend non seulement la vaiselle, les pots, assietes, poteries, mais aussi les conduits de bi�re, les barres � souder ainsi que les figurines, munitions, coussinets de palier, fer blancs, capsule de spiritueux, billes et feuilles d'�tain. Les industries ont �galement des <strong>d�chets d'�tain</strong> appel�s scories qui peuvent contenir de l'�tain (Sn) m�lang� � de l'argent (Ag). Ces scories sont achet�es plus cher, veuillez nous contacter pour une estimation du prix.");
define("H2_TITLE2_CAT_ETAIN", "�tain ou Zamak? Comment le reconna�tre?");
define("H2_TITLE2_CAT_ETAIN_TEXT1", "L'<strong>�tain et le zamak</strong> sont deux m�taux qui semblent � vue similaire, pourtant ils ne le sont pas.<br>Le zamak est beaucoup plus dur que l'�tain (3 fois plus pour le m�tal de base) et sa masse volumique est plus faible. Pour conna�tre le pourcentage d'�tain dans un alliage, il faut utiliser un spectrom�tre.<p>Quelques astuces pour reconnaitre un <strong>faux �tain</strong> sans spectrom�tre:");
define("H2_TITLE2_CAT_ETAIN_TEXT2", "<li>L'article \"casse\" lorsqu'on le plie.</li><li>L'article a une couleur tirant vers le mauve.</li><li>L'article ne \"crie\" pas lorsqu'on le plie.</li><li>L'article est anormalement lourd. (contient du plomb)</li><li>Les marbrures sur l'article trahissent une patine forc�e � l'acide.</li>");
define("H2_TITLE3_CAT_ETAIN", "Cours de l'�tain (Sn) sur les 5 derniers jours");
define("H2_TITLE3_CAT_ETAIN_TEXT", "Le cours de l'�tain varie selon le London Metal Exchange (LME) qui est le centre mondial industriel du commerce des m�taux. Le cours est mis � jour du lundi au vendredi � 2 reprises, une premi�re session est �tablie vers 12h40 et une seconde session vers 16h00. Il est a noter que pendant certains jours f�ri�s, la bourse du London Metal Exchange est ferm�e.<p>L'�tain au LME a atteint le mercredi 10 Avril 33 130 dollars la tonne m�trique, un niveau n�goci� pour la derni�re fois en Juin 2022. Actuellement n�goci� � 32 000 dollars, l'�tain est d�sormais en hausse de 27% depuis le d�but de l'ann�e.");
define("WARNING_POINCON", "Veuillez noter que le poin�on n'est pas toujours une indication fiable sur les <strong>objets en �tain</strong>.");
define("WARNING_BACKWARDATION", "<b>NOTE IMPORTANTE: Li�e � la situation actuelle et les r�gles d'autorit� boursi�re, le prix du spot est sup�rieur au prix du contrat � terme. Nous devons calculer notre prix en fonction du cours le plus bas. Aujourd'hui, cette diff�rence exceptionnelle est de 1750$ la Tonne. Nous appliquons en cons�quence la r�gle stricte de -1.5 EUR / kg pour chaque cat�gorie d'�tain. Cette situation extraordinaire arrive lorsque la demande de livraison directe augmente fortement.</b>");

// file catalysator
define("H1_TITLE_CATA", "Achat de catalyseurs usag�s - Recyclage de pots catalytiques");
define("H2_TITLE_CATA", "Quel type de catalyseurs achetons-nous?");
define("H2_TITLE_CATA_TEXT", "Nous achetons tous les <u>catalyseurs voitures</u>, pour autant qu'ils soient toujours charg�s en monolithe. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
define("H2_TITLE1_CATA", "Prix catalyseurs toutes marques");
//define("H2_TITLE1_CATA_TEXT", "Il existe de nombreuses cat�gories diff�rentes de catalyseurs. Si vous souhaitez connaitre la valeur de vente de vos catalyseurs en gros, � partir de 25 pi�ces, nous pouvons vous faire une offre de prix personnalis�e par email, veuillez nous contacter sur <a href=\"%s\">cette page</a> en veillant � nous indiquer les r�f�rences des pots catalytiques que vous souhaitez vendre.");
define("H2_TITLE2_CATA", "Qu'est-ce qu'un pot catalytique?");
define("H2_TITLE2_CATA_TEXT", "Le pot catalytique est un �l�ment du pot d'�chappement qui vise � r�duire la nocivit� des gaz d'�chappement. Il contient dans une de ses chambres internes en acier inoxydable une fine couche combinant au minimum trois m�taux pr�cieux tel que l'alumine, l'oxyde de c�rium ou encore du platine, palladium ou rhodium (appel� platino�des).");

// file contact
define("MAIL_SUBJECT_1", "Demandes d'informations");
define("MAIL_SUBJECT_2", "Demandes de rendez-vous");
define("MAIL_SUBJECT_3", "Bordereau d'achat (envoi postal)");
define("MAIL_SUBJECT_4", "Grosses quantit�s � vendre");
define("MAIL_SUBJECT_5", "Bug sur le site");

define("MANDATORY_FIELD", "Ce champ est obligatoire.");
define("INVALID_EMAIL", "Adresse email non-valide.");
define("INVALID_PHONE", "Entrez un num�ro de t�l�phone valide svp.<br>Exemple: 0495123456, 0033612445033, ...<br>Vous pouvez aussi laisser ce champ vide.");
define("H1_CONTACT_TITLE", "Prendre rendez-vous? Contactez Metalcash par t�l�phone");
define("H1_CONTACT_TITLE_TEXT", "du lundi au vendredi de 9h � 16h");

define("SHORT_ADDRESS", "Nous sommes � 4800 Verviers, Belgique");

define("H2_CONTACT_TITLE", "Utilisez le formulaire ci-dessous pour nous contacter");

define("EMAIL_SENT", "Votre message a �t� envoy� avec succ�s, <b>%s</b>.");
define("EMAIL_SENT_TIPS", "Pendant les heures d'ouvertures, notre �quipe prend en charge votre message en <b>moins d'1 heure</b>. Merci de votre confiance.");
define("FIELD_NAME", "Votre nom et votre pr�nom");
define("FIELD_EMAIL", "Votre adresse e-mail (pour une r�ponse)");
define("FIELD_PHONE", "Votre num�ro de t�l�phone");
define("FIELD_MSG", "Votre message");
define("FIELD_OBJECT", "Concerne");
define("SEND_QUESTION", "Envoyez votre demande maintenant");
		
define("CLICK_HOW_TO_SELL", "Comment vendre ma marchandise � Metalcash");
define("CLICK_FAQ", "Cliquez ici pour lire les questions fr�quemment pos�es");
define("ALT_MAP", "Metalcash Belgique");

// deee quote
define("PRINT_PRICE_DEEE_REGISTER", "Pour afficher tous les prix des D3E, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: green;\">inscrire gratuitement</a>");
define("PIC_PCB", "Cartes PCB m�lang�es - Copyright Metalcash");
define("PIC_PROC_ALU", "Processeurs en c�ramique avec t�te en alu - Copyright Metalcash");
define("PIC_HDD", "Disques durs - Copyright Metalcash");
define("PIC_PROC_CU", "Processeur plastique avec t�te en cuivre - Copyright Metalcash");
define("H1_TITLE_CAT_DEEE", "Achat de DEEE en gros - Recyclage et valorisation des D3E");
define("H1_TITLE_CAT_DEEE_TEXT", "<strong>Grossiste en DEEE</strong>, Metalcash ach�te au prix fort tous les <strong>d�chets d'�quipements informatiques et de t�l�communications</strong> (D3E Cat.3), m�me d�fectueux. Le <strong>prix des DEEE</strong> varie en fonction du type de d�chets et de sa cat�gorie. Les D3E se trouvent dans de nombres appareils comme les ordinateurs, les portables, les routeurs, switch de t�l�communication, etc. Nous valorisons les mati�res premi�res et recyclons tous les composants suivant les normes impos�es. Ci-dessous sont affich�s la liste des prix d'achat des DEEE pour les quantit�s inf�rieures � 1 tonne. Pour les grosses quantit�s, <a href=\"%s\">contactez-nous</a>.");
define("H2_TITLE_CAT_DEEE", "Prix des DEEE au %s");
define("INSTRUCTION_TO_SELL_DEEE", "Instructions pour la vente de DEEE/D3E");

// file default
define("H1_DEFAULT_TITLE1", "Achat des m�taux sp�ciaux, cartes DEEE et pots catalytiques");
define("H1_DEFAULT_TITLE1_TEXT", "<strong>Metalcash</strong>, grossiste en m�taux sp�ciaux, offre le meilleur prix pour la <strong>r�cup�ration de m�taux</strong> tels que l'<strong>�tain</strong>, les <strong>couverts en m�tal argent�</strong> et les <strong>d�chets d'�quipements �lectroniques</strong>. Pour les petites quantit�s, veuillez utiliser le <a href=\"%s\">service d'envoi postal</a>.");
define("H2_DEFAULT_TITLE1", "Mesure et analyse transparente de vos m�taux");
define("H2_DEFAULT_TITLE1_TEXT", "L�achat de m�taux se fait au poids, le prix au kilo varie en fonction du type de m�tal et de la quantit� que vous avez � vendre. Puisque la pes�e de vos m�taux d�finit votre r�mun�ration, nous vous garantissons une transparence totale lors de cette �tape. <a href=\"%s\">En savoir plus...</a>");

// faq
define("H1_TITLE_FAQ", "Questions fr�quemment pos�es");
define("H1_TITLE_FAQ_TEXT", "Sont affich�s sur cette page les questions qui nous sont fr�quemment pos�es.<br>Si vous ne trouvez pas la r�ponse � votre question ici, n'h�sitez pas � <a href=\"%s\">nous contacter</a>.");
define("H2_TITLE_FAQ1", "Que rachetez-vous et � quel prix?");
define("H2_TITLE_FAQ1_TEXT", "Nous achetons les m�taux non-ferreux tel que l'<a href=\"%s\">�tain</a>, le <a href=\"%s\">m�tal argent�</a> aux prix affich�s sur notre page <a href=\"%s\">prix des m�taux</a>.<p>Nous achetons �galement les DEEE tel que les cpu c�ramique goldcap, cpu c�ramique, cpu plastique, m�moire ram, carte pcb toute classe, tour informatique, alimentation, lecteur optique et disque dur aux prix affich�s sur notre page <a href=\"%s\">prix des DEEE</a>.");
define("H2_TITLE_FAQ2", "Pourquoi je ne vois pas tous les prix?");
define("H2_TITLE_FAQ2_TEXT", "Pour afficher tous les prix des m�taux et DEEE sur Metalcash, vous devez vous disposer d'un compte valide. La cr�ation d'un compte personnel est imm�diat est totalement gratuit.<p><a href=\"%s\">Cliquez ici pour cr�er votre compte Metalcash gratuitement</a>.");
define("H2_TITLE_FAQ3", "J'ai plusieurs objets � vendre, comment faire?");
define("H2_TITLE_FAQ3_TEXT", "Deux possibilit�s s'offrent � vous:<p><li><b>A notre d�pot</b>: Avec un minimum de 75 kg d'�tain ou de m�tal argent�, nous fixons � votre convenance un rendez par t�l�phone � notre d�p�t qui se situe dans la province de Li�ge.</li><p><li><b>Via la poste</b>: Via envoi postal s�curis� (14.75&euro; pour 30kg), vous envoyez les objets que vous souhaitez vendre, d�s r�ception de la marchandise et apr�s confirmation des quantit�s avec vous par email, nous �tablissons un ordre de virement en votre faveur sous les 48H.<p><a href=\"%s\">Plus d'information sur le service d'envoi postal.</a></li>");
define("H2_TITLE_FAQ4", "Quel est le prix de l'envoi postal en vos locaux?");
define("H2_TITLE_FAQ4_TEXT", "L'envoi via BPACK de BPOST (Belgique) co�te:<br><li>Jusqu'� 2 kg: 6.40 &euro;</li><li>De 2 � 10 kg: 8.70 &euro;</li><li>De 10 � 30 kg: 14.75 &euro;</li>");
define("H2_TITLE_FAQ5", "Comment s'effectue le contr�le du poids?");
define("H2_TITLE_FAQ5_TEXT", "<li>En nos locaux, le contr�le du poids se fait toujours devant vous avec une balance �lectronique de pr�cision certifi�e.</li><p><li>Pour les envois postaux, nous vous envoyons par email le relev� d�taill� de votre marchandise une fois analys�e. Nous attendons votre confirmation pour �tablir l'ordre de versement.</li>");
define("H2_TITLE_FAQ6", "Quels sont les frais de d�placement � mon domicile?");
define("H2_TITLE_FAQ6_TEXT", "Les frais de d�placement sont gratuits pour tout enl�vement sup�rieur � 500 kg.");
define("H2_TITLE_FAQ7", "Comment s'effectue le paiement?");
define("H2_TITLE_FAQ7_TEXT", "Le paiement se fait imm�diatement apr�s r�alisation du bon d'achat de vos objets sur base de leurs poids.");
define("H2_TITLE_FAQ8", "J'ai d'autres questions, comment faire?");
define("H2_TITLE_FAQ8_TEXT", "Vous pouvez nous joindre par t�l�phone pendant les heures d'ouvertures au +32 474 01 12 93 ou nous �crire directement depuis la page <a href=\"%s\">contactez-nous</a>.");

// metal quote
define("PRINT_PRICE_METAL_REGISTER", "Pour afficher tous les prix des m�taux, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: green;\">inscrire gratuitement</a>.");
define("PIC_ARGENTE", "Couverts en m�tal argent�s - Copyright Metalcash");
define("PIC_TURBO", "Turbos voitures cass�s - Copyright Metalcash");
define("PIC_K_ARGENTE", "Couteaux en m�tal argent�s - Copyright Metalcash");
define("H1_TITLE_METAL", "Achat de m�taux sp�ciaux (non-ferreux) au kilo");
define("H1_TITLE_METAL_TEXT", "<strong>Metalcash</strong> ach�te au meilleur prix tous les <strong>m�taux sp�ciaux</strong> en Belgique et en Europe. Notre secteur d'activit� est principalement ax� sur l'<strong>achat d'�tain</strong> et l'<strong>achat de couverts en m�tal argent�</strong>. Nous achetons �galement des m�taux plus rares comme l'Hafnium, l'Iridium, le Plaqu� Or ou encore le Molybd�ne. Nos prix d'achat sont pour une quantit� minimale et pour les plus petites quantit�s, le prix au kilo sera moins �lev�. Si vous avez d'autres m�taux non-list� dans nos produits d'achat, n'h�sitez pas � <a href=\"%s\">nous contacter</a> pour en savoir plus.<p>Nous sommes pr�sent dans le domaine des m�taux sp�ciaux et exotiques depuis de nombreuses ann�es et notre expertise nous permet de valoriser au plus juste tous vos d�chets m�talliques (B1010) destin�s au recyclage.<p>Nous offrons �galement des conditions particuli�re � partir de 5,000kg.");
define("INSTRUCTION_TO_SELL_METAL", "Instructions pour la vente de m�taux");
define("H2_TITLE_METAL", "Prix des m�taux que nous achetons");

// picture
define("H1_TITLE_PIC", "Photos des denr�es r�cup�r�es quotidiennement chez Metalcash");
define("H1_TITLE_PIC_TEXT", "Metalcash est grossiste pour l'achat des <a href=\"%s\">m�taux sp�ciaux</a> et des <a href=\"%s\">DEEE cat�gorie 3</a> (�quipements informatiques et de t�l�communications). Nous r�cup�rons mensuellement plusieurs tonnes d'objets destin�s au reconditionnement et recyclage.");
define("H2_TITLE_PIC", "Vendre des m�taux ou DEEE en gros chez Metalcash");
define("H2_TITLE_PIC_TEXT", "Nous pratiquons des tarifs pr�f�rentiels pour les grosses quantit�s. Contactez-nous directement par t�l�phone au +32 474 01 12 93 ou via notre <a href=\"%s\">page de contact</a> pour plus de renseignements.");
define("PIC_ALIM", "Alimentations PC - Copyright Metalcash");
define("PIC_OPT", "Disques optiques - Copyright Metalcash");
define("PIC_ETAIN", "Objets en �tain m�lang�s - Copyright Metalcash");
define("PIC_PROC_CERAM", "Processeurs en c�ramique - Copyright Metalcash");
define("PIC_PROC_PLASTIC1", "Pocesseurs en plastique - Copyright Metalcash");
define("PIC_PROC_PLASTIC2", "Autre type de processeurs en plastique - Copyright Metalcash");
define("PIC_PROC_SLOT", "Processeurs slot - Copyright Metalcash");
define("PIC_RAM_SILVER", "M�moires RAM argent�es - Copyright Metalcash");
define("PIC_RAM_GOLD", "M�moires RAM dor�es - Copyright Metalcash");

// process
define("H1_TITLE_PROCESS", "Instructions pour la vente de marchandise chez Metalcash");
define("H1_TITLE_PROCESS_TEXT", "Pour vendre votre mat�riel, 2 possibilit�s s'offrent � vous:");
define("PROCESS_A", "<b style=\"font-size: 18px\">Livraison en personne en nos locaux</b><p>Vous pouvez vous rendre en personne <u>sur rendez-vous</u> en nos locaux avec votre marchandise � notre centre de r�cup�ration de d�chet de Verviers (Belgique). L'analyse et la pes�e se fera d�s votre arriv�e et vous recevrez votre paiement imm�diatement apr�s la r�alisation du bordereau d'achat. Veuillez nous contacter pour conna�tre les quantit�s minimales pour la prise de rendez-vous. <a href=\"%s\">Plus d'informations sur nos services</a>.");
define("RDV_TO", "Prises de RDV au");
define("PROCESS_B", "<b style=\"font-size: 18px\">Service d'envoi/achat postal</b><p>Pour toutes les petites ou grosses quantit�s, vous avez la possibilit�s de nous envoyer votre marchandise via notre service d'envoi postal s�curis�. Votre marchandise est analys�e et pes�e en nos locaux et vous recevez le paiement sur votre compte bancaire en moins de 48 heures.");
define("ACCESS_P_SERVICE", "Acc�s au service d'envoi postal");

// product
define("H1_TITLE_PRODUCT", "Achat %s - Prix au kilo");
define("TITLE_FALSE_PRODUCT", "Produit inexistant");
define("ALL_DEEE_HERE", "Tous les DEEE ici");
define("SIMILAR_METALS_HERE", "M�taux similaires ici");
define("H3_TITLE_PRODUCT", "Prix d'achat %s");
define("UPDATED_PRICE_PRODUCT", "Le prix que nous offrons au kg pour cet �l�ment a �t� mis � jour le %s � %s");
define("H2_TITLE_PRODUCT", "Grosse quantit� %s � vendre");
define("H2_TITLE_PRODUCT_TEXT", "Les prix affich�s sont pour une quantit� minimale de %s � vendre. Si vous avez une plus petite ou une plus grosse quantit�, veuillez <a href=\"%s\">nous contacter</a> pour conna�tre les tarifs.");
define("MORE_INFO_PRODUCTS_VAR2", "Afficher par cat�gorie ce que nous achetons");
define("H1_UNEXIST_PRODUCT", "Le produit que vous cherchez n'est plus disponible");
define("H1_UNEXIST_PRODUCT_TEXT", "Nous sommes d�sol�s, nous ne sommes pas en mesure d'afficher le produit que vous demandez.");

// radio
define("H1_TITLE_RADIO", "Prix d'achat du Jour des radiographies m�dicales");
define("H2_TITLE_RADIO", "Quel type de radio achetons-nous?");
define("H2_TITLE_RADIO_TEXT", "Nous achetons les <u>anciennes radios</u> au prix affich� ci-dessus, ce sont les radios qui �taient �mises avant les ann�es 2000. Nous achetons �galement les nouvelles radios, dites num�riques, mais celles-ci �tant bien moins charg�e en chlorure d'argent, nous en offrons la moitier du prix.");
define("H2_TITLE_RADIO1", "Qu'est-ce qu'une radiographie d'h�pital?");
define("H2_TITLE_RADIO1_TEXT", "Une radiographie est dans le domaine m�dical une technique d'imagerie de transmission par rayon X. Elle permet d'obtenir un clich� des structures travers�es. L'abr�viation \"radio\" est fr�quemment employ�e pour le terme radiographique.");

// register
define("ERROR_REGISTER_STATUT", "Veuillez nous pr�ciser votre statut.");
define("ERROR_REGISTER_OPTION", "Veuillez s�lectionner une option.");
define("ERROR_REGISTER_NAME", "Veuillez mettre votre nom complet svp.<br>Exemple: Jean Dupont.");
define("ERROR_REGISTER_UNVALID_EMAIL", "Cette adresse email est invalide.<br>Le mot de passe sera envoy� dessus.");
define("ERROR_REGISTER_EMAIL_EXIST", "Cet email a d�j� �t� enregistr�.<br>Veuillez vous connecter ou utiliser un autre e-mail.");
define("ERROR_REGISTER_BIRTHDATE", "Veuillez v�rifier votre date de naissance svp.");
define("ERROR_REGISTER_PHONENUMBER", "Entrez un num�ro de t�l�phone valide svp.<br>Exemple: 0495123456, 00330612445033, ...<br>Vous pouvez aussi laisser ce champ vide.");
define("ERROR_REGISTER_ACCEPT_COND", "Vous devez accepter les conditions d\'utilisation pour vous inscrire.");
define("EMAIL_SUBJECT_REGISTRATION", "Ouverture de votre compte");
define("ALREADY_REGISTERED", "Vous �tes d�j� inscrit ou d�j� connect�");
define("ALREADY_REGISTERED_TEXT", "<b>Si vous obtenez ce message d'erreur, c'est que vous avez fait une fausse manipulation, soit:</b><p><li><b>Vous venez de vous inscrire:</b> Rendez-vous sur votre bo�te email et cliquer sur le lien d'activation pour valider votre compte Metalcash.<li><b>Vous �tes d�j� connect�:</b> Ignorez ce message, et <a href=\"%s\">cliquez ici</a> pour revenir � l'accueil.");
define("REGISTRATION_FINISHED", "Inscription Termin�e");
define("REGISTER_ACTIVATE_MSG", "Veuillez <b style=\"color: green\">activer</b> votre compte en utilisant le <b style=\"color: green\">lien</b> envoy� sur <b>%s</b>");
define("WARNING_SPAM", "<b>IMPORTANT:</b> Si vous utilisez une messagerie gratuite de type Hotmail / Gmail / Yahoo, etc, il se peut que le message se place dans le <b><u>dossier ind�sirable</u></b>. Dans ce cas, cliquez sur: <b><u>\"Ce message est s�r\"</u></b> dans le mail.");
define("H1_TITLE_REGISTER", "Inscription gratuite sur le site Metalcash");
define("H1_TITLE_REGISTER_TEXT", "Une inscription valide sur Metalcash est requise pour afficher tous les <u>prix des m�taux et DEEE</u>.<br>Cette inscription est 100% gratuite et sans engagement de votre part.");
define("REGISTER_PRINT_PRICE", "<b>Pour afficher <u>tous les prix d'achat</u>, compl�tez en 30 secondes le formulaire ci-dessous.");
define("REGISTER_PRIVACY_REMINDER", "Vos donn�es sont trait�es de mani�re confidentielle et sont destin�es uniquement � un usage interne.");
define("REGISTER_STATUT", "Vous �tes");
define("REGISTER_PRIVATE", "Particulier");
define("REGISTER_COMPANY", "Professionnel");
define("REGISTER_INTEREST", "Int�ress� par");
define("REGISTER_NAME", "Votre nom");
define("REGISTER_EMAIL", "Adresse email");
define("REGISTER_PHONE", "T�l�phone");
define("REGISTER_BIRTHDATE", "Date de naissance");
define("REGISTER_DAY", "Jour");
define("REGISTER_MONTH", "Mois");
define("REGISTER_YEAR", "Ann�e");
define("REGISTER_OPTIN", "J'accepte de recevoir des emails d'information de Metalcash");
define("ACCEPT_CGU", "J'accepte les <a style=\"color: #000\" href=\"%s\">conditions g�n�rales d'utilisation</a>");
define("CREATE_ACCOUNT", "Cr�er mon compte et recevoir mon mot de passe par email");
define("PRIVACY_POLICY", "<b>Confidentialit� et vie priv�e</b>: Metalcash s'engage � traiter vos donn�es de mani�re confidentielle, conform�ment aux dispositions nationales et internationales, dont entre autres la loi Belge du 8 d�cembre 1992, relative � la protection de la vie priv�e � l'�gard des traitements de donn�es � caract�re personnel ( M.B., 18 mars 1993), modifi�e par la loi du 11 d�cembre 1998 (M.b., 3 f�vrier 1999).");

// send
define("H1_TITLE_SEND", "Comment utiliser le service d'envoi postal de Metalcash?");
define("H1_TITLE_SEND_TEXT", "Pour vendre de petites (minimum 10kg) ou de grosses quantit�s, vous pouvez utiliser notre service d'envoi postal. Ce service est enti�rement s�curis� par la poste ou le transporteur.");
define("H2_TITLE_SEND", "D�roulement de l'envoi postal");
define("H2_TITLE_SEND_TEXT", "Vous nous envoyez votre marchandise bien emball�e dans un ou plusieurs paquets avec, en annexe, notre bordereau d'envoi, par la poste ou via une entreprise de transport de votre choix.<p>D�s r�ception de votre marchandise en nos locaux, nous proc�dons � son analyse et pes�e.<br>Une fois l'analyse termin�e, nous vous transmettons les r�sultats par email ainsi que le montant � payer dans l'attente de votre confirmation afin d'�tablir l'ordre de versement en votre faveur.");
define("H2_TITLE_SEND1", "Prix de l'envoi");
define("H2_TITLE_SEND1_TEXT", "L'envoi via BPACK de BPOST (Belgique) co�te:<p><li>Jusqu'� 2 kg: 6.40 �</li><li>De 2 � 10 kg: 8.70 �</li><li>De 10 � 30 kg: 14.75 �</li>");
define("H2_TITLE_SEND2", "Est-ce s�curis�?");
define("H2_TITLE_SEND2_TEXT", "L'envoi est 100% s�curis�. Vous avez la possibilit� de demander un accus� de r�ception (envoi recommand�) par la poste et une assurance sur la valeur si vous choisissez un transporteur pour garantir le transfert de votre marchandise. Chaque jour, nous recevons de nombreux colis via notre service d'envoi postal.");
define("ASK_BORDEREAU", "Demander le bordereau d'envoi postal");

// services
define("H1_TITLE_SERVICES", "Grossiste en r�cup�ration de m�taux sp�ciaux et D3E");
define("H1_TITLE_SERVICES_TEXT", "Metalcash r�cup�re au meilleur prix les <strong>m�taux sp�ciaux non-ferreux</strong> ainsi que les composants �lectroniques (<strong>DEEE/D3E</strong>). Notre entreprise offre les meilleurs prix au n�goce pour l'�tain (Sn), les radiographies d'h�pitaux, le carbure de Tungst�ne (W), les d�chets de poin�onnages en argent ou en or (Au), les bijoux plaqu� Or (poin�on carr�, doubl�, Murat), l'Hafnium (Hf), l'Iridium (Ir) et l'Argent Massif (Ag).<p>N'h�sitez pas � nous <a href=\"%s\">contacter</a> si vous aviez la moindre question.");
define("H2_TITLE_SERVICES", "R�cup�ration, analyse et mesure du poids avec vous");
define("H2_TITLE_SERVICES_TEXT", "Nous accordons une grande importance � la mesure exacte du poids de votre marchandise, afin que vous soyez r�mun�r� comme il se doit. Chez nous, la pes�e s�effectue en nos locaux et nous vous proposons toujours d�y assister. <a href=\"%s\">D�roulement de l'achat chez Metalcash</a>.");
define("H2_TITLE_SERVICES1", "Paiement imm�diat par banque");
define("H2_TITLE_SERVICES1_TEXT", "Chez Metalcash vous �tes pay�s imm�diatement apr�s le contr�le de votre marchandise. L'argent arrive ensuite directement sur votre compte bancaire.<a href=\"%s\">Contactez-nous</a> pour conna�tre nos diff�rentes modalit�s de r�glement.");
define("H2_TITLE_SERVICES2", "Achat d'�tain n�1 en Europe");
define("H2_TITLE_SERVICES2_TEXT", "Metalcash ach�te au kilo tous les <strong>objets en �tain</strong>, que ce soit de la vaisselle ou des objets de d�coration, m�me cass�s. L'�tain est un m�tal non ferreux gris argent� mall�able aussi utilis� dans la soudure.<p>Afficher les <a href=\"%s\">prix d'achat de l'�tain</a>.");
define("H2_TITLE_SERVICES3", "Achat de couverts et objets en m�tal argent�");
define("H2_TITLE_SERVICES3_TEXT", "Metalcash r�cup�re au kilogramme tous les <strong>objets en m�tal argent�</strong>, que ce soit des <strong>couverts maillechort</strong> ou des <strong>pi�ces de formes</strong> poin�onn�s ou non, m�me cass�s. Le maillechort est un alliage de cuivre, nickel et zinc d'aspect argent�.<p>Afficher les <a href=\"%s\">prix d'achat du m�tal argent�</a>.");
define("H2_TITLE_SERVICES4", "Achat de d�chets d'�quipement �lectroniques");
define("H2_TITLE_SERVICES4_TEXT", "Les D3E, DEEE ou WEEE sont les <strong>d�chets d'�quipements �lectriques et �lectroniques</strong>. Nous achetons au meilleur prix les cartes informatiques tels que les processeurs, m�moires vives, disques durs, etc...<p>Afficher les <a href=\"%s\">prix d'achat des DEEE</a>.");
define("H2_TITLE_SERVICES5", "Achat de calculateurs moteurs �lectroniques");
define("H2_TITLE_SERVICES5_TEXT", "Depuis fin 2013, nous achetons �galement les <strong>calculateurs moteurs �lectroniques</strong> en aluminium, m�me cass�s. Ce sont de petits boitiers qui se trouvent dans presques toutes les voitures.<p>En savoir plus sur l'<a href=\"%s\">achat des calculateur moteurs voitures</a>.");
define("H2_TITLE_SERVICES6", "Achat de catalyseurs voitures");
define("H2_TITLE_SERVICES6_TEXT", "Si vous souhaitez vendre vos <strong>pots catalytiques</strong>, nous sommes en mesure de vous les acheter via notre service d'envoi postal. Nous offrons �galement un service d'analyse pour toute quantit� sup�rieure � 200 pi�ces.<p>En savoir plus sur l'<a href=\"%s\">achat de catalyseurs</a>.");
define("H2_TITLE_SERVICES7", "Achat de radiographies m�dicales");
define("H2_TITLE_SERVICES7_TEXT", "Les <strong>anciennes radios m�dicales</strong> valent de l'argent. Dans un processus de recyclage sp�cialis�, nous faisons l'extraction des diff�rents m�taux contenus dans celle-ci et nous pouvons en extraire des sels d'argent (Ag) en tr�s faibles quantit�s.<p>En savoir plus sur l'<a href=\"%s\">achat des radiographies d'h�pitaux</a>.");
define("H2_TITLE_SERVICES8", "Achat de turbos voitures cass�s");
define("H2_TITLE_SERVICES8_TEXT", "Les <strong>turbos voitures</strong> cass�s sont rachet�s �galement chez nous. Via nos diff�rentes fili�res sp�cialis�es, les turbos sont r�par�s et reconditionn�s afin de leurs offrirs une seconde vie dans l'automobile d'occasion.<p>En savoir plus sur l'<a href=\"%s\">achat de turbos cass�s</a>.");
define("H2_TITLE_SERVICES9", "Enl�vement gratuit en vos locaux");
define("H2_TITLE_SERVICES9_TEXT", "A partir de 500 kg d'�tain ou de m�tal argent�, nous effectuons l'enl�vement gratuitement en vos locaux (Belgique uniquement). Nous analysons, pesons et payons sur place sans le moindre frais suppl�mentaire.<p><a href=\"%s\">Prendre contact pour un enl�vement en vos locaux</a>.");

// sitemap - /!\ R�percusion du ALT sur les images
define("SITEMAP_ROOT", "Accueil Metalcash");
define("SITEMAP_NO_FERRO_TITLE", "Prix des m�taux non-ferreux");
define("SITEMAP_ETAIN_TITLE", "Prix de l'�tain");
define("SITEMAP_ARGENTE_TITLE", "Prix du m�tal argent�");
define("SITEMAP_SPECIAL_TITLE", "M�taux Sp�ciaux");
define("SITEMAP_OTHERS_NO_FERRO_TITLE", "Autres m�taux non-ferreux");
define("SITEMAP_DEEE_TITLE", "Prix des DEEE");
define("SITEMAP_CALC", "Prix calculateurs moteurs");
define("SITEMAP_CATA", "Prix pots catalytiques");
define("SITEMAP_RADIO", "Prix radiographies m�dicales");
define("SITEMAP_TURBO", "Prix turbos voitures");
define("SITEMAP_SERVICES", "Services");
define("SITEMAP_SELL", "D�roulement de l'achat chez Metalcash");
define("SITEMAP_SEND", "Informations sur l'envoi postal s�curis�");
define("SITEMAP_PICTURES", "Photos des denr�es r�cup�r�es");
define("SITEMAP_REGISTER", "Inscription");
define("SITEMAP_FAQ", "Foire aux questions");
define("SITEMAP_SITEMAP", "Plan du site");
define("SITEMAP_CONTACT", "Contact");
define("SITEMAP_TIN13_NAME", "Achat �tain 99%");
define("SITEMAP_TIN18_NAME", "Achat �tain 90%");
define("SITEMAP_TIN1_NAME", "Achat �tain m�lang�");
define("SITEMAP_TIN15_NAME", "Achat barre � souder en �tain 60%");
define("SITEMAP_TIN16_NAME", "Achat fil � souder en �tain 60%");
define("SITEMAP_TIN11_NAME", "Achat zamak - m�lange plomb/zinc");
define("SITEMAP_AG14_NAME", "Achat couverts poin�onn�s 90 et 100");
define("SITEMAP_AG3_NAME", "Achat couverts poin�onn�s 84");
define("SITEMAP_AG2_NAME", "Achat couverts en m�tal argent�");
define("SITEMAP_AG4_NAME", "Achat pi�ces de formes en m�tal argent�");
define("SITEMAP_AG5_NAME", "Achat couteaux en m�tal argent�");
define("SITEMAP_METAL10_NAME", "Achat de widia");
define("SITEMAP_METAL12_NAME", "Achat de plomb");
define("SITEMAP_DEEE7_NAME", "CPU C�ramique Goldcap");
define("SITEMAP_DEEE8_NAME", "CPU C�ramique");
define("SITEMAP_DEEE9_NAME", "CPU Plastique");
define("SITEMAP_DEEE11_NAME", "CPU Cuivre");
define("SITEMAP_DEEE10_NAME", "CPU Slot");
define("SITEMAP_DEEE5_NAME", "M�moire RAM");
define("SITEMAP_DEEE6_NAME", "RAM Argent");
define("SITEMAP_DEEE1_NAME", "PCB Classe 1");
define("SITEMAP_DEEE2_NAME", "PCB Classe 1B");
define("SITEMAP_DEEE3_NAME", "PCB Classe 3");
define("SITEMAP_DEEE4_NAME", "PCB GSM");
define("SITEMAP_DEEE13_NAME", "Disque dur");
define("SITEMAP_DEEE12_NAME", "Alimentation");

// turbo
define("H1_TITLE_TURBO", "Achat turbo voiture cass�s");
define("H2_TITLE_TURBO", "Quel type de turbo achetons-nous?");
define("H2_TITLE_TURBO_TEXT", "Nous achetons tous les turbos voitures cass�s ou usag�s de <b><u>moins de 10 ans</u></b> au prix du jour affich� ci-dessus. Nous entendons par turbos cass�s, turbos hors usage, mais complet au niveau des pi�ces. Si vous avez plus de 50 pi�ces, contactez-nous pour une offre de prix personnalis�e.");
define("H2_TITLE_TURBO1", "Qu'est-ce qu'un turbo voiture?");
define("H2_TITLE_TURBO1_TEXT", "Le turbocompresseur dit turbo en language courant est l'un des trois principaux syst�mes de suralimentation employ�s sur les moteurs essence ou diesel destin�s � augmenter la puissance finale obtenue. C'est un compresseur, axial ou centrifuge entra�n� par une turbine.");

// email registration
define("EMAIL_FROM", "Metalcash - Inscription");
define("EMAIL_CONTENT_TEXT", "Bonjour %s,\n\n\nVotre compte Metalcash a �t� cr�� avec succ�s.\nUne derni�re �tape est n�cessaire pour afficher tous les prix d'achats.\n\nValidez votre compte en utilisant le lien d'activation ci-dessous:\n%s\n\nSi le lien ne fonctionne pas, copiez et collez-le dans votre navigateur.\n\nUn probl�me? Contactez-nous au %s.\n\n\nBien Cordialement,\nL'�quipe Metalcash");
define("EMAIL_CONTENT_HTML", "<span style=\"font-size: 20px;\">Bonjour %s,</span><p>Votre compte Metalcash a �t� cr�� avec succ�s.<br>Une derni�re �tape est n�cessaire pour afficher tous les prix d'achats.<p><b style=\"font-size: 14px;\">Veuillez <a href=\"%s\">cliquer sur ce lien</a> pour finaliser l'inscription.</b><p>Si le lien ne fonctionne pas, utilisez celui ci-dessous dans votre navigateur:<br>%s<p>Un probl�me? Contactez-nous au %s.<p>Bien Cordialement,<br>L'�quipe Metalcash");
define("ALL_RIGHT_RESERVED", "TOUS DROITS R�SERV�S - METALCASH");

// config
define("PHONE_NUMBER", "+32 474 01 12 93");
define("INTEREST1", "Tous les m�taux");
define("INTEREST2", "�tain");
define("INTEREST3", "M�tal argent�");
define("INTEREST4", "M�taux sp�ciaux");
define("INTEREST5", "M�taux pr�cieux");

// Alt d'image
define("TRUST_METALCASH", "Faites confiance � Metalcash");
define("METALCASH_PAYCASH", "Metalcash paie cash");
define("ALT_POINCONS", "Poin�ons du m�tal argent�");
define("ALT_PHONE", "T�l�phone");

// -- DEBUT NOUVEAU TEXTE -- //
// Nouveaux textes index
define("WORD_TURBO", "Turbos cass�s");
define("H2_DEFAULT_TITLE2", "Achat du viel �tain");
define("H2_DEFAULT_TITLE3", "M�tal argent�");
define("H2_DEFAULT_TITLE4", "Achat de D3E");
define("H2_DEFAULT_TITLE2_TEXT", "Grossiste depuis de nombreuses ann�es, nous achetons plusieurs tonnes d'objets en �tain chaque mois afin d'en extraire les mati�res premi�res pour une r�utilisation dans l'industrie.");
define("H2_DEFAULT_TITLE3_TEXT", "Sp�cialis� dans l'achat et le recyclage de couverts en m�tal argent�, nous offrons le meilleur prix au kilogramme selon la qualit� des couverts � traiter.");
define("H2_DEFAULT_TITLE4_TEXT", "Nous r�cup�rons les d�chets �lectroniques provenant de toute l'Europe. Les cartes �lectroniques contiennent en petite quantit� des m�taux pr�cieux que nous revalorisons.");

// news
define("NEWS_CATA_TITLE", "Catalogue catalyseurs");
define("NEWS_CATA_DESCR", "Plus de 4000 r�f�rences de prix de catalyseurs sont pr�sentes dans notre catalogue num�rique en ligne. Les prix d'achat sont mis � jour toutes les 4 heures.");

// catalyseurs
define("H2_TITLE1_CATA_TEXT", "Il existe de nombreuses cat�gories diff�rentes de catalyseurs. Pour connaitre la valeur de vente de vos catalyseurs imm�diatement, veuillez acc�der � notre <a href=\"%s\">catalogue �lectronique</a>, plus de 4000 r�f�rences y sont mises � jour toutes les 4 heures.");
define("WORD_CATA_CATALOGUE", "Catalogue �lectronique");
define("ACCESS_CATA_CATALOGUE", "Acc�s aux prix d'achat des catalyseurs");
define("TITLE_CATA_CAT", "Catalogue �lectronique pour le recyclage de pots catalytiques");
define("DESCRIPTION_CATA_CAT", "Acc�s aux prix d'achat de plus de 4000 r�f�rences de catalyseurs. Nous ach�tons en gros aux meilleurs prix tous les pots catalytiques pour le recyclage.");
define("KEYWORDS_CATA_CAT", "catalogue catalyseur, catalogue �lectronique cata, catalogue pots catalytiques num�rique");

define("SITEMAP_CATA_CATALOGUE", "Catalogue �lectronique pour catalyseurs");

// Changement de texte: define("H1_TITLE_CATA", "Achat de catalyseurs usag�s - Recyclage de pots catalytiques");
define("H3_INDEX_CATA_TITLE", "Plus de 4000 r�f�rences de prix pour la vente de pots catalytiques usag�s");
define("H3_INDEX_CATA_TITLE_TEXT", "Avec ce catalogue �lectronique, vous serez en mesure de trouver les r�f�rences et le prix parmi plus de 4000 r�f�rences de catalyseurs dans toutes les marques, y compris BMW, Chevrolet, Chrysler, Dayhatsu, Deawoo, Fiat, Ford, GAT Eurokat, HJS, Honda, Huyndai/KIA, Iveco, Jaguar, Jeep, KIA, Land-Rover, Lexus, Maserati, Mazda, Mercedes, Mitsubishi, N/A, Nissan, Opel, PSA, Renault, Saab, Seat, Skoda, Smart, SsangYong, Subaru, Suzuki, TATA, Toyota, Volvo, VW/Audi, Walker.");

// catalogue catalyseurs
define("H1_CATA_CAT_TITLE", "Catalogue �lectronique pour l'achat de catalyseurs");
define("H1_CATA_CAT_TITLE_TEXT", "Le catalogue num�rique Metalcash pour l'achat et le <a href=\"%s\">recyclage de catalyseurs</a> vous permet de retrouver facilement le prix que nous achetons un catalyseur en quelques secondes.");
define("H2_CATA_CAT_TITLE1", "Recherche du prix d'achat pour les pots catalytiques");
define("H2_CATA_CAT_TITLE1_TEXT", "Entrez dans le champs de recherche ci-dessous la r�f�rence du pot catalytique pour lequel vous souhaitez conna�tre notre prix d'achat. Les prix affich�s sont pour les particuliers.");
define("FORM_CATA_SEARCH", "Entrez une r�f�rence ici. Exemple: GM-16");
define("WORD_SEARCH", "Recherche");
define("H2_CATA_CAT_TITLE2", "R�sultats de la recherche");
define("WORD_RESULT", "r�sultat");
define("MORE_THAN_6_RESULT", "Plus de 6 r�sultats");
define("UNAUTH_SEARCH", "Pour pouvoir afficher les prix de la recherche, vous devez vous connecter sur votre compte. La recherche de r�f�rence de pots catalytiques est uniquement disponible si vous �tes connect�s.<br><span style=\"color: #000\">Si vous n'avez pas de compte, <a href=\"%s\" style=\"color: red; font-weight: normal;\">cliquez ici</a> pour en cr�er un gratuitement en 30 secondes.</span>");
define("SEARCH_LIMIT_REACHED", "Vous avez atteint votre limite de recherche (15). Si vous souhaitez augmenter cette limite,<br>veuillez nous contacter par t�l�phone au %s.<p><span style=\"font-size: 18px;\">Vous devez attendre 2H pour effectuer une nouvelle recherche</span>");
define("TEXT_SHOW_PRICE2", "Voir le prix");
define("WORD_BRAND", "Marque");
define("WORD_TYPE", "Type");
define("WORD_REF", "R�f�rence");
define("SEARCH_STOPPED", "Recherche arr�t�e: Vous ne pouvez pas afficher plus de 6 r�sultats � la fois.");
define("SEARCH_PSA", "Le prix des catalyseurs avec une ast�risque (*) est sous r�serve d'acceptation du lot.");
define("SEARCH_FILTER", "Ce catalyseur est en plusieurs parties. Additionnez le Filtre au catalyseur pour avoir la valeur totale.");
define("REF_NOTFOUND", "La r�f�rence <u>%s</u> n'a pas �t� trouv�e dans notre catalogue<br><span style=\"font-size: 12px\">Conseils: Essayez avec d'autres num�ros, exemple: <a href=\"?search=K-202\">K-202</a>, <a href=\"?search=178-ACB\">178-ACB</a>, <a href=\"?search=KT-A019\">KT-A019</a></span>");
define("H2_CATA_CAT_TITLE3", "Grossiste pour le rachat et le recyclage");
define("H2_CATA_CAT_TITLE3_TEXT", "Les prix affich�s sont ce que nous payons aujourd'hui aux particuliers pour les quantit�s inf�rieures � 50 pots catalytiques. Si vous souhaitez b�n�ficier du tarif de gros, merci de nous contacter directement par t�l�phone au %s.");

// Nouveau texte
define("SITEMAP_TIN17_NAME", "Achat scories d'�tain argent");
define("H2_TITLE4_CAT_MA", "L'argent m�tal utilis� pour plaquer l'argenterie");
define("H2_TITLE4_CAT_MA_TEXT", "C'est l'argent (Ag) qui est utilis� pour argenter les objets et <strong>couverts en m�tal argent�</strong>. Ce proc�d� consiste a recouvrir les <strong>objets maillechort</strong> (qui est un alliage de cuivre, nickel et zinc) par une fine couche d'<strong>argent m�tal</strong>. La quantit� d'argent ainsi d�pos�e sur chaque couvert est d�finie par un num�ro dans le poin�on.");
define("H2_TITLE3_CAT_MA_TEXT", "Les <strong>poin�ons du m�tal argent�</strong> sont nombreux et ils d�finissent la quantit� d'argent d�pos�. Ainsi, un poin�on 84 signifiera que 84 grammes d'argent ont �t� utilis� pour <strong>argenter 24 couverts</strong>.<p>Ci-dessous quelques exemple de poin�on Fran�ais.");
define("H2_TITLE3_CATA", "Recyclage de pots catalytiques");
define("H2_TITLE3_CATA_TEXT", "Le <strong>rachat de pots catalytiques</strong> est destin� au recyclage afin d'en extraire les m�taux pr�cieux qu'ils contiennent. Selon les diff�rentes r�f�rences, un catalyseur peut valoir plus ou moins cher. Pour conna�tre le prix que nous achetons un pot catalytique, nous offrons � nos clients gratuitement l'acc�s � notre <a href=\"%s\" style=\"color: #000;\">catalogue �lectronique pour l'achat de catalyseurs</a>.");
define("CATA_CAT_APPLY_BIG_QT", "Si vous avez une grosse quantit� (+50 pi�ces minimum), d'autres prix sont applicables.");

// Nouveau texte // Remplacer le Pays par le Pays de la langue
define("H2_TITLE4_CAT_ETAIN", "Prix de l'�tain en Belgique");
define("H2_TITLE4_CAT_ETAIN_TEXT", "Le <strong>prix de l'�tain</strong> n'est pas fixe, il d�pend en premier lieu de son cours boursier, ensuite, pour chaque �l�ment, le prix est calcul� sur base de la densit� d'�tain pr�sente dans l'alliage. Nous offrons le meilleur prix pour l'�tain alimentaire m�lang�. Le titre l�gal est de 80%, mais il existe de nombreux <strong>vieux objets en �tain</strong> en dessous de ce pourcentage. Pour conna�tre pr�cis�ment la concentration d'�tain dans un objet, il faut effectuer une analyse � fluorescence X avec un appareil appel� spectrom�tre.");
define("H2_TITLE5_CAT_MA", "Prix du m�tal argent� en Belgique");
define("H2_TITLE5_CAT_MA_TEXT", "Le <strong>prix du m�tal argent�</strong> n'est pas fixe, il d�pend en premier lieu du cours boursier de l'<strong>argent m�tal</strong>, ensuite, pour chaque �l�ment, le prix est d�fini par le poin�on appos� sur l'objet. Le poin�on le plus courant sera le 84 mais il existe de nombreux <strong>couverts en m�tal argent�</strong> sans poin�on.");

define("EMAIL_REMIND_SUBJECT_REGISTRATION" , "Rappel: Activation de votre compte Metalcash");
define("EMAIL_CONTENT_REMIND_TEXT", "Bonjour %s,\n\n\nVous avez cr�� un compte Metalcash le %s.\nL'activation du compte est n�cessaire pour afficher tous les prix d'achats.\n\nValidez votre compte en utilisant le lien d'activation ci-dessous:\n%s\n\nSi le lien ne fonctionne pas, copiez et collez-le dans votre navigateur.\n\n*NOTE IMPORTANTE:* Si vous n'activez pas votre compte avant le %s, celui-ci sera automatiquement bloqu�.Un probl�me? Contactez-nous au %s.\n\n\nBien Cordialement,\nL'�quipe Metalcash");
define("EMAIL_CONTENT_REMIND_HTML", "<span style=\"font-size: 20px;\">Bonjour %s,</span><p>Vous avez cr�� un compte Metalcash le <b>%s</b>.<br>L'activation du compte est n�cessaire pour afficher tous les prix d'achats.<p><b style=\"font-size: 14px;\">Veuillez <a href=\"%s\">cliquer sur ce lien</a> pour activer votre compte.</b><p>Si le lien ne fonctionne pas, utilisez celui ci-dessous dans votre navigateur:<br>%s<p><b>NOTE IMPORTANTE:</b> Si <u>vous n'activez pas votre compte avant le %s</u>, celui-ci sera automatiquement bloqu�.</b> Un probl�me? Contactez-nous au %s.<p>Bien Cordialement,<br>L'�quipe Metalcash");

define("TITLE_404", "Erreur 404 (Page non trouv�e)");
define("THIS_IS_ERROR", "Ceci est une erreur");
define("THIS_IS_ERROR_TEXT", "L'adresse URL <code>%s</code> n'a pas �t� trouv�e sur ce serveur. <ins>C'est tout ce que nous savons.</ins>");
define("BACK_TO_METALCASH", "Retour sur Metalcash");

/* Section relative aux Images */
define("IMG_PATH_METAUX", "metaux");
define("IMG_PATH_DEEE", "deee");

define("IMG_ETAIN", "prix-etain");
define("IMG_COUVERT_ARGENTE", "prix-couvert-argent-84");
define("IMG_CPU_CERAMIQUE", "cpu-ceramique");
define("IMG_CPU_GOLDCAP", "cpu-goldcap");
define("IMG_CALC_MOTEUR", "prix-calculateur-moteur");
define("IMG_CATALYSEUR", "prix-catalyseur");
define("IMG_RADIO", "prix-radio-medicale");
define("IMG_TURBO", "prix-turbo-voiture");

define("IMG_PIC_ALIM", "alimentation");
define("IMG_PIC_PCB", "carte-pcb");
define("IMG_PIC_CARTE", "carte");
define("IMG_PIC_COUTEAU", "couteaux-argent");
define("IMG_PIC_COUVERTS", "couverts-argent");
define("IMG_PIC_OPTIQUE", "disque-optique");
define("IMG_PIC_ETAIN", "etain");
define("IMG_PIC_HDD", "hdd");
define("IMG_PIC_POINCONS", "poincons");
define("IMG_PIC_CPU_CERAMIQUE_ALU", "processeur-ceramique-alu");
define("IMG_PIC_CPU_CERAMIQUE", "processeur-ceramique");
define("IMG_PIC_CPU_CUIVRE", "processeur-cuivre");
define("IMG_PIC_CPU_PLASTIC", "processeur-plastique");
define("IMG_PIC_CPU_PLASTIC2", "processeur-plastique2");
define("IMG_PIC_CPU_SLOT", "processeur-slot");
define("IMG_PIC_RAM_ARGENT", "ram-argent");
define("IMG_PIC_RAM_DOREE", "ram-doree");
define("IMG_PIC_TURBO", "turbo-voiture");

// Inscription
define("REGISTER_TIP_NAME", "<b>Votre nom complet</b><p><b>Nous v�rifions les informations relatives aux comptes r�guli�rement.</b>");
define("REGISTER_TIP_EMAIL", "<b>Adresse Email</b><p>Nous avons besoin de votre adresse email pour vous envoyez le mot de passe de votre compte et les notifications relatives � votre espace personnel. Ces notifications peuvent �tre param�tr�es via votre compte.<p><b>Validation du compte par email</b>");
define("REGISTER_TIP_PHONE", "<b>Num�ro de t�l�phone</b><p>Votre num�ro de t�l�phone est facultatif mais vivement conseill� si vous voulez �tre inform� par SMS des opportunit�s d'affaires sur les m�taux et DEEE.");

define("WORD_PIECE", "pi�ce");
define("NOT_BUY_ANYMORE", "Nous n'achetons plus ce mat�riel pour le moment.");

define("CLOSED", "Nous travaillons � bureau ferm�s jusqu'au 19/07/2024 inclus. Contact uniquement WhatsApp +32 474 01 12 93 ou <a href=\"%s\" style=\"font-size: 16px;\">par e-mail</a>.");
//define("CLOSED_TEXT", "Nous sommes ferm�s jusqu'au 14 D�cembre 2019 inclus.<br>Nous r�pondons uniquement par e-mail.");

define("CLOSED_TXT", "Ferm�");

//define("CLOSED", "COVID-19: Nous travaillons. Reprise des Rendez-vous par T�l�phone au +32 474 01 12 93.");
define("CLOSED_TEXT", "COVID-19: La prise de rendez-vous continue.<br>Vous pouvez nous contacter par e-mail ou t�l�phone pour plus d'information.");

define("ONLY_SEPA", "Les prix affich�s s'appliquent exclusivement pour un paiement via Transfert Bancaire (SEPA)");

define("WARN_QT", "Le prix affich� (250kg) est valable<br> pour tous nos fournisseurs r�guliers.");
define("WARN_DPAY", "Pour tous les m�taux affich�s, le paiement se fait par banque le m�me jour que votre livraison!");

define("H2_TITLE5_CAT_ETAIN", "Meilleur prix d'europe pour les grosses quantit�s d'�tain");
define("H2_TITLE5_CAT_ETAIN_TEXT", "Nous offrons le meilleur prix pour l'<strong>achat d'�tain au kilo</strong>. Nous achetons dans toute l'Europe et nous effectuons votre paiement par banque le jour de votre livraison. Si vous avez une quantit� d'�tain sup�rieure � 250kg, n'h�sitez pas � nous contacter pour avoir une offre de prix personnalis�e. Pes�e, analyse et paiement en toute simplicit�. Prix affich� = Prix pay�.");

define("AUTO_UPDATE", "Mise � jour des prix effectu�e automatiquement");

// NEW SILVER
define("PRINT_PRICE_SILVER_REGISTER", "Pour afficher tous les prix de l'argent massif, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: green;\">inscrire</a>.");
define("H1_TITLE_CAT_SILVER", "Achat de l'argent massif - Vendre de l'argent massif (m�tal)");
define("H1_TITLE_CAT_SILVER_TEXT", "<strong>Metalcash</strong> ach�te au meilleur prix tous les d�chets d'argent ainsi que les <strong>couverts en argent massif</strong>, m�me ab�m�s. Le <strong>prix de l'argent massif</strong> varie en fonction de sa puret� et du cours au kilo d'argent (Ag). Veuillez noter que l'argent massif n'est pas aimant�s. L'argent peut �tre sous plusieurs forme, notamment sous forme de poudre, de boue, de feuilles, de granules ou m�me d'objets. Les lingots d'argent peuvent �tre �galement rachet� pour le recyclage. Il existe �galement beaucoup de produit qui contiennent de l'argent massif, comme les rivets de contacts, les guirlandes d'argent, les d�chets d'argent �lectrolytique ou encore les anodes en argent.");
define("INSTRUCTION_TO_SELL_SILVER", "Instructions pour la vente d'argent massif");

define("H2_TITLE_CAT_SILVER", "Prix de l'argent Massif au %s");
define("H2_TITLE1_CAT_SILVER", "Comment reconna�tre l'argent massif");
define("H2_TITLE1_CAT_SILVER_TEXT1", "Les couverts ou les objets en argent massif sont g�n�ralement identifi�s par des poin�ons ou les chiffres 800, 900 ou 925. Le pourcentage d'argent utilis� est au g�n�ral au minimum de 80% (800/1000).");
define("H2_TITLE1_CAT_SILVER_TEXT2", "Sont inscrits � l'int�rieur de ce poin�on:");
define("H2_TITLE1_CAT_SILVER_TEXT3", "<li>Le chiffre I ou II correspondant � la qualit� de la fabrication.</li><li>Le symbole propre � l'orf�vre qui a fabriqu� la pi�ce.</li><li>Un chiffre indiquant la quantit� d'argent (facultatif).</li><li>Les initiales ou nom de l'orf�vre.</li>");

define("H2_TITLE2_CAT_SILVER", H2_TITLE2_CAT_MA);
define("H2_TITLE2_CAT_SILVER_TEXT", H2_TITLE2_CAT_MA_TEXT);
define("H2_TITLE3_CAT_SILVER", "Exemple de poin�ons d'argent Massif");

define("H2_TITLE3_CAT_SILVER_TEXT", "Les <strong>poin�ons d'argent</strong> sont nombreux et ils d�finissent la quantit� d'argent d�pos�. Les poin�ons d'argent fran�ais les plus connus sont la Minerve.<p>Ci-dessous quelques exemple de poin�on Minerve Fran�ais.");

define("H2_TITLE4_CAT_SILVER", "Achat de couverts en argent et argent massif");
define("H2_TITLE4_CAT_SILVER_TEXT", "Veuillez vous assurer qu'il s'agit bien d'argent massif avant de nous l'exp�dier. S'il s'agit de couverts en m�tal argent�s, un poin�on carr� avec le num�ro 84, 90 ou 100 y est grav�. Ces couverts en m�tal argent�, aussi appel�s argenterie d'h�tel, sont aussi achet�s mais � un autre prix. Par cons�quent, assurez-vous de rechercher le cachet d'authenticit� 800, 835, 900, 925 ou sterling.");

define("H2_TITLE5_CAT_SILVER", "Achat de pi�ces de monnaie en Argent");
define("H2_TITLE5_CAT_SILVER_TEXT", "Il existe de nombreuses pi�ces en argent massif. Les pi�ces francaises les plus connues sont la Semeuse et l'Hercule. Pour la pi�ce Semeuse, elle existe en plusieurs taille et valeur faciale, elle est dans la plupart des cas compos�e de 83.5% d'argent. Quant � la pi�ce Hercule, elle est compos�e � 90% d'argent. Les plus connues sont les 10F et 50F.");

// NEW METAUX SPECIAUX
define("PRINT_PRICE_SPECIAL_REGISTER", "Pour afficher tous les prix des m�taux sp�ciaux, vous devez vous connecter ou vous <a href=\"%s\" style=\"font-weight: normal; color: green;\">inscrire</a>.");
define("H1_TITLE_CAT_SPECIAL", "Achat de m�taux sp�ciaux au kilo pour le Recyclage");
define("H1_TITLE_CAT_SPECIAL_TEXT", "Nous achetons au kilo les m�taux sp�ciaux tel que l'Hafnium (Hf), le Molybd�ne (Mo), les d�chets d'�tain avec de l'argent ou les reste d'�tain � la vague contenant de l'or (Au). Aussi, tous les connecteurs ou d�chets de poinconnages plaqu� argent (Ag) ou or (Au).");
define("INSTRUCTION_TO_SELL_SPECIAL", "Instructions pour la vente des m�taux sp�ciaux");

define("H2_TITLE_CAT_SPECIAL", "Prix des M�taux Sp�ciaux au %s");
define("H2_TITLE1_CAT_SPECIAL", "Qu'est-ce qu'un m�tal sp�cial");
define("H2_TITLE1_CAT_SPECIAL_TEXT1", "Un M�tal sp�cial est un m�tal utilis� dans l'industrie afin d'obtenir une optimisation du proc�d� chimique lors de la transformation de mati�re premi�re. Ces m�taux sp�ciaux sont plus rares et sont m�me parfois assimil�s sous le nom de m�taux exotiques. Ces m�taux sont souvent utilis�s dans des applications sp�cifiques en raison de leurs caract�ristiques uniques, telles que leur r�sistance � la corrosion, leur conductivit� �lectrique ou thermique �lev�e, leur l�g�ret�, leur force, ou leur biocompatibilit�.");

define("H2_TITLE2_CAT_SPECIAL", "O� trouver des M�taux Sp�ciaux");
define("H2_TITLE2_CAT_SPECIAL_TEXT", "Les m�taux sp�ciaux, en raison de leurs propri�t�s uniques et de leur raret� relative, proviennent de diverses r�gions du monde et sont souvent extraits par des m�thodes sp�cifiques et complexes. Les m�taux sp�ciaux sont cruciaux pour le d�veloppement technologique et industriel. Leur extraction et leur production sont concentr�es dans quelques r�gions sp�cifiques du monde, en fonction des d�p�ts min�raux disponibles. Ces m�taux sont indispensables dans des applications vari�es allant de l'�lectronique � l'a�rospatiale, en passant par les industries m�dicales et �nerg�tiques.");

define("H2_TITLE3_CAT_SPECIAL", "Comment faire pour vendre des M�taux Sp�ciaux?");
define("H2_TITLE3_CAT_SPECIAL_TEXT", "Contactez-nous par e-mail ou par t�l�phone pour prendre rendez-vous! Si vous avez d'autres types de m�taux sp�ciaux, comme des oxydes, des tournures, restes fondus ou n'importe quelle autre forme comme les �ponges, la poudre, une analyse sera alors effectu�e en amont afin que vous soyez r�mun�r� au plus proche de la valeur de votre mat�riel. Pour recevoir une offre de prix sur mesure, il suffit de nous envoyer un �chantillons (200 grammes) et de nous indiquer la quantit� ainsi que le m�tal que vous souhaitez valoriser en priorit�. La valeur de recyclage d�pend de la quantit�, des m�taux et impuret�s contenues ainsi que de sa nature.");

define("H2_TITLE4_CAT_SPECIAL", "Qui utilise des m�taux sp�ciaux?");
define("H2_TITLE4_CAT_SPECIAL_TEXT", "Les industries qui utilisent souvent des m�taux sp�ciaux recycl�s incluent l'a�rospatiale, l'�lectronique, l'automobile, et la m�decine. Pour l'industrie a�rospatiale, les m�taux sp�ciaux sont utilis�s en raison de leurs propri�t�s uniques telles que la l�g�ret�, la r�sistance � la chaleur et la corrosion ainsi que la haute r�sistance m�canique. Le Nobium et le Tantale sont utilis�s dans les composants de moteur � r�action ou syst�mes de propulsion. Pour l'industrie �lectronique, le Platine (Pt) est utilis� dans les capteurs, les contacts �lectriques et les �lectrodes. L'indium (In) quant � lui est utilis� pour des soudures � basse temp�rature pour les �crans �crans LCD et OLED (ITO - Indium Tin Oxide). Dans l'automobile, le Carbure de Tungst�ne, aussi appel� Widia am�liore la durabilit� et la performance des composants soumis � des contraintes �lev�es.");


define("STOCK_SN", "Cours de l'�tain en Euro � la Tonne");
define("STOCK_AG", "Cours de l'Argent en Euro au Kilo");
define("STOCK_AU", "Cours de l'Or en Euro au Kilo");




// NEW FORM CONTACT
define("APPOINTMENT_TITLE", "Prendre rendez-vous ?");
define("APPOINTMENT_HOURS", "Disponible du <strong>lundi au vendredi</strong>, de <strong>9h à 16h</strong>.");
define("CHOICE_CONTACT_FORM", "Que souhaitez-vous faire ?");
define("CONTACT_BUTTON", "Nous contacter");
define("BORDEREAU_BUTTON", "Créer un bordereau");
define("TEXT_POSTAL_DELIVERY", "Envoi postal");
define("FORM_CONTACT_TITLE", "Contactez-nous");
define("FORM_CONTACT_DESCRIPTION", "Pour toute question ou information complémentaire, n'hésitez pas à nous contacter.");
define("NEW_FIELD_FIRSTNAME", "Prénom");
define("NEW_PLACEHOLDER_FIRSTNAME", "Votre prénom");
define("NEW_FIELD_LASTNAME", "Nom de famille");
define("NEW_PLACEHOLDER_LASTNAME", "Votre nom de famille");
define("NEW_FIELD_EMAIL", "E-mail");
define("NEW_ERROR_MESSAGE_EMAIL", "Veuillez saisir une adresse e-mail valide.");
define("NEW_FIELD_PHONE", "Numéro de téléphone");
define("NEW_PLACEHOLDER_PHONE", "Votre numéro de téléphone");
define("NEW_ERROR_MESSAGE_PHONE", "Veuillez saisir un numéro de téléphone valide.");
define("NEW_FIELD_SUBJECT", "Sujet");
define("NEW_MAIL_SUBJECT1", "Demande d'informations");
define("NEW_MAIL_SUBJECT2", "Demande de rendez-vous");
define("NEW_MAIL_SUBJECT3", "Grosses quantités à vendre");
define("NEW_MAIL_SUBJECT4", "Autre");
define("NEW_FIELD_MESSAGE_SUBJECT", "Votre message");
define("NEW_PLACEHOLDER_MESSAGE_SUBJECT", "Tapez votre message...");
define("NEW_BTN_SUBMIT_FORM_CONTACT", "Envoyez votre message");
define("NEW_MESSAGE_ERROR_SUBMIT_CONTACTFORM", "Merci de vérifier et de corriger les informations avant d'envoyer votre message.");


// SUCCESS MAIL CONFIRMATION PAGE
define("NEW_TITLE_PAGE_CONFIRM_MAIL", "Confirmation de la réception de votre e-mail");
define("NEW_SUCCESS_EMAIL_TITLE", "Merci pour votre message !");
define("NEW_SUCCESS_EMAIL_DESC", "Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.");
define("NEW_SUCCESS_EMAIL_BTN", "Retour à la page d'accueil");

//NEW FORM BORDEREAU
define("NEW_BORDEREAU_TITLE", "Créez votre bordereau d'achat");
define("NEW_BORDEREAU_ADDRESS", "Avenue André Ernst 3A, 4800 Verviers, Belgique");
define("NEW_BORDEREAU_DESCRIPTION", "Le bordereau est à inclure dans votre colis à destination de l'adresse suivante :");
define("NEW_NOTE_BORDEREAU", "NOTE: Les colis pesant moins de 10kg ne sont pas acceptés.");
define("TITLE_HEADER_INFORMATIONNS", "Informations générales");
define("TITLE_HEADER_ADDRESS", "Adresse");
define("NEW_FIELD_ADDRESS", "Rue et numéro");
define("NEW_PLACEHOLDER_ADDRESS", "Votre rue et numéro");
define("NEW_FIELD_POSTALCODE", "Code postal");
define("NEW_PLACEHOLDER_POSTALCODE", "Votre code postal");
define("NEW_FIELD_LOCALITY", "Localité");
define("NEW_PLACEHOLDER_LOCALITY", "Votre localité/ville");
define("NEW_FIELD_COUNTRY", "Pays");
define("NEW_PLACEHOLDER_COUNTRY", "Votre pays");
define("TITLE_HEADER_BANK", "Coordonnées bancaires");
define("NEW_FIELD_ACCOUNT_HOLDER", "Titulaire du compte");
define("NEW_FIELD_IBAN", "IBAN");
define("NEW_ERROR_MESSAGE_IBAN", "L'IBAN fourni n'est pas valide. Veuillez vérifier et réessayer");
define("NEW_FIELD_BANKNAME", "Nom de la banque");
define("NEW_PLACEHOLDER_BANKNAME", "Le nom de votre banque");
define("NEW_FIELD_SWIFT", "SWIFT");
define("TITLE_HEADER_ID_CARD", "Informations de la carte d'identité");
define("NEW_FIELD_ID_CARD", "Numéro de la carte d'identité");
define("NEW_FIELD_EXPIRY_CARD_ID", "Date d'expiration de la carte d'identité");
define("NEW_ERROR_MESSAGE_EXPIRY_ID_CARD", "La date saisie n'est pas valide. exemple: Jour/Mois/Année");
define("NEW_ERROR_MESSAGE_EXPIRYDATE_ID_CARD", "Votre carte d'identité est expirée.");
define("TITLE_HEADER_PACKAGES", "Informations sur le(s) colis");
define("NEW_FIELD_PACKAGE_NUMBER", "Veuillez indiquer le nombre de colis que vous souhaitez envoyer");
define("NEW_PLACEHOLDER_PACKAGE_NUMBER", "Nombre de colis à envoyer");
define("NEW_TITLE_INDEX_PACKAGE", "Colis");
define("NEW_FIELD_TYPE_METAL", "Type de matériaux");
define("NEW_PLACEHOLDER_TYPE_METAL", "exemple: étain");
define("NEW_FIELD_WEIGHT", "Poids en kg");
define("NEW_FIELD_DESCRIPTION_PACKAGE", "Descriptif (facultatif)");
define("NEW_PLACEHOLDER_DESCRIPTION_PACKAGE", "exemple: couverts");
define("NEW_BTN_ADD_METAL", "Ajouter un autre matériau");
define("NEW_FIELD_LASTTEXT_CONDITION", "J'accepte les");
define("NEW_FIELD_FIRSTTEXT_CONDITION", "termes, conditions et politique");
define("NEW_LINK_CONDITION", "https://www.metalcash.be/legal");
define("BTN_SUBMIT_BORDEREAU", "Générer le bordereau d'achat");
define("BTN_SUBMIT_ERROR_BORDEREAU", "Merci de vérifier et de corriger les informations avant de procéder à la génération du bordereau d'achat.");


// PAGE BORDEREAU GENERATE
define("NEW_TITLE_PAGE_BORDEREAU", "Bordereau d'achat");
define("BTN_DOWNLOAD_PDF", "Télécharger PDF");
define("BTN_TEXT2_DOWNLOAD_PDF", "Colis");
define("TITLE_HEADER_BORDEREAU", "Bordereau d'achat");
define("DATE_GENERATE_BARRE_CODE", "Créé le");
define("HEADER_BORDEREAU_INFORMATIONS", "SERVICE D'ENVOI POSTAL");
define("HEADER_BORDEREAU_NOTE", "NOTE: Les colis pesant moins de 10 kg ne sont pas acceptés (voir les conditions en bas de page).");
define("BENEFICIARY_INFO", "Identification du bénéficiaire");
define("BENEFICIARY_INFO_STREET", "Rue");
define("BENEFICIARY_INFO_LOCALITY", "CP, Localité");
define("BENEFICIARY_INFO_PHONE", "Téléphone");
define("BORDEREAU_CONDITION_ACCEPT", "J’ai pris connaissance des conditions générales et de la déclaration de confidentialité et je les accepte.");
define("BORDEREAU_CERTIFCATE_TITLE", "Certificat de propriété");
define("BORDEREAU_CERTIFCATE_DESCRIPTION", "En tant que personne majeure disposant pleinement de ma capacité juridique, je certifie sur l'honneur que le matériel proposé à la vente par l'entreprise Metalcash sprl m’appartient de manière exclusive et sans restriction, qu'il n'est issu d'aucune activité illégale, qu'il n'est ni mis en gage ni cédé, et qu'il ne contient aucune composante dangereuse.");
define("BORDEREAU_CONDITIONS_TITLE", "Lire les conditions générales et la déclaration de confidentialité");
define("BORDEREAU_CONDITIONS_LINK1", "https://www.metalcash.be/faq");
define("BORDEREAU_CONDITIONS_LINK2", "https://www.metalcash.be/legal");
define("BORDEREAU_DATE", "Date");
define("BORDEREAU_SIGNATURE", "Signature");
define("BORDEREAU_CUTE_TEXT", "N'oubliez pas de découper la partie ci-dessous et de l'apposer à l'extérieur du colis bien visible");
define("BORDEREAU_BTN_BACK", "Retour vers l'accueil");


?>