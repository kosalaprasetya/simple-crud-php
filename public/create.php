<?php
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];

    $sql_query = "INSERT INTO employees (name, address, salary) VALUES (:name, :address, :salary)";
    $stmt = $pdo->prepare($sql_query);
    $stmt->execute([
        'name' => $name,
        'address' => $address,
        'salary' => $salary
    ]);

    header("Location: index.php");
}
?>
<?php include '../includes/header.php' ?>
<div>
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold mb-4">Create New Employee</h1>
        <p class="mb-6">Fill in the details below to create a new employee record.</p>
    </div>
    <form action="create.php" method="POST" class="flex flex-col gap-2   w-full max-w-md mx-auto">
        <div class="return">
            <a href="index.php" class="text-xs font-bold bg-sky-600 text-white px-4 py-2 rounded hover:bg-blue-600 ">Return</a>
        </div>
        <div class="flex flex-col gap-2">
            <label for="name" class="text-sm text-gray-700">Name:</label>
            <input type="text" id="name" name="name" required class="border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 p-2">
        </div>

        <div class="flex flex-col gap-2">
            <label for="address" class="text-sm text-gray-700">address:</label>
            <input type="text" id="address" name="address" required class="border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 p-2">
        </div>

        <div class="flex flex-col gap-2">
            <label for="salary" class="text-sm text-gray-700">Salary:</label>
            <input type="text" id="salary" name="salary" required class="border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 p-2">
        </div>

        <input type="submit" value="Create Employee" class="mt-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hover:cursor-pointer">
    </form>
</div>
<?php include '../includes/footer.php' ?>