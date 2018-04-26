var lottie = require('../js/lottie.min');
lottie.loadAnimation({
    container: document.getElementById('successResult'), // the dom element that will contain the animation
    renderer: 'svg',
    loop: false,
    autoplay: true,
    path: '../../../assets/images/check_pop.json' // the path to the animation json
});

lottie.loadAnimation({
    container: document.getElementById('failResult'), // the dom element that will contain the animation
    renderer: 'svg',
    loop: false,
    autoplay: true,
    path: '../../../assets/images/x_pop.json' // the path to the animation json
});