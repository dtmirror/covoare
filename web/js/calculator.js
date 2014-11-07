var pret_metru = 9; // pretul pe 1mp
var pret_minim = 36; // pretul minim pt transport gratuit
var pret_transport = 10; // pretul pe transport

$(document).ready(function() {
    if ($('.calculator').length) {
        calculeaza();
    }
});

function getInputValue(elmentId) {
    var value = parseFloat(document.getElementById(elmentId).value);
    return (value ? value : 0);
}
function calculeaza() {
    var covor_1_lung = getInputValue('covor_1_lung');
    var covor_1_lat = getInputValue('covor_1_lat');
    var covor_2_lung = getInputValue('covor_2_lung');
    var covor_2_lat = getInputValue('covor_2_lat');
    var covor_3_lung = getInputValue('covor_3_lung');
    var covor_3_lat = getInputValue('covor_3_lat');

    var totalPrice = (covor_1_lung * covor_1_lat + covor_2_lung * covor_2_lat + covor_3_lung * covor_3_lat) * pret_metru / 10000;

    if (totalPrice < pret_minim) {
        if (totalPrice == 0) {
            document.getElementById('transport').innerHTML = '0 RON';
        } else {
            totalPrice = totalPrice + pret_transport;
            document.getElementById('transport').innerHTML = pret_transport + ' RON' + ' (GRATUIT peste 4mp)';
        }
    } else {
        document.getElementById('transport').innerHTML = 'GRATUIT!';
    }
    document.getElementById('rezultat').innerHTML = totalPrice + ' RON';
}
