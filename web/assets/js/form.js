$(document).ready(function () {
    $('.input-field').addClass('range-field');
    $('.value').attr('style', 'margin-top: 15px;');


    $('.range-field').change(function () {
            var textLabel = $(this).find('label').text();
            var valueForLabel = $(this).find('.value').text();
            var string = textLabel + " : " + valueForLabel;
            var stringSplit = string.split(" : ");
            string = stringSplit[0] + " : " + valueForLabel;
            console.log(string);
            $(this).find('label').text(string);
        }
    );

});