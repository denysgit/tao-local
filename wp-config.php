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
define('DB_NAME', 'tao-local');
define("OTGS_DISABLE_AUTO_UPDATES", true);
/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'td!E +MizfGB/<3YQ-ho&AWff+<Nm1>gto<Y(GE.-S#A~iN5&/GH*m!YMmC6>qS?');
define('SECURE_AUTH_KEY',  '#*aMhCIB@Bw~FV0xfWZV36JCw=vr|Gm3|.7+FR4*S2FUG{kD*v3WuXN#|!Kk=ZFc');
define('LOGGED_IN_KEY',    '=rmsYZ0}oRW_v>J6?4H+V)75s-Vg]-3LgZ>R+HA*X=b88J5)mWUvlP9{wuLs8bL#');
define('NONCE_KEY',        'e>y.iKe8Y@V1h^;.7lP^r7kBd%m{hKn*3K<daZ!:b$WX1zm%<.5SA1@Q0B15SDf/');
define('AUTH_SALT',        '$vRTc2e=tQVxc`(F~mzA(Q6}ZRR$5!Qs|9S~9(JZ/2$vRM1D/~TN-DEt];OdZAXF');
define('SECURE_AUTH_SALT', '1XjdrUohg$p2/C#]&QSQTxB2a&;nlufJUO4/VU~=.9wFq$%Tm& QP_a@k`^(gbNL');
define('LOGGED_IN_SALT',   '&|zUFJfhq-]-=:X0lBQ&zb{FW|NYh!|Ltzst5fmEcZ|~=<=>a.a57Pi0E-LZhKu%');
define('NONCE_SALT',       'nU|]UI%)2`&+(&h_h/,G^g-T8Ii$U|fh?[3|ID|#MP~c-KBoOXjs+>L+qX$^&ZFp');

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
