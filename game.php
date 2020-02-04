<?php
    require_once "header.php";    
?>
<div id="end">    
    <button id="reload">Reload</button>
    <button id="save">Save</button>
    <p id="endP"></p>
</div>

<img src="wait.gif" alt="Wait" id="wait">
<p id="name"></p>
<div id="results">
    <div id="rounds" class="card info">
        Rounds <?=$_POST['rounds']?>
    </div>
    <div id="result" class="card info">
        You
    </div>
    <div id="status" class="card info">
        win - 0 : loss - 0 : equal - 0
    </div>
</div>
<div id="gameTitle">
    <p class="card info">Opponent</p>            
    <p class="card info">Player</p>            
</div>
<div id="game">
    <div class="card info" id="opponent">
        X
    </div>
    <div class="card info" id="player">
        X
    </div>
</div>
<div id="cards">
    <div class="card button" id="rock">
        Rock
    </div>
    <div class="card button" id="paper">
        Paper
    </div>
    <div class="card button" id="scissor">
        Scissor
    </div>
</div>
<div id="chart">
    <?php require_once "chart.php"; ?>
</div>
<?php
    require_once "footer.php";
?>

<script>
    let user = "<?= $_POST['user']?>";
    let round = "<?= $_POST['rounds']?>";
    play(user, round);
</script>