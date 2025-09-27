<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List Saya</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f8fafc;
            color: #475569;
            line-height: 1.6;
            padding: 30px;
            min-height: 100vh;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding: 25px 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(71, 85, 105, 0.1);
        }

        h2 {
            color: #6366f1;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        h2 span {
            font-weight: 800;
            color: #4f46e5;
        }

        h3 {
            color: #6366f1;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
        }

        .nav-links a {
            text-decoration: none;
            color: #64748b;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-left: 15px;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .main-content {
            display: flex;
            gap: 30px;
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #fefefe 0%, #f8fafc 100%);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(71, 85, 105, 0.1);
        }

        .right-panel {
            flex: 2;
            background: linear-gradient(135deg, #fefefe 0%, #f8fafc 100%);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(71, 85, 105, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #64748b;
            font-weight: 500;
            font-size: 16px;
        }

        input[type="text"],
        textarea,
        select,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 400;
            background-color: #ffffff;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: #6366f1;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .submit-btn:hover {
            background: #4f46e5;
        }

        .filter-nav {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 15px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border-radius: 10px;
        }

        .filter-nav a {
            text-decoration: none;
            color: #64748b;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(71, 85, 105, 0.08);
            font-weight: 500;
        }

        .filter-nav a:hover {
            background: #6366f1;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 16px;
            margin-top: 20px;
        }

        th {
            background: #6366f1;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 500;
            font-size: 16px;
        }

        th:last-child {
            text-align: center;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        td:last-child {
            text-align: center;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .completed td:not(:last-child) {
            text-decoration: line-through;
            color: #a0aec0;
        }

        .checkbox-status {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .action-links {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .action-links a {
            text-decoration: none;
            color: #64748b;
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-size: 14px;
            background: #f8fafc;
        }

        .action-links a:hover {
            background: #6366f1;
            color: white;
        }

        .priority-high {
            color: #f87171;
            font-weight: 500;
        }

        .priority-medium {
            color: #fbbf24;
            font-weight: 500;
        }

        .priority-low {
            color: #34d399;
            font-weight: 500;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info span {
            color: #64748b;
            font-size: 16px;
        }

        .logout-btn {
            text-decoration: none;
            color: #f87171;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 16px;
            background-color: transparent;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-block;
            cursor: pointer;
            border: none;
            margin: 0;
        }

        .logout-btn:hover {
            background: #f87171;
            color: white;
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .nav-links {
                margin-top: 15px;
            }
            
            .nav-links a {
                display: inline-block;
                margin: 5px;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
        }

        .footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            color: #64748b;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer a {
            color: #6366f1;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer a:hover {
            color: #4f46e5;
        }


        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
            padding: 20px;
            background: linear-gradient(135deg, #fefefe 0%, #f8fafc 100%);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(71, 85, 105, 0.1);
        }

        .dashboard-card {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #475569;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(71, 85, 105, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(71, 85, 105, 0.15);
        }

        .dashboard-card.active {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .dashboard-card.completed {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #166534;
        }

        .dashboard-card.overdue {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .dashboard-card.all {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            color: #374151;
        }

        .dashboard-card h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .dashboard-card .number {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .dashboard-card .label {
            font-size: 14px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><span> Halo <?php echo htmlspecialchars($_SESSION['username']); ?>!</span></h1>
            <div class="nav-links">
                <div class="user-info">
                    <a href="logout.php" style="text-decoration: none;">
                        <h4 class="logout-btn">Logout</h4>
                    </a>
                </div>
            </div>
        </div>

        <?php
        // Query untuk menghitung statistik dashboard
        include('koneksi.php');
        $user_id = $_SESSION['user_id'];
        
        // Tugas aktif
        $query_active = "SELECT COUNT(*) as count FROM tasks WHERE user_id = $user_id AND is_completed = FALSE";
        $result_active = mysqli_query($koneksi, $query_active);
        $active_count = mysqli_fetch_assoc($result_active)['count'];
        
        // Tugas selesai
        $query_completed = "SELECT COUNT(*) as count FROM tasks WHERE user_id = $user_id AND is_completed = TRUE";
        $result_completed = mysqli_query($koneksi, $query_completed);
        $completed_count = mysqli_fetch_assoc($result_completed)['count'];
        
        // Tugas lewat waktu
        $query_overdue = "SELECT COUNT(*) as count FROM tasks WHERE user_id = $user_id AND is_completed = FALSE AND task_deadline < CURDATE() AND task_deadline IS NOT NULL";
        $result_overdue = mysqli_query($koneksi, $query_overdue);
        $overdue_count = mysqli_fetch_assoc($result_overdue)['count'];
        
        // Total tugas (untuk menghitung yang dihapus - ini adalah contoh, karena tabel tasks tidak menyimpan data yang dihapus)
        $query_total = "SELECT COUNT(*) as count FROM tasks WHERE user_id = $user_id";
        $result_total = mysqli_query($koneksi, $query_total);
        $total_count = mysqli_fetch_assoc($result_total)['count'];
        ?>

        <div class="dashboard">
            <div class="dashboard-card active">
                <h4>Tugas Aktif</h4>
                <div class="number"><?php echo $active_count; ?></div>
                <div class="label">Tugas yang sedang dikerjakan</div>
            </div>
            
            <div class="dashboard-card completed">
                <h4>Tugas Selesai</h4>
                <div class="number"><?php echo $completed_count; ?></div>
                <div class="label">Tugas yang sudah diselesaikan</div>
            </div>
            
            <div class="dashboard-card overdue">
                <h4>Tugas Lewat Waktu</h4>
                <div class="number"><?php echo $overdue_count; ?></div>
                <div class="label">Tugas yang sudah lewat deadline</div>
            </div>
            
            <div class="dashboard-card all">
                <h4>Total Tugas</h4>
                <div class="number"><?php echo $total_count; ?></div>
                <div class="label">Semua tugas yang ada</div>
            </div>
        </div>

        <div class="main-content">
            <div class="left-panel">
                <h3>Tambah Tugas Baru</h3>
                <form action="tambah_proses.php" method="post">
                    <div class="form-group">
                        <label for="task_title">Tugas</label>
                        <input type="text" id="task_title" name="task_title" required>
                    </div>

                    <div class="form-group">
                        <label for="task_description">Catetan</label>
                        <textarea id="task_description" name="task_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="task_deadline">Deadline</label>
                        <input type="date" id="task_deadline" name="task_deadline">
                    </div>

                    <div class="form-group">
                        <label for="task_priority">Prioritas</label>
                           <select id="task_priority" name="task_priority" required>
                           <option value="Rendah">Rendah</option>
                           <option value="Sedang">Sedang</option>
                           <option value="Tinggi">Tinggi</option>
                        </select>
                    </div>

                    <button type="submit" name="tambah" class="submit-btn">Tambah Tugas</button>
                </form>
            </div>

            <div class="right-panel">
                <div class="filter-nav">
                    <a href="index.php">Semua</a>
                    <a href="index.php?filter=active">Aktif</a>
                    <a href="index.php?filter=completed">Selesai</a>
                </div>

                <table>
                    <tr>
                        <th>Status</th>
                        <th>Tugas</th>
                        <th>Catetan</th>
                        <th>Deadline</th>
                        <th>Prioritas</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    include('koneksi.php');

                    $user_id = $_SESSION['user_id'];
                    $filter_condition = " WHERE user_id = $user_id";
                    
                    if (isset($_GET['filter'])) {
                        if ($_GET['filter'] == 'active') {
                            $filter_condition .= " AND is_completed = FALSE";
                        } elseif ($_GET['filter'] == 'completed') {
                            $filter_condition .= " AND is_completed = TRUE";
                        }
                    }

                    $query_string = "SELECT * FROM tasks" . $filter_condition . " ORDER BY created_at DESC";
                    $query = mysqli_query($koneksi, $query_string) or die(mysqli_error($koneksi));

                    if (mysqli_num_rows($query) == 0) {
                        echo '<tr><td colspan="6" style="text-align: center; padding: 20px;">Tidak ada tugas!</td></tr>';
                    } else {
                        while ($data = mysqli_fetch_assoc($query)) {
                            $priority_class = '';
                            switch($data['task_priority']) {
                                case 'Rendah':
                                    $priority_class = 'priority-low';
                                    break;
                                case 'Sedang':
                                    $priority_class = 'priority-medium';
                                    break;
                                case 'Tinggi':
                                    $priority_class = 'priority-high';
                                    break;
                            }
                            
                            echo '<tr class="' . ($data['is_completed'] ? 'completed' : '') . '">';
                            echo '<td>
                                    <form action="update.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="task_id" value="' . $data['task_id'] . '">
                                        <input type="checkbox" name="is_completed" class="checkbox-status" ' . ($data['is_completed'] ? 'checked' : '') . ' onchange="this.form.submit()">
                                    </form>
                                  </td>';
                            echo '<td>' . htmlspecialchars($data['task_title']) . '</td>';
                            echo '<td>' . nl2br(htmlspecialchars($data['task_description'])) . '</td>';
                            echo '<td>' . ($data['task_deadline'] ? htmlspecialchars($data['task_deadline']) : '-') . '</td>';
                            echo '<td class="' . $priority_class . '">' . htmlspecialchars($data['task_priority']) . '</td>';
                            echo '<td class="action-links">
                                    <a href="edit.php?id=' . $data['task_id'] . '">Edit</a>
                                    <a href="hapus.php?id=' . $data['task_id'] . '">Hapus</a>
                                  </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Coppyright To-Do List.</p></p>
        <p>Dikembangkan oleh <a href>adtyusf</a></p>
    </footer>
</body>
</html>