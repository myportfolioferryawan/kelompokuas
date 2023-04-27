<?php
	include 'database.php';

	// Mengambil parameter dari URL
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	// Query untuk mengambil konten halaman berdasarkan parameter
	$sql = "SELECT * FROM pages WHERE slug = '$page'";
	$result = mysqli_query($conn, $sql);

	// Menampilkan konten halaman jika ada
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$title = $row['title'];
		$content = $row['content'];
	} else {
		$title = "Halaman tidak ditemukan";
		$content = "Maaf, halaman yang anda cari tidak ditemukan.";
	}

	// Menampilkan halaman dengan menggunakan template header, konten, dan footer
	include 'header.php';
	echo "<section><h2>$title</h2><p>$content</p></section>";
	include 'footer.php';

	mysqli_close($conn);
?>