/*============VERTICAL SLIDER==================*/
const boxes = gsap.utils.toArray(".box");
const loop = horizontalLoop(boxes, {paused: true, draggable: true});
let progressWrap = gsap.utils.wrap(0, 1);
document.getElementById('homeContainer').addEventListener('wheel', function(e) {
    loop.draggable.tween && loop.draggable.tween.kill();
    gsap.to(loop, {
        progress: '+=' + e.deltaY * 0.0005,
        overwrite: true,
        modifiers: {
            progress: progressWrap
        }
    });
});
function horizontalLoop(items, config) {
    items = gsap.utils.toArray(items);
    config = config || {};
    let tl = gsap.timeline({
            repeat: config.repeat,
            paused: config.paused,
            defaults: {ease: "none"},
            // defaults: {ease: "power4.out",},
            onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100),
            onUpdate: () => {
                const currentIndex = Math.round(tl.progress() * (items.length - 1));
                const viewportHeight = window.innerHeight;

                items.forEach((item, index) => {
                    const itemRect = item.getBoundingClientRect();
                    const itemCenter = itemRect.top + itemRect.height / 2;

                    // بررسی اینکه آیا مرکز باکس به وسط صفحه رسیده است
                    if (itemCenter >= viewportHeight / 2 - itemRect.height / 2 &&
                        itemCenter <= viewportHeight / 2 + itemRect.height / 2) {
                        item.classList.add('active'); // کلاس 'active' را اضافه کنید
                    } else {
                        item.classList.remove('active'); // کلاس را حذف کنید
                    }
                });
            }
    }),
        length = items.length,
        startY = items[0].offsetTop,
        times = [],
        heights = [],
        yPercents = [],
        curIndex = 0,
        pixelsPerSecond = (config.speed || 1) * 100,
        snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1), // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
        populateHeights = () => items.forEach((el, i) => {
            heights[i] = parseFloat(gsap.getProperty(el, "height", "px"));
            yPercents[i] = snap(parseFloat(gsap.getProperty(el, "y", "px")) / heights[i] * 100 + gsap.getProperty(el, "yPercent"));
        }),
        getTotalHeight = () => items[length-1].offsetTop + yPercents[length-1] / 100 * heights[length-1] - startY + items[length-1].offsetHeight * gsap.getProperty(items[length-1], "scaleY") + (parseFloat(config.paddingBottom) || 0),
        totalHeight, curY, distanceToStart, distanceToLoop, item, i;
    populateHeights();
    gsap.set(items, { // convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
        yPercent: i => yPercents[i]
    });
    gsap.set(items, {y: 0});
    totalHeight = getTotalHeight();
    for (i = 0; i < length; i++) {
        item = items[i];
        curY = yPercents[i] / 100 * heights[i];
        distanceToStart = item.offsetTop + curY - startY;
        distanceToLoop = distanceToStart + heights[i] * gsap.getProperty(item, "scaleY");
        tl.to(item, {yPercent: snap((curY - distanceToLoop) / heights[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
            .fromTo(item, {yPercent: snap((curY - distanceToLoop + totalHeight) / heights[i] * 100)}, {yPercent: yPercents[i], duration: (curY - distanceToLoop + totalHeight - curY) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
            .add("label" + i, distanceToStart / pixelsPerSecond);
        times[i] = distanceToStart / pixelsPerSecond;
    }
    function toIndex(index, vars) {
        vars = vars || {};
        (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length); // always go in the shortest direction
        let newIndex = gsap.utils.wrap(0, length, index),
            time = times[newIndex];
        if (time > tl.time() !== index > curIndex) { // if we're wrapping the timeline's playhead, make the proper adjustments
            vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
            time += tl.duration() * (index > curIndex ? 1 : -1);
        }
        curIndex = newIndex;
        vars.overwrite = true;
        return tl.tweenTo(time, vars);
    }
    tl.next = vars => toIndex(curIndex+1, vars);
    tl.previous = vars => toIndex(curIndex-1, vars);
    tl.current = () => curIndex;
    tl.toIndex = (index, vars) => toIndex(index, vars);
    tl.updateIndex = () => curIndex = Math.round(tl.progress() * items.length);
    tl.times = times;
    tl.progress(1, true).progress(0, true); // pre-render for performance
    if (config.reversed) {
        tl.vars.onReverseComplete();
        tl.reverse();
    }
    if (config.draggable && typeof(Draggable) === "function") {
        let proxy = document.createElement("div"),
            wrap = gsap.utils.wrap(0, 1),
            ratio, startProgress, draggable, dragSnap, roundFactor,
            align = () => tl.progress(wrap(startProgress + (draggable.startY - draggable.y) * ratio)),
            syncIndex = () => tl.updateIndex();
        draggable = Draggable.create(proxy, {
            trigger: items[0].parentNode,
            type: "y",
            onPress() {
                startProgress = tl.progress();
                tl.progress(0);
                populateHeights();
                totalHeight = getTotalHeight();
                ratio = 1 / totalHeight;
                dragSnap = totalHeight / items.length;
                roundFactor = Math.pow(10, ((dragSnap + "").split(".")[1] || "").length);
                tl.progress(startProgress);
            },
            onDrag: align,
            onThrowUpdate: align,
            overshootTolerance: 1,
            inertia: true,
            snap: value => {
                let n = Math.round(parseFloat(value) / dragSnap) * dragSnap * roundFactor;
                return (n - n % 1) / roundFactor;
            },
            onRelease: syncIndex,
            onThrowComplete: () => gsap.set(proxy, {y: 0}) && syncIndex()
        })[0];

        tl.draggable = draggable;
    }
    return tl;

}
/*============VERTICAL SLIDER==================*/