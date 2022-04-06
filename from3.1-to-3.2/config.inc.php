; <?php exit(); // DO NOT DELETE ?>
; DO NOT DELETE THE ABOVE LINE!!!
; Doing so will expose this configuration file through your web site!
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
;
; config.TEMPLATE.inc.php
;
; Copyright (c) 2003-2009 John Willinsky
; Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
;
; OJS Configuration settings.
; Rename config.TEMPLATE.inc.php to config.inc.php to use.
;
; $Id: config.TEMPLATE.inc.php,v 1.55.2.2 2009/04/08 19:42:46 asmecher Exp $
;
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;


;;;;;;;;;;;;;;;;;;;;
; General Settings ;
;;;;;;;;;;;;;;;;;;;;

[general]

; Set this to On once the system has been installed
; (This is generally done automatically by the installer)
installed = On

; The canonical URL to the OJS installation (excluding the trailing slash)
;base_url = "http://localhost"

base_url = "http://localhost"
; Path to the registry directory (containing various settings files)
; Although the files in this directory generally do not contain any
; sensitive information, the directory can be moved to a location that
; is not web-accessible if desired
registry_dir = registry

; Session cookie name
session_cookie_name = OJSSID

; Number of days to save login cookie for if user selects to remember
; (set to 0 to force expiration at end of current session)
session_lifetime = 30

; Enable support for running scheduled tasks
; Set this to On if you have set up the scheduled tasks script to
; execute periodically
scheduled_tasks = On

; Short and long date formats
date_format_trunc = "%m-%d"
date_format_short = "%Y-%m-%d"
date_format_long = "%B %e, %Y"
datetime_format_short = "%Y-%m-%d %I:%M %p"
datetime_format_long = "%B %e, %Y - %I:%M %p"

; Use URL parameters instead of CGI PATH_INFO. This is useful for
; broken server setups that don't support the PATH_INFO environment
; variable.
disable_path_info = Off

; Base URL override settings: Entries like the following examples can
; be used to override the base URLs used by OJS. If you want to use a
; proxy to rewrite URLs to OJS, configure your proxy's URL here.
; Syntax: base_url[journal_path] = http://www.myUrl.com
; To override URLs that aren't part of a particular journal, use a
; journal_path of "index".
; Examples:
; base_url[index] = http://www.myUrl.com
; base_url[myJournal] = http://www.myUrl.com/myJournal
; base_url[myOtherJournal] = http://myOtherJournal.myUrl.com


 restful_urls = On

  base_url[index] = http://localhost/
  base_url[PLR] = http://localhost/PLR
  base_url[domus]= http://localhost/domus
  base_url[CADM] = http://localhost/CADM
  base_url[raab] = http://localhost/raab
  base_url[RRII-IRI] = http://localhost/RRII-IRI
  base_url[RevistaAnalesJursoc] = http://localhost/RevistaAnalesJursoc
  base_url[ES] = http://localhost/ES
  base_url[taller] = http://localhost/taller
  base_url[InvJov] = http://localhost/InvJov
  base_url[dcs] = http://localhost/dcs
  base_url[Economica] = http://localhost/Economica
  base_url[Morfol] = http://localhost/Morfol
  base_url[Habitat] = http://localhost/Habitat
  base_url[RPSEUNLP] = http://localhost/RPSEUNLP
  base_url[Estrategias] = http://localhost/Estrategias
  base_url[Trayectorias] = http://localhost/Trayectorias
  base_url[econo] = http://localhost/econo
  base_url[RITeV] = http://localhost/RITeV
  base_url[DyH] = http://localhost/DyH
  base_url[EPSA] = http://localhost/EPSA
  base_url[Epistemus] = http://localhost/Epistemus
  base_url[ReDeA] = http://localhost/ReDeA
  base_url[aportes] = http://localhost/aportes
  base_url[integrar] = http://localhost/integrar
  base_url[analecta] = http://localhost/analecta
  base_url[LosTrabajosYLosDias] = http://localhost/LosTrabajosYLosDias
  base_url[CienciasAplicadas] = http://localhost/CienciasAplicadas
  base_url[IDTS] = http://localhost/IDTS
  base_url[CISaV] = http://localhost/CISaV
  base_url[CTyP] = http://localhost/CTyP
  base_url[HilosDocumentales] = http://localhost/HilosDocumentales
  base_url[revagro] = http://localhost/revagro
  base_url[puertasabiertas] = http://localhost/puertasabiertas
  base_url[anzuelo] = http://localhost/anzuelo
  base_url[OrientacionYSociedad] = http://localhost/OrientacionYSociedad
  base_url[hipertextos] = http://localhost/hipertextos
  base_url[AnuarioPsicologia] = http://localhost/AnuarioPsicologia
  base_url[palavras] = http://localhost/palavras
  base_url[escenarios] = http://localhost/escenarios
  base_url[intercambios] = http://localhost/intercambios
  base_url[proyecciones] = http://localhost/proyecciones
  base_url[ReDIP] = http://localhost/ReDIP
  base_url[bacuatica] = http://localhost/bacuatica
  base_url[revpsi] = http://localhost/revpsi
  base_url[redic] = http://localhost/Redic
  base_url[uad] = http://localhost/UAD
  base_url[reie] = http://localhost/REIE
  base_url[ECOS] = http://localhost/ECOS
  base_url[ayana] = http://localhost/ayana
  base_url[auditar] = http://localhost/auditar
  base_url[relaciones] = http://localhost/relaciones
  base_url[geoacta] = http://localhost/geoacta
  base_url[publicaahd] = http://localhost/publicaahd

