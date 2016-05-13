<?php
namespace Manager;

class MiniURLManager extends \W\Manager\Manager {


	public function findByCode($code)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE code = :code LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":code", $code);
		$sth->execute();
		return $sth->fetch();
	}

	public function generateCode() {
		do {
			$code = \W\Security\StringUtils::randomString(6);	
		} while ($this->findByCode($code));
		return $code;
	}

	public function findByUrl($url)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE url = :url LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":url", $url);
		$sth->execute();
		return $sth->fetch();
	}

	public function findAllMyMurls($ip)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE ip = :ip ORDER BY date_creation DESC";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":ip", $ip);
		$sth->execute();
		return $sth->fetchAll();
	}

}