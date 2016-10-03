<!doctype html>
<html>
<head>
	<title>Intake Search</title>
	<link rel="stylesheet" type="text/css" href="../../styles/search.css">
    <link rel="stylesheet" type="text/css" href="../../metaphor-master/dist/css/metaphor.css">
</head>
<body>
    <?php
        require '../../includes/header.php';
    ?>
    <div class="search-bar-wrap">
        <div class="search-bar">
            <h1 class="search-bar-text">
                Search Projects
            </h1>
            <div class="search-wrap">
                <form>
                    <input id="search" type="text" action="none">
                </form>
            </div>
        </div>
        <div class="add-project-wrap">
            <div class="add-project">
                <a href="../postproject/">Add a project</a>
            </div>
        </div>
    </div>
    <div id="content-wrapper">
        <div id="search-results-wrapper">
            <div id="search-results">
                <?php
    	           require 'connect.php';
                ?>
            </div>
        </div>
        <div id="buttons-wrapper">
            <?php
                require 'buttons.php';
            ?>
        </div>
    </div>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="../../scripts/search.js"></script>
    <script src="../../metaphor-master/dist/js/metaphor.js"></script>
	</body>
</html>