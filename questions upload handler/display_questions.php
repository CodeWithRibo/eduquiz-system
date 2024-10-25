<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/login.php");
    exit;
}
?>

<?php
$selectedTable = "";


if (isset($_POST["table_select"])) {
    $selectedTable = $_POST["table_select"];
    $_SESSION["selectedTable"] = $selectedTable;
} elseif (isset($_SESSION["selectedTable"])) {
    $selectedTable = $_SESSION["selectedTable"];
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modern-table th,
        .modern-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .modern-table th {
            background-color: #f2f2f2;
        }

        .modern-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .modern-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .btn-link:hover {
            color: darkblue;
        }

        /* Style for editable cells */
        .editable {
            cursor: pointer;
            border-bottom: 1px dashed #ccc;
        }

        .update-btn,
        .delete-btn {
            padding: 8px 12px;
            margin-right: 5px;
            background-color: #0047ab; 
            color: #fff; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .update-btn:hover,
        .delete-btn:hover {
            background-color: #0058e1; 
        }
        .editable {
            cursor: pointer;
            border-bottom: 1px dashed #ccc;
        }
        .back-btn {
            padding: 8px 16px;
            background-color: #0047ab; 
            color: #fff; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back-btn:hover {
            background-color: #0058e1; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Display Questions</h1>

        <?php
        if (!empty($selectedTable)) {
            // Fetch questions from the selected table
            $query = "SELECT * FROM `$selectedTable`";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                echo '<div class="table-container">';
                echo '<table class="modern-table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Question</th>';
                echo '<th>Correct Answer</th>';
                echo '<th>Incorrect Answers</th>';
                echo '<th>Explanation</th>';
                echo '<th>Actions</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td class="editable" data-field="question" data-id="' . $row["id"] . '">' . $row["question"] . '</td>';
                    echo '<td class="editable" data-field="correct_answer" data-id="' . $row["id"] . '">' . $row["correct_answer"] . '</td>';
                    echo '<td class="editable" data-field="incorrect_answers" data-id="' . $row["id"] . '">' . $row["incorrect_answers"] . '</td>';
                    echo '<td class="editable" data-field="explanation" data-id="' . $row["id"] . '">' . $row["explanation"] . '</td>';
                    echo '<td>';
                    echo '<button class="update-btn">Update</button>'; // Update button
                    echo '<button class="delete-btn">Delete</button>'; // Delete button
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo "No questions found in the selected table.";
            }
        } else {
            echo "Please select a table from the Existing Questions page.";
        }

        $mysqli->close();
        ?>
        <button class="back-btn" onclick="window.location.href='existing questions.php'">Back to Existing Questions</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editable').on('click', function() {
                $(this).attr('contenteditable', true);
            });

            $('.update-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.find('td:eq(0)').text();
                var data = {
                    id: id,
                    table_name: '<?php echo $selectedTable; ?>' 
                };

                row.find('.editable[contenteditable=true]').each(function() {
                    var field = $(this).data('field');
                    var value = $(this).text();
                    data[field] = value;
                });


                $.post('update_question.php', data, function(response) {
                    alert(response); 
                });
            });


            $('.delete-btn').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.find('td:eq(0)').text();

                $.post('delete_question.php', {
                    id: id,
                    table_name: '<?php echo $selectedTable; ?>'
                }, function(response) {
                    alert(response); 
                    row.remove();
                });
            });
        });
    </script>
</body>
</html>
