<!doctype html>
<html>
<head>
	<title>Intake Search</title>
	<link rel="stylesheet" type="text/css" href="../../styles/search.css">
</head>
<body>
    <div class="search-bar-wrap">
        <div class="search-bar">
            <h1 class="search-bar-text">
                Search Projects
            </h1>
            <div class="search-wrap">
                <form>
                    <input id="search" type="text">
                </form>
            </div>
        </div>
    </div>
    <?php
    	require 'connect.php';
    ?>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="../../scripts/search.js"></script>
	</body>
</html>