citation_checking_max_proceses = 3


;;;;;;;;;;;;;;;;;;;;;
; Database Settings ;
;;;;;;;;;;;;;;;;;;;;;

[database]

driver = mysqli
host =  mysql
username = root
password = root
name = ojsunlp

; Enable persistent connections (recommended)
persistent = On

; Enable database debug output (very verbose!)
debug = Off
;;;;;;;;;;;;;;;;;;
; Cache Settings ;
;;;;;;;;;;;;;;;;;;

[cache]

; The type of data caching to use. Options are:
; - memcache: Use the memcache server configured below
; - file: Use file-based caching; configured below
; - none: Use no caching. This may be extremely slow.
; This setting affects locale data, journal settings, and plugin settings.
; cache estaba en file
cache = file

; Enable memcache support
; memcache_hostname = revistas.unlp.edu.ar
; memcache_port = 11211

; For site visitors who are not logged in, many pages are often entirely
; static (e.g. About, the home page, etc). If the option below is enabled,
; these pages will be cached in local flat files for the number of hours
; specified in the web_cache_hours option. This will cut down on server
; overhead for many requests, but should be used with caution because:
; 1) Things like journal metadata changes will not be reflected in cached
;    data until the cache expires or is cleared, and
; 2) This caching WILL NOT RESPECT DOMAIN-BASED SUBSCRIPTIONS.
; However, for situations like hosting high-volume open access journals, it's
; an easy way of decreasing server load.

web_cache = Off
web_cache_hours = 1


;;;;;;;;;;;;;;;;;;;;;;;;;
; Localization Settings ;
;;;;;;;;;;;;;;;;;;;;;;;;;

[i18n]

; Default locale
locale = es_ES

; Client output/input character set
client_charset = utf-8

; Database connection character set
; Must be set to "Off" if not supported by the database server
; If enabled, must be the same character set as "client_charset"
; (although the actual name may differ slightly depending on the server)
connection_charset = utf8

; Database storage character set
; Must be set to "Off" if not supported by the database server
database_charset = utf8

; Enable character normalization to utf-8 (recommended)
; If disabled, strings will be passed through in their native encoding
charset_normalization = On

;;;;;;;;;;;;;;;;;
; File Settings ;
;;;;;;;;;;;;;;;;;

[files]

; Complete path to directory to store uploaded files
; (This directory should not be directly web-accessible)
; Windows users should use forward slashes
files_dir = /var/ojs-data/uploads

; Path to the directory to store public uploaded files
; (This directory should be web-accessible and the specified path
; should be relative to the base OJS directory)
; Windows users should use forward slashes
public_files_dir = public

; Permissions mask for created files and directories
umask = 0022


;;;;;;;;;;;;;;;;;;;;;;;;;;;;
; Fileinfo (MIME) Settings ;
;;;;;;;;;;;;;;;;;;;;;;;;;;;;

[finfo]
mime_database_path = /etc/magic.mime


