<?php
require_once '../config/database.php';
include '../includes/header.php';

//query from table employees to get all employees
$sql_query = "SELECT * FROM employees";
$stmt = $pdo->query($sql_query);
if (!$stmt) {
    die("Query failed: " . $pdo->errorInfo()[2]);
}
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>


<main class="flex flex-col items-center min-h-screen p-4 gap-2">
    <h2>Welcome to the Employee Management System</h2>
    <p>Here you can manage employee records efficiently.</p>

    <div class="flex flex-col w-full">
        <div class="add-employee ml-auto">
            <a href="create.php" class="text-xs font-bold bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Employee</a>
        </div>
        <table class="mt-4 min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 px-4 py-2">Name</th>
                    <th class="w-1/3 px-4 py-2">Address</th>
                    <th class="w-1/3 px-4 py-2">Salary</th>
                    <th class="w-1/3 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td class="border-b text-center px-4 py-2">
                            <?= $employee['name'] ?>
                        </td>
                        <td class="border-b text-center px-4 py-2">
                            <?= $employee['address'] ?>
                        </td>
                        <td class="border-b text-center px-4 py-2">
                            <?= $employee['salary'] ?>
                        </td>
                        <td class="border-b text-center px-4 py-2 flex gap-4">
                            <a href="update.php?id=<?= $employee['id'] ?>" class="text-xs font-bold bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <a href="delete.php?id=<?= $employee['id'] ?>" class="text-xs font-bold bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../includes/footer.php' ?>