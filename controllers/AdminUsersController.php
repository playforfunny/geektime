<?php
/**
 * Контроллер AdminUserController
 * Редактирование Пользователей в админпанели
 */

class AdminUsersController extends AdminBase
{

    /**
     * Action для страницы "Редактирование Пользователей"
     */

    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();
        
        // Получаем список Пользователей
        $usersList = Users::getUsersById();

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/index.php');
        return true;
    }

    /**
     * Action для страницы "Удаление Пользователей"
     */

    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем Пользователя
            Users::deleteUsersById($id);

            // Перенаправляем пользователя на страницу управлениями Пользователями
            header("Location: /admin/users");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/delete.php');
        return true;
    }

    /**
     * Action для страницы "Редактирование Пользователей(Изменение Данных)"
     */

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о пользователе
        $usersList = Users::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            // Сохраняем изменения
            Users::updateUsersById($id, $name, $email, $role);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/users");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/update.php');
        return true;
    }
    
}