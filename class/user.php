<?php 


class user extends principal{
    protected $pk = "id";
    protected $table = "user";
    protected $champs = ["id", "nom", "email", "password"];




    public function verif($email, $password){
        $sql = "SELECT * FROM `{$this->table}` WHERE `email`=:email";
        $req = BDDselect($sql, [":email"=>$email]);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return false;
        }
        if(password_verify($password, $ligne["password"])){
            $this->setFromTab($ligne);
            return true;
        }else{
            return false;
        }

    }






}