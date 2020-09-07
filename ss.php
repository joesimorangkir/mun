<?php
/*
S-Earn Register Auto Reff
Made with <3 by Nicsx
fb.me/hellofromsky
Created at Sep 7, 2020
Love ya'll!
*/
class core{
	public function randStr($length = 6){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function randNum($length = 6){
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function regist($post){
		$ch = curl_init('https://api.x898xe.fun/api/login/register');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		   'user-agent: Mozilla/5.0 (Linux; Android 8.1.0; C12 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Mobile Safari/537.36',
		   'origin: https://home.x898xe.fun',
		   'referer: https://home.x898xe.fun/'
		));
		$nako = curl_exec($ch);
		curl_close($ch);
		$debug = json_decode($nako, true);
		$status = $debug['msg'];
		$uname = $debug['data']['username'];
		$agent = $debug['data']['agent_uid'];
		echo "Status: ".$status."\nUsername: ".$uname."\nReff Agent ID: ".$agent."\n";
	}
}
$api = new core;
echo "Input your Invite code: ";
$agentid = trim(fgets(STDIN));
$data = "username=NakoB".$api->randStr()."&pwd=Root1337&tel=85156".$api->randNum()."&code=7".$api->randNum()."&agentid=".$agentid;
$api->regist($data);
