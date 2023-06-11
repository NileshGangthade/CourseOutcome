<!DOCTYPE html>
<html>

<head>
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>

<body>
    <?= view('nav_bar') ?>
    <div class="allt">
        <h1>Welcome to the Admin dashboard</h1>

        <h2>Waiting for Approval</h2>
        <div class="container">
            <table class="display" id="waitingTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Department</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($waitingUsers as $user) : ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['user_type']; ?></td>
                            <td><?php echo $user['department']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <button onclick="handleAction('approve', <?php echo $user['id']; ?>)">Approve</button>
                                <button onclick="handleAction('reject', <?php echo $user['id']; ?>)">Reject</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h2>Approved List</h2>
        <div class="container">
            <table class="display" id="approvalTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Department</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($approvedUsers as $user) : ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['user_type']; ?></td>
                            <td><?php echo $user['department']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <button onclick="handleAction('delete', <?php echo $user['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <script>
        function handleAction(action, id) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin_dashboard/handle_approval'); ?>',
                data: {
                    action: action,
                    id: id,
                },
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                },
            });
        }

        $(document).ready(function() {
            $('#waitingTable, #approvalTable').DataTable();
        });
    </script>
</body>

</html>