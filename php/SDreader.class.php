<?php
/**
* Mithilfe des Unix-Befehls „dd“ werden von einem 
*
* @copyright Copyright 2013 Marcel Heisinger
* @link https://github.com/marhei/CoreCMS
* @date 2013-03-24
* @license Apache License v2 (http://www.apache.org/licenses/LICENSE-2.0.txt)
* @author Marcel Heisinger
**/

class SDReader {
  const DEFAULT_SECTOR = 68;
	
	private $disk, $sector;
	
	/**
	* Nimmt den Namen der Disk an und den auszulesenden Sektor.
	*
	* @param string $disk - Name der Disk
	* @param int $sector - Sektor [default]
	**/
	public function __construct($disk, $sector = self::DEFAULT_SECTOR) {
		// Schreibt die Informationen die Klasse	
		$this->disk = $disk;
		$this->sector = $sector;
	}
	
	/**
	* Ließt den Sector aus und gibt das Ergebnis zurück.
	*
	* @return string
	**/
	public function readSector() {
		// dd ausführen
		$result = exec('dd if='.$this->disk.' count=1 seek='.$this->sector);
		
		// Sektor eins hochzählen
		$this->sector ++;
		
		// Ergebnis zurückgeben
		return $result;
	}
}
?>
