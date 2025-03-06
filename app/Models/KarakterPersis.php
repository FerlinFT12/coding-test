<?php

namespace App\Models;

class KarakterPersis extends Karakter
{
    public function hitungPersentase($input_1, $input_2)
    {
        $jumlah_sesuai = 0;
        $input_1_Array = str_split(strtoupper($input_1));
        $total_karakter = count($input_1_Array);

        foreach ($input_1_Array as $char) {
            if (strpos(strtoupper($input_2), $char) !== false) {
                $jumlah_sesuai++;
            }
        }

        return $total_karakter > 0 ? ($jumlah_sesuai / $total_karakter) * 100 : 0;
    }
}
