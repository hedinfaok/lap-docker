<?php
/*! pimpmylog - 1.7.7 - 82a1a7504873a6aed42a95a13b42ec8f8d12213f*/
/*
 * pimpmylog
 * http://pimpmylog.com
 *
 * Copyright (c) 2014 Potsky, contributors
 * Licensed under the GPLv3 license.
 */
?>
<?php if(realpath(__FILE__)===realpath($_SERVER["SCRIPT_FILENAME"])){header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');die();}?>
{
	"globals": {
		"_remove_me_to_set_AUTH_LOG_FILE_COUNT"         : 100,
		"_remove_me_to_set_AUTO_UPGRADE"                : false,
		"_remove_me_to_set_CHECK_UPGRADE"               : true,
		"_remove_me_to_set_EXPORT"                      : true,
		"_remove_me_to_set_FILE_SELECTOR"               : "bs",
		"_remove_me_to_set_FOOTER"                      : "&copy; <a href=\"http:\/\/www.potsky.com\" target=\"doc\">Potsky<\/a> 2007-' . YEAR . ' - <a href=\"http:\/\/pimpmylog.com\" target=\"doc\">Pimp my Log<\/a>",
		"_remove_me_to_set_FORGOTTEN_YOUR_PASSWORD_URL" : "http:\/\/support.pimpmylog.com\/kb\/misc\/forgotten-your-password",
		"_remove_me_to_set_GEOIP_URL"                   : "http:\/\/www.geoiptool.com\/en\/?IP=%p",
		"_remove_me_to_set_GOOGLE_ANALYTICS"            : "UA-XXXXX-X",
		"_remove_me_to_set_HELP_URL"                    : "http:\/\/pimpmylog.com",
		"_remove_me_to_set_LOCALE"                      : "gb_GB",
		"_remove_me_to_set_LOGS_MAX"                    : 50,
		"_remove_me_to_set_LOGS_REFRESH"                : 0,
		"_remove_me_to_set_MAX_SEARCH_LOG_TIME"         : 5,
		"_remove_me_to_set_NAV_TITLE"                   : "",
		"_remove_me_to_set_NOTIFICATION"                : true,
		"_remove_me_to_set_NOTIFICATION_TITLE"          : "New logs [%f]",
		"_remove_me_to_set_PIMPMYLOG_ISSUE_LINK"        : "https:\/\/github.com\/potsky\/PimpMyLog\/issues\/",
		"_remove_me_to_set_PIMPMYLOG_VERSION_URL"       : "http:\/\/demo.pimpmylog.com\/version.js",
		"_remove_me_to_set_PULL_TO_REFRESH"             : true,
		"_remove_me_to_set_SORT_LOG_FILES"              : "default",
		"_remove_me_to_set_TAG_DISPLAY_LOG_FILES_COUNT" : true,
		"_remove_me_to_set_TAG_NOT_TAGGED_FILES_ON_TOP" : true,
		"_remove_me_to_set_TAG_SORT_TAG"                : "default | display-asc | display-insensitive | display-desc | display-insensitive-desc",
		"_remove_me_to_set_TITLE"                       : "Pimp my Log",
		"_remove_me_to_set_TITLE_FILE"                  : "Pimp my Log [%f]",
		"_remove_me_to_set_UPGRADE_MANUALLY_URL"        : "http:\/\/pimpmylog.com\/getting-started\/#update",
		"_remove_me_to_set_USER_CONFIGURATION_DIR"      : "config.user.d",
		"_remove_me_to_set_USER_TIME_ZONE"              : "Europe\/Paris"
	},

	"badges": {
		"severity": {
			"debug"       : "success",
			"info"        : "success",
			"notice"      : "default",
			"Notice"      : "info",
			"warn"        : "warning",
			"error"       : "danger",
			"crit"        : "danger",
			"alert"       : "danger",
			"emerg"       : "danger",
			"Notice"      : "info",
			"fatal error" : "danger",
			"parse error" : "danger",
			"Warning"     : "warning"
		},
		"http": {
			"1" : "info",
			"2" : "success",
			"3" : "default",
			"4" : "warning",
			"5" : "danger"
		}
	},

	"files": {
		"apache1": {
			"display" : "Apache Error #1",
			"path"    : "\/var\/log\/apache2\/error.log",
			"refresh" : 5,
			"max"     : 10,
			"notify"  : true,
			"format"  : {
				"type"         : "HTTPD 2.4",
				"regex"        : "|^\\[(.*) (.*) (.*) (.*):(.*):(.*)\\.(.*) (.*)\\] \\[(.*):(.*)\\] \\[pid (.*)\\] .*\\[client (.*):(.*)\\] (.*)(, referer: (.*))*$|U",
				"export_title" : "Log",
				"match"        : {
					"Date"    : {
						"M" : 2,
						"d" : 3,
						"H" : 4,
						"i" : 5,
						"s" : 6,
						"Y" : 8
					},
					"IP"       : 12,
					"Log"      : 14,
					"Severity" : 10,
					"Referer"  : 16
				},
				"types": {
					"Date"     : "date:H:i:s",
					"IP"       : "ip:http",
					"Log"      : "preformatted",
					"Severity" : "badge:severity",
					"Referer"  : "link"
				},
				"exclude": {
					"Log": ["\/PHP Stack trace:\/", "\/PHP *[0-9]*\\. \/"]
				}
			}
		},
		"apache2": {
			"display" : "Apache Access #2",
			"path"    : "\/var\/log\/apache2\/access.log",
			"refresh" : 0,
			"max"     : 10,
			"notify"  : false,
			"format"  : {
				"type"         : "NCSA",
				"regex"        : "|^((\\S*) )*(\\S*) (\\S*) (\\S*) \\[(.*)\\] \"(\\S*) (.*) (\\S*)\" ([0-9]*) (.*)( \"(.*)\" \"(.*)\"( [0-9]*/([0-9]*))*)*$|U",
				"export_title" : "URL",
				"match"        : {
					"Date"    : 6,
					"IP"      : 3,
					"CMD"     : 7,
					"URL"     : 8,
					"Code"    : 10,
					"Size"    : 11,
					"Referer" : 13,
					"UA"      : 14,
					"User"    : 5,
					"\u03bcs" : 16
				},
				"types": {
					"Date"    : "date:H:i:s",
					"IP"      : "ip:geo",
					"URL"     : "txt",
					"Code"    : "badge:http",
					"Size"    : "numeral:0b",
					"Referer" : "link",
					"UA"      : "ua:{os.name} {os.version} | {browser.name} {browser.version}\/100",
					"\u03bcs" : "numeral:0,0"
				},
				"exclude": {
					"URL": ["\/favicon.ico\/", "\/\\.pml\\.php.*$\/"],
					"CMD": ["\/OPTIONS\/"]
				}
			}
		},
	"php3": {
		"display" : "PHP Error #3",
		"path"    : "\/var\/log\/apache2\/php.err",
		"refresh" : 5,
		"max"     : 10,
		"notify"  : true,
		"format"    : {
			"type"         : "PHP",
			"regex"        : "@^\\[(.*)-(.*)-(.*) (.*):(.*):(.*)( (.*))*\\] ((PHP (.*):  (.*) in (.*) on line (.*))|(.*))$@U",
			"export_title" : "Error",
			"match"        : {
				"Date"     : [ 2 , " " , 1 , " " , 4 , ":" , 5 , ":" , 6 , " " , 3 ],
				"Severity" : 11,
				"Error"    : [ 12 , 15 ],
				"File"     : 13,
				"Line"     : 14
			},
			"types"    : {
				"Date"     : "date:H:i:s",
				"Severity" : "badge:severity",
				"File"     : "pre:\/-69",
				"Line"     : "numeral",
				"Error"    : "pre"
			},
			"exclude": {
				"Log": ["\\/PHP Stack trace:\\/", "\\/PHP *[0-9]*\\. \\/"]
			}
		}
	}
	}
}
