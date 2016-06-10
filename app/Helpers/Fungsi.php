<?php 
namespace App\Helpers;



class Fungsi{

    public function rupiah($nilaiUang){
      $nilaiRupiah  = "";
      $jumlahAngka  = strlen($nilaiUang);
      while($jumlahAngka > 3){
        $nilaiRupiah = "." . substr($nilaiUang,-3) . $nilaiRupiah;
        $sisaNilai = strlen($nilaiUang) - 3;
        $nilaiUang = substr($nilaiUang,0,$sisaNilai);
        $jumlahAngka = strlen($nilaiUang);
      }

      $nilaiRupiah = "Rp " . $nilaiUang . $nilaiRupiah . ",-";
      return $nilaiRupiah;
    }





    public function bulan2($rrr)
    {
        if ($rrr == '1' || $rrr == '01') {
            $ttt = 'Januari';
        }
        if ($rrr == '2' || $rrr == '02') {
            $ttt = 'Februari';
        }
        if ($rrr == '3' || $rrr == '03') {
            $ttt = 'Maret';
        }
        if ($rrr == '4' || $rrr == '04') {
            $ttt = 'April';
        }
        if ($rrr == '5' || $rrr == '05') {
            $ttt = 'Mei';
        }
        if ($rrr == '6' || $rrr == '06') {
            $ttt = 'Juni';
        }
        if ($rrr == '7' || $rrr == '07') {
            $ttt = 'Juli';
        }
        if ($rrr == '8' || $rrr == '08') {
            $ttt = 'Agustus';
        }
        if ($rrr == '9' || $rrr == '09') {
            $ttt = 'September';
        }
        if ($rrr == '10') {
            $ttt = 'Oktober';
        }
        if ($rrr == '11') {
            $ttt = 'November';
        }
        if ($rrr == '12') {
            $ttt = 'Desember';
        }

        return $ttt;
    }

    public function date_to_tgl($in)
    {
        $tgl = substr($in, 8, 2);
        $bln = substr($in, 5, 2);
        $thn = substr($in, 0, 4);
        if (checkdate($bln, $tgl, $thn)) {
            $out = substr($in, 8, 2).' '.$this->bulan2(substr($in, 5, 2)).' '.substr($in, 0, 4);
        } else {
            $out = "<span class='error'>N/A</span>";
        }

        return $out;
    }


    public function size($bytes){
            if ($bytes >= 1073741824)
            {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            }
            elseif ($bytes >= 1048576)
            {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            }
            elseif ($bytes >= 1024)
            {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            }
            elseif ($bytes > 1)
            {
                $bytes = $bytes . ' bytes';
            }
            elseif ($bytes == 1)
            {
                $bytes = $bytes . ' byte';
            }
            else
            {
                $bytes = '0 bytes';
            }

            return $bytes;
    }

    public function prettyPrintJson( $json ){
            $result = '';
            $level = 0;
            $in_quotes = false;
            $in_escape = false;
            $ends_line_level = NULL;
            $json_length = strlen( $json );

            for( $i = 0; $i < $json_length; $i++ ) {
                $char = $json[$i];
                $new_line_level = NULL;
                $post = "";
                if( $ends_line_level !== NULL ) {
                    $new_line_level = $ends_line_level;
                    $ends_line_level = NULL;
                }
                if ( $in_escape ) {
                    $in_escape = false;
                } else if( $char === '"' ) {
                    $in_quotes = !$in_quotes;
                } else if( ! $in_quotes ) {
                    switch( $char ) {
                        case '}': case ']':
                            $level--;
                            $ends_line_level = NULL;
                            $new_line_level = $level;
                            break;

                        case '{': case '[':
                            $level++;
                        case ',':
                            $ends_line_level = $level;
                            break;

                        case ':':
                            $post = " ";
                            break;

                        case " ": case "&ensp;&ensp;&ensp;&ensp;&ensp;": case "<br>": case "\r":
                            $char = "";
                            $ends_line_level = $new_line_level;
                            $new_line_level = NULL;
                            break;
                    }
                } else if ( $char === '\\' ) {
                    $in_escape = true;
                }
                if( $new_line_level !== NULL ) {
                    $result .= "<br>".str_repeat( "&ensp;&ensp;&ensp;&ensp;&ensp;", $new_line_level );
                }
                $result .= $char.$post;
            }

            $result = str_replace('null', '<span style="font-weight:bold;" class="text-danger">null</span>', $result);

            return $result;
        }


    /**
     * berfungsi seperti str_replace()
     * @param  [text] $string [text yg hendak dirubah]
     * @param  array  $data     [data yg berupa array]
     * @return [text]           [berupa string yg telah ter-replace dgn key dari array]
     */
    public function parse_variable($string, array $data) {
        $placeholders = array_keys($data);
        foreach ($placeholders as &$placeholder) {
            $placeholder = strtolower("{{$placeholder}}");
        }
        return str_replace($placeholders, array_values($data), $string);
    }

}