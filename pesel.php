<form action="" method="post">
    Podaj numer PESEL: <input type="text" name="pesel"><br>
    <input type="submit" name="wyslij" value="Przekaż">
</form>

<?php 
class Pesel{

    private $pesel;

    public function __construct($pesel){
        $pesel;
        if(!is_numeric($pesel)){
            echo 'Podaj same liczby';
            return;
        }
        elseif(strlen($pesel)!=11){
            echo "Musi być 11 znaków";
            return;
        }
        else{
            $miesiacr=substr($pesel, 2, 2);
            $rokp=substr($pesel, 0, 2);
            if ($miesiacr>=1 && $miesiacr<=12) {
                $rok=1900+(int)$rokp;
            }
            elseif($miesiacr>=21 && $miesiacr<=32){
                $rok=2000+(int)$rokp;
            }
            else{
                exit("Błędny rok lub miesiąc");
            }

            $miesiacp=substr($pesel, 2, 2);
            if ($miesiacp>=1 && $miesiacp<=12) {
                $miesiac=$miesiacp;
            }
            elseif($miesiacp>=21 && $miesiacp<=32){
                $miesiac=(int)$miesiacp-20;
            }
            else{
                exit("Błędny miesiąc");
            }

            $dzien=substr($pesel, 4, 2);

            $plp=substr($pesel, -2, 1);
            if($plp%2===0){
                $lp="Kobieta";}
            else{
                $lp="Mężczyzna";
                }            
            }

        $Tab["dzien"]=$dzien;
        $Tab["miesiac"]=$miesiac;
        $Tab["rok"]=$rok;
        $Tab["plec"]=$lp;
        echo '<pre>';
        print_r($Tab);
        echo '</pre>';

        $rokobec=date("Y", time());
        $roknast=$rokobec+1;
        $nur=mktime(0,0,0,$miesiac,$dzien,$roknast);
        $dzis=time();
        $secp=$nur-$dzis;
        if($secp>525600){
            $sec=(int)$secp-527040;
        }
        else{
            $sec=$secp;
        }

        $minp=round($secp/60);
        if($minp>525600){
            $min=(int)$minp-527040;
        }
        else{
            $min=$minp;
        }

        $godzp=round($minp/60);
        if($godzp>8760){
            $godz=(int)$godzp-8784;
        }
        else{
            $godz=$godzp;
        }

        $dnip=round($godzp/24);
        if($dnip>365){
            $dni=(int)$dnip-366;
        }
        else{
            $dni=$dnip;
        }
        $godza=$dni*24;
        $mina=$godza*60;
        $seca=$mina*60;

        $licz="Do urodzin pozostało: {$dni} dni, czyli {$godza} godzin, czyli {$mina} minut, czyli {$seca} sekund.";


            $pierwsza=(substr(substr($pesel, 0, 1)*1, -1, 1));
            //echo "pierwsza: {$pierwsza}";
            $druga=(substr(substr($pesel, 1, 1)*3, -1, 1));
            //echo "<br>druga: {$druga}";
            $trzecia=(substr(substr($pesel, 2, 1)*7, -1, 1));
            //echo "<br>trzecia: {$trzecia}";
            $czwarta=(substr(substr($pesel, 3, 1)*9, -1, 1));
            //echo "<br>czwarta: {$czwarta}";
            $piata=(substr(substr($pesel, 4, 1)*1, -1, 1));
            //echo "<br>piata: {$piata}";
            $szosta=(substr(substr($pesel, 5, 1)*3, -1, 1));
            //echo "<br>szosta: {$szosta}";
            $siodma=(substr(substr($pesel, 6, 1)*7, -1, 1));
            //echo "<br>siodma: {$siodma}";
            $osma=(substr(substr($pesel, 7, 1)*9, -1, 1));
            //echo "<br>osma: {$osma}";
            $dziewiata=(substr(substr($pesel, 8, 1)*1, -1, 1));
            //echo "<br>dziewiata: {$dziewiata}";
            $dziesiata=(substr(substr($pesel, 9, 1)*3, -1, 1));
            //echo "<br>dziesiata: {$dziesiata}";
            $sumka=(int)$pierwsza+(int)$druga+(int)$trzecia+(int)$czwarta+(int)$piata+(int)$szosta+(int)$siodma+(int)$osma+(int)$dziewiata+(int)$dziesiata;
            //echo "<br>suma: {$sumka}<br>";
            $sum=10-substr($sumka, -1, 1);

        $dziens=date("l", mktime(0,0,0,$miesiac,$dzien,$rok));
        $miesiacs=date("F", mktime(0,0,0,$miesiac,$dzien,$rok));

        $dzienpol=array("Monday"=>"Poniedziałek", "Tuesday"=>"Wtorek", "Wednesday"=>"Środę", "Thursday"=>"Czwartek", "Friday"=>"Piątek", "Saturday"=>"Sobotę", "Sunday"=>"Niedzielę");
        $miesiacpol=array("January"=>"Stycznia", "February"=>"Lutego", "March"=>"Marca", "April"=>"Kwietnia", "May"=>"Maja", "June"=>"Czerwca", "July"=>"Lipca", "August"=>"Sierpnia", "September"=>"Września", "October"=>"Października", "November"=>"Listopada", "December"=>"Grudnia");

        if($lp==="Mężczyzna"){
        echo "<br>Mężczyzna urodzony w ".$dzienpol[$dziens]." ".$dzien."ego ".$miesiacpol[$miesiacs]." ".$rok." roku.<br> {$licz} ";
        }
        else{
        echo "<br>Kobieta urodzona w ".$dzienpol[$dziens]." ".$dzien."ego ".$miesiacpol[$miesiacs]." ".$rok." roku.<br> {$licz} ";
        }
        echo "<br>Suma kontrolna wynosi {$sum}";  
    }  
}
$numer = new Pesel($_POST['pesel']);
?>
