<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Data dummy untuk fungsi READ
$projects = [
    ['id' => 1, 'name' => 'Project Kolaborasi Tim A', 'status' => 'Active', 'created' => '2026-03-18'],
    ['id' => 2, 'name' => 'Desain UI Kolaborasa v2', 'status' => 'Completed', 'created' => '2026-03-15'],
    ['id' => 3, 'name' => 'Backend API Development', 'status' => 'In Progress', 'created' => '2026-03-20']
];

// Fungsi CREATE sederhana
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_project'])) {
    $new_project = [
        'id' => count($projects) + 1,
        'name' => trim($_POST['project_name']),
        'status' => 'Active',
        'created' => date('Y-m-d')
    ];
    $projects[] = $new_project;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolaborasa - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#" class="logo-text">Kolaborasa</a>
        </div>
        <div class="nav-links">
            <span>Selamat datang, <?php echo htmlspecialchars($user['name']); ?>!</span>
            <a href="login.php?logout=1" class="btn-logout">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Dashboard Proyek</h1>
            <p>Kelola proyek kolaborasi tim Anda</p>
        </div>

        <!-- Form CREATE -->
        <div class="create-section">
            <h3>Tambah Proyek Baru</h3>
            <form method="POST" class="create-form">
                <input type="text" name="project_name" placeholder="Nama proyek baru" required>
                <button type="submit" name="create_project" class="btn-create">Buat Proyek</button>
            </form>
        </div>

        <!-- Tabel READ -->
        <div class="projects-table">
            <h3>Daftar Proyek (<?php echo count($projects); ?>)</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Proyek</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?php echo $project['id']; ?></td>
                        <td><?php echo htmlspecialchars($project['name']); ?></td>
                        <td>
                            <span class="status <?php echo $project['status'] === 'Active' ? 'active' : 'completed'; ?>">
                                <?php echo $project['status']; ?>
                            </span>
                        </td>
                        <td><?php echo $project['created']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
