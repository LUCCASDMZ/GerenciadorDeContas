// receber o seletor do campo valor
let inputValor = document.getElementById('valor');

// aguardar o usuario digitar valor no campo
inputValor.addEventListener('input', function(){

    //Obter valor atual removendo qualquer caractere que nao seja numero
    let valueValor = this.value.replace(/[^\d]/g,'');

    // Adicionar o separadores de milhares
    var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor.slice(-2);

    // Adicionar a virgula e ate dois digitos se houver centavos
    formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

    // Atualizar o valor do campo
    this.value = formattedValor;
});
