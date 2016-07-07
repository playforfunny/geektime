<?php

/**
 * Класс Users - модель для работы с Пользователями
 */

class Users {


    /**
     * Получаем список пользователей
     * @return array
     */
    public static function getUsersById()
    {


        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT * FROM user '
            . 'ORDER BY id DESC');
        $usersList = array();
        $i = 0;
       while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['name'] = $row['name'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['role'] = $row['role'];
            $i++;
        }
       return $usersList;
    }

    /**
     * Удаление пользователя
     * @param $id
     * @return bool
     */

    public static function deleteUsersById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Изменение данных о пользователе
     * @param $id
     * @param $name
     * @param $email
     * @param $role
     * @return bool
     */
    
    public static function updateUsersById($id, $name, $email, $role)
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE user
            SET 
                name = :name, 
                email = :email, 
                role = :role
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Получаем пользователя по id
     * @param $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);


        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }
    
}

