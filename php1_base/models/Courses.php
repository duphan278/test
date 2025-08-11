<?php
class Courses extends BaseModel{
    function getAll(){
        $sql="SELECT courses.*, instructor.name as instructorName
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $courses= $stmt->fetchAll();
        return $courses;
    }
    function get($id){
        $sql="SELECT courses.*, instructor.name as instructorName
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        WHERE courses.id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $courses= $stmt->fetch();
        return $courses;
    }
    function delete($id){
        $sql="DELETE FROM `courses`
        WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->rowCount();
    }
    function add($data){
        $sql="INSERT INTO `courses`( `name`, `thumbnail`, `instructor_id`, `description`, `price`, `address`) VALUES (:name, :thumbnail, :instructor_id, :description, :price, :address)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    function update($data){
        $sql="UPDATE `courses` SET `name`=:name,`thumbnail`=:thumbnail ,`instructor_id`=:instructor_id ,`description`=:description,`price`=:price,`address`=:address 
        WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
    function search($keyword){
        $key="%$keyword%";
        $sql="SELECT courses.*, instructor.name as instructorName
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        WHERE courses.name LIKE :keyword OR CAST(courses.price AS char) LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword'=>$key]);
        $courses= $stmt->fetchAll();
        return $courses;
    }
}
?>