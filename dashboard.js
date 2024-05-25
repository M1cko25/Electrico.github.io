window.addEventListener('resize', ()=> {
    if (window.matchMedia('(max-width: 720px)').matches) {
        $('nav').css('left', '-250px')
        $('#menu').on('click', ()=> {
            $('nav').css('left', '0');
        })
        $('#close').on('click', ()=> {
            $('nav').css('left', '-250px');
        })
    } else {
        $('nav').css('left', '0');
    }
});