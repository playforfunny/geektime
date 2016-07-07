<?php 
include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/users">Управление Пользователями</a></li>
                        <li class="active">Редактировать Пользователя</li>
                    </ol>
                </div>


                <h4>Редактировать Пользователя "<?php echo $usersList['name']; ?>"</h4>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Имя</p>
                            <input type="text" name="name" placeholder="" value="<?php echo $usersList['name']; ?>">

                            <p>Email</p>
                            <input type="text" name="sort_order" placeholder="" value="<?php echo $usersList['email']; ?>">

                            <p>Статус</p>
                            
                            <input type="text" name="sort_order" placeholder="" value="<?php echo $usersList['role']; ?>">
                            </select>

                            <br><br>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>