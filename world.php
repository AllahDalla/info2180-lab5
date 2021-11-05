<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
// $country = $_GET['country'];
$context = $_GET['context'];
$filtered_input = filter_input(INPUT_GET, "country", FILTER_SANITIZE_ENCODED);


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if ($context == "cities"){
	$stmt = $conn->query("SELECT countries.name, cities.name, cities.district, cities.population
							FROM countries
							JOIN cities
							ON countries.code=cities.country_code
							WHERE countries.name LIKE '%$filtered_input%';");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>
	<table>
		<tr>
			<th>NAME</th>
			<th>DISTRICT</th>
			<th>POPULATION</th>
		</tr>
	<?php foreach ($results as $row): ?>
		<tr>
			<td><?= $row['name'];?></td>
			<td><?= $row['district'];?></td>
			<td><?= $row['population'];?></td>
		</tr>
	<?php endforeach; ?>

	<?php 

}else {
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$filtered_input%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>


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
	<?php 
}


?>


