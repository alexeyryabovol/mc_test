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
define('DB_NAME', 'mc_test');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '@,&bj0|<L<`JYpT903sLM-)0fWOy#3kXXU]k|LRkKAYWl^(L3ezDw8)ymHslJ__4');
define('SECURE_AUTH_KEY',  'Pecw4cNIM]9Ixw6EG{XygW|KqVydS1,@v)~cf,Q>A(9O-Evys0s~urm0GE+>1sv ');
define('LOGGED_IN_KEY',    't@$clr4mSo3je^i[1-!!eV{2;x[x6G3x&Mo%vous<N5Fyc -9Wh~Qr6=~zj|lwjn');
define('NONCE_KEY',        'zp9Iw,t^D}0L7h836*P9ve!kYs|~tfXj7dt[8cU@ua17O7BV z%|7It+Vsfpo7LM');
define('AUTH_SALT',        'jJ`yjB6p*GV`I-EGxuF/(B+k3!;du*F lSX-i|9eI.V2Q>R5bJjhltRqc8hTX%Vv');
define('SECURE_AUTH_SALT', '>Js>9l;!W5H+MLf8fn]*l>uzU(M l6(,Ae8xh0?Xs}V`*Z1o5C[-Kh]Qc%Rd~[y(');
define('LOGGED_IN_SALT',   ']#T$OsHWzg,P/d@XOsL{*+X!xx/D1/]gCHzq>N1.Y6UFKSO;M,%$34>xuE>D~UL-');
define('NONCE_SALT',       '#XQ[z[-UcN${DGQSsxQ[P^oC/NNx}RTkI0Y+ac5tVRap(TY]^u*{&QFJlc9laJ*S');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
