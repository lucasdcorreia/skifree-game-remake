var count = 0;
var win = true;
var entrada = 0;
var computador = 0;
var array = ["Papel", "Pedra", "Tesoura"];

var jokenpo = function (choice_1, choice_2){
    if(choice_1 === choice_2){
        return 0;
    }else if(choice_1 === 1){
        if(choice_2 === 2){
            return 1;
        }else{
            return -1;
        }
    }else if(choice_1 === 2){
        if(choice_2 === 1){
            return -1;   
        }else{
            return 1;
        }
             
    }else if(choice_1 === 3){
        if(choice_2 === 1){
           return 1;
        }else{
            return -1;s
        }
    }
}


while (win) {
    
    console.log("Escolha sua jogada:\n1 - Paper\n2 - Pedra\n3 - Tesoura");
        
    entrada = parseInt(prompt()); 
    
    if(entrada > 3 || entrada < 1){
        win = false;
    }else {
        computador = Math.floor(Math.random() * (3 - 1) + 1);
        console.log("O computador jogou " + array[computador - 1]);
        
        if(jokenpo(entrada, computador) === 0){
            console.log("A rodada empatou!");
        }else if(jokenpo(entrada, computador) === 1){
            count = count + 1;
            console.log("Você ganhou!");
            
        }else if(jokenpo(entrada, computador) === -1){
            console.log("Você perdeu! A sua pontuação foi "+count); 
            win = false;
        }
    }   
}




      
