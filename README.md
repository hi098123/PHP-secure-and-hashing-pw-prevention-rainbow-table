# PHP-secure

## how can use?
	include './secure.php';


## easy filter xss,sql-injection : DelSpecialChar();
	include './secure.php';
	DelSpecialChar();


### function SecReq($str, $maxlentgh=200)
	use: SecReq($str);		//use id,pw,search
		or SecReq($str,500);	//use form
		or SecReq($str,10000);	//use board
		
	(ko) 해당 $str 대해 특수 문자를 제거합니다.
	
	(en) certain $str del special char

### function DelSpecialChar($Maxrequest=10)
	use: DelSpecialChar(); or DelSpecialChar(20);
	
	(ko) 모든 $_REQUEST 대해 보안위험을 제거합니다.
		받아야 되는 정보가 많으면, $Maxrequest를 올려줘야하고 DelSpecialChar(20);
		굳이 안해도 되는정보에 특수문자가 섞일수 있지만 간편하게 모든문자에 적용됩니다.
		
	(en) All about $_REQUEST del special char
		If you have a lot of information to get, you need to raise $ Maxrequest and use like DelSpecialChar(20);
		Special characters can be mixed in the information you do not need, but they are easily applied to all responses.


### function HashPw($id,$pw)
sha3 is supports upper than PHP 7.1.0. you can check version phpversion();
and lower than 7.1 you can use sha2 or [https://php.net/manual/en/function.hash-algos.php](https://php.net/manual/en/function.hash-algos.php)

	use: HashPw($id,$pw);
		if( $dbpw == HashPw($id,$pw) ){ Your PW is right }
		
	(ko) Hash 적용에 id를 솔트 하고, 비밀번호 길이를 이용하여 디비 유출의 피해, 소스 유출시 피해를 줄입니다.
		이는 해당 알고리즘이 레인보우테이블이 생겨도 비밀번호 유추를 할수없게 할수 있습니다
		이는 비밀번호의 길이에따라, 아이디에 따라 솔팅이 달라지므로 보편적인 레인보우 테이블로 유추할 수 없고,
		해커는 "한개의 아이디"를 뚫기 위해 각각의 비밀번호 길이에 따른 레인보우 테이블을 생성해야 합니다.
		
		
	(en) Salt the id in the hashing and use the password length to reduce the damage of the database leak and the source leak.
		This makes it impossible for the algorithm to guess the password even if a rainbow table occurs
		
		if you use different salting, hacker can't know your pw length then they can't guess(rainbow table)
		and salting id can prevention rainbow table i think
		The hacker must make rainbow table(each length of the password) to penetrate only one ID
	
like this code
```php
switch (strlen($pw)){
	case 6:
		return hash('sha3-512','Salt'.$pw.'if Pw len is 6'.$id);
	case 7:
		return hash('sha3-512','Salt'.$pw.'if Pw len is 7'.$id);
	default:
		return hash('sha3-512','Salt'.$pw.'else'.$id);
}
```

### index.php
![index](https://raw.githubusercontent.com/hi098123/PHP-secure/master/index.png)


### normal-Acunetix
![normal-Acunetix](https://raw.githubusercontent.com/hi098123/PHP-secure/master/normal.png)

### secure-Acunetix
![secure-Acunetix](https://raw.githubusercontent.com/hi098123/PHP-secure/master/secure.png)
