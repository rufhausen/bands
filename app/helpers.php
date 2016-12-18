<?php

/**
 * @param $input
 */
function prepareDateInputforDb($input)
{
    return \Carbon\Carbon::parse($input)->format('Y-m-d H:i:s');
}
