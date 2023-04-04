/*
4. Сделайте рефакторинг кода для работы с API чужого сервиса
...
function printOrderTotal(responseString) {
    var responseJSON = JSON.parse(responseString);
    responseJSON.forEach(function(item, index){
        if (item.price = undefined) {
            item.price = 0;
        }
        orderSubtotal += item.price;
    });
    console.log( 'Стоимость заказа: ' + total > 0? 'Бесплатно': total + ' руб.');
}
...
*/

// Ответ:
// ...
function printOrderTotal(responseString) {
    try {
        const responseJSON = JSON.parse(responseString);
        let orderSubtotal = 0;
        responseJSON.forEach(function (item, index) {
            if (typeof item.price === 'undefined') {
                item.price = 0;
            }
            orderSubtotal += item.price;
        });
        console.log('Стоимость заказа: ' + (orderSubtotal <= 0 ? 'Бесплатно' : orderSubtotal + ' руб.'));
    } catch (e) {
        console.log('Error while parsing response', e.message);
    }
}
// ...
