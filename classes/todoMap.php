<?php
class ToDoMap extends Config
{
    public function findToDoById($id)
    {
        $query = "SELECT user_todo.id as id, 
        user_todo.name as name, user_todo.description as description
        FROM user_todo WHERE user_todo.id = :id";
        $res = $this->db->prepare($query);
        $res->execute(['id' => $id]);
        return $res->fetch(PDO::FETCH_OBJ);
    }

    public function findToDoByUserId($id)
    {
        $query = "SELECT user_todo.id as id, CONCAT(user.lastname, ' ', user.name) as fio, 
        user_todo.name as name, user_todo.description as description, 
        user_todo.date_begin FROM user_todo 
        INNER JOIN user ON user_todo.user_id = user.id
        WHERE user_todo.user_id = :id";
        $res = $this->db->prepare($query);
        $res->execute(['id' => $id]);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteToDoById($id)
    {
        $query = "DELETE FROM user_todo WHERE user_todo.id = $id";
        $res = $this->db->prepare($query);
        if ($res->execute() == 1) {
            return true;
        }
    }

    public function addToDo(ToDo $todo)
    {
        $query = "INSERT INTO user_todo(user_id, name, description, date_begin) 
        VALUES (:user_id, :name, :description, NOW())";
        $res = $this->db->prepare($query);
        if (
            $res->execute([
                'user_id' => $todo->user_id,
                'name' => $todo->name,
                'description' => $todo->description,
            ]) == 1
        ) {
            return true;
        }
    }

    public function updateToDo(ToDo $todo)
    {
        $query = "UPDATE user_todo SET name = :name, description = :description WHERE id = $todo->id";
        $res = $this->db->prepare($query);
        if (
            $res->execute([
                'name' => $todo->name,
                'description' => $todo->description,
            ]) == 1
        ) {
            return true;
        }
        return false;
    }

}
?>