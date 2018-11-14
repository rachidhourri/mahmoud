<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/cosenzam/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'cosenzam_cosenza');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'cosenzam_antidote');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '~[MLTu.LXR~0');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eEwR-+ `yWa+P^)(ncV:G~k9*]<;/LmCmnyV};X{SKrTa:)[?-}&%|P)u_>X]hz9');
define('SECURE_AUTH_KEY',  '*(Es?%EfP1GM`M-&CvZ+VFFalW?Roden)$<f/so4C6H{!})e3gYh{y%DN[e pYKV');
define('LOGGED_IN_KEY',    '-U,T.67_0I;+SiRATp,`mvZ}i0;<>Lje4QQTH]_,`EPn,P_,j#Ba@)XHzN[V44j%');
define('NONCE_KEY',        '.4%5x {t!hRq&PF%Lhh%FgEvlb$T-si;r-Ul~yjly8n-V4~A=!5ni2ZYzS]=5KT:');
define('AUTH_SALT',        'Fj]<2r>`ie/.8G:4: _r>};eJpLRV_q^)2Y#].Weqv;Cj%>;>nQr=6c$x)rdr>6b');
define('SECURE_AUTH_SALT', 'Y5-2w7>cEio()[8y|XQ:?P!cuW`fh-HV&kM/[2c4%7xG<fB{m<Emu%QBY*O+~#Tt');
define('LOGGED_IN_SALT',   'UkPo&aH:!|x~o(SH)Ruk>%Wn*7[%P>+0lFEa7n-F?]8<]({fDRC,C-XFs&{(~iP)');
define('NONCE_SALT',       'O8H7V.@Yt_}_Wn{1*cE a2rf!G F[+{7aAny4UJAT*VD5h/W&gf f<{;:AtNi9HA');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');