<?php

class connexion

{

	private $host = null;

	private $login = null;

	private $pass = null;

	private $bd_name = null;

	public $dbh = Null;

	public function connect($host, $login, $pass, $db_name){
		$this->db_name = $db_name;
		try {
			$this->dbh = new PDO('mysql:host='.$host.';dbname='.$db_name, $login, $pass);

		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
		}

	public function fetch ($query) {
		$sth = $this->dbh->prepare($query);
		$sth->execute();
		$result = $sth->fetchAll ();

		return $result;
	}
	public function sql ($sql) {
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
	}
}
