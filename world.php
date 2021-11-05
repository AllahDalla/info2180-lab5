<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- <ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul> -->

<table>
	<tr>
		<th>NAME</th>
		<th>CONTINENT</th>
		<th>INDEPENDENCE</th>
		<th>HEAD OF STATE</th>
	</tr>
<?php foreach ($results as $row): ?>
	<tr>
		<td><?= $row['name'];?></td>
		<td><?= $row['continent'];?></td>
		<td><?= $row['independence_year'];?></td>
		<td><?= $row['head_of_state'];?></td>
	</tr>
<?php endforeach; ?>




</table>
