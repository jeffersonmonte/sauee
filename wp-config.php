<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'saueedb' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&l0zU1Z*Go|.7K:)xx`:-Z)iB v3XB7(SScur(gz[Q/nM;Byr,5_4ev!|Q6kOhDU' );
define( 'SECURE_AUTH_KEY',  'JYg)fZ|:ysNWQl|sSk33qEiguuQfgz9.KA0s*P8H|_/SDLB8T4u~0^Kexv]2][8F' );
define( 'LOGGED_IN_KEY',    'abWcS$~H++8cao>/W@n!7l<Nb04I9*}Vy?E%K(9u~>;{q6p%@g&t0hV&S%N7$TUY' );
define( 'NONCE_KEY',        '_=tSn3Vl#K@pH^Eb{*I-Ld^o:F,JDV2ch==:6.$[VJcB0jboi$S8zBpG5E5{xBiV' );
define( 'AUTH_SALT',        'R.$Kz$3lQI8;-,VlV[YvABf^D8H/.]QTO6XfxUiDq]-s*~kHsBPzu%G`FSdg=3AE' );
define( 'SECURE_AUTH_SALT', '*W$7}&Ci;Tk%?wHdI,;f:bzLl4~7RW7X;`9RF aGQMF*wRo)G<##_?]%@#}an8-l' );
define( 'LOGGED_IN_SALT',   'wupS/=vl&T&dZGVEY]VW7rIv[<D5?;_YB/*gHu@;-Tp@Hi:<*0HnOeWNe0S,}9a?' );
define( 'NONCE_SALT',       'z}bwL|10~{@a/r^p`2lKx, 9o9YnU%31y+lY/{7lIg4={3ua_k]k1{g_*T,!>S|p' );

@ini_set( 'upload_max_filesize' , '500M' );
@ini_set( 'post_max_size', '500M');
@ini_set( 'memory_limit', '500M' );
@ini_set( 'max_execution_time', '600' );
@ini_set( 'max_input_time', '600' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
