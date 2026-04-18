<?php
namespace App\Services;

class OtpService
{
    /**
     * Generate numeric OTP
     */
    public function generateNumeric($length = 6)
    {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;

        return rand($min, $max);
    }

}