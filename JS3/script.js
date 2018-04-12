var adicionar;
(function someFn() {
    var atualizar = 0;
     adicionar = function(valor) {
      atualizar = atualizar + valor;
        return atualizar;
    };
}());

adicionar(1);
console.log("Primeira chamada ", adicionar(3) );
console.log("Segunda chamada ", adicionar(1) );
console.log("Terceira chamada ", adicionar(5) );