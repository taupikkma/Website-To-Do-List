<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas Baru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #2d3748;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h3 {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
        }

        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #4299e1;
            color: white;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 500;
        }

        input[type="text"],
        textarea,
        select,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus,
        select:focus,
        input[type="date"]:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .submit-btn {
            background-color: #4299e1;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #3182ce;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .nav-links {
                margin-top: 15px;
            }
            
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>Tambah Tugas Baru</h3>
            <div class="nav-links">
                <a href="index.php">Kembali ke Beranda</a>
            </div>
        </div>

        <div class="form-container">
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
                    <select id="task_priority" name="task_priority">
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                </div>

                <button type="submit" name="tambah" class="submit-btn">Tambah Tugas</button>
            </form>
        </div>
    </div>
</body>
</html>