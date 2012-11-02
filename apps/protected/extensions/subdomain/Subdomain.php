<?php
class Subdomain {
	private $subdomain;
	private $domain;
	private $user;
	private $pass;
	private $skin;
		
	public function __construct($domain)
	{
		$this->domain = $domain;
	}
	
	public function setCpanelInfo($user,$pass)
	{
		$this->user = $user;
		$this->pass = $pass;
	}
	public function setCpanelSkin($skin)
	{
		$this->skin = $skin;
	}
	public function setSubdomain($subdomain)
	{
		$this->subdomain = $subdomain;
	}
	public function setDomain($domain)
	{
		$this->domain = $domain;
	}
	
	public function debug()
	{
		echo $this->domain." ";
		echo $this->subdomain." ";
		echo $this->user." ";
		echo $this->pass." ";
		echo $this->skin." ";
	}
	
	public function execute()
	{
		$sock = fsockopen($this->domain,2082);
		if(!$sock) {
		  print('Socket error');
		  exit();
		}
		 
		$pass = base64_encode($this->user.":".$this->pass);
		$in = "GET /frontend/".$this->skin."/subdomain/doadddomain.html?rootdomain=".$this->domain."&domain=".$this->subdomain."\r\n";
		$in .= "HTTP/1.0\r\n";
		$in .= "Host:".$this->domain."\r\n";
		$in .= "Authorization: Basic ".$pass."\r\n";
		$in .= "\r\n";
		 
		// echo $in;
		 
		fputs($sock, $in);
		while (!feof($sock)) {
		  $result .= fgets ($sock,128);
		}
		fclose($sock);
		echo $result;
	}
}
