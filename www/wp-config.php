<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'deadliner');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'i*{Ncd~d9fM)S:_soAU]mtz$wlJ0K+ic2!{i*C2tf,>&2.<Zdb}vy/y3>}o23<Qa');
define('SECURE_AUTH_KEY',  ' E+981%AVzR|tzzTQinFHz@p:hY9xeP^ATL1HBG~1J$S|j4m$6~|h{a!CmJPLcN:');
define('LOGGED_IN_KEY',    'Y|_YmtKspq@p[F!bnQtmBd3xnCK;c$$.%hnQBp*$|]i[YAk;!YX@R~{1jNVi[^AF');
define('NONCE_KEY',        '77L2o{6(WI_).dYrgTFa Jp%}_8limF`8P]s;m{RgVm6^9gYHo+T2+cBD^|Y-E!0');
define('AUTH_SALT',        'riF?!mpCNS9M U[e[fRPYZb~T^ECxMD,|O>22#I-6>>bs ew>f-]l=7]xb,TPWST');
define('SECURE_AUTH_SALT', '54%MfVI}d+`FNC-Zd@gd3Ct`c5@i1ZdDvr#U`,^bh,eX:(V/Ab>CXFj`1 poRNt_');
define('LOGGED_IN_SALT',   'U+c?KG@@w`|V+@e|q%v2n1et`0C(3%$93J^-]k@~}muv9%hZ=aGvY YF&EgNF$vA');
define('NONCE_SALT',       'Hv2?kO3a<m}A) ^uDGU>Dx!f1ij7{tqAxyI1,VfNRQ}uFC]( 0wnOa$tw0$A3wf]');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ddlnr_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
