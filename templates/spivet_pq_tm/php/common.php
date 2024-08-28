<?php

	require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	class Common
	{
 
		public static function  encrypt($string, $key = 'PrivateKey', $secret = 'SecretKey', $method = 'AES-256-CBC')
		{
			// hash
			$key = hash('sha256', $key);
			// create iv - encrypt method AES-256-CBC expects 16 bytes
			$iv = substr(hash('sha256', $secret), 0, 16);
			// encrypt
			$output = openssl_encrypt($string, $method, $key, 0, $iv);
			// encode
			return base64_encode($output);
		}

		public static function  decrypt($string, $key = 'PrivateKey', $secret = 'SecretKey', $method = 'AES-256-CBC')
		{
			// hash
			$key = hash('sha256', $key);
			// create iv - encrypt method AES-256-CBC expects 16 bytes
			$iv = substr(hash('sha256', $secret), 0, 16);
			// decode
			$string = base64_decode($string);
			// decrypt
			return openssl_decrypt($string, $method, $key, 0, $iv);
		}

		public static function date_to_string($date) {

			$day = date('d', strtotime($date));
			$month = date('m', strtotime($date));
			$year = date('Y', strtotime($date));


			if ($month == '01') {
				$month = 'enero';
			} else if ($month == '02') {
				$month = 'febrero';
			} else if ($month == '03') {
				$month = 'marzo';
			} else if ($month == '04') {
				$month = 'abril';
			} else if ($month == '05') {
				$month = 'mayo';
			} else if ($month == '06') {
				$month = 'junio';
			} else if ($month == '07') {
				$month = 'julio';
			} else if ($month == '08') {
				$month = 'agosto';
			} else if ($month == '09') {
				$month = 'septiembre';
			} else if ($month == '10') {
				$month = 'octubre';
			} else if ($month == '11') {
				$month = 'noviembre';
			} else if ($month == '12') {
				$month = 'diciembre';
			}


			$string_date = $day . ' de ' . $month . ' de ' . $year;

			return $string_date;
		}


		public static function week_day($date)
		{

			$diasem = date('w', strtotime($date));

			if ($diasem == 0) {
				$diasem = 'Domingo';
			} else if ($diasem == 1) {
				$diasem = 'Lunes';
			} else if ($diasem == 2) {
				$diasem = 'Martes';
			} else if ($diasem == 3) {
				$diasem = 'Miércoles';
			} else if ($diasem == 4) {
				$diasem = 'Juevos';
			} else if ($diasem == 5) {
				$diasem = 'Viernes';
			} else if ($diasem == 6) {
				$diasem = 'Sabado';
			}

			return $diasem;
		}


		public static function generatePDF($htmlPDF, $path, $orientation = "portrait", $setFooter = false, $textFooter = "")
		{

			// Instanciamos un objeto de la clase DOMPDF.
			$pdf = new DOMPDF();

			// Definimos el tamaño y orientación del papel que queremos.
			$pdf->set_paper("letter", $orientation);
			//$pdf->set_paper(array(0,0,104,250));
			// Cargamos el contenido HTML.
			$pdf->load_html($htmlPDF, 'UTF-8');
			// Renderizamos el documento PDF.
			$pdf->render();
			//$pdf->set_base_path('assets/css/style.css');

			if ($setFooter) {

				$canvas = $pdf->getCanvas();


				//la ruta es a partir del php que manda a llamar esta funcion
				$footerLogo = '../../../../images/logo_pq.png';
				$footerLogoWidth = 54.79;
				$footerLogoHeight = 40.92;
				//$canvas->image($imageFooterLogo, 680, 575, 54.79, 40.92);





				if ($orientation == "landscape") {
					//hoja horizontal

					$position_x = 750;
					$position_y = 590;

					$position_x_logo = 680;
					$position_y_logo = 575;
				} else if ($orientation == "portrait") {
					//hoja vertical

					//estas coordenadas son para hoja carta horizontal, verificar para vertical
					$position_x = 750;
					$position_y = 590;

					$position_x_logo = 680;
					$position_y_logo = 575;
				}

				// Configura el pie de página con el número de página
				$canvas->page_script('
								$font = $fontMetrics->get_font("Ubuntu", "bold");
							$pdf->text(' . $position_x . ', ' . $position_y . ', "$PAGE_NUM/$PAGE_COUNT", $font, 9, array(0,0,0));
							$pdf->image("' . $footerLogo . '", ' . $position_x_logo . ', ' . $position_y_logo . ', ' . $footerLogoWidth . ', ' . $footerLogoHeight . ');
						');







				if ($orientation == "landscape") {
					//hoja horizontal

					$position_x = 30;
					$position_y = 590;
				} else if ($orientation == "portrait") {
					//hoja vertical

					//estas coordenadas son para hoja carta horizontal, verificar para vertical
					$position_x = 30;
					$position_y = 590;
				}

				// Configura el pie de página con un texto
				$canvas->page_script('
								$font = $fontMetrics->get_font("Ubuntu", "bold");
							$pdf->text(' . $position_x . ', ' . $position_y . ', "' . $textFooter . '", $font, 9, array(0,0,0));
						');
			}


			$output = $pdf->output();
			//$nombrejunto=str_replace(' ','_',$nombre_user);
			file_put_contents($path, $output);
		}


		public static function postRequest($urlRequest, $arrayParameters)
		{

			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $urlRequest);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($arrayParameters));
			$response = curl_exec($curl);
			curl_close($curl);
			//var_dump($response);

			return $response;
		}


		public static function  barcode($filepath = "", $text = "0", $size = "20", $orientation = "horizontal", $code_type = "code128", $print = false, $SizeFactor = 1)
		{
			$code_string = "";
			// Translate the $text into barcode the correct $code_type
			if (in_array(strtolower($code_type), array("code128", "code128b"))) {
				$chksum = 104;
				// Must not change order of array elements as the checksum depends on the array's key to validate final code
				$code_array = array(" " => "212222", "!" => "222122", "\"" => "222221", "#" => "121223", "$" => "121322", "%" => "131222", "&" => "122213", "'" => "122312", "(" => "132212", ")" => "221213", "*" => "221312", "+" => "231212", "," => "112232", "-" => "122132", "." => "122231", "/" => "113222", "0" => "123122", "1" => "123221", "2" => "223211", "3" => "221132", "4" => "221231", "5" => "213212", "6" => "223112", "7" => "312131", "8" => "311222", "9" => "321122", ":" => "321221", ";" => "312212", "<" => "322112", "=" => "322211", ">" => "212123", "?" => "212321", "@" => "232121", "A" => "111323", "B" => "131123", "C" => "131321", "D" => "112313", "E" => "132113", "F" => "132311", "G" => "211313", "H" => "231113", "I" => "231311", "J" => "112133", "K" => "112331", "L" => "132131", "M" => "113123", "N" => "113321", "O" => "133121", "P" => "313121", "Q" => "211331", "R" => "231131", "S" => "213113", "T" => "213311", "U" => "213131", "V" => "311123", "W" => "311321", "X" => "331121", "Y" => "312113", "Z" => "312311", "[" => "332111", "\\" => "314111", "]" => "221411", "^" => "431111", "_" => "111224", "\`" => "111422", "a" => "121124", "b" => "121421", "c" => "141122", "d" => "141221", "e" => "112214", "f" => "112412", "g" => "122114", "h" => "122411", "i" => "142112", "j" => "142211", "k" => "241211", "l" => "221114", "m" => "413111", "n" => "241112", "o" => "134111", "p" => "111242", "q" => "121142", "r" => "121241", "s" => "114212", "t" => "124112", "u" => "124211", "v" => "411212", "w" => "421112", "x" => "421211", "y" => "212141", "z" => "214121", "{" => "412121", "|" => "111143", "}" => "111341", "~" => "131141", "DEL" => "114113", "FNC 3" => "114311", "FNC 2" => "411113", "SHIFT" => "411311", "CODE C" => "113141", "FNC 4" => "114131", "CODE A" => "311141", "FNC 1" => "411131", "Start A" => "211412", "Start B" => "211214", "Start C" => "211232", "Stop" => "2331112");
				$code_keys = array_keys($code_array);
				$code_values = array_flip($code_keys);
				for ($X = 1; $X <= strlen($text); $X++) {
					$activeKey = substr($text, ($X - 1), 1);
					$code_string .= $code_array[$activeKey];
					$chksum = ($chksum + ($code_values[$activeKey] * $X));
				}
				$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

				$code_string = "211214" . $code_string . "2331112";
			} elseif (strtolower($code_type) == "code128a") {
				$chksum = 103;
				$text = strtoupper($text); // Code 128A doesn't support lower case
				// Must not change order of array elements as the checksum depends on the array's key to validate final code
				$code_array = array(" " => "212222", "!" => "222122", "\"" => "222221", "#" => "121223", "$" => "121322", "%" => "131222", "&" => "122213", "'" => "122312", "(" => "132212", ")" => "221213", "*" => "221312", "+" => "231212", "," => "112232", "-" => "122132", "." => "122231", "/" => "113222", "0" => "123122", "1" => "123221", "2" => "223211", "3" => "221132", "4" => "221231", "5" => "213212", "6" => "223112", "7" => "312131", "8" => "311222", "9" => "321122", ":" => "321221", ";" => "312212", "<" => "322112", "=" => "322211", ">" => "212123", "?" => "212321", "@" => "232121", "A" => "111323", "B" => "131123", "C" => "131321", "D" => "112313", "E" => "132113", "F" => "132311", "G" => "211313", "H" => "231113", "I" => "231311", "J" => "112133", "K" => "112331", "L" => "132131", "M" => "113123", "N" => "113321", "O" => "133121", "P" => "313121", "Q" => "211331", "R" => "231131", "S" => "213113", "T" => "213311", "U" => "213131", "V" => "311123", "W" => "311321", "X" => "331121", "Y" => "312113", "Z" => "312311", "[" => "332111", "\\" => "314111", "]" => "221411", "^" => "431111", "_" => "111224", "NUL" => "111422", "SOH" => "121124", "STX" => "121421", "ETX" => "141122", "EOT" => "141221", "ENQ" => "112214", "ACK" => "112412", "BEL" => "122114", "BS" => "122411", "HT" => "142112", "LF" => "142211", "VT" => "241211", "FF" => "221114", "CR" => "413111", "SO" => "241112", "SI" => "134111", "DLE" => "111242", "DC1" => "121142", "DC2" => "121241", "DC3" => "114212", "DC4" => "124112", "NAK" => "124211", "SYN" => "411212", "ETB" => "421112", "CAN" => "421211", "EM" => "212141", "SUB" => "214121", "ESC" => "412121", "FS" => "111143", "GS" => "111341", "RS" => "131141", "US" => "114113", "FNC 3" => "114311", "FNC 2" => "411113", "SHIFT" => "411311", "CODE C" => "113141", "CODE B" => "114131", "FNC 4" => "311141", "FNC 1" => "411131", "Start A" => "211412", "Start B" => "211214", "Start C" => "211232", "Stop" => "2331112");
				$code_keys = array_keys($code_array);
				$code_values = array_flip($code_keys);
				for ($X = 1; $X <= strlen($text); $X++) {
					$activeKey = substr($text, ($X - 1), 1);
					$code_string .= $code_array[$activeKey];
					$chksum = ($chksum + ($code_values[$activeKey] * $X));
				}
				$code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

				$code_string = "211412" . $code_string . "2331112";
			} elseif (strtolower($code_type) == "code39") {
				$code_array = array("0" => "111221211", "1" => "211211112", "2" => "112211112", "3" => "212211111", "4" => "111221112", "5" => "211221111", "6" => "112221111", "7" => "111211212", "8" => "211211211", "9" => "112211211", "A" => "211112112", "B" => "112112112", "C" => "212112111", "D" => "111122112", "E" => "211122111", "F" => "112122111", "G" => "111112212", "H" => "211112211", "I" => "112112211", "J" => "111122211", "K" => "211111122", "L" => "112111122", "M" => "212111121", "N" => "111121122", "O" => "211121121", "P" => "112121121", "Q" => "111111222", "R" => "211111221", "S" => "112111221", "T" => "111121221", "U" => "221111112", "V" => "122111112", "W" => "222111111", "X" => "121121112", "Y" => "221121111", "Z" => "122121111", "-" => "121111212", "." => "221111211", " " => "122111211", "$" => "121212111", "/" => "121211121", "+" => "121112121", "%" => "111212121", "*" => "121121211");

				// Convert to uppercase
				$upper_text = strtoupper($text);

				for ($X = 1; $X <= strlen($upper_text); $X++) {
					$code_string .= $code_array[substr($upper_text, ($X - 1), 1)] . "1";
				}

				$code_string = "1211212111" . $code_string . "121121211";
			} elseif (strtolower($code_type) == "code25") {
				$code_array1 = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
				$code_array2 = array("3-1-1-1-3", "1-3-1-1-3", "3-3-1-1-1", "1-1-3-1-3", "3-1-3-1-1", "1-3-3-1-1", "1-1-1-3-3", "3-1-1-3-1", "1-3-1-3-1", "1-1-3-3-1");

				for ($X = 1; $X <= strlen($text); $X++) {
					for ($Y = 0; $Y < count($code_array1); $Y++) {
						if (substr($text, ($X - 1), 1) == $code_array1[$Y])
							$temp[$X] = $code_array2[$Y];
					}
				}

				for ($X = 1; $X <= strlen($text); $X += 2) {
					if (isset($temp[$X]) && isset($temp[($X + 1)])) {
						$temp1 = explode("-", $temp[$X]);
						$temp2 = explode("-", $temp[($X + 1)]);
						for ($Y = 0; $Y < count($temp1); $Y++)
							$code_string .= $temp1[$Y] . $temp2[$Y];
					}
				}

				$code_string = "1111" . $code_string . "311";
			} elseif (strtolower($code_type) == "codabar") {
				$code_array1 = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "$", ":", "/", ".", "+", "A", "B", "C", "D");
				$code_array2 = array("1111221", "1112112", "2211111", "1121121", "2111121", "1211112", "1211211", "1221111", "2112111", "1111122", "1112211", "1122111", "2111212", "2121112", "2121211", "1121212", "1122121", "1212112", "1112122", "1112221");

				// Convert to uppercase
				$upper_text = strtoupper($text);

				for ($X = 1; $X <= strlen($upper_text); $X++) {
					for ($Y = 0; $Y < count($code_array1); $Y++) {
						if (substr($upper_text, ($X - 1), 1) == $code_array1[$Y])
							$code_string .= $code_array2[$Y] . "1";
					}
				}
				$code_string = "11221211" . $code_string . "1122121";
			}

			// Pad the edges of the barcode
			$code_length = 20;
			if ($print) {
				$text_height = 30;
			} else {
				$text_height = 0;
			}

			for ($i = 1; $i <= strlen($code_string); $i++) {
				$code_length = $code_length + (int)(substr($code_string, ($i - 1), 1));
			}

			if (strtolower($orientation) == "horizontal") {
				$img_width = $code_length * $SizeFactor;
				$img_height = $size;
			} else {
				$img_width = $size;
				$img_height = $code_length * $SizeFactor;
			}

			$image = imagecreate($img_width, $img_height + $text_height);
			$black = imagecolorallocate($image, 0, 0, 0);
			$white = imagecolorallocate($image, 255, 255, 255);

			imagefill($image, 0, 0, $white);
			if ($print) {
				imagestring($image, 5, 31, $img_height, $text, $black);
			}

			$location = 10;
			for ($position = 1; $position <= strlen($code_string); $position++) {
				$cur_size = $location + (substr($code_string, ($position - 1), 1));
				if (strtolower($orientation) == "horizontal")
					imagefilledrectangle($image, $location * $SizeFactor, 0, $cur_size * $SizeFactor, $img_height, ($position % 2 == 0 ? $white : $black));
				else
					imagefilledrectangle($image, 0, $location * $SizeFactor, $img_width, $cur_size * $SizeFactor, ($position % 2 == 0 ? $white : $black));
				$location = $cur_size;
			}

			// Draw barcode to the screen or save in a file
			if ($filepath == "") {
				header('Content-type: image/png');
				imagepng($image);
				imagedestroy($image);
			} else {
				imagepng($image, $filepath);
				imagedestroy($image);
			}
		}

		public static function messageTest(){
			return "Hola os";
		}
	}
