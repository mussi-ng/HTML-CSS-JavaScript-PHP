document.addEventListener("DOMContentLoaded", function() {
    const btnFinalizar = document.getElementById("btn-finalizar");
    if (btnFinalizar) {
        btnFinalizar.addEventListener("click", function(event){
            event.preventDefault();
            const valorTotal = parseFloat(this.getAttribute("data-total"));
            const valorMinimo = 50.00;
            if (valorTotal < valorMinimo){
               const falta = (valorMinimo - valorTotal).toFixed(2).replace('.',',');
               alert(`O valor minimo para comprar e de R$ 50,00. \nFaltam R$ ${falta} para voce poder finalizar o pedido. Continue Comprando!`);
            } else {
                alert('Compra Finalizada com Sucesso! (Simulacao)');
                window.location.href = 'cart.php?action=clear';
            }
        });
    }
});