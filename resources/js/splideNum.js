export function SlideNumber( Splide, Components ) {
    const { track } = Components.Elements;

    let elm;
    let elm2;

    function mount() {
        elm = document.getElementById( 'num_blue' );
        elm2=document.getElementById( 'num_grey' );
        update();
        Splide.on( 'move', update );
    }

    function update() {
        elm.textContent = `${ Splide.index + 1 }`;
        elm2.textContent=`${ Splide.length }`;
    }

    return {
        mount,
    };
}