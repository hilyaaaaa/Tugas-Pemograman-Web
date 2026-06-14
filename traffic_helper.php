<?php

function hitungStatusKemacetan($jumlah)
{
    if($jumlah <= 20)
    {
        return "Lancar";
    }
    elseif($jumlah <= 50)
    {
        return "Padat";
    }
    else
    {
        return "Macet";
    }
}