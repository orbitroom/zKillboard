<?php
/* zKillboard
 * Copyright (C) 2012-2013 EVE-KILL Team and EVSCO.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

date_default_timezone_set("UTC");

// Database parameters
$dbUser = "%dbuser%";
$dbPassword = "%dbpassword%";
$dbName = "%dbname%";
$dbHost = "%dbhost%";
$dbSocket = null;
$dbExplain = false;
$enableAnalyze = false;

// IPs available
$ipsAvailable = array(); // Set it to the external IP(s) you have available

// External Servers
$apiServer = "%apiserver%";
$imageServer = "%imageserver%";

// Base
$baseFile = __FILE__;
$baseDir = dirname($baseFile) . "/";
$baseUrl = "/";
$baseAddr = "%baseaddr%";
$fullAddr = "http://" . $baseAddr;
chdir($baseDir);

// Debug
$debug = true;

// Logfile
$logfile = "%logfile%";
$ircLogFile = "";
$ircAdminLogFile = "";

// Memcache
$memcacheServer = "%memcache%";
$memcachePort = "%memcacheport%";

// Redis
$redisServer = "%redis%";
$redisPort = "%redisport%";

// Pheal
$phealCacheLocation = "%phealcachelocation%";

// Cookiiieeeee
$cookie_name = "zKB";
$cookie_ssl = false;
$cookie_time = (3600 * 24 * 30); // 30 days
$cookie_secret = "%cookiesecret%";

// API
$apiRequestsPrDay = 17280; // Once every 5 seconds
$apiWhiteList = array();

// Stomp
$stompServer = "tcp://stomp.zkillboard.com:61613";
$stompUser = "guest";
$stompPassword = "guest";

// Websocket server
$wsServer = "http://eve-kill.net";
$pubLocation = "";
$subLocation = "";

// Disqus
$disqus = false;
$disqusShortName = "";
$disqusSecretKey = "";
$disqusPublicKey = "";

// Email stuff
$emailsmtp = "";
$emailusername = "";
$emailpassword = "";
$sentfromemail = "";
$sentfromdomain = "";

// Twitter
$twitterName = "";
$consumerKey = "";
$consumerSecret = "";
$accessToken = "";
$accessTokenSecret = "";

// Ads / Analytics
$showAds = false;
$adFreeMonthCost = 0;
$walletCharacterID = 0;
$showAnalytics = false;
$topCaPub = ""; // ca-pub-<number>
$topAdSlot = ""; // google_ad_slot number
$bottomCaPub = ""; // ca-pub-<number>
$bottomAdSlot = ""; // google_ad_slot number
$analyticsID = ""; // UA-<number>
$analyticsName = ""; // name

// Facebook like button
$showFacebook = false;
$facebookAppID = null;

// Slim config
$config = array(
	"mode" => "production",
	"debug" => ($debug ? true : false),
	"log.enabled" => false,
	"cookies.secret_key" => $cookie_secret
	);

$useSemaphores = false;
$semaphoreModulus = 10;

# Save killmails to file system if enabled.
$fsKillmails = false;