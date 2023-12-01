<?php
class ToDoMap extends Config
{
    public function findToDoById($id)
    {
        $query = "SELECT user_todo.id as id, CONCAT(user.lastname, ' ', user.name) as fio, 
        user_todo.name as name, user_todo.description as description, 
        user_todo.date_begin FROM user_todo 
        INNER JOIN user ON user_todo.user_id = user.id
        WHERE user_todo.user_id = $id";

        $res = $this->db->prepare($query);
        $res->execute();
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
}
?>