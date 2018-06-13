<meta charset="UTF-8">
<title>Ověření Bank účtu</title>
<?php
function validateBankAccount($bankAccount) 


{
	if(isset($_POST["name"]))
	{
		if(!preg_match('/(([0-9]{0,6})-)?([0-9]{1,10})\/([0-9]{4,4})/', $bankAccount, $matches)) {
		return FALSE;
		}
		$first = sprintf("%06d", $matches[1]);
		$second = sprintf("%010d", $matches[3]);
		$bank = sprintf("%04d", $matches[4]);

		switch($bank) {
			case "3030":
			case "2030":
			case "2260":
			case "2220":
			case "8231":
			case "8250":
			case "2020":
			case "6300":
			case "8090":
			case "0710":
			case "0800":
			case "7960":
			case "4300":
			case "0300":
			case "2060":
			case "2600":
			case "6200":
			case "5000":
			case "2250":
			case "7910":
			case "8240":
			case "6100":
			case "2210":
			case "4000":
			case "2010":
			case "8150":
			case "2100":
			case "3500":
			case "5800":
			case "0100":
			case "6210":
			case "7990":
			case "0600":
			case "2070":
			case "8040":
			case "2200":
			case "2240":
			case "0300":
			case "6000":
			case "8200":
			case "7950":
			case "5500":
			case "8030":
			case "5400":
			case "8211":
			case "6800":
			case "8060":
			case "8241":
			case "2700":
			case "8221":
			case "6700":
			case "7940":
			case "3040":
			case "7970":
			case "7980":
			case "2310":
				break;
			default:
				return false;
				break;
		}

		$isOk = (10*$first[0] 
				+ 5*$first[1] 
				+ 8*$first[2] 
				+ 4*$first[3] 
				+ 2*$first[4] 
				+ 1*$first[5])
			% 11 == 0;

		if($isOk === FALSE) 
		{
			

			return FALSE;
		}


		$isOk = ( 6*$second[0] 
				+ 3*$second[1] 
				+ 7*$second[2] 
				+ 9*$second[3] 
				+10*$second[4] 
				+ 5*$second[5] 
				+ 8*$second[6] 
				+ 4*$second[7] 
				+ 2*$second[8] 
				+ 1*$second[9])
			% 11 == 0;

		if($isOk == FALSE) 
		{
			return FALSE;
		}

		return TRUE;
	}

}

if(isset($_POST["name"]))
echo validateBankAccount($_POST["name"]) ? "Číslo účtu je Validní!" : "!!!Číslo účtu není Validní!!!";

echo "<form method='post' class='jNice'>";
echo "Celé číslo účtu: <input type='text' name='name' size='25' placeholder='000000-0000000000/0000'>";
echo "<input type='submit' name='verify' value='Odeslat'>";
echo "</form>";
