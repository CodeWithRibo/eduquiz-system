<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;

        }

        h1 {
            color: #0047ab; 
        }

        form {
            margin-bottom: 20px;
        }

        label {
            color: #0047ab;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #0047ab;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f8faff; 
            color: #0047ab; 
        }

        select:focus {
            outline: none;
            border-color: #0058e1;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #0047ab;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0058e1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #0047ab;
            padding: 8px;
            background-color: #f8faff; 
        }

        th {
            background-color: #0047ab; 
            color: #fff; 
        }

        th, td {
            text-align: left;
        }

        th, td, select, input[type="submit"] {
            font-size: 16px;
        }

        th, td, label {
            font-family: Arial, sans-serif;
        }

        .back-btn {
            padding: 8px 16px;
            background-color: #0047ab; 
            color: #fff; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .back-btn:hover {
            background-color: #0058e1;
        }
    </style>
</head>
<body>
    <h1>Existing Topics</h1>
    <form action="display_questions.php" method="post">
        <label for="table_select">Select Table:</label><br>
        <select id="table_select" name="table_select" required>
            <option value="" selected disabled>Select Table</option>
        </select><br><br>
        <input type="submit" value="Display Questions">
    </form>

    <div id="questionsTable"></div>

    <a href="Question Upload Page.php" class="back-btn">Back to Question Upload Page</a>

    <script>
        fetch('fetch_tables.php')
            .then(response => response.json())
            .then(data => {
                const tableSelect = document.getElementById('table_select');
                data.forEach(table => {
                    const option = document.createElement('option');
                    option.value = table;
                    option.textContent = table;
                    tableSelect.appendChild(option);
                });


                tableSelect.addEventListener('change', function() {
                    const selectedTable = this.value;
                    const updateButtons = document.querySelectorAll('.update-btn');
                    const deleteButtons = document.querySelectorAll('.delete-btn');

                    updateButtons.forEach(btn => {
                        btn.addEventListener('click', function() {z
                            const id = btn.dataset.id;
                            const question = btn.dataset.question;
                            const correctAnswer = btn.dataset.correctAnswer;
                            const incorrectAnswers = btn.dataset.incorrectAnswers;
                            const explanation = btn.dataset.explanation;


                        });
                    });

                    deleteButtons.forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = btn.dataset.id;


                        });
                    });
                });
            })
            .catch(error => console.error('Error fetching tables:', error));
    </script>
</body>
</html>
