var config = {
    map: {
        '*': {
        },
    },
    paths: {
        'rabari/brandslider': 'Rabari_BrandSlider/js/flexslider-min'
    },
    shim: {
        'rabari/brandslider': {
            deps: ['jquery'],
            exports: 'jQuery.fn.flexslider'
        },
    }
};