; Display a message on the site admin and journal manager user home pages if there is an upgrade available
show_upgrade_warning = On

;;;;;;;;;;;;;;;;;;;;;
; Security Settings ;
;;;;;;;;;;;;;;;;;;;;;

[security]

; Force SSL connections site-wide
force_ssl = Off

; Force SSL connections for login only
force_login_ssl = Off

; This check will invalidate a session if the user's IP address changes.
; Enabling this option provides some amount of additional security, but may
; cause problems for users behind a proxy farm (e.g., AOL).
session_check_ip = On

; The encryption (hashing) algorithm to use for encrypting user passwords
; Valid values are: md5, sha1
; Note that sha1 requires PHP >= 4.3.0
encryption = sha1

; Allowed HTML tags for fields that permit restricted HTML.
; allowed_html = "<a> <em> <strong> <cite> <code> <ul> <ol> <li> <dl> <dt> <dd> <b> <i> <u> <img> <sup> <sub> <br> <p>"
allowed_html = "a[href|target|title],em,strong,cite,code,ul,ol,li[class],dl,dt,dd,b,i,u,img[src|alt],sup,sub,br,p"
; allowed_html = " <a href|target> <em> <strong> <cite> <code> <ul> <ol> <li> <dl> <dt> <dd> <b> <i> <u> <img src|alt> <sup> <sub> <br> <p>"

; Prevent VIM from attempting to highlight the rest of the config file
; with unclosed tags:
; </p></sub></sup></u></i></b></dd></dt></dl></li></ol></ul></code></cite></strong></em></a>


;Is implicit authentication enabled or not

;implicit_auth = On

;Implicit Auth Header Variables

;implicit_auth_header_first_name = HTTP_TDL_GIVENNAME
;implicit_auth_header_last_name = HTTP_TDL_SN
;implicit_auth_header_email = HTTP_TDL_MAIL
;implicit_auth_header_phone = HTTP_TDL_TELEPHONENUMBER
;implicit_auth_header_initials = HTTP_TDL_METADATA_INITIALS
;implicit_auth_header_mailing_address = HTTP_TDL_METADATA_TDLHOMEPOSTALADDRESS
;implicit_auth_header_uin = HTTP_TDL_TDLUID 

; A space delimited list of uins to make admin
;implicit_auth_admin_list = "100000040@tdl.org 85B7FA892DAA90F7@utexas.edu 100000012@tdl.org"

; URL of the implicit auth 'Way Finder' page. See pages/login/LoginHandler.inc.php for usage.

;implicit_auth_wayf_url = "/Shibboleth.sso/wayf"



;;;;;;;;;;;;;;;;;;
; Email Settings ;
;;;;;;;;;;;;;;;;;;

[email]

; Use SMTP for sending mail instead of mail()
 smtp = Off

; SMTP server settings
 smtp_server = ssl://smtp.gmail.com
; mail.prebi.unlp.edu.ar
 smtp_port = 465

; Enable SMTP authentication
; Supported mechanisms: PLAIN, LOGIN, CRAM-MD5, and DIGEST-MD5
 smtp_auth = PLAIN
 smtp_username = info@revistas.unlp.edu.ar
 smtp_password = @untabbedPlainText@
;journals4all

; Allow envelope sender to be specified
; (may not be possible with some server configurations)
 allow_envelope_sender = On

; Default envelope sender to use if none is specified elsewhere
default_envelope_sender =  info@revistas.unlp.edu.ar

; Force the default envelope sender (if present)
; This is useful if setting up a site-wide noreply address
; The reply-to field will be set with the reply-to or from address.
; force_default_envelope_sender = On

; Enable attachments in the various "Send Email" pages.
; (Disabling here will not disable attachments on features that
; require them, e.g. attachment-based reviews)
enable_attachments = On

; Amount of time required between attempts to send non-editorial emails
; in seconds. This can be used to help prevent email relaying via OJS.
time_between_emails = 3600

; Maximum number of recipients that can be included in a single email
; (either as To:, Cc:, or Bcc: addresses) for a non-priveleged user
max_recipients = 10

; If enabled, email addresses must be validated before login is possible.
require_validation = On

; Maximum number of days before an unvalidated account expires and is deleted
validation_timeout = 14

