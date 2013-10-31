<?php
session_start();
$_SESSION['id']=42;
$_SESSION['qwe;qwe']=array(1=>"fdgsg",array('asd','bda'),'xzxczxc');
$_SESSION['qwe}qwe']=array(1=>"adxmc",2=>2);
$_SESSION['foo3']='zxc";asd';
$_SESSION['foo4']='bar;asd';
$_SESSION['foo";qwe']='bar;bar';
$_SESSION['obj']=new stdClass();
$_SESSION['ig']=42.5;
function getValues($str)
{
    $retValues = array();
    if(strpos($str,'i:')===0 || strpos($str,'d:')===0 )
    {
        $bufArr = explode(';', $str, 2);
        $retValues[0]=$bufArr[1];
        if($str[0]=='i')
            $retValues[1]=(int)explode(':',$bufArr[0])[1];
        else
            $retValues[1]=(float)explode(':',$bufArr[0])[1];
    }
    if(strpos($str,'s:')===0)
    {
        preg_match('/^s:[0-9]*:/i',$str,$matches);
        $sLen =  substr($str,2,strlen($matches[0]) - 3);
        $retValues[1] = $matches[0].substr($str, strlen($matches[0]), $sLen+2);
        $retValues[0] = substr($str,strlen($retValues[1])+1);
        $retValues[1] = unserialize($retValues[1]);
    }
    if(strpos($str,'a:')===0)
    {
        preg_match('/^a:[0-9]*:{.*;}/i',$str,$matches);
        $retValues[1] = unserialize($matches[0]);
        $retValues[0] = substr($str,strlen($matches[0]));
    }
    if(strpos($str,'O:')===0)
    {
        preg_match('/^O:[0-9]*:.*{.*}/i',$str,$matches);
        $retValues[1] = unserialize($matches[0]);
        $retValues[0] = substr($str,strlen($matches[0]));
    }
    return $retValues;
}


echo '<pre>';
echo 'SESSION<br>-------------<br>';
var_dump($_SESSION);


echo '<hr>FILE<br>-------------<br>';
$file=$_COOKIE['PHPSESSID'];

//Custom path to session file
$data = file_get_contents('C:\php\tmp\sess_'.$file.'.txt');
print_r($data);


$arr=preg_split('/\|/',$data);
$sessionValue=array();
$sessionKey=array();
$sessionKey[]=array_shift($arr);
$sessionValue[sizeof($arr)-1]=unserialize(array_pop($arr));
for($i=0;$i<count($arr);$i++)
{
    $bufResults = getValues($arr[$i]);
    $sessionKey[$i+1] = $bufResults[0];
    $sessionValue[$i] = $bufResults[1];
}


echo '<hr>KEYS<br>-------------<br>';
print_r($sessionKey);


echo '<hr>VALUES<br>-------------<br>';
print_r($sessionValue);


echo '<hr>RESULT<br>-------------<br>';
for($i = 0; $i<count($sessionKey); $i++)
{
    $resultArr[$sessionKey[$i]] = $sessionValue[$i];
}
var_dump($resultArr);
