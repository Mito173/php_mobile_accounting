<?php

class KontenartController {

# Einsprungpunkt, hier übergibt das Framework
function invoke($action, $request, $user) {
    switch($action) {
        case "get":
            return $this->getKontenart($request['id']);
        case "list":
            return $this->getKontenarten();
        default:
            $message = array();
            $message['message'] = "Unbekannte Action";
            return $message;
    }
}

# Liest eines einzelne Kontenart aus und liefert
# sie als Objekt zurück
function getKontenart($id) {
    $db = getDbConnection();
    $rs = mysqli_query($db, "select * from fi_kontenart where kontenart_id = $id");
    $erg = mysqli_fetch_object($rs);
    mysqli_close($db); 
    return $erg;
}

# Erstellt eine Liste aller Kontenarten
function getKontenarten() {
    $db = getDbConnection();
    $result = array();
    $rs = mysqli_query($db, "select * from fi_kontenart");
    while($obj = mysqli_fetch_object($rs)) {
        $result[] = $obj;
    }
    mysqli_close($db);
    return $result;
}

}

?>