; Display an error message when an email is not successfully sent
display_errors = Off


;;;;;;;;;;;;;;;;;;;
; Search Settings ;
;;;;;;;;;;;;;;;;;;;

[search]

; Minimum indexed word length
min_word_length = 3

; The maximum number of search results fetched per keyword. These results
; are fetched and merged to provide results for searches with several keywords.
results_per_keyword = 500

; The number of hours for which keyword search results are cached.
result_cache_hours = 1

; Paths to helper programs for indexing non-text files.
; Programs are assumed to output the converted text to stdout, and "%s" is
; replaced by the file argument.
; Note that using full paths to the binaries is recommended.
; Uncomment applicable lines to enable (at most one per file type).
; Additional "index[MIME_TYPE]" lines can be added for any mime type to be
; indexed.

; PDF
index[application/pdf] = "/usr/bin/pstotext %s"
index[application/pdf] = "/usr/bin/pdftotext %s -"

; PostScript
index[application/postscript] = "/usr/bin/pstotext %s"
; index[application/postscript] = "/usr/bin/ps2ascii %s"

; Microsoft Word
; index[application/msword] = "/usr/bin/antiword %s"
; index[application/msword] = "/usr/bin/catdoc %s"


;;;;;;;;;;;;;;;;
; OAI Settings ;
;;;;;;;;;;;;;;;;

[oai]

; Enable OAI front-end to the site
oai = On

; OAI Repository identifier
repository_id = revistas.unlp.edu.ar

oai_max_records = 100

;;;;;;;;;;;;;;;;;;;;;;
; Interface Settings ;
;;;;;;;;;;;;;;;;;;;;;;

[interface]

; Number of items to display per page; overridable on a per-journal basis
items_per_page = 25

; Number of page links to display; overridable on a per-journal basis
page_links = 10


;;;;;;;;;;;;;;;;;;;;
; Captcha Settings ;
;;;;;;;;;;;;;;;;;;;;

[captcha]

; Whether or not to enable Captcha features
recaptcha = On

; Public key for reCaptcha (see http://www.google.com/recaptcha)
; recaptcha_public_key = 6LeccjUUAAAAACgzyYVqTu2GlHoaB0qGhFQ5KvWk
  recaptcha_public_key = 6LfngUoUAAAAAG39vcoK6LzuZS8I2qSUauP-Dvd8
; Private key for reCaptcha (see http://www.google.com/recaptcha)
; recaptcha_private_key = 6LeccjUUAAAAAM9nCIgjs4uMaOStlHhyzVQBcs7v
  recaptcha_private_key = 6LfngUoUAAAAAAOicwOo8OkaNEMdLh16XS5i-Exj
; Whether or not to use Captcha on user registration
captcha_on_register = On

; Whether or not to use Captcha on user comments
captcha_on_comments = On

; Font location for font to use in Captcha images
;font_location = /usr/share/fonts/truetype/freefont/FreeSerif.ttf
font_location = /usr/share/fonts/truetype/dejavu/DejaVuSerif.ttf

[cli]

perl = /usr/bin/perl

tar = /bin/tar


;;;;;;;;;;;;;;;;;;
; Proxy Settings ;
;;;;;;;;;;;;;;;;;;

[proxy]

; Note that allow_url_fopen must be set to Off before these proxy settings
; will take effect.

; The HTTP proxy configuration to use
; http_host = revistas.unlp.edu.ar
; http_port = 80
; proxy_username = username
; proxy_password = password


;;;;;;;;;;;;;;;;;;
; Debug Settings ;
;;;;;;;;;;;;;;;;;;

[debug]

; Display execution stats in the footer
show_stats =  Off

; Display a stack trace when a fatal error occurs.
; Note that this may expose private information and should be disabled
; for any production system.
show_stacktrace = Off

;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
; iThenticate Plugin Settings ;
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

[ithenticate]

api_key_secret ="37NhHYyi9VPv6rX4WLKoZCmkeilUbT5BgIi1hOAQ24LMilS"

[ithenticate]

; Enable iThenticate to submit manuscripts after submit step 4
ithenticate = On

; The username to access the API (usually an email address)
username = "gonzalo@prebi.unlp.edu.ar"

; The password to access the API
password = "pl4g1um_ch3ck3R"

