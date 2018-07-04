(function () {

   var FPS = 50;
   const TAMX = 300;
   const TAMY = 400;
    
    // Probabilidade de surgimento de cada obstáculo
    const PROB_ARVORE = 3;
    const PROB_ARBUSTO = 1.8;
    const PROB_ROCHA = 1.4;
    const PROB_TOCO_ARV = 1.2;
    const PROB_ARVORE_GRANDE = 0.9;
    const PROB_CACHORRO = 0.7;
    const PROB_COGUMELO = 0.1;
    
    
    var gameLoop;
    var montanha;
    var painel;
    var vidas = 3;
    var distancia_percorrida = 1;
    var skier;
    var caido = false;
    var modoRapido = false;
    var gameOver = false;
    var direcoes = ['para-esquerda','para-frente','para-direita'];
    
    // Esses vetores guardam cada objeto (obstáculo) criado 
    // dentro da função run, para que possam ser acessados 
    // e ter suas posições atualizadas
    
    var obstaculos = [];

    function init () {
        montanha = new Montanha();
        skier = new Skier();
        painel = new Painel();
        gameLoop = setInterval(run, 1000/FPS);
    }
    
    // Essa função é executada quando o jogo ter- 
    // mina e é preciso enviar a pontuação ao ser- 
    // vidor para armazená-la no banco de dados.
    
    function registrarPontuacao(){
        console.log("executando registrarPontuacao()");
        $.ajax({
            url: 'http://localhost:8888/progweb/yii/advanced/frontend/web/index.php?r=jogo/save',
            type: 'GET',
            data: {
                'pontuacao':distancia_percorrida,
            },
            error: function() {
                console.log('Não deu certo');
            },
            success: function(data) {
                console.log(data);
            },
        }); 
        console.log("terminando de executar registrarPontuacao()");
    }
    
    // Eventos ao pressionar teclas

    window.addEventListener('keydown', function (e) {
        if ((gameOver == false) && (caido == false)) {   
            if (e.key == 'a') {
                skier.mudarDirecao(-1);
            } else if (e.key == 'd'){ 
                skier.mudarDirecao(1);
            } else if (e.key == 'f') {
                modoRapido = true;
                clearInterval(gameLoop);
                gameLoop = setInterval(run, 7);     
            }
        }
    });
    
    window.addEventListener('keyup', function(e){
        if ((gameOver == false) && (caido == false)) {
            if(e.key == 'f'){
                modoRapido = false;
                clearInterval(gameLoop);
                gameLoop = setInterval(run, 1000/FPS);
            }
        }
    });
    
    function Montanha () {
        this.element = document.getElementById("montanha");
        this.element.style.width = TAMX + "px";
        this.element.style.height = TAMY + "px";
    }
    
    function Painel() {
        this.element = document.getElementById("painel");
    }

    function Skier() {
        this.element = document.getElementById("skier");
        this.direcao = 1; //0-esquerda;1-frente;2-direita
        this.element.className = 'para-frente';
        this.element.style.top = '30px';
        this.element.style.left = parseInt(TAMX/2)-7 + 'px';

        this.mudarDirecao = function (giro) {
            if (this.direcao + giro >=0 && this.direcao + giro <=2) { 
                this.direcao += giro;
                this.element.className = direcoes[this.direcao];
            }
        }

        this.andar = function () {
            if(skier.element.offsetLeft <= TAMX - skier.element.offsetWidth){ 
                if (this.direcao == 2) {
                    this.element.style.left = (parseInt(this.element.style.left)+1) + "px";
                }
            }
            
            if(skier.element.offsetLeft >= 0){ 
                if (this.direcao == 0)  {
                    this.element.style.left = (parseInt(this.element.style.left)-1) + "px";
                }
            }
            
        }
   }
    
    function levantar () {
        caido = false;
        skier.direcao = 1;
        skier.element.className = "para-frente";
        gameLoop = setInterval(run, 1000/FPS);
    }
    

    function Arvore() {
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'arvore';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function Arbusto_em_Chamas() {
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'arbusto-em-chamas';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function Rocha() {
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'rocha';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function TocoArvore(){
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'toco-de-arvore';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function Cachorro(){
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'cachorro';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function ArvoreGrande(){
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'arvore-grande';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function Cogumelo() {
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'cogumelo';
        this.element.style.top = TAMY + "px";
        this.element.style.left = Math.floor(Math.random() * TAMX) + "px";
    }
    
    function MonstroDasNeves(x, y) {
        this.element = document.createElement('div');
        montanha.element.appendChild(this.element);
        this.element.className = 'monstro-das-neves';
        this.element.style.top = x + "px";
        this.element.style.left = y + "px";
    }

    function run () {
        
        var random = Math.floor(Math.random() * 1000);
        //console.log(random);
        
        
        // Define novos obstáculos
        if (random > PROB_ARBUSTO*10 && random <= PROB_ARVORE*10) {
            var arvore = new Arvore();
            obstaculos.push(arvore);
        }else if (PROB_ROCHA*10 < random && random <= PROB_ARBUSTO*10){
            var arbusto = new Arbusto_em_Chamas();
            obstaculos.push(arbusto);
        } 
        else if (PROB_TOCO_ARV * 10 < random && random <= PROB_ROCHA*10){
            var rocha = new Rocha();
            obstaculos.push(rocha);
        }
        else if (PROB_ARVORE_GRANDE * 10 < random && random <= PROB_TOCO_ARV * 10){
            var tocoArvore = new TocoArvore();
            obstaculos.push(tocoArvore);
        }
        else if (PROB_CACHORRO * 10 < random && random <= PROB_ARVORE_GRANDE * 10) {
            var arvoreGrande = new ArvoreGrande();
            obstaculos.push(arvoreGrande);      
        }
        else if (PROB_COGUMELO * 10 < random && random <= PROB_CACHORRO * 10) {
            var cachorro = new Cachorro();
            obstaculos.push(cachorro);      
        }
        else if (random <= PROB_COGUMELO * 10) {
            var cogumelo = new Cogumelo();
            obstaculos.push(cogumelo);      
        }
        
        
        
        // atualiza a posição de cada objeto no vetor obstáculos
        obstaculos.forEach(function (a) {
            a.element.style.top = (parseInt(a.element.style.top) - 1) + "px";
        });
        
        // verifica colisões
        obstaculos.forEach(function (a) {
            if(((a.element.offsetLeft - 20) <= skier.element.offsetLeft) && (skier.element.offsetLeft <= a.element.offsetLeft + (a.element.offsetWidth/2))){
                if(a.element.offsetTop == 33){
                    if(a.element.className == 'cogumelo'){
                        //alert("cogumelo!!!");
                        vidas = vidas + 1;
                        a.element.style.display = 'none';
                    } else if(a.element.className == 'monstro-das-neves'){      
                        //alert("Você encontrou o abominável monstro das neves");
                        a.element.style.animation = "monstro-comendo 1s";
                        clearInterval(gameLoop);
                        skier.element.style.display = "none";
                    }else {
                        vidas = vidas - 1;
                        if(vidas < 0){
                            //console.log("mooooooorreuuuuuu");
                            skier.element.className = 'morto';
                            registrarPontuacao();
                            gameOver = true;
                            clearInterval(gameLoop);   
                        }else {
                            a.element.style.display = "none"
                            skier.element.className = 'caido';
                            clearInterval(gameLoop);
                            caido = true;
                            setTimeout(levantar, 1000);
                        }
                    }
                }
            }
        });
        
        // monstro das neves
        
        if((distancia_percorrida % 2000) == 0){
            //alert(distancia_percorrida + " metros percorridos.");
            if(modoRapido != true){
                if(skier.element.className != 'para-frente'){
                    skier.direcao = 1;
                   skier.element.className = 'para-frente';
                }
                gameOver = true;
                registrarPontuacao();
                var mosntroDasNeves = new MonstroDasNeves((TAMY/2), skier.element.offsetLeft);
                obstaculos.push(mosntroDasNeves);
                clearInterval(gameLoop);
                gameLoop = setInterval(run, 5);
            }else {
                var mosntroDasNeves = new MonstroDasNeves(skier.element.offsetLeft, (TAMY - 100));
                obstaculos.push(mosntroDasNeves);
            }
        }
        
        distancia_percorrida = distancia_percorrida + 1;
        painel.element.innerHTML = "Pontos: " + distancia_percorrida + "<br>Vidas: " + vidas;
        
        skier.andar();
        
   }

   init();

})();