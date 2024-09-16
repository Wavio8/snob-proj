var div = document.createElement('div');
div.style.overflowY = 'scroll';
div.style.width = '50px';
div.style.height = '50px';
document.body.append(div);
var scrollWidth = div.offsetWidth - div.clientWidth;
div.remove();

// Склонение слов ['товар', 'товара', 'товаров']

function declOfNum(count, array) {
    let cases = [2, 0, 1, 1, 1, 2];
    return array[(count % 100 > 4 && count % 100 < 20) ? 2 : cases[(count % 10 < 5) ? count % 10 : 5]];
}

var dialog = document.querySelector('.dialog');
var body = document.querySelector('body');

function dialogOpen(content = null){
    dialog.style.display = 'flex';
    body.style.overflow = 'hidden';
    body.style.paddingRight = scrollWidth + 'px';
    dialog.querySelector('.dialog__content').innerHTML = '';

    if (content) dialog.querySelector('.dialog__content').append(content);

    return dialog;
}

function dialogClose(){
    dialog.style.display = '';
    body.style.overflow = '';
    body.style.paddingRight = '';
    dialog.querySelector('.dialog__content').innerHTML = '';
}

function dialogloading(){
    var dialogContent = $('.dialog__content');
    dialogOpen();
    dialogContent.html('<div class="loading"></div>');
}

document.addEventListener('click' , function(e){
    if (e.target == dialog) dialogClose();
    if (e.target.closest('.dialog__close')) dialogClose();
});
