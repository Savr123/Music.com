<?php
require 'Music.com/getID3-master/getid3/getid3.php';
// Copy remote file locally to scan with getID3()
$remotefilename = 'http://localhost/Music.com/audio/music/Alan%20Walker%20%E2%80%93%20Alan%20Walker.mp3';
if ($fp_remote = fopen($remotefilename, 'rb')) {
    $localtempfilename = tempnam('/tmp', 'getID3');
    if ($fp_local = fopen($localtempfilename, 'wb')) {
        while ($buffer = fread($fp_remote, 8192)) {
            fwrite($fp_local, $buffer);
        }
        fclose($fp_local);
        // Initialize getID3 engine
        $getID3 = new getID3;
        $ThisFileInfo = $getID3->analyze($localtempfilename);
        // Delete temporary file
        unlink($localtempfilename);
    }
    fclose($fp_remote);
}
