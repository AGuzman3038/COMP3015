$(document).ready(
    function() {
        $('#Inicio').click(function(){
            $('#Inicio').css('background-image','url(./Fotos/Fondo\ Inicial.jpg)');

            $('h1').css('color', 'red')
                .css('background-color', 'gold')
                .css('font-size', '5em')
                .css('border', '1px solid red')
                .css('padding', '10px');

            $('p').css('color', 'blue');
            
        });

    }
);