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

$serverName = $_SERVER["SERVER_NAME"];
if ($serverName != "zkillboard.com") {
	$split = explode(".", $serverName);
	$board = $split[0];
	$numDays = 7;

	$p = array("factionID" => 500001);

	$topPoints = array();
	$topPods = array();

	$top = array();
	$top[] = Info::doMakeCommon("Top Characters", "characterID", Stats::getTopPilots($p));
	$top[] = Info::doMakeCommon("Top Corporations", "corporationID", Stats::getTopCorps($p));
	$top[] = Info::doMakeCommon("Top Alliances", "allianceID", Stats::getTopAllis($p));
	$top[] = Info::doMakeCommon("Top Ships", "shipTypeID", Stats::getTopShips($p));
	$top[] = Info::doMakeCommon("Top Systems", "solarSystemID", Stats::getTopSystems($p));

	$p["pastSeconds"] = ($numDays*86400);
	$p["limit"] = 5;
	$topIsk = Stats::getTopIsk($p);
	unset($p["pastSeconds"]);

	// get latest kills
	$killsLimit = 50;
	$p["limit"] = $killsLimit;
	$kills = Kills::getKills($p);
} else {
	$topPoints = array();
	$topIsk = json_decode(Storage::retrieve("TopIsk"), true);
	$topPods = json_decode(Storage::retrieve("TopPods"), true);
	$topPointList = json_decode(Storage::retrieve("TopPoints"), true);

	if(is_array($topPointList)) $topPoints = Kills::getKillsDetails($topPointList);

	$top = array();
	$top[] = json_decode(Storage::retrieve("TopChars"), true);
	$top[] = json_decode(Storage::retrieve("TopCorps"), true);
	$top[] = json_decode(Storage::retrieve("TopAllis"), true);
	$top[] = json_decode(Storage::retrieve("TopShips"), true);
	$top[] = json_decode(Storage::retrieve("TopSystems"), true);

	// get latest kills
	$killsLimit = 50;
	$kills = Kills::getKills(array("limit" => $killsLimit));

}
$app->render("index.html", array("topPods" => $topPods, "topIsk" => $topIsk, "topPoints" => $topPoints, "topKillers" => $top, "kills" => $kills, "page" => 1, "pageType" => "index", "pager" => true));
