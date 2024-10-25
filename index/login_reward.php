<?php
session_start();
include '../connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$checkRewardQuery = "SELECT points FROM users WHERE id = ? AND last_reward > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
$checkStmt = $mysqli->prepare($checkRewardQuery);
$checkStmt->bind_param("i", $user_id);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    header("Location: rewards_not_available.php");
    exit;
}
$points = rand(10, 50);

$getPointsQuery = "SELECT points FROM users WHERE id = ?";
$getPointsStmt = $mysqli->prepare($getPointsQuery);
$getPointsStmt->bind_param("i", $user_id);
$getPointsStmt->execute();
$getPointsStmt->bind_result($current_points);
$getPointsStmt->fetch();
$getPointsStmt->close();


$new_points = $current_points + $points;
$updatePointsQuery = "UPDATE users SET points = ?, last_reward = NOW() WHERE id = ?";
$updateStmt = $mysqli->prepare($updatePointsQuery);
$updateStmt->bind_param("ii", $new_points, $user_id);
$updateStmt->execute();
$updateStmt->close();


header("Location: reward_received.php?points=$points");
exit;
?>
