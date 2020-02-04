let play = (user, round) => {
    let resultData = {
        name: user,
        win: 0,
        loss: 0,
        equal: 0,
        rounds: Number(round),
        result: ''
    };    
    
    let opponent = document.querySelector("#opponent");
    let player = document.querySelector("#player");
    let rock = document.querySelector("#rock");
    let paper = document.querySelector("#paper");
    let scissor = document.querySelector("#scissor");
    let result = document.querySelector("#result");
    let status = document.querySelector("#status");
    let rounds = document.querySelector("#rounds");
    let wait = document.querySelector("#wait");
    let name = document.querySelector("#name");
    let end = document.querySelector("#end");
    let endP = document.querySelector("#endP");
    let reload = document.querySelector("#reload");
    let save = document.querySelector("#save");

    name.textContent = `Hello ${resultData.name}`;
    
    function rnd(){    
        return ['Rock', 'Paper', 'Scissor'][Math.floor(Math.random() * 3)];
    }
    
    function game(opponent, player){
        switch(opponent + player){
            case 'RockPaper':
                resultData.win++;
                resultData.result = "WIN";
                resultData.rounds--;
                break;
            case 'RockScissor':
                resultData.loss++;
                resultData.result = "LOSS";
                resultData.rounds--;
                break;
            case 'PaperRock':
                resultData.loss++;
                resultData.result = "LOSS";
                resultData.rounds--;
                break;
            case 'PaperScissor':
                resultData.win++;
                resultData.result = "WIN";
                resultData.rounds--;
                break;
            case 'ScissorRock':
                resultData.win++;
                resultData.result = "WIN";
                resultData.rounds--;
                break;
            case 'ScissorPaper':
                resultData.loss++;
                resultData.result = "LOSS";
                resultData.rounds--;
                break;
            default:
                resultData.equal++;
                resultData.result = "EQUAL";
        }
    }
    
    function info(e){
        let op = rnd();
        game(op, e.target.textContent.trim());
        player.textContent = e.target.textContent;
        opponent.textContent = op;
        rounds.textContent = "Rounds " + resultData.rounds;
        result.textContent = "You " + resultData.result;    
        status.textContent = `win - ${resultData.win} 
        : loss - ${resultData.loss} : equal - ${resultData.equal}`;
    }

    function saveData(name, win, loss, equal){
        let winer = ""; 
        if((win - loss) > 0){
            winer =  "player";
        }else{
            winer = "opponent";
        }
            
        let xhr = new XMLHttpRequest();
        let data = "nickname=" + name 
        + "&rounds=" + (win + loss) 
        + "&win=" + win + "&loss=" + loss 
        + "&equal=" + equal 
        + "&winer=" +  winer;
        
        xhr.open("POST", "save.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
            }
        };

        xhr.send(data);
    }
    
    function change(e){         
        wait.style.display = "block";
        setTimeout(
            function(){
                wait.style.display = "none";
                
                if(resultData.rounds < 1  && resultData.win === resultData.loss){
                    info(e);
                }else if(resultData.rounds < 1 ){     
                    end.style.display = "block";

                    endP.innerHTML = `You play ${resultData.win + resultData.loss + resultData.equal} 
                    games and win ${resultData.win} <br> win - ${resultData.win} 
                    : loss - ${resultData.loss} : equal - ${resultData.equal}
                    <br>Winer is ${(resultData.win - resultData.loss) > 0 ? resultData.name : 'Opponent'}`;
                }else{
                    info(e);
                } 
            },
            500
        );               
    }

    reload.addEventListener("click", () => location.reload());
    save.addEventListener("click", () => {
        saveData(resultData.name, resultData.win, resultData.loss, resultData.equal)   
        window.location = "index.php";
    });    

    scissor.addEventListener("click", change);
    paper.addEventListener("click", change);
    rock.addEventListener("click", change);    
};



