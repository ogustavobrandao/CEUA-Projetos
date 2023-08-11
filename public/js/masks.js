$(document).ready(function ($) {
    $('.cpf').mask('000.000.000-00');

    let SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
    };

    let spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.celular').mask(SPMaskBehavior, spOptions);
    $('.telefone').mask(SPMaskBehavior, spOptions);
    $(".name").mask("#", {
        maxlength: true,
        translation: {
            '#': {pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true}
        }
    });

    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask(SPMaskBehavior, spOptions);
    $("#name").mask("#", {
        maxlength: true,
        translation: {
            '#': {pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true}
        }
    });
});
