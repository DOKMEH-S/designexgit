import { preloadImages } from './utils.js';
const animateFifthGrid = () => {
    const grid = document.querySelector('[data-grid-fifth]');
    const gridImages = grid.querySelectorAll('.grid__img');

    gsap.timeline({
        defaults: {
            ease: 'sine'
        },
        scrollTrigger: {
            trigger: grid,
            start: 'center center',
            end: '+=250% bottom',
            pin: grid.parentNode,
            scrub: 0.3,
        }
    })
        .set(grid, {perspective: 1000})
        .from(gridImages, {
            stagger: {
                amount: 0.4,
                from: 'random',
                grid: [4,9]
            },
            y: window.innerHeight,
            rotationX: -70,
            transformOrigin: '50% 0%',
            z: -900,
            autoAlpha: 0
        });
};
const init = () => {
    // Animate the header (frame)
    animateFifthGrid();
};
preloadImages('.grid__img').then(() => {
    init();
});