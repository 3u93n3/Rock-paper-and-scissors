<form action="game.php" method="POST" id="logForm">
    <div id="logRnd">
        <p>Rounds:</p>
        <select name="rounds" id="logRounds">
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>    
    <div id="uName">
        <p>Username:</p>
        <input type="text" name="user" id="user">
    </div>    
    <input type="submit" value="Login" id="loogSubmit">
</form>