<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление Пользователями</li>
                </ol>
            </div>


            <h4>Список Пользователей</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID Пользователя</th>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($usersList as $users): ?>
                    <tr>
                        <td><?php echo $users['id']; ?></td>
                        <td><?php echo $users['name']; ?></td>
                        <td><?php echo $users['email']; ?></td>
                        <td><?php echo $users['role']; ?></td>
                        <td><a href="/admin/users/update/<?php echo $users['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/users/delete/<?php echo $users['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
