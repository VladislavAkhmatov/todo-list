<?php
class UserMap extends Config
{
    public function selectAll()
    {
        $query = "SELECT user.id as id, user.lastname as lastname, user.name as name, user.login as login, user.password as password, 
        role.system_name as sys_name, role.name as roleName FROM user
        INNER JOIN role ON role.role_id = user.role_id";
        $res = $this->db->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function auth($login, $password)
    {
        $query = "SELECT user.id, CONCAT(user.lastname, ' ', user.name) as name, user.login as login, 
        user.password as password, role.system_name as sys_name, role.name as roleName
        FROM user
        INNER JOIN role ON role.role_id = user.role_id
        WHERE login = :login";
        $res = $this->db->prepare($query);
        $res->execute([
            'login' => $login,
        ]);
        $user = $res->fetch(PDO::FETCH_OBJ);
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return null;
    }

    public function saveUser(User $user)
    {
        $query = "INSERT INTO `user` (`lastname`, `name`, `role_id`, `login`, `password`) VALUES (:lastname, :name, :role_id, :login, :password)";
        $res = $this->db->prepare($query);
        if (
            $res->execute([
                ':lastname' => $user->lastname,
                ':name' => $user->name,
                ':role_id' => 2,
                ':login' => $user->login,
                ':password' => $user->password
            ]) == 1
        )
            return true;
        return false;
    }


    public function findUserByEmail(User $user)
    {
        $query = "SELECT user.login as login FROM user WHERE login = :login";
        $res = $this->db->prepare($query);
        $res->execute(['login' => $user->login]);
        $login = $res->fetch(PDO::FETCH_OBJ);
        if ($login) {
            return true;
        }
        return false;
    }

    public function findUserByEmailAndId(User $user)
    {
        $query = "SELECT user.id as id, user.login as login FROM user WHERE login = :login and id = :id";
        $res = $this->db->prepare($query);
        $res->execute([
            'login' => $user->login,
            'id' => $user->id
        ]);
        $login = $res->fetch(PDO::FETCH_OBJ);
        if ($login) {
            return true;
        }
        return false;
    }

    public function findUserById($id)
    {
        $query = "SELECT user.id as id, user.lastname as lastname, user.name as name, user.login as login, user.password as password,
        role.name as roleName FROM user
        INNER JOIN role ON role.role_id = user.role_id
        WHERE id = :id";
        $res = $this->db->prepare($query);
        $res->execute(['id' => $id]);
        return $res->fetch(PDO::FETCH_OBJ);
    }


    public function updateUser(User $user)
    {
        $query = "UPDATE user SET lastname = :lastname, name = :name, login = :login, role_id = :role_id, 
        password = :password WHERE user.id = :id";
        $res = $this->db->prepare($query);
        if (
            $res->execute([
                'id' => $user->id,
                'lastname' => $user->lastname,
                'name' => $user->name,
                'role_id' => $user->role_id,
                'login' => $user->login,
                'password' => $user->password
            ]) == 1
        ) {
            return true;
        }
        return false;
    }

    public function arrRoles()
    {
        $query = "SELECT role.role_id as id, role.name as value FROM role";
        $res = $this->db->prepare($query);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>