function resize_divProgress() {
    var control = document.getElementById('featured-post');
    var control2 = document.getElementById('featured-section-news-wrapper');
    var div = document.getElementById('featuredborder');

    div.style.left = control.offsetLeft + 'px';
    div.style.top = control.offsetTop + 'px';
    div.style.width = control.offsetWidth + 'px';
    div.style.height = control.offsetHeight + 'px';
}
