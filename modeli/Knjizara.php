<?php


class Knjizara
{
    public $id;
    public $naziv;
    public $autor;
    public $cena;
    public $userId;

    public function __construct($id = null, $naziv = null, $autor = null, $cena = null, $userId = null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->autor = $autor;
        $this->cena = $cena;
        $this->userId = $userId;
    }

    public static function add(Knjizara $knjizara, mysqli $mysqli)
    {
        $query = "INSERT INTO knjizara(naziv,autor,cena,userId) VALUES ('$knjizara->naziv','$knjizara->autor','$knjizara->cena','$knjizara->userId')";
        return mysqli_query($mysqli, $query);
    }

    public static function getAll(mysqli $mysqli)
    {
        $query = "SELECT * FROM knjizara k JOIN user u ON k.userId = u.userId";
        return mysqli_query($mysqli, $query);
    }

    public static function deleteByRB($rb, mysqli $mysqli)
    {
        $query = "DELETE FROM knjizara WHERE id = $rb";
        return mysqli_query($mysqli, $query);
    }

    public static function update(Knjizara $knjizara, mysqli $mysqli)
    {
        $query = "UPDATE knjizara SET naziv = '$knjizara->naziv', autor = '$knjizara->autor', cena = '$knjizara->cena', userId = $knjizara->userId WHERE id = $knjizara->id";
        return mysqli_query($mysqli, $query);
    }

    public static function getOne($rb, mysqli $mysqli)
    {
        $query = "SELECT * FROM knjizara k JOIN user u ON k.userId = u.userId WHERE id = $rb";
        $rs = $mysqli->query($query);

        //ovo ovde mi ne radi
        while($red = $rs->fetch_object()){
            return $red;
        }

        return null;
    }


    public static function getAllSortedAndSearched($mysqli, $user, $sortiranje)
    {
        $query = "SELECT * FROM knjizara k JOIN user u ON k.userId = u.userId";

        if($user != 0){
            $query .= " WHERE k.userId = " . $user;
        }

        $query .= " ORDER BY k.cena " . $sortiranje;

        $rs =  $mysqli->query($query);

        $niz = [];

        while ($red = $rs->fetch_object()){
            $niz[] = $red;
        }

        return $niz;
    }
}

?>