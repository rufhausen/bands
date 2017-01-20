<?php

/**
 * @param $input
 */
function prepareDateInputForDb($input)
{
    return \Carbon\Carbon::parse($input)->format('Y-m-d H:i:s');
}
