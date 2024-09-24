/*====================DEFINE GSAP=====================*/
gsap.registerPlugin(ScrollTrigger,SplitText);
const lenis = new Lenis()

lenis.on('scroll', ScrollTrigger.update)

gsap.ticker.add((time)=>{
    lenis.raf(time * 1000)
})

gsap.ticker.lagSmoothing(0)
/*====================DEFINE GSAP=====================*/
