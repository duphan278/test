<?php
class User extends BaseModel{
    function getAll(){
        $sql = "select * from users ";
        $stmt = $this -> pdo-> prepare($sql);
        $stmt -> execute();
        $userList = $stmt->fetchAll();
        return $userList;
    }
    
    function chitiet($id){
        $sql = "select * from users where ID=:ID";
        $stmt = $this -> pdo-> prepare($sql);
        $stmt -> execute([':ID'=>$id]);
        $userList = $stmt->fetch();
        return $userList;
    }
    
    function delete($id){
        $sql = "delete from users where ID=:ID";
        $stmt = $this -> pdo-> prepare($sql);
        $stmt -> execute([':ID'=>$id]);
    }
      function add($data){
        $sql = "INSERT INTO users (Name,Age,Avatar_url)
        values(:Name,:Age,:Avatar_url)";
        $stmt = $this -> pdo-> prepare($sql);
        $stmt->execute([
            ":Name"=>$data["Name"],
            ":Age"=>$data['Age'],
            "Avatar_url"=>$data['Avatar_url'],
        ]);
    }
    
}
?>