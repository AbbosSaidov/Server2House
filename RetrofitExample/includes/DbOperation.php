<?php
class DbOperation
{//kjhkjhkjl;
    private $con;
    function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();
    }
    function GetKimboshlashi($koo){
        $stmt2=$this->con->prepare("SELECT Kimboshlashi FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("i",$koo);
        $stmt2->execute();
        $stmt2->bind_result($koo);
        $stmt2->fetch();
        return $koo;
    }
    function GetHowmanyPlayers($koo){
        $stmt2=$this->con->prepare("SELECT HowManyPlayers FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("i",$koo);
        $stmt2->execute();
        $stmt2->bind_result($koo);
        $stmt2->fetch();
        return $koo;
    }
    function SetTikilganPullar($nmaligi,$value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE tikilganpullar SET $nmaligi = ? WHERE GroupNumber = ?");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function GetTikilganPullar($GroupNumber ,$TikilganPullar){
        $stmt2=$this->con->prepare("SELECT $TikilganPullar FROM tikilganpullar WHERE GroupNumber=?");
        $stmt2->bind_param("s",$GroupNumber);
        $stmt2->execute();
        $stmt2->bind_result($GroupNumber);
        $stmt2->fetch();
        return $GroupNumber;
    }
    function SetJavoblade($nmaligi,$value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE javoblade SET $nmaligi = ? WHERE groupnumber = ?");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function GetJavoblade($GroupNumber ,$Javoblade){
        $stmt2=$this->con->prepare("SELECT $Javoblade FROM javoblade WHERE GroupNumber=?");
        $stmt2->bind_param("s",$GroupNumber);
        $stmt2->execute();
        $stmt2->bind_result($GroupNumber);
        $stmt2->fetch();
        return $GroupNumber;
    }
    function SetHowManyPlayers($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET HowManyPlayers = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function SetUyinchilar($value,$GroupNumber){
        $sql="UPDATE groups SET uyinchilar=? WHERE NumberOfGroup=? ";
        $stmt =$this->con->prepare($sql);
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function Getuyinchilar($grouppade){
        $stmt2=$this->con->prepare("SELECT uyinchilar FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("i",$grouppade);
        $stmt2->execute();
        $stmt2->bind_result($grouppade);
        $stmt2->fetch();
        return $grouppade;
    }
    function SetHuy($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET huy = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("ii",$value,$GroupNumber);
        $stmt->execute();
    }
    function GetHuy($GroupNUmber){
        $stmt2=$this->con->prepare("SELECT huy FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("i",$GroupNUmber);
        $stmt2->execute();
        $stmt2->bind_result($GroupNUmber);
        $stmt2->fetch();
        return $GroupNUmber;
    }
    function Sethu3($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET hu3 = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("ii",$value,$GroupNumber);
        $stmt->execute();
    }
    function Gethu3($GroupNUmber){
        $stmt2=$this->con->prepare("SELECT hu3 FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("i",$GroupNUmber);
        $stmt2->execute();
        $stmt2->bind_result($GroupNUmber);
        $stmt2->fetch();
        return $GroupNUmber;
    }
    function SetYurishKimmiki($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET YurishKimmiki = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function SetError($value,$GroupNumber){
        $stmt =$this->con->prepare("INSERT INTO error1 (message,groupnumber ) VALUES (?,?)");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function SetKartatarqatildi($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET Kartatarqatildi = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function SetKimboshlashi($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET Kimboshlashi = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("ii",$value,$GroupNumber);
        $stmt->execute();
    }
    function SetXAmmakartalar($value,$GroupNumber){
        $stmt =$this->con->prepare("UPDATE groups SET hammakartalar = ? WHERE NumberOfGroup = ?");
        $stmt->bind_param("si",$value,$GroupNumber);
        $stmt->execute();
    }
    function GetXAmmakartalar($ki1){
        $stmt2=$this->con->prepare("SELECT hammakartalar FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("s",$ki1);
        $stmt2->execute();
        $stmt2->bind_result($ki1);
        $stmt2->fetch();
        return $ki1;
    }
    function GetKartatarqatildi($ki1){
        $stmt2=$this->con->prepare("SELECT Kartatarqatildi FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("s",$ki1);
        $stmt2->execute();
        $stmt2->bind_result($ki1);
        $stmt2->fetch();
        return $ki1;
    }
    function GetYurishKimmiki($ki1){
        $stmt2=$this->con->prepare("SELECT YurishKimmiki FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("s",$ki1);
        $stmt2->execute();
        $stmt2->bind_result($ki1);
        $stmt2->fetch();
        return $ki1;
    }
    function SEndMEssage($groupnumber,$index,$message){
        $stmt2=$this->con->prepare("INSERT INTO messages (gropnumber,indexq,message) VALUES (?,?,?)");
        $stmt2->bind_param("iss",$groupnumber,$index,$message);
        $stmt2->execute();
    }
    function SEndMEssageToGroup($groupnumber,$indexs,$message){
        for($i=0;$i<strlen($indexs);$i++){
            $index=(int)substr($indexs,$i,1);
            $stmt2=$this->con->prepare("INSERT INTO messages (gropnumber,indexq,message) VALUES (?,?,?)");
            $stmt2->bind_param("iss",$groupnumber,$index,$message);
            $stmt2->execute();
        }
    }
    function Getgrop2help($grouppy){
        $stmt2=$this->con->prepare("SELECT grop2help FROM groups WHERE NumberOfGroup=?");
        $stmt2->bind_param("s",$grouppy);
        $stmt2->execute();
        $stmt2->bind_result($grouppy);
        $stmt2->fetch();
        return $grouppy;
    }
    function Setgrop2help($lk,$value){
        $stmt2=$this->con->prepare("UPDATE groups SET grop2help = ? WHERE NumberOfGroup=?");
        $stmt2->bind_param("si",$value,$lk);
        $stmt2->execute();
        $stmt2->store_result();
    }
    function Creategrop2help($lk,$value){
        $stmt =$this->con->prepare("INSERT IGNORE INTO  groups (grop2help,NumberOfGroup,Kartatarqatildi) VALUES(?,?,?)");
        $as="false";
        $stmt->bind_param("sis",$value,$lk,$as);
        $stmt->execute();
        $stmt =$this->con->prepare("INSERT IGNORE INTO  tikilganpullar (GroupNumber) VALUES(?)");
        $stmt->bind_param("i",$lk);
        $stmt->execute();
        $stmt =$this->con->prepare("INSERT IGNORE INTO  javoblade (groupnumber) VALUES(?)");
        $stmt->bind_param("i",$lk);
        $stmt->execute();
        $stmt =$this->con->prepare("INSERT IGNORE INTO  oxirgizapis (GroupNumber) VALUES(?)");
        $stmt->bind_param("i",$lk);
        $stmt->execute();
        $stmt =$this->con->prepare("INSERT IGNORE INTO  timede (GroupNumber) VALUES(?)");
        $stmt->bind_param("i",$lk);
        $stmt->execute();
        $stmt =$this->con->prepare("INSERT IGNORE INTO  timede2 (GroupNumber) VALUES(?)");
        $stmt->bind_param("i",$lk);
        $stmt->execute();
    }
    function GetOxirgiZapisplar($GroupNumber ,$OxirgiZapis){
        $stmt2=$this->con->prepare("SELECT $OxirgiZapis FROM oxirgizapis WHERE GroupNumber=?");
        $stmt2->bind_param("i",$GroupNumber);
        $stmt2->execute();
        $stmt2->bind_result($GroupNumber);
        $stmt2->fetch();
        return $GroupNumber;
    }
    function SetOxirgiZapislar($data,$GroupNumber,$OxirgiZapis){
        $stmt =$this->con->prepare("UPDATE oxirgizapis SET $OxirgiZapis = ? WHERE GroupNumber =?");
        $stmt->bind_param("si",$data,$GroupNumber);
        $stmt->execute();
    }
    function SetPlayers($GroupNumber,$Level,$Id,$ki,$re){
        $stmt =$this->con->prepare("UPDATE players SET Indexq = ?,groupnamer = ?,Levelde = ?,Tikilgan='0',ContactName = ? WHERE id =?");
        $stmt->bind_param("siiss",$re,$GroupNumber,$Level,$ki,$Id);
        $stmt->execute();
    }
    function SetTimede($GroupNumber,$timede,$time){
        $stmt =$this->con->prepare("UPDATE timede SET $timede = ? WHERE GroupNumber =?");
        $stmt->bind_param("ii",$time,$GroupNumber);
        $stmt->execute();
    }
    function GetTimede($GroupNumber,$timede){
        $stmt2=$this->con->prepare("SELECT $timede FROM timede WHERE GroupNumber=?");
        $stmt2->bind_param("i",$GroupNumber);
        $stmt2->execute();
        $stmt2->bind_result($ki1);
        $stmt2->fetch();
        return $ki1;
    }
    function SetTimede2($GroupNumber,$timede2,$time){
        $stmt =$this->con->prepare("UPDATE timede2 SET $timede2 = ? WHERE GroupNumber =?");
        $stmt->bind_param("ii",$time,$GroupNumber);
        $stmt->execute();
    }
    function combinatsiya()
    {
        $g=array();
        $n=array();
        for ($i = 0; $i < 18; $i++)
        {
            $g[$i] = rand(11, 62);
        }
        for ($iop = 0; $iop < 5; $iop++)
        {
            $n[$iop] = rand(11, 62);
        }
        try
        {
            for ($t1 = 1; $t1 < 18; $t1++)
            {
                if ($t1 == 1)
                {
                    while ($g[1] == $g[0] ||
                        $g[1] == $g[2] || $g[1] == $g[3] ||
                        $g[1] == $g[4] || $g[1] == $g[5] ||
                        $g[1] == $g[6] || $g[1] == $g[7] ||
                        $g[1] == $g[8] || $g[1] == $g[9] ||
                        $g[1] == $g[10] || $g[1] == $g[11] ||
                        $g[1] == $g[12] || $g[1] == $g[13] ||
                        $g[1] == $g[14] || $g[1] == $g[15] ||
                        $g[1] == $g[16] || $g[1] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 2)
                {
                    while ($g[2] == $g[0] ||
                        $g[2] == $g[1] || $g[2] == $g[3] ||
                        $g[2] == $g[4] || $g[2] == $g[5] ||
                        $g[2] == $g[6] || $g[2] == $g[7] ||
                        $g[2] == $g[8] || $g[2] == $g[9] ||
                        $g[2] == $g[10] || $g[2] == $g[11] ||
                        $g[2] == $g[12] || $g[2] == $g[13] ||
                        $g[2] == $g[14] || $g[2] == $g[15] ||
                        $g[2] == $g[16] || $g[2] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 3)
                {
                    while ($g[3] == $g[0] ||
                        $g[3] == $g[1] || $g[3] == $g[2] ||
                        $g[3] == $g[4] || $g[3] == $g[5] ||
                        $g[3] == $g[6] || $g[3] == $g[7] ||
                        $g[3] == $g[8] || $g[3] == $g[9] ||
                        $g[3] == $g[10] || $g[3] == $g[11] ||
                        $g[3] == $g[12] || $g[3] == $g[13] ||
                        $g[3] == $g[14] || $g[3] == $g[15] ||
                        $g[3] == $g[16] || $g[3] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 4)
                {
                    while ($g[4] == $g[0] ||
                        $g[4] == $g[1] || $g[4] == $g[3] ||
                        $g[4] == $g[2] || $g[4] == $g[5] ||
                        $g[4] == $g[6] || $g[4] == $g[7] ||
                        $g[4] == $g[8] || $g[4] == $g[9] ||
                        $g[4] == $g[10] || $g[4] == $g[11] ||
                        $g[4] == $g[12] || $g[4] == $g[13] ||
                        $g[4] == $g[14] || $g[4] == $g[15] ||
                        $g[4] == $g[16] || $g[4] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 5)
                {
                    while ($g[5] == $g[0] ||
                        $g[5] == $g[1] || $g[5] == $g[3] ||
                        $g[5] == $g[4] || $g[5] == $g[2] ||
                        $g[5] == $g[6] || $g[5] == $g[7] ||
                        $g[5] == $g[8] || $g[5] == $g[9] ||
                        $g[5] == $g[10] || $g[5] == $g[11] ||
                        $g[5] == $g[12] || $g[5] == $g[13] ||
                        $g[5] == $g[14] || $g[5] == $g[15] ||
                        $g[5] == $g[16] || $g[5] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 6)
                {
                    while ($g[6] == $g[0] ||
                        $g[6] == $g[1] || $g[6] == $g[3] ||
                        $g[6] == $g[4] || $g[6] == $g[5] ||
                        $g[6] == $g[2] || $g[6] == $g[7] ||
                        $g[6] == $g[8] || $g[6] == $g[9] ||
                        $g[6] == $g[10] || $g[6] == $g[11] ||
                        $g[6] == $g[12] || $g[6] == $g[13] ||
                        $g[6] == $g[14] || $g[6] == $g[15] ||
                        $g[6] == $g[16] || $g[6] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 7)
                {
                    while ($g[7] == $g[0] ||
                        $g[7] == $g[1] || $g[7] == $g[3] ||
                        $g[7] == $g[4] || $g[7] == $g[5] ||
                        $g[7] == $g[6] || $g[7] == $g[2] ||
                        $g[7] == $g[8] || $g[7] == $g[9] ||
                        $g[7] == $g[10] || $g[7] == $g[11] ||
                        $g[7] == $g[12] || $g[7] == $g[13] ||
                        $g[7] == $g[14] || $g[7] == $g[15] ||
                        $g[7] == $g[16] || $g[7] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 8)
                {
                    while ($g[8] == $g[0] ||
                        $g[8] == $g[1] || $g[8] == $g[3] ||
                        $g[8] == $g[4] || $g[8] == $g[5] ||
                        $g[8] == $g[6] || $g[8] == $g[2] ||
                        $g[8] == $g[7] || $g[8] == $g[9] ||
                        $g[8] == $g[10] ||$g[8] == $g[11] ||
                        $g[8] == $g[12] || $g[8] == $g[13] ||
                        $g[8] == $g[14] || $g[8] == $g[15] ||
                        $g[8] == $g[16] || $g[8] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 9)
                {
                    while ($g[9] == $g[0] ||
                        $g[9] == $g[1] || $g[9] == $g[3] ||
                        $g[9] == $g[4] || $g[9] == $g[5] ||
                        $g[9] == $g[6] || $g[9] == $g[2] ||
                        $g[9] == $g[8] || $g[9] == $g[7] ||
                        $g[9] == $g[10] || $g[9] == $g[11] ||
                        $g[9] == $g[12] || $g[9] == $g[13] ||
                        $g[9] == $g[14] || $g[9] == $g[15] ||
                        $g[9] == $g[16] || $g[9] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 10)
                {
                    while ($g[10] == $g[0] ||
                        $g[10] == $g[1] || $g[10] == $g[3] ||
                        $g[10] == $g[4] || $g[10] == $g[5] ||
                        $g[10] == $g[6] || $g[10] == $g[2] ||
                        $g[10] == $g[8] || $g[10] == $g[7] ||
                        $g[10] == $g[9] || $g[10] == $g[11] ||
                        $g[10] == $g[12] || $g[10] == $g[13] ||
                        $g[10] == $g[14] || $g[10] == $g[15] ||
                        $g[10] == $g[16] || $g[10] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 11)
                {
                    while ($g[11] == $g[0] ||
                        $g[11] == $g[1] || $g[11] == $g[3] ||
                        $g[11] == $g[4] || $g[11] == $g[5] ||
                        $g[11] == $g[6] || $g[11] == $g[2] ||
                        $g[11] == $g[8] || $g[11] == $g[7] ||
                        $g[11] == $g[9] || $g[11] == $g[10] ||
                        $g[11] == $g[12] || $g[11] == $g[13] ||
                        $g[11] == $g[14] || $g[11] == $g[15] ||
                        $g[11] == $g[16] || $g[11] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 12)
                {
                    while ($g[12] == $g[0] ||
                        $g[12] == $g[1] || $g[12] == $g[3] ||
                        $g[12] == $g[4] || $g[12] == $g[5] ||
                        $g[12] == $g[6] || $g[12] == $g[2] ||
                        $g[12] == $g[8] || $g[12] == $g[7] ||
                        $g[12] == $g[9] || $g[12] == $g[10] ||
                        $g[12] == $g[11] || $g[12] == $g[13] ||
                        $g[12] == $g[14] || $g[12] == $g[15] ||
                        $g[12] == $g[16] || $g[12] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 13)
                {
                    while ($g[13] == $g[0] ||
                        $g[13] == $g[1] || $g[13] == $g[3] ||
                        $g[13] == $g[4] || $g[13] == $g[5] ||
                        $g[13] == $g[6] || $g[13] == $g[2] ||
                        $g[13] == $g[8] || $g[13] == $g[7] ||
                        $g[13] == $g[9] || $g[13] == $g[10] ||
                        $g[13] == $g[11] || $g[13] == $g[12] ||
                        $g[13] == $g[14] || $g[13] == $g[15] ||
                        $g[13] == $g[16] || $g[13] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 14)
                {
                    while ($g[14] == $g[0] ||
                        $g[14] == $g[1] || $g[14] == $g[3] ||
                        $g[14] == $g[4] || $g[14] == $g[5] ||
                        $g[14] == $g[6] || $g[14] == $g[2] ||
                        $g[14] == $g[8] || $g[14] == $g[7] ||
                        $g[14] == $g[9] || $g[14] == $g[10] ||
                        $g[14] == $g[11] || $g[14] == $g[12] ||
                        $g[14] == $g[13] || $g[14] == $g[15] ||
                        $g[14] == $g[16] || $g[14] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 15)
                {
                    while ($g[15] == $g[0] ||
                        $g[15] == $g[1] || $g[15] == $g[3] ||
                        $g[15] == $g[4] || $g[15] == $g[5] ||
                        $g[15] == $g[6] || $g[15] == $g[2] ||
                        $g[15] == $g[8] || $g[15] == $g[7] ||
                        $g[15] == $g[9] || $g[15] == $g[10] ||
                        $g[15] == $g[11] || $g[15] == $g[12] ||
                        $g[15] == $g[13] || $g[15] == $g[14] ||
                        $g[15] == $g[16] || $g[15] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 16)
                {
                    while ($g[16] == $g[0] ||
                        $g[16] == $g[1] || $g[16] == $g[3] ||
                        $g[16] == $g[4] || $g[16] == $g[5] ||
                        $g[16] == $g[6] || $g[16] == $g[2] ||
                        $g[16] == $g[8] || $g[16] == $g[7] ||
                        $g[16] == $g[9] || $g[16] == $g[10] ||
                        $g[16] == $g[11] || $g[16] == $g[12] ||
                        $g[16] == $g[13] || $g[16] == $g[15] ||
                        $g[16] == $g[14] || $g[16] == $g[17])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
                if ($t1 == 17)
                {
                    while ($g[17] == $g[0] ||
                        $g[17] == $g[1] || $g[17] == $g[3] ||
                        $g[17] == $g[4] || $g[17] == $g[5] ||
                        $g[17] == $g[6] || $g[17] == $g[2] ||
                        $g[17] == $g[8] || $g[17] == $g[7] ||
                        $g[17] == $g[9] || $g[17] == $g[10] ||
                        $g[17] == $g[11] || $g[17] == $g[12] ||
                        $g[17] == $g[13] || $g[17] == $g[15] ||
                        $g[17] == $g[14] || $g[17] == $g[16])
                    {
                        $g[$t1] = rand(11, 62);
                    }
                }
            }
            for ($yu = 0; $yu < 5; $yu++)
            {
                if ($yu == 0)
                {
                    while ($n[$yu] == $g[0] || $n[$yu] == $g[7] ||
                        $n[$yu] == $g[1] || $n[$yu] == $g[3] ||
                        $n[$yu] == $g[4] || $n[$yu] == $g[5] ||
                        $n[$yu] == $g[6] || $n[$yu] == $g[2] ||
                        $n[$yu] == $g[8] || $n[$yu] == $g[9] ||
                        $n[$yu] == $g[10] || $n[$yu] == $g[11] ||
                        $n[$yu] == $g[12] || $n[$yu] == $g[13] ||
                        $n[$yu] == $g[14] || $n[$yu] == $g[15] ||
                        $n[$yu] == $g[16] || $n[$yu] == $g[17] ||
                        $n[$yu] == $n[1] || $n[$yu] == $n[2] ||
                        $n[$yu] == $n[3] || $n[$yu] == $n[4])
                    {
                        $n[$yu] = rand(11, 62);
                    }
                }
                if ($yu == 1)
                {
                    while ($n[$yu] == $g[0] || $n[$yu] == $g[7] ||
                        $n[$yu] == $g[1] || $n[$yu] == $g[3] ||
                        $n[$yu] == $g[4] || $n[$yu] == $g[5] ||
                        $n[$yu] == $g[6] || $n[$yu] == $g[2] ||
                        $n[$yu] == $g[8] || $n[$yu] == $g[9] ||
                        $n[$yu] == $g[10] || $n[$yu] == $g[11] ||
                        $n[$yu] == $g[12] || $n[$yu] == $g[13] ||
                        $n[$yu] == $g[14] || $n[$yu] == $g[15] ||
                        $n[$yu] == $g[16] || $n[$yu] == $g[17] ||
                        $n[$yu] == $n[0] || $n[$yu] == $n[2] ||
                        $n[$yu] == $n[3] || $n[$yu] == $n[4])
                    {
                        $n[$yu] = rand(11, 62);
                    }
                }
                if ($yu == 2)
                {
                    while ($n[$yu] == $g[0] || $n[$yu] == $g[7] ||
                        $n[$yu] == $g[1] || $n[$yu] == $g[3] ||
                        $n[$yu] == $g[4] || $n[$yu] == $g[5] ||
                        $n[$yu] == $g[6] || $n[$yu] == $g[2] ||
                        $n[$yu] == $g[8] || $n[$yu] == $g[9] ||
                        $n[$yu] == $g[10] || $n[$yu] == $g[11] ||
                        $n[$yu] == $g[12] || $n[$yu] == $g[13] ||
                        $n[$yu] == $g[14] || $n[$yu] == $g[15] ||
                        $n[$yu] == $g[16] || $n[$yu] == $g[17] ||
                        $n[$yu] == $n[0] || $n[$yu] == $n[1] ||
                        $n[$yu] == $n[3] || $n[$yu] == $n[4])
                    {
                        $n[$yu] = rand(11, 62);
                    }
                }
                if ($yu == 3)
                {
                    while ($n[$yu] == $g[0] || $n[$yu] == $g[7] ||
                        $n[$yu] == $g[1] || $n[$yu] == $g[3] ||
                        $n[$yu] == $g[4] || $n[$yu] == $g[5] ||
                        $n[$yu] == $g[6] || $n[$yu] == $g[2] ||
                        $n[$yu] == $g[8] || $n[$yu] == $g[9] ||
                        $n[$yu] == $g[10] || $n[$yu] == $g[11] ||
                        $n[$yu] == $g[12] || $n[$yu] == $g[13] ||
                        $n[$yu] == $g[14] || $n[$yu] == $g[15] ||
                        $n[$yu] == $g[16] || $n[$yu] == $g[17] ||
                        $n[$yu] == $n[0] || $n[$yu] == $n[2] ||
                        $n[$yu] == $n[1] || $n[$yu] == $n[4])
                    {
                        $n[$yu] = rand(11, 62);
                    }
                }
                if ($yu == 4)
                {
                    while ($n[$yu] == $g[0] || $n[$yu] == $g[7] ||
                        $n[$yu] == $g[1] || $n[$yu] == $g[3] ||
                        $n[$yu] == $g[4] || $n[$yu] == $g[5] ||
                        $n[$yu] == $g[6] || $n[$yu] == $g[2] ||
                        $n[$yu] == $g[8] || $n[$yu] == $g[9] ||
                        $n[$yu] == $g[10] || $n[$yu] == $g[11] ||
                        $n[$yu] == $g[12] || $n[$yu] == $g[13] ||
                        $n[$yu] == $g[14] || $n[$yu] == $g[15] ||
                        $n[$yu] == $g[16] || $n[$yu] == $g[17] ||
                        $n[$yu] == $n[0] || $n[$yu] == $n[2] ||
                        $n[$yu] == $n[1] || $n[$yu] == $n[3])
                    {
                        $n[$yu] = rand(11, 62);
                    }
                }
            }
            //flesh test
            //  g[1] = 12; g[0] = 13; n[0] = 14; n[1] = 15; n[2] = 50; n[3] = 56; n[4] = 17;
            //  g[2] = 12; g[3] = 13;
            //Strit
            //    g[2] = 33; g[3] = 35;
            //n[0] = 18;n[1] = 16;n[2] = 49;n[3] = 45;n[4] = 47;
            // g[1] = 26; g[0] = 17;
            //para
            //  g[2] = 23; g[3] = 36; n[0] =26; n[1] = 17; n[2] = 48; n[3] = 35; n[4] = 51;
            //   g[0] = 23; g[1] = 36;
            //g[4] = 23; g[5] = 36;
            //kikerets;
            //  g[0] = 11; g[1] = 12; n[0] =31; n[1] = 56; n[2] = 48; n[3] = 35; n[4] = 57;
            // g[2] = 13; g[3] = 14;
            //set
            // g[1] = 32; g[0] = 37; n[0] =25; n[1] = 43; n[2] = 11; n[3] = 24; n[4] = 58;
            // g[2] = 45; g[3] = 50;
        }
        catch (Exception $e)
        {
            print($e->getMessage());
        }
        $as=array($g,$n);
        return $as;
    }
    function cardio()
    {
        $cards=array();
        for($i = 11; $i < 24; $i++)
        {
            $cards[$i] = "cl".$i;
        }
        for ($i = 24; $i < 37; $i++)
        {
            $cards[$i] = "di".($i-13);
        }
        for ($i = 37; $i < 50; $i++)
        {
            $cards[$i] = "he".($i - 26);
        }
        for ($i = 50; $i < 63; $i++)
        {
            $cards[$i] = "sp".($i - 39);
        }
        return $cards;
    }
    //Method to create a new user
    //YurishAsosiy
    function YurishAsosiy($lk,$minSatck,$soni){
        $koo=$lk;
        $db=new DbOperation();
        $koo=$db->GetKartatarqatildi($koo);
        if($koo== "false")
        {
            $dssad = 0;
            $ttt4 = "";
            $uyinchilar=$db->Getuyinchilar($lk);

            for ($i=1;$i<10;$i++){
                $jie="OxirgiZapis".(string)$i;
                if((int)substr($db->GetOxirgiZapisplar($lk,$jie),14,12)+(int)substr($db->GetOxirgiZapisplar($lk,$jie),27,12)>=$minSatck &&
                    strpos($uyinchilar,(string)$i)!== false  ){
                    $dssad = $dssad + 1;
                    $ttt4 = $ttt4.(string)$i;
                }
            }
            $ttt5 = "";
            for($i=0;$i<9;$i++){
                if(strpos($uyinchilar,(string)($i+1))!==false&&
                    strpos($ttt4,(string)($i+1))!==false){
                    $ttt5=$ttt5.(string)($i+1);
                }
            }
            $db->SetYurishKimmiki($ttt5,$lk);
            $db->SetHuy($dssad,$lk);
            $koo=$lk;
            $koo=$db->GetKimboshlashi($koo);
            $koo2=$ttt5;
            for ($i = 1; $i < 10; $i++)
            {
                $gd = (int)$koo + $i;
                if ($gd > 9)
                {
                    $gd = $gd - 9;
                }

                if (strpos($koo2, (string)$gd) !== false)
                {
                    $koo2=(string)$gd.(string)$koo2;
                    $db->SetKimboshlashi($gd,$lk);
                    break;
                }
            }
            $db->SetYurishKimmiki($koo2,$lk);
            $yurishkimmiki=$koo2;

            if ($db->GetHowmanyPlayers($lk) >= $soni && $db->GetKartatarqatildi($lk) == "false")
            {
                $db->SetKartatarqatildi("true",$lk);
                for($i=1;$i<10;$i++){
                    $db->SetTikilganPullar("Tikilganpullar".(string)$i,"0",$lk);
                }
                $n=$db->combinatsiya();
                $cards=$db->cardio();
                //Gruppalaga ajratiganda
                $db->SetXAmmakartalar($cards[$n[1][0]].$cards[$n[1][1]].$cards[$n[1][2]].$cards[$n[1][3]].$cards[$n[1][4]],$lk);
                // if (trt != -1) { ChiqaribYuborish[trt].Timer.Start(); }
                for ($i = 0; $i < 9; $i++)
                {
                    $db->SetUyinchilar(substr($uyinchilar,1,1).substr($uyinchilar,2,strlen($uyinchilar)-2).substr($uyinchilar,0,1),$lk);
                    $uyinchilar=substr($uyinchilar,1,1).substr($uyinchilar,2,strlen($uyinchilar-2)).substr($uyinchilar,0,1);
                    if (strpos($yurishkimmiki, substr($uyinchilar,1,1))!== false&& strpos($yurishkimmiki, substr($uyinchilar,0,1))!== false)
                    {
                        break;
                    }
                }
                $totti = strlen($yurishkimmiki)-1;
                $db->SetHuy($totti,$lk);
                for ($m = 0; $m < $totti; $m++)
                {
                        $message=$cards[$n[0][$m * 2]].$cards[$n[0][$m * 2 + 1]].substr($yurishkimmiki,0,1).
                            str_pad((string)($minSatck / 2),12,'0',STR_PAD_LEFT)."!". str_pad((string)($minSatck ),12,'0',STR_PAD_LEFT).
                            $uyinchilar .substr($yurishkimmiki,$m+1,1) .str_pad((string)($lk),4,'0',STR_PAD_LEFT);
                        $db->SEndMEssage($lk,substr($uyinchilar,$m,1),$message);

                }
            }
        }
    }
    function registerUser($data)
    {
        $BotOrClient = "true";
        $Id = "";  $Money = 0;$ki=0;
        $ImageNumber=12;
        if (strlen($data) > 2 && substr($data,0, 3) == "%??" && strlen($data) >= 35)
        {
            $Id = substr($data,3, 10);
            $ki=(int)$Id;
            $Money = substr($data,21, 12);
            $ImageNumber = substr($data,33, 2);
            if (strlen($data)>40&&substr($data,35, 1) == "f")
            {
                $BotOrClient = "false";
                $BotlistNumber = substr($data,36, 12);
            }
        }
        if ($Id == "0000000000")
        {
            if ($BotOrClient!= "false")
            {
                $stmt =$this->con->prepare("INSERT INTO players (Imagenumber,money) VALUES(?,?)");
                $stmt->bind_param("si",$ImageNumber,$Money);
                $stmt->execute();
                $ki=$stmt->insert_id;
            }
        }
        if ($BotOrClient != "false")
        {
            return("Jiklo".str_pad($ki,10,"0",STR_PAD_LEFT));
        }
        else
        {
            //     OnIncomBot("Jiklo" + ki.ToString().PadLeft(10, '0'), int.Parse(MainData.BotlistNumber));
        }
        return true;
    }
    //Chekifonline
    function ChekIfOnline($userGrop){
        $db=new DbOperation();
        $GroupNumber=$userGrop;
        $uyinchilar=$db->Getuyinchilar($userGrop);
        for($i=1;$i<10;$i++){

            $erw=$db->GetTimede($GroupNumber,"time".(string)$i);
            $OxirgiZapis=$db->GetOxirgiZapisplar($userGrop,"OxirgiZapis".(string)$i);
            $data21 = "Chiqishde" .(string)$i.str_pad((string)($GroupNumber),4,'0',STR_PAD_LEFT);

            if(strlen($OxirgiZapis)>68 && strpos($uyinchilar,(string)$i)!==false && strlen($erw)>10 &&
                time()-(int)substr($erw,10,strlen($erw)-10)>7 /**/&& substr($OxirgiZapis,59,10) == substr($erw,0,10)){

                $db->Chiqishde($data21);

            }else{
                if(strpos($uyinchilar,(string)$i)===false){
                    $db->SetOxirgiZapislar("",$userGrop,"OxirgiZapis".(string)$i);
                    $db->DeleteMessages($i,$GroupNumber);
                    $db->SetTimede($GroupNumber,"time".(string)$i,"");
                    $db->SetTimede2($GroupNumber,"time".(string)$i,"");
                }else{
                    if(strlen($OxirgiZapis)>68 && strpos($uyinchilar,(string)$i)!==false&& strlen($erw)<10 ){
                        $db->Chiqishde($data21);
                    }else{
                        if(strlen($OxirgiZapis)>68 && strpos($uyinchilar,(string)$i)!==false && strlen($erw)>10 &&
                            time()-(int)substr($erw,10,strlen($erw)-10)<7){
                            $minStavka = TurnLk($GroupNumber);
                            if ((int)substr($OxirgiZapis,14, 12) < $minStavka)
                            {
                                $db->Chiqishde($data21);
                            }
                        }
                    }
                }
            }

        }
    }
    //methoda uyinga kirish unchun
    function UyingaKirish($data){
        function uyinchilarade2($son,$nechtaligi)
        {
            $ui="";$indexlar=array("1","3","5","7","9","2","4","6","8");
            $db=new DbOperation();
            $st=$db->Getuyinchilar($son);

            for($i=0;$i<$nechtaligi;$i++){
                if(strpos($st, $indexlar[$i]) === false){
                    $db->SetUyinchilar($st.$indexlar[$i],$son);$ui=$indexlar[$i]; break;
                }
            }
            return $ui;
        }
        function PlayerdaKartaniTarqatish($data,$ass3,$lk,$index,$sonide,$uyinchilar)
        {
            $odamlade=array(5,9);
            $minSatck = TurnLk($lk);
            $db=new DbOperation();
            $rtwq=str_replace((string)$index,"",$uyinchilar);
            $db->SetError("Usha=".$rtwq,$lk);
            $db->SEndMEssageToGroup($lk,$rtwq ,$data.$index.$ass3);


            if ($sonide >= 2 && $lk <= 2100 )
            {
                $db->YurishAsosiy($lk, $minSatck, 2);
            }
            //Turnir
            if ($lk > 2100)
            {   for($i=0;$i<2;$i++){
                    if($lk%2==$i){
                        if($sonide==$odamlade[$i]){
                            $db->YurishAsosiy($lk, $minSatck, $odamlade[$i]);
                            $i=2;
                        }
                    }
                }
            }
            return $data.$index.$ass3 ;
        }
        function TurnLk($lk)
        {
            $m = 0;
            $kllar=array(10,50,200,1000,4000,20000,100000,500000,1000000,2000000,
                10000000,200000000,500000000,1000000000,500000,1000000,2000000,10000000,
                200000000,500000000,1000000000,20,20,20,20,20,20,20,20,20,20,20);
            //lobbi

            for($i=0;$i<32;$i++){
                if($lk>$i*100){
                    $m = $kllar[$i];
                }
            }
            return $m;
        }
        function uyinchiniGruppgaQushish($PlayersNumber,$GroupNumber,$BotOrClient,$Id,$Level,$Money,$Name,$pul,$yol,$uyinchilar){
            $db=new DbOperation();

            $index=(int)substr($uyinchilar,0,1);

            $data = "%%".$Name .str_pad((string)$GroupNumber,4,"0",STR_PAD_LEFT).$pul."$" .$yol
                .$Level .$Money."xb".$Id;


            $db->SetTimede($GroupNumber,"time".(string)$index,str_pad((string)$Id,10,"0",STR_PAD_LEFT).time());


            $db->SetOxirgiZapislar($data.$index,$GroupNumber,"OxirgiZapis".(string)$index);

            if ($BotOrClient != "false")
            {
                $index=substr($uyinchilar,strlen($uyinchilar)-1, 1);
                $db->SetPlayers($GroupNumber,$Level,$Id,"person".$PlayersNumber,$index);
            }


            $kil = "";
            for($i=1;$i<10;$i++){
                $ty="OxirgiZapis".(string)$i;
                $oxirgide=$db->GetOxirgiZapisplar($GroupNumber,$ty);
                if($oxirgide != "" && $index!=$i)
                { $kil = $kil.$oxirgide; }
            }
            // GruppadagiAktivOdamlarSoni[Maindata.GroupNumber] = GruppadagiAktivOdamlarSoni[Maindata.GroupNumber] + 1;
            return PlayerdaKartaniTarqatish($data, $kil, $GroupNumber,$index,$PlayersNumber,$uyinchilar);
        }
        $BotOrClient = "true";
        $GroupNumber = 0;
        $pul = "";  $Id = "";
        $Level = "";$Money = "";
        $yol = "";  $Name = "";
        //%%asdsasdad0001000000001000&000000000000000001000000001000$^0000000001
        if(strlen($data)>=69 && substr($data,0, 2) == "%%" )
        {
            $GroupNumber = substr($data,10, 4);
            $Id = substr($data,59, 10);
            $Level = substr($data,39, 6);
            $Name = substr($data,2, 8);
            $Money = substr($data,45, 12);
            $yol = substr($data,27, 12);
            $pul = substr($data,14, 12);
            if (strlen($data) > 69 && substr($data,69, 1) == "f")
            {
                $BotOrClient = "false";
            }
        }
        $trwe=true;
        $db= new DbOperation();

        $rewrwr="Ushade";

        $odamlade=array(5,9);
        $Pullar=array(100,500,2000,10000,40000,200000,1000000,10000000,100000000,200000000,400000000,1000000000,2000000000);
        $Gruplar=array(0,100,200,300,400,500,600,700,800,900,1000,1100,1200);

        for($i=1;$i<10;$i++){
            $rt="OxirgiZapis".(string)$i;
            $te=$db->GetOxirgiZapisplar($GroupNumber,$rt);
            if($te!=""){
                if($Id==substr($te,59,10)){
                    $trwe=false;
                    break;
                }
            }
        }

        $Ifgruplar=array(3300,2100,2,0);

        if($trwe){
               for($k=0;$k<2;$k++){
                   for($i=0;$i<4;$i=$i+2){
                       if($k*$GroupNumber<$Ifgruplar[$i] &&$GroupNumber>$k*$Ifgruplar[$i+1]){
                           for($i1 = $i; $i1 < 100; $i1 = $i1 + 2){
                               for($i2=0;$i2<($i/2)+1;$i2++){
                                   for($t=0;$t<($i/2)*12+1;$t++){

                                       $grup=$k*($i1 +($Gruplar[$t]+$i2)*($i/2))+$GroupNumber-$k*($i/2);


                                       $db->Creategrop2help($grup,"true");
                                       $db->ChekIfOnline($grup);
                                       $playersNumber=$db->GetHowmanyPlayers($grup);

                                       if($db->Getgrop2help($grup)=="true"&&
                                           ($i/2)*(int)$pul==($i/2)*$Pullar[$t] && ($i/2)*$playersNumber < $odamlade[$i2] )
                                       {
                                           $GroupNumber = $grup;  $t=13;$i2=2;$i1=100;$i=4;$k=2;

                                           for($i3=0;$i3<2;$i3++){
                                               if($GroupNumber%2==$i3){
                                                   $playersNumber=$playersNumber+1;
                                                   if(($i/2)*$playersNumber>=$odamlade[$i3]){
                                                       $db->Setgrop2help($GroupNumber,"false");
                                                       $i3=2;
                                                   }
                                                   $db->SetHowmanyPlayers($playersNumber,$GroupNumber);
                                                   $uyinchilar =  uyinchilarade2($GroupNumber,$odamlade[$i]);
                                                   $rewrwr=uyinchiniGruppgaQushish($playersNumber,$GroupNumber,$BotOrClient,$Id,$Level,$Money,$Name,$pul,$yol,$uyinchilar);
                                               }
                                           }
                                       }

                                   }
                               }
                           }
                       }
                   }
               }
            }
        return $rewrwr;
    }
    //messajji olish ucnde
    function getMessages($userindex,$userGrop)
    {   $data="";
        $db= new DbOperation();
        $mk="time".(string)$userindex;
        $erw=$db->GetTimede($userGrop,$mk);
        $db->SetTimede($userGrop,"time".(string)$userindex,substr($erw,0,10).time());
        $stmt = $this->con->prepare("SELECT message FROM messages WHERE gropnumber = ? AND indexq=?");
        $stmt->bind_param("ii", $userGrop,$userindex);
        $stmt->execute();
        $stmt->bind_result($data);
        $messages = array();
        while($stmt->fetch()){
            $temp = array();
            $temp['data'] = $data;
            $db=new DbOperation();
            $db->SetError($data." index=".$userindex,$userGrop);
            array_push($messages, $temp);
        }
        $db->DeleteMessages($userindex,$userGrop);
        return $messages;
    }
    function DeleteMessages($userindex,$userGrop){
        $stmt = $this->con->prepare("DELETE FROM messages WHERE gropnumber = ? AND indexq=?");
        $stmt->bind_param("ii", $userGrop,$userindex);
        $stmt->execute();
    }
    //Davom etishi uyinni
    function UyinniDAvomEttir($data){
        function Pas($lk){
            sleep(6);
            $minSatck = TurnLk($lk);
            $db=new DbOperation();
            $db->SetKartatarqatildi("false",$lk);
            $db->YurishAsosiy($lk,$minSatck,2);
        }
        function TurnLk($lk)
        {
            $m = 0;
            $kllar=array(10,50,200,1000,4000,20000,100000,500000,1000000,2000000,
                10000000,200000000,500000000,1000000000,500000,1000000,2000000,10000000,
                200000000,500000000,1000000000,20,20,20,20,20,20,20,20,20,20,20);
            //lobbi

            for($i=0;$i<32;$i++){
                if($lk>$i*100){
                    $m = $kllar[$i];
                }
            }
            return $m;
        }
        function Javobit($lk){
            sleep(3);
            $db=new DbOperation();
            $ObshiyPul = "0";
            $uyinchilar=$db->Getuyinchilar($lk);
            for ($i = 0; $i < strlen($uyinchilar); $i++)
            {
                $ObshiyPul = (string)((int)($ObshiyPul) + (int)($db->GetTikilganPullar($lk,"TikilganPullar".substr($uyinchilar,$i,1))));
            }
            $mkds = 0;$asosiy = "";
            //100,200,300,400,500
            $Massiv2=array();
            $Massiv=array();
            for($i=0;$i<10;$i++){
                $Massiv2[$i]=0;
                $Massiv[$i]=0;
            }
            for ($i = 1; $i < 10; $i++)
            {
                if ($db->GetJavoblade($lk,"Javoblade".(string)$i)=="")
                {
                    $mkds++;
                }
                else
                {
                    $asosiy = $asosiy.$i;
                    for($t = 0; $t < strlen($uyinchilar); $t++)
                    {
                        if (substr($uyinchilar,$t,1) == $i)
                        {
                            $Massiv2[$i] = $db->GetTikilganPullar($lk,"TikilganPullar".(string)$i);
                            $Massiv[$i] = $Massiv2[$i];
                            $t = 10;
                        }
                    }
                }
            }
            $mkds = 9 - $mkds; $kmn = "";
            if ($mkds == 1)
            {
                for($i = 1; $i < 10;$i++)
                {
                    $kmn = $kmn.$db->GetJavoblade($lk,"Javoblade".(string)$i);
                }
            }
            else
            { $javoblade=array();
                $javoblade[0]="";
                for($l=1;$l<10;$l++){
                    $javoblade[$l]=$db->GetJavoblade($lk,"Javoblade".(string)$l);
                }
                $d=array();
                $d[0] = "st"; $d[1] = "p1"; $d[2] = "p2"; $d[3] = "se";
                $d[4] = "sr"; $d[5] = "fl"; $d[6] = "fs";
                while (strlen($asosiy) > 0)
                {
                    $b =array();
                    $b1 =array();
                    $t1 =0;
                    $t =-1;
                    for ($i = 0; $i < strlen($asosiy); $i++)
                    {
                        //print(i + " " + asosiy + " d=" + Javoblade[lk, int.Parse(asosiy.Substring(i, 1))]);
                        //113579RR3p121di22he2121020
                        //     $toshde = (int)(substr($db->GetJavoblade($lk,"Javoblade".substr($asosiy,$i,1)),2,1));
                        if (strlen($javoblade[(int)substr($asosiy,$i,1)]) > 20)
                        {
                            $ObshiyPul = (string)((int)(substr($javoblade[(int)substr($asosiy,$i,1)],19,strlen($javoblade[(int)substr($asosiy,$i,1)])-19)));
                        }
                        //   print(i + toshde);
                        $b[(int)substr($asosiy,$i,1)] =
                            substr($javoblade[(int)substr($asosiy,$i,1)],3,2);
                        $b1[(int)substr($asosiy,$i,1)] = substr($javoblade[(int)substr($asosiy,$i,1)],5,2);
                        //  print(" b=" + b[int.Parse(asosiy.Substring(i, 1))]);
                        //  print(" b1=" + b1[int.Parse(asosiy.Substring(i, 1))]);
                        for ($x = 0; $x < 7; $x++)
                        {
                            if ($d[$x] == $b[(int)substr($asosiy,$i,1)])
                            {
                                if ($x > $t) { $t = $x; $t1 = substr($asosiy,$i,1);     break; }
                                if ($x == $t) { $t1 = $t1.substr($asosiy,$i,1); }
                                if (strlen($t1) > 1)
                                {
                                    $k1 = 0; $k2 = "";
                                    for ($k = 0; $k < strlen($t1); $k++)
                                    {
                                        if ((int)($b1[(int)substr($t1,$k,1)]) > $k1) { $k2 = substr($t1,$k,1); $k1 = (int)($b1[(int)substr($t1,$k,1)]);}
                                        else
                                        {
                                            if ((int)($b1[(int)substr($t1,$k,1)]) == $k1) { $k2 = $k2.substr($t1,$k,1); }
                                        }
                                    }
                                    $t1 = $k2;
                                }
                            }
                        }
                    }
                    // print("1:" + t1);
                    $kmn = $kmn.$t1.":";
                    for ($i = 0; $i < strlen($t1); $i++)
                    {
                        $asosiy = str_replace(substr($t1,$i,1),"",$asosiy);
                    }
                }
                $Pullar = array();
                $g = array();
                for ($i=0;$i<10;$i++)
                {
                    $Pullar[$i] = "0";
                    $g[$i] = "";
                }
                $doctor = (int)($ObshiyPul);
                sort($Massiv2);
                for($i = 0; $i < sizeof($Massiv2); $i++)
                {
                    //     $db->SetError("MAssiv2 =".$Massiv2[$i],$lk);
                    if($Massiv2[$i]!=0){
                        for($ml = 0; $ml < 10; $ml++)
                        {
                            if ($ml==0) { $doctor = (int)($ObshiyPul); }
                            if ($Pullar[$ml]!="0" && $Pullar[$ml] != $ObshiyPul)
                            {
                                $doctor = $doctor - (int)($Pullar[$ml]);
                            }
                        }
                        for($t = $i; $t < sizeof($Massiv2); $t++)
                        {
                            if ($Massiv2[$i]<=$Massiv2[$t] && $Massiv2[$t]!=0 && $Massiv2[$i] != 0)
                            {
                                $doctor = $doctor - $Massiv2[$t] + $Massiv2[$i];
                                //    $db->SetError("Massiv t=" .$Massiv2[$t]." Massiv i=".$Massiv2[$i]." Doctor=".$doctor,$lk);
                                for($h = 1; $h < 10; $h++)
                                {
                                    if( strpos($g[$i],(string)$h)===false && $Massiv2[$t] <= $Massiv[$h])
                                    {
                                        $g[$i] = $g[$i].$h;
                                    }
                                }
                            }
                        }
                        $Pullar[$i] = (string)$doctor;
                    }else{
                        $Pullar[$i] ="0";
                    }
                }
                $rt=";";
                $rt2=";";
                for($i=0;$i<10;$i++){
                    $rt=$rt." ".$Pullar[$i];
                    $rt2=$rt2." ".$g[$i];
                }
                // $db->SetError("Pullar-".$kmn." ".$rt." ".$rt2,$lk);
                $sdasd="";
                $Golib =array();   $dfg = 0;
                $Golib2 = array(); $dfg2 = 0;
                $Golib3 = array(); $dfg3 = 0;
                for($i=0;$i<10;$i++){
                    $Golib[$i] ="";
                    $Golib2[$i] = "";
                    $Golib3[$i] = "";
                }
                for ($i = 0; $i < sizeof($Pullar); $i++)
                {
                    if ($Pullar[$i] != "0" && $g[$i]!=""&&$sdasd!= $Pullar[$i].$g[$i])
                    {
                        // $db->SetError($Pullar[$i]. " Pul",$lk);
                        //$db->SetError($g[$i]." g",$lk);
                        $sdasd = $Pullar[$i]. $g[$i];
                        for($t = 0; $t <strlen($kmn) ; $t++)
                        {//kmn= 12:3:7:4:6:59:8:
                            for ($t2 = 0; $t2 <strlen($g[$i]); $t2++)
                            {//4-1 400 4001 4001 4:1: 4 1
                                //        $db->SetError($g[$i]." gi t=".$t." t2=".$t2." kmn=".$kmn." ".sizeof($g[$i]),$lk);
                                if (substr($kmn,$t,1)!=":" && substr($kmn,$t,1) == substr($g[$i],$t2,1))
                                {
                                    $Golib[$dfg] = substr($kmn,$t,1).$Pullar[$i];
                                    if(strlen($kmn) > $t + 1)
                                    {
                                        if (substr($kmn,$t+1,1) != ":")
                                        {
                                            // dfg2 = 0;Pullar dfg ga bogliq
                                            for ($t3 = 0; $t3< strlen($g[$i]); $t3++)
                                            {
                                                if (substr($kmn,$t+1,1) == substr($g[$i],$t3,1))
                                                {
                                                    //   print(dfg2);
                                                    $Golib2[$dfg2] = substr($kmn,$t+1,1).$Pullar[$i];
                                                    if (sizeof($kmn) > $t+2)
                                                    {
                                                        if (substr($kmn,$t+2,1) != ":")
                                                        {
                                                            //    dfg3 = 0;
                                                            for ($t4 = 0; $t4 < strlen($g[$i]); $t4++)
                                                            {
                                                                if (substr($kmn,$t+2,1) == substr($g[$i],$t4,1))
                                                                {
                                                                    $Golib3[$dfg3] = substr($kmn,$t+2,1) . $Pullar[$i];
                                                                    $t = 100; $t2 = 100; $t3 = 10; $t4 = 100;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $t = 100; $t2 = 100;$t3 = 100;
                                                }
                                            }
                                        }
                                    }
                                    $t = 100;$t2 = 100;
                                }
                            }
                        }
                        $dfg++; $dfg2++; $dfg3++;
                    }
                }
                $rt=";";
                for($i=0;$i<10;$i++){
                    $rt=$rt." ".$Golib[$i];
                }
                $db->SetError("Golib-".$kmn." ".$rt,$lk);
                for ($i = 0; $i < 10; $i++)
                {
                    for ($t = 0; $t < 10; $t++)
                    {
                        if(($Golib[$t]!=null ||$Golib[$t] != "")&& ($Golib[$i] != null||$Golib[$t] != "") && substr($Golib[$i],0,1)==substr($Golib[$t],0,1) && $t!=$i)
                        {
                            $Golib[$i] =  substr($Golib[$i],0,1) .(string)((int)(substr($Golib[$i],1,strlen($Golib[$i])-1))+
                                    (int)(substr($Golib[$t],1,strlen($Golib[$t])-1)));
                            $Golib[$t] = null;
                        }
                        if($Golib2[$t]!=null && $Golib2[$i] != null && substr($Golib2[$i],0,1)==substr($Golib2[$t],0,1) && $t!=$i)
                        {
                            $Golib2[$i] =  substr($Golib2[$i],0,1) .(string)((int)(substr($Golib2[$i],1,strlen($Golib2[$i])-1))+
                                    (int)(substr($Golib2[$t],1,strlen($Golib2[$t])-1)));
                            $Golib2[$t] = null;
                        }
                        if($Golib3[$t]!=null && $Golib3[$i] != null && substr($Golib3[$i],0,1)==substr($Golib3[$t],0,1) && $t!=$i)
                        {
                            $Golib3[$i] =  substr($Golib3[$i],0,1) .(string)((int)(substr($Golib3[$i],1,strlen($Golib3[$i])-1))+
                                    (int)(substr($Golib3[$t],1,strlen($Golib3[$t])-1)));
                            $Golib3[$t] = null;
                        }
                    }
                }
                $kmn = "";
                for ($i = 0; $i < 10; $i++)
                {
                    if ($Golib[$i] != null ||$Golib[$i] != "")
                    {
                        $kmn = $kmn.substr($db->GetJavoblade($lk,"Javoblade".substr($Golib[$i],0,1)),0,19).str_pad(substr($Golib[$i],1,strlen($Golib[$i])-1) ,12,"0",STR_PAD_LEFT);
                    }
                }
                for ($i = 0; $i < 10; $i++)
                {
                    if ($Golib2[$i] != null)
                    {
                        $kmn = $kmn .substr($db->GetJavoblade($lk,"Javoblade".substr($Golib2[$i],0,1)),0,19).str_pad(((int)substr($Golib2[$i],1,strlen($Golib2[$i])-1))/2 ,12,"0",STR_PAD_LEFT);
                        $jk = substr($db->GetJavoblade($lk,"Javoblade".substr($Golib2[$i],0,1)),3,4);
                        for ($t = 0; $t < strlen($kmn); $t++)
                        {
                            if (strlen($kmn)>$t+7 && substr($kmn,$t+3,4) == $jk)
                            {
                                if((int)(substr($kmn,$t+19,12)) > (int)substr($Golib2[$i],1,strlen($Golib2[$i])-1))
                                {
                                    $kmn = substr($kmn,0,$t).substr($kmn,$t,19).str_pad((string)(((int)(substr($kmn,$t+19,12))-(int)substr($Golib2[$i],1,strlen($Golib2[$i])-1))/2),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                }
                                else
                                {
                                    $kmn = substr($kmn,0,$t).substr($kmn,$t,19).str_pad((string)(-((int)(substr($kmn,$t+19,12)))/2+(int)substr($Golib2[$i],1,strlen($Golib2[$i])-1)),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                }
                                $t = 1000;
                            }
                        }
                    }
                }
                for ($i = 0; $i < 10; $i++)
                {
                    if ($Golib3[$i] != null)
                    {
                        $jk=substr($db->GetJavoblade($lk,"JAvoblade".substr($Golib3[$i],0,1)),3,4);
                        $a1 =0; $a2=0; $a3=0;
                        for ($t = 0; $t < strlen($kmn); $t++)
                        {
                            if (strlen($kmn) > $t + 10 && substr($kmn,$t+3,4) == $jk)
                            {
                                if ($a2 == 0)
                                {
                                    $a2= (int)substr($kmn,$t+19,12) ;
                                }
                                else
                                {
                                    if ($a3 == 0)
                                    {
                                        $a3 = (int)substr($kmn,$t+19,12) ;
                                    }
                                }
                                $t = $t + 30;
                            }
                        }
                        $a1 = (int)(substr($Golib3[$i],1,strlen($Golib3[$i])-1));
                        if ($a2 > $a3)
                        {
                            $a2 = $a2 + $a3;
                            $a3 = $a3 * 2;
                        }
                        else
                        {
                            $a3 = $a3 + $a2;
                            $a2 = $a2 * 2;
                        }
                        if($a1 <= $a2 && $a3 >= $a1)
                        {
                            $kmn = $kmn.substr($db->GetJavoblade($lk,"Javoblade".substr($Golib3[$i],0,1)),0,19).str_pad((string)(((int)substr($Golib3[$i],1,strlen($Golib3[$i])-1))/3) ,12,"0",STR_PAD_LEFT);
                            for ($t = 0; $t < strlen($kmn); $t++)
                            {
                                if (strlen($kmn) > $t + 10 && substr($kmn,$t+3,4) == $jk)
                                {
                                    if ($a2 != 0)
                                    {
                                        $kmn=substr($kmn,0,19+$t).str_pad((string)($a2-$a1+$a1/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                        $a2 = 0;
                                    }
                                    else
                                    {
                                        if ($a3 != 0)
                                        {
                                            $kmn=substr($kmn,0,19+$t).str_pad((string)($a3-$a1+$a1/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                            $a3 = 0;
                                        }
                                    }
                                    $t = $t + 30;
                                }
                            }
                        }
                        else
                        {
                            if ($a2 <= $a1 && $a3 >= $a2)
                            {
                                for ($t = 0; $t < strlen($kmn); $t++)
                                {
                                    if (strlen($kmn)> $t + 10 && substr($kmn,$t+3,4) == $jk)
                                    {
                                        if ($a2 != 0)
                                        {
                                            $kmn=substr($kmn,0,19+$t).str_pad((string)($a2/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                            $a2 = 0;
                                        }
                                        else
                                        {
                                            if ($a3 != 0)
                                            {
                                                $kmn=substr($kmn,0,19+$t).str_pad((string)($a3-$a2+$a2/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                                $a3 = 0;
                                            }
                                            else
                                            {
                                                if ($a1 != 0)
                                                {
                                                    $kmn=substr($kmn,0,19+$t).str_pad((string)($a1-$a2+$a2/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                                    $a1 = 0;
                                                }
                                            }
                                        }
                                        $t = $t + 31;
                                    }
                                }
                            }
                            else
                            {
                                if ($a3 <= $a2 && $a1 >= $a3)
                                {
                                    for ($t = 0; $t < strlen($kmn); $t++)
                                    {
                                        if (strlen($kmn) > $t + 10 && substr($kmn,$t+3,4) == $jk)
                                        {
                                            if ($a2 != 0)
                                            {
                                                $kmn=substr($kmn,0,19+$t).str_pad((string)($a2-$a3+$a3/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                                $a2 = 0;
                                            }
                                            else
                                            {
                                                if ($a3 != 0)
                                                {
                                                    $kmn=substr($kmn,0,19+$t).str_pad((string)($a3/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                                    $a3 = 0;
                                                }
                                                else
                                                {
                                                    if ($a1 != 0)
                                                    {
                                                        $kmn=substr($kmn,0,19+$t).str_pad((string)($a1-$a3+$a3/3),12,"0",STR_PAD_LEFT).substr($kmn,$t+31,strlen($kmn)-$t-31);
                                                        $a1 = 0;
                                                    }
                                                }
                                            }
                                            $t = $t + 31;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            for ($i = 0; $i < strlen($kmn); $i++)
            {
                if (strlen($kmn) > $i + 2 &&substr($kmn,$i,2) == "RR")
                {
                    $db->SetOxirgiZapislar(
                        substr($db->GetOxirgiZapisplar($lk,"OxirgiZapis".substr($kmn,$i+2,1)),0,14)
                        .str_pad((string)((int)substr($db->GetOxirgiZapisplar($lk,"OxirgiZapis".substr($kmn,$i+2,1)),14,12)+(int)substr($kmn,19+$i,12)),12,"0",STR_PAD_LEFT)
                        .substr($db->GetOxirgiZapisplar($lk,"OxirgiZapis".substr($kmn,$i+2,1)),26,strlen($db->GetOxirgiZapisplar($lk,"OxirgiZapis".substr($kmn,$i+2,1)))-26)
                        ,$lk,
                        "OxirgiZapis".substr($kmn,$i+2,1)
                    );
                    $i = $i + 30;
                }
            }
            //%%NameByMe\Ism\0001\gruppa\00000001000$\pul\000000000000\yul\00000\level\000000001000\pul\xb0000000000\id\
            for ($i = 0; $i < strlen($uyinchilar); $i++)
            {
                $db->SetOxirgiZapislar(substr($db->GetOxirgiZapisplar($lk,"OxirgiZapis".substr($uyinchilar,$i,1)),0,27)
                    ."000000000000".substr($db->GetOxirgiZapisplar($lk,"OxirgiZapis".
                            substr($uyinchilar,$i,1)).substr($uyinchilar,$i,1),39,strlen($db->GetOxirgiZapisplar($lk,"OxirgiZapis".
                            substr($uyinchilar,$i,1)))-39),$lk,"OxirgiZapis".substr($uyinchilar,$i,1)
                );
            }
            //   $db->SetError("As-".$kmn,$lk);
            if ($kmn != "") { $db->SEndMEssageToGroup($lk,$uyinchilar,$kmn); }
            sleep(6);
            $minSatck = TurnLk($lk);
            $db=new DbOperation();
            $db->SetKartatarqatildi("false",$lk);
            $db->YurishAsosiy($lk,$minSatck,2);
        }
        if (strpos($data,"$")!==false && strpos($data,"^")!==false && strlen($data) > 32)
        {
            //%%NameByMe0001000000039990$000000000010000000040000xb00000000011
            //1000000000980000000000020$^100010
            //3000000000980000000000020$^1021010
            $Pas=false;
            $nmaligi = "UyinniDavomEtishi";
            $Index = (int)substr($data,0,1);
            $GroupNumber =(int)substr($data,28,4);
            $keraklide = (int)substr($data,27,1);
            $yol =(int)substr($data,13,12);
            $pul = (int)substr($data,1,12);
            $mik = (int)substr($data,32,1);
            $db=new DbOperation();
            $nj="OxirgiZapis".(string)$Index;
            $oxirgizapis = $db->GetOxirgiZapisplar($GroupNumber,$nj);
            $yurishkimmiki=$db->GetYurishKimmiki($GroupNumber);
            $kartaTarqatildi=$db->GetKartatarqatildi($GroupNumber);
            $uyinchilar=$db->Getuyinchilar($GroupNumber);
            $huy=$db->GetHuy($GroupNumber);
            $Level ="000001";
            $Id="0000000001";
            $Name ="NameByMe";$Money ="";
            if($GroupNumber>0 && $GroupNumber < 3200 && strlen($oxirgizapis) > 68)
            {
                $Level = substr($oxirgizapis,39,6);
                $Id = substr($oxirgizapis,59,10);
                $Name = substr($oxirgizapis,2,8);
                $Money = substr($oxirgizapis,45,12);
            }
            if (strpos($data,"&")!==false )
            {
                $Pas = true;
                if (strlen($data)> 34)
                {
                    $Judgement =substr($data,strlen($data)-12,12);
                }
                else
                {
                    $Judgement = "";
                }
            }
            else
            {
                $Pas = false;
            }
            //return " As".$keraklide;
            if ($nmaligi =="UyinniDavomEtishi"&& strlen($yurishkimmiki)>1&&
                (string)$Index == substr($yurishkimmiki,0,1) &&$kartaTarqatildi=="true")
            {
                //qw = data;
                //Masalan :  1st220000001000$000000000010^
                //Pullarde[1]=1000;Yullarde[1]=10;
                //1000000000990000000000010$^200017&(
                $lk = $GroupNumber;
                /*
                            for( $i=0; $i<ChiqaribYuborish.Count; $i++)
                            {
                                if (ChiqaribYuborish[i].lk1 == lk)
                                {
                                    ChiqaribYuborish[i].Timer.Stop();
                                    ChiqaribYuborish[i].Timer.Reset();
                                    ChiqaribYuborish[i].Timer.Start();
                                    break;
                                }
                            }*/
                /*
                           $tikilgsnpul="TikilgsnPullar".(string)$Index;
                            $db->SetTikilganPullar($tikilgsnpul,$yol,$lk);
                                    grop22[lk][i].TikilganPullar2 = MainData.yol;
                */
                for($i = 0; $i < strlen($yurishkimmiki); $i++){
                    //1000000000350000000000050$^201020 a=1 b=13113
                    $a =substr($yurishkimmiki,0,1);  $b = $yurishkimmiki;
                    if ($i + 2 == strlen($yurishkimmiki))
                    {
                        $db->SetYurishKimmiki(substr($b,1,1)
                            .substr($b,1,strlen($b)-1),$GroupNumber);
                        $yurishkimmiki=substr($b,1,1).substr($b,1,strlen($b)-1);
                        break;
                    }
                    else
                    {
                        if ($a ==substr($b,$i+1,1))
                        {
                            $db->SetYurishKimmiki(substr($b,$i+2,1)
                                .substr($b,1,strlen($b)-1),$GroupNumber);
                            $yurishkimmiki=substr($b,$i+2,1).substr($b,1,strlen($b)-1);
                            break;
                        }
                    }
                }
                $db->SetOxirgiZapislar("%%".$Name.str_pad((string)$GroupNumber,4,"0",STR_PAD_LEFT).str_pad((string)$pul,12,"0",STR_PAD_LEFT)."$".
                    str_pad((string)$yol,12,"0",STR_PAD_LEFT) .$Level .str_pad((string)$Money,12,"0",STR_PAD_LEFT)."xb".$Id.(string)$Index,$GroupNumber,"OxirgiZapis".(string)$Index);
                if($keraklide == 1)
                {
                    $db->SetHuy(strlen($yurishkimmiki)-1,$lk);
                    $huy=strlen($yurishkimmiki)-1;
                }
                if ($keraklide >= $huy)
                {
                    for ($i = 0; $i < strlen($yurishkimmiki)-1; $i++)
                    {
                        $tikilgsnpul="TikilganPullar".substr($yurishkimmiki,$i+1,1);
                        $OxirgiZapis="OxirgiZapis".substr($yurishkimmiki,$i+1,1);
                        $db->SetTikilganPullar($tikilgsnpul,(int)$db->GetTikilganPullar($lk,$tikilgsnpul)+(int)substr($db->GetOxirgiZapisplar($lk,$OxirgiZapis),27,12),$lk);
                    }
                    $db->SetHuy(strlen($yurishkimmiki)-1,$lk);
                    $huy=strlen($yurishkimmiki)-1;
                    $hu3=$db->Gethu3($lk)+1;
                    $db->Sethu3($hu3,$lk);
                    // XammaKartalar[lk] = cards[n[0]] + cards[n[1]] + cards[n[2]] + cards[n[3]] + cards[n[4]];
                    //1000000000990000000000010$^200017&
                    if (!$Pas)
                    {
                        $data = $Index.str_pad($pul,12,"0",STR_PAD_LEFT) .str_pad($yol,12,"0",STR_PAD_LEFT)."$^" .$keraklide.$mik .$db->GetXAmmakartalar($lk);
                    }
                    else
                    {
                        $data = $Index.str_pad($pul,12,"0",STR_PAD_LEFT) .str_pad($yol,12,"0",STR_PAD_LEFT)."$^" .$keraklide. "&".$mik .$db->GetXAmmakartalar($lk);
                    }
                    if ($yurishkimmiki == ""){$yurishkimmiki = "0"; }
                    $db->SEndMEssageToGroup($lk,$uyinchilar,$data.$huy.substr($yurishkimmiki,0,1).str_pad($lk,4,"0",STR_PAD_LEFT));
                    if ($hu3 == 4)
                    {
                        for ($i = 1; $i < 10; $i++)
                        {
                            $javboblede="Javoblade".(string)$i;
                            $db->SetJavoblade($javboblede,"",$lk);
                        }
                        $db->Sethu3(0,$lk);
                        Javobit($lk);
                    }
                    if ($Pas)
                    {
                        if ($huy == 2 || strlen($yurishkimmiki) == 3) { $db->Sethu3(0,$lk); Pas($lk); }
                        $yurishkimmiki=str_replace((string)$Index,"",$yurishkimmiki);
                        $db->SetYurishKimmiki($yurishkimmiki,$lk);
                    }
                }
                else
                {
                    if ($Pas)
                    {
                        if (strlen($yurishkimmiki) < 4)
                        {
                            $db->SetHuy(strlen($yurishkimmiki)-1,$lk);
                        }
                        /*   if (MainData.Judgement!="")
                           {
                               for (int i = 0; i < BotGrouplar[lk].Count; i++)
                           {
                               OnIncomBot("TakeiT" + YurishKimmiki[lk].Substring(0, 1) +
                               lk.ToString().PadLeft(4, '0') + MainData.Judgement, int.Parse(BotGrouplar[lk][i].IdNumber));
                           }
                       }*/
                        $yurishkimmiki=str_replace((string)$Index,"",$yurishkimmiki);
                        $db->SetYurishKimmiki($yurishkimmiki,$lk);
                        if($yurishkimmiki==""){$yurishkimmiki="0";}
                        $data = $Index.str_pad($pul,12,"0",STR_PAD_LEFT).str_pad($yol,12,"0",STR_PAD_LEFT)."$^" .$keraklide.$mik .$huy."&";
                        $db->SEndMEssageToGroup($lk,$uyinchilar,$data.substr($yurishkimmiki,0,1).str_pad($lk,4,"0",STR_PAD_LEFT));
                        // qushish mumkin
                        if ($huy == 2) {$db->Sethu3(0,$lk); Pas($lk);  }
                    }
                    else
                    {   if($yurishkimmiki==""){$yurishkimmiki="0";}
                        $data = $Index.str_pad($pul,12,"0",STR_PAD_LEFT).str_pad($yol,12,"0",STR_PAD_LEFT)."$^" .$keraklide.$mik .$huy;
                        $db->SEndMEssageToGroup($lk,$uyinchilar,$data.$huy.substr($yurishkimmiki,0,1).str_pad($lk,4,"0",STR_PAD_LEFT));
                    }
                }
            }
        }
        return "Zo'r";
    }
    //Rrnikirishi
    function RRniKiritish($data){
        if (strlen($data)>19&&substr($data,0,2)=="RR")
        {
            $db=new DbOperation();
            //RR1at21sp21sp1621020
            $lk =(int)(substr($data,15,4)) ;
            $index = (int)(substr($data,2,1));
            //st,p1,p2,se,fl,sr,fs  RR2p122he12di12
            if ($db->GetJavoblade($lk,"Javoblade".(string)$index) == "" ||$db->GetJavoblade($lk,"Javoblade".(string)$index) == null)
            {
                $db->SetJavoblade("Javoblade".(string)$index,$data,$lk);
            }
        }
        return "Zo'r";
    }
    //Chiqishde
    function Chiqishde($data)
    {
        $db=new DbOperation();

            $lk = (int)(substr($data,10,4));
            //  $db->SetError("Chiq",$lk);

            $mkdss = $db->GetHowmanyPlayers($lk);
            $uyinchilar=$db->Getuyinchilar($lk);

            $kartatarqatildi=$db->GetKartatarqatildi($lk);
            $index=substr($data,9,1);

            if(strpos($uyinchilar,(string)$index)!==false){
                $db->SetHowManyPlayers($mkdss-1,$lk);
                $db->SetUyinchilar(str_replace($index,"",$uyinchilar),$lk);
                $uyinchilar=str_replace($index,"",$uyinchilar);
                $db->SetOxirgiZapislar("",$lk,"OxirgiZapis".$index);

                for($i2=1;$i2<10;$i2++){
                    if(strpos($uyinchilar,(string)$i2)===false){
                        $db->DeleteMessages($i2,$lk);
                    }
                }

                $db->SetTimede($lk,"time".$index,"");
                $db->SetTimede2($lk,"time".$index,"");
            }

            //  $db->SetError("As ".$uyinchilar,$lk);
            if ($mkdss-1 == 0)
            {
                //    ObnovitQilish($lk);
            }
        $yurishkimmiki=$db->GetYurishKimmiki($lk);
            if (strpos($yurishkimmiki,$index)!==false)
            {
                //    print(YurishKimmiki[lk] + " " + GruppadagiAktivOdamlarSoni[lk]);
                if ($kartatarqatildi=="true")
                {
                    if (substr($yurishkimmiki,0,1) != $index)
                    {
                        $db->SetYurishKimmiki(str_replace($index,"" ,$yurishkimmiki),$lk);
                        $yurishkimmiki=str_replace($index,"" ,$yurishkimmiki);
                    }
                    else
                    {
                        for ($i = 0; $i < strlen($yurishkimmiki); $i++)
                        {
                            //1000000000350000000000050$^201020 a=1 b=13113
                            $a = substr($yurishkimmiki,0,1); $b = $yurishkimmiki;
                            //   print(a + " " + b);
                            if ($i + 2 == strlen($yurishkimmiki))
                            {
                                $db->SetYurishKimmiki(substr($b,1,1).substr($b,1,strlen($b)-1),$lk);
                                $yurishkimmiki=substr($b,1,1).substr($b,1,strlen($b)-1);
                                break;
                            }
                            else
                            {
                                if ($a ==substr($b,$i+1,1))
                                {
                                    $db->SetYurishKimmiki(substr($b,$i+2,1).substr($b,1,strlen($b)-1),$lk);
                                    $yurishkimmiki=substr($b,$i+2,1).substr($b,1,strlen($b)-1);
                                    break;
                                }
                            }
                        }
                        $db->SetYurishKimmiki(str_replace($index,"" ,$yurishkimmiki),$lk);
                        $yurishkimmiki=str_replace($index,"" ,$yurishkimmiki);
                    }
                }
                else
                {
                    $db->SetYurishKimmiki(str_replace($index,"" ,$yurishkimmiki),$lk);
                    $yurishkimmiki=str_replace($index,"" ,$yurishkimmiki);
                }
                if (strlen($yurishkimmiki) < 4)
                {
                    if (strlen($yurishkimmiki) == 2 && substr($yurishkimmiki,0,1) != substr($yurishkimmiki,1,1))
                    {
                        $db->SetHuy(2,$lk);
                    }else{
                        if($db->GetHuy($lk)>0){
                            $db->SetHuy($mkdss-1,$lk);
                        }
                    }
                }
                //%%NameByMe0001000000000500$000000000000000000000000001500xb0000000004
                //   print("Finally=" + YurishKimmiki[lk].Substring(0, 1) + " " + OxirgiZapisplar[lk, int.Parse(YurishKimmiki[lk].Substring(0, 1))]);
                if ($db->GetHuy($lk) == 1 && strlen($uyinchilar) > 1)
                {
                    $db->Sethu3(0,$lk);
                    // StartCoroutine(Pas(lk));
                }
                if (strlen($uyinchilar) < 2)
                {
                    $db->Sethu3(0,$lk);
                }
            }
            if (strlen($data) > 9)
            {
                $data = substr($data,0,10);
            }
            if (strlen($uyinchilar) > 0)
            {
                if($yurishkimmiki == ""){ $yurishkimmiki = "0"; }
                if (strpos($uyinchilar,$index)===false)
                {
                    $db->SEndMEssageToGroup($lk,$uyinchilar,$data .substr($yurishkimmiki,0,1) .str_pad($lk,4,"0",STR_PAD_LEFT));
                }
            }
            if (strlen($uyinchilar) < 2)
            {
                $db->Setgrop2help($lk,"true");
                $db->SetKartatarqatildi("false",$lk);
                $db->Sethu3(0,$lk);
            }

        return "Zo'r";
    }
}