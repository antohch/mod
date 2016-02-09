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
define('DB_NAME', 'mod');

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
define('AUTH_KEY',         'b4k;|/isNBS1ZL:BIOi-]_BD`$ENpXCvbfU_(ZuR.nyBiKr::^0Iagr)``i6O D1');
define('SECURE_AUTH_KEY',  'zFms&tUV;Dx0l1]{{khSS_Cgrcl|&V+kS&j?UMu1hjHR/4D5~8y`:?ehl[U|8(>J');
define('LOGGED_IN_KEY',    '?5GI]}3lRwR>~!+[qM [h#5Rbt,T>l,._{6N)~4WM+A,=UNguVLI+(bJD+AP`-$A');
define('NONCE_KEY',        'm!lu08Oc&Kzq1C(gwCH5cR8(Z6H>GaV8(30_rCU3 KkXq;I}.S,ERK]g#T1r|`p,');
define('AUTH_SALT',        'KwbJo|}B-&WlXDIOK=~#yiP>dAli6aTVXso9P3Z-8?t9^|-]&H*0cO4M-+[ApADq');
define('SECURE_AUTH_SALT', 'qvXayLFRGa?@/6$}6q--HVI$Hv>?M#Jes .H}+3K#9dBs,+1hZI.-i&S{T]LlKUY');
define('LOGGED_IN_SALT',   'gZ~~<h*L[W]fJ=T+SZQ79ANg9Xl |db8DWiOd|ibE_RIh3 %k.LH,W%xZ}l@x7Od');
define('NONCE_SALT',       'I=AW1/Bn?Dd%O ~J sIc)+@6nYK*.%,7=Odw]+Q5TVHRIz_@QEGRctVu#-v6pzoC');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'md_';

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
