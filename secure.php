<?php

/*
	use: SecReq($str);			//id,pw,search
		or SecReq($str,500);	//form
		or SecReq($str,10000);	//board

	(ko) 해당 $str 대해 특수 문자를 제거합니다.
	(en) certain $str del special char
*/
function SecReq($str, $maxlentgh=200){
	if(isset($str[$maxlentgh+1]))
		$str=substr($str,0,$maxlentgh);
	return str_replace(["'",'"','?','<','>','$','%','(','{','['],['&#39;','&quot;','&#63;','&lt;','&gt;','&#36;','&#37;','&#40;','&#123;','&#91;'],$str);
}

/*
	use: DelSpecialChar(); or DelSpecialChar(20);

	(ko) 모든 $_REQUEST 대해 보안위험을 제거합니다.
		받아야 되는 정보가 많으면, $Maxrequest를 올려줘야하고 DelSpecialChar(20);
		굳이 안해도 되는정보에 특수문자가 섞일수 있지만 간편하게 모든문자에 적용됩니다.
	(en) All about $_REQUEST del special char
		If you have a lot of information to get, you need to raise $ Maxrequest and use like DelSpecialChar(20);
		Special characters can be mixed in the information you do not need, but they are easily applied to all responses.
*/
function DelSpecialChar($Maxrequest=10){
	$Count=0;
	foreach ($_REQUEST as $key => $value) {
		$Count++;
		$_REQUEST[$key]=SecReq($_REQUEST[$key]);
		if($Count>=$Maxrequest) return $Count;
	}
	return $Count;
}

/*
	** 
	sha3 is supports upper than PHP 7.1.0
	you can check version phpversion();
	and lower than 7.1 you can use sha2 or https://php.net/manual/en/function.hash-algos.php
	**

	use: HashPw($id,$pw);
		if( $dbpw == HashPw($id,$pw) ){ Your PW is right }

	(ko) Hash 적용에 id를 솔트 하고, 비밀번호 길이를 이용하여 디비 유출의 피해, 소스 유출시 피해를 줄입니다.
		이는 해당 알고리즘이 레인보우테이블이 생겨도 비밀번호 유추를 할수없게 할수 있습니다

	(en) Salt the id in the hashing and use the password length to reduce the damage of the database leak and the source leak.
		This makes it impossible for the algorithm to guess the password even if a rainbow table occurs
*/
function HashPw($id,$pw){//HashPw($id,$pw)
	switch (strlen($pw)){
		case 6:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 6'.$id);
			break;
		case 7:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 7'.$id);
			break;
		case 8:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 8'.$id);
			break;
		case 9:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 9'.$id);
			break;
		case 10:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 10'.$id);
			break;
		case 11:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 11'.$id);
			break;
		case 12:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 12'.$id);
			break;
		case 13:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 13'.$id);
			break;
		case 14:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 14'.$id);
			break;
		case 15:
			return hash('sha3-512','Salt'.$pw.'if Pw len is 15'.$id);
			break;
		default:
			return hash('sha3-512','Salt'.$pw.'else'.$id);
			break;
	}
}

?>