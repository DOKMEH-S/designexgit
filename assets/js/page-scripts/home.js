lenis.stop();
//document.querySelector('html').classList.add('home');
const introElement = document.querySelector(' #intro');
const textElement = document.querySelector(' #intro .text');
const bgImage = document.querySelector(' #intro .bg img');
setTimeout(() => {
    introElement.classList.add('loadIntro')
},500)
//=====INTRO
window.addEventListener('click', function(e) {
    if (e.target.closest('#intro')) {
        document.querySelector('html').classList.add('removeIntro');
        document.querySelector('body').classList.add('enter');
        lenis.start();
        setTimeout(() => {introElement.remove();},500)
    }
});
introElement.addEventListener('mousemove', (e) => {
    if (e.target === introElement) {
        const x = e.clientX;
        const y = e.clientY;
        const textRect = textElement.getBoundingClientRect();
        const offsetX = Math.abs(x - (textRect.left + textRect.width / 2));
        const offsetY = Math.abs(y - (textRect.top + textRect.height / 2));
        const maxOffset = Math.max(offsetX, offsetY);
        const blurValue = (maxOffset / 200) * 12; // Adjust the divisor as needed
        const blurValueText = (maxOffset / 420) * 2; // Adjust the divisor as needed
        bgImage.style.filter = `blur(${15 - blurValue}px)`;
        textElement.style.filter = `blur(${blurValueText}px)`;
    }
});
document.addEventListener('keypress', function(event) {
    // Check if Enter was pressed
    if (event.keyCode === 13 || event.keyCode === 32) {
        // Prevent the default action
        event.preventDefault();
        $('html').addClass('removeIntro');
        lenis.start();
    }
});
//=====INTRO
//=====PROJECTS
const projectWrappers = gsap.utils.toArray("section.projectsWrapper .projectsWrapper .projectWrap");
projectWrappers.forEach((fade, index) => {
    ScrollTrigger.create({
        trigger: fade,
        start: 'top 50% bottom 50%',
        end: 'bottom 50% top 50%',
        onEnter: () => {
         /*   const video = document.getElementById(`video-BO${index + 1}`);
            video.playbackRate = 3.0;
            if (video.played.length === 0) {
                video.play();
                setTimeout(() => {
                    fade.classList.add('hide');
                },2600)

            } else {
                video.pause();
            }*/
            fade.classList.add('is-active');
        },
    });
});
//=====Toggle Switch Hero
document.getElementById('checkboxTwo').addEventListener('change', function() {
    if (this.checked) {
        document.querySelector('body').classList.add('changeView');
    } else {
        document.querySelector('body').classList.remove('changeView');
    }
});
//=====MOVE BOX
const imgBoxes = gsap.utils.toArray("section.aboutContainer .aboutMediaWrapper .img-box");
imgBoxes.forEach((imgBox) => {
    gsap.to(imgBox, {
        y: "-=200",
        yoyo: true,
        ease: "power1.inOut",
        scrollTrigger: {
            trigger: "section.aboutContainer .aboutMediaWrapper",
            start: "-300px center",
            end: "+=120%",
            scrub: true,
        },
    });
});
//=====CanvasHero
(canvas => {
    class Board {
        constructor(canvas, scale, colors) {
            this.bg = hsla(...colors.bg);
            this.cells = [];
            this.colors = colors;
            this.ctx = canvas.getContext('2d');
            this.scale = scale;
            this.dragging = false;
            this.handlers = {
                handleMouseDown: this.handleMouseDown.bind(this),
                handleMouseMove: this.handleMouseMove.bind(this),
                handleMouseUp: this.handleMouseUp.bind(this) };
        }
        init() {
            const bg = this.colors.bg.slice(0);
            bg[3] = 1;

            this.setupCanvas();
            this.setupBoard();
            this.setupCells();
            this.setupListeners();

            this.ctx.fillStyle = hsla(...bg);
            this.ctx.fillRect(0, 0, this.w, this.h);
        }
        draw() {
            const max = this.cells.length;

            this.ctx.fillStyle = this.bg;
            this.ctx.fillRect(0, 0, this.w, this.h);

            for (let i = 0; i < max; i++) {
                this.cells[i].draw();
            }
        }
        setupCanvas() {
            this.ctx.canvas.width = this.ctx.canvas.clientWidth;
            this.ctx.canvas.height = this.ctx.canvas.clientHeight;
            this.w = this.ctx.canvas.width + this.scale;
            this.h = this.ctx.canvas.height + this.scale;

            this.ctx.fillStyle = this.bgColor;
            this.ctx.fillRect(0, 0, this.w, this.h);
        }
        setupBoard() {
            this.cellsLength = Math.floor(this.w / this.scale * (this.h / this.scale));
            this.columns = Math.floor(this.w / this.scale);
            this.rows = Math.floor(this.h / this.scale);
        }
        setupCells() {
            const len = this.cellsLength;

            // Instead of storing our cells in multiple nested arrays (x and y),
            // we can store them in one array and derive their X and Y values later.
            // This should result in an exponential performance gain, but I haven't
            // tested to verify.
            for (let i = 0; i < len; i++) {
                this.cells.push(new Cell(this, i));
            }

            for (let i = 0; i < len; i++) {
                this.cells[i].setColors();
            }
        }
        setupListeners() {
            this.ctx.canvas.addEventListener('mousedown', this.handlers.handleMouseDown);
            this.ctx.canvas.addEventListener('mouseup', this.handlers.handleMouseUp);
            this.ctx.canvas.addEventListener('mousemove', this.handlers.handleMouseMove);
        }
        drawAtCoords(clientX, clientY) {
            const x = Math.floor(clientX / this.scale);
            const y = Math.floor(clientY / this.scale);
            const i = y * this.columns + x;
            const cell = this.cells[i];
            const neighbors = cell.neighbors;

            cell.alive = true;

            neighbors.forEach(neighbor => {
                this.cells[neighbor].alive = true;
            });
        }
        handleMouseDown(e) {

            this.dragging = true;
            this.drawAtCoords(e.clientX, e.clientY);
        }
        handleMouseUp() {

            this.dragging = false;
        }
        handleMouseMove(e) {
            if (!this.dragging) {
                return;
            }

            window.requestAnimationFrame(() => {this.drawAtCoords(e.clientX, e.clientY);});
        }
        destroy() {
            window.cancelAnimationFrame(this.handlers.raf);
            this.ctx.canvas.removeEventListener('mousedown', this.handlers.handleMouseDown);
            this.ctx.canvas.removeEventListener('mouseup', this.handlers.handleMouseUp);
            this.ctx.canvas.removeEventListener('mousemove', this.handlers.handleMouseMove);
            this.cells = [];
            this.dragging = false;
            this.handlers = {
                handleMouseDown: this.handleMouseDown.bind(this),
                handleMouseMove: this.handleMouseMove.bind(this),
                handleMouseUp: this.handleMouseUp.bind(this) };
        }
        update() {
            const max = this.cells.length;

            for (let i = 0; i < max; i++) {
                this.cells[i].updatePrevious();
            }

            for (let i = 0; i < max; i++) {
                this.cells[i].update();
            }
        }
        step() {
            this.update();
            this.draw();
        }
        loop() {
            this.step();
            this.handlers.raf = window.requestAnimationFrame(this.loop.bind(this));
        }
        start() {
            this.handlers.raf = this.loop();
        }}
    class Cell {
        constructor(board, i) {
            this.alive = Math.random() < 0.1;
            this.board = board;
            this.i = i;
            // X and Y are derivatives of the cell's index in the array.
            this.x = Math.floor(i % board.columns) * board.scale;
            this.y = Math.floor(i / board.columns) * board.scale;
            this.col = Math.floor(this.x / board.scale);
            this.row = Math.floor(this.y / board.scale);
            this.previous = this.alive;
            this.neighbors = this.getNeighbors();
        }
        draw() {
            if (this.alive) {
                this.board.ctx.fillStyle = this.color;
                this.board.ctx.fillRect(this.x, this.y, this.board.scale, this.board.scale);
            }
        }
        // Since we're only using a 1-D array, getting neighboring cells is a little complicated.
        getNeighbors() {
            const col = this.col;
            const cols = this.board.columns;
            const i = this.i;
            const neighbors = [];
            const rows = this.board.rows;
            const row = this.row;

            const n = i - cols;
            const e = i + 1;
            const s = i + cols;
            const w = i - 1;

            const nw = n - 1;
            const ne = n + 1;
            const sw = s - 1;
            const se = s + 1;

            if (col !== 0) {
                neighbors.push(w);
            }

            if (row !== 0 && col !== 0) {
                neighbors.push(nw);
            }

            if (row !== 0) {
                neighbors.push(n);
            }

            if (row !== 0 && col !== cols - 1) {
                neighbors.push(ne);
            }

            if (col !== cols - 1) {
                neighbors.push(e);
            }

            if (col !== cols - 1 && row !== rows) {
                neighbors.push(se);
            }

            if (row !== rows) {
                neighbors.push(s);
            }

            if (row !== rows && col !== 0) {
                neighbors.push(sw);
            }

            return neighbors;
        }
        getLivingNeighbors() {
            const cells = this.board.cells;
            const livingNeighbors = [];
            const neighbors = this.neighbors;

            for (let i = 0, max = neighbors.length; i < max; i++) {
                let cell = cells[neighbors[i]];

                if (cell && cell.previous) {
                    livingNeighbors.push(neighbors[i]);
                }
            }

            return livingNeighbors;
        }
        updatePrevious() {
            this.previous = this.alive;
        }
        update() {
            const livingNeighbors = this.getLivingNeighbors().length;

            if (this.previous) {
                if (livingNeighbors === 2 || livingNeighbors === 3) {
                    this.alive = true;
                }

                if (livingNeighbors < 2 || livingNeighbors > 3) {
                    this.alive = false;
                }
            } else {
                if (livingNeighbors === 3) {
                    this.alive = true;
                }
            }
        }
        setColors() {
            const fg = this.board.colors.alive.slice(0);
            const bg = this.board.colors.bg;

            this.color = hsla(Math.floor(map(this.i, 0, this.board.cells.length, fg[0] - 120, fg[0])), ...fg.slice(1));
            this.bg = hsla(...bg);
        }}
    const board = new Board(canvas, 5, { bg: [240, 67, 94, 0.015], alive: [300, 100, 50, 0.8] });
    //=====Toggle Switch Hero
    document.getElementById('checkbox').addEventListener('change', function() {
        if (this.checked) {
            document.querySelector('body').classList.add('changeHero');
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
            lenis.stop();
            board.init();
            board.start();
        } else {
            document.querySelector('body').classList.remove('changeHero');
            lenis.start();
            board.destroy();
        }
    });
    const reset = debounce(e => {
        board.destroy();
        board.init();
        board.start();
    }, 250);

    window.addEventListener('resize', reset);

    // Using a sorta-hacky util so I can tweak the color later on
    function hsla(h, s, l, a) {
        return `hsla(${h}, ${s}%, ${l}%, ${a})`;
    }

    function map(value, in1, in2, out1, out2) {
        return (value - in1) * (out2 - out1) / (in2 - in1) + out1;
    }

    // https://davidwalsh.name/javascript-debounce-function
    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this,args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };
})(document.getElementById('gol'));
//======FixToggleSwitch
let tlToggleSwitch = gsap.timeline({
    scrollTrigger: {
        trigger: "section.projectsWrapper.selectedProjects",
        anticipatePin: 1,
        start: "top top",
        end: "bottom bottom",
        scrub: 1,
        pin: 'section.projectsWrapper .selectedProjectsSwitch',
    }
})
/*---------------------------------opModal*/
document.querySelector('#modal .close').addEventListener('click', function() {
    document.querySelector('html').classList.remove('opModal');
    document.querySelector('html').classList.remove('opMenu');
    lenis.start();
});
window.addEventListener('click', function(e) {
    if (!e.target.closest('#modal')) {
        document.querySelector('html').classList.remove('opModal');
        lenis.start();
    }
});
var contentLinks = document.querySelectorAll('section.services-container .wrap .content .content__link');
contentLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        document.querySelector('html').classList.add('opModal');
        lenis.stop();
    });
});
/*---------------------------------opModal*/
//=================scroll trigger text reveal
const split = new SplitText(".home-slogan-container h2 span", {
    type: "chars",
    charsClass: 'char'
});
const tlTR  = gsap.timeline({
    scrollTrigger: {
        trigger: ".home-slogan-container",
        start: "top top",
        end: "+=150%",
        pin: true,
        scrub: 0.75,
        ease: "power3.in",
        transformOrigin: "50% 100%",
        scaleY: 0
    }
})
tlTR.to( '.home-slogan-container h2 span .char', {
    scaleY: 1,
    stagger: 0.05,
    ease: "power3.in",
})

// -----------------------------add hover-target class
let removeIcons = document.querySelectorAll('.upload i.remove');
removeIcons.forEach(function(icon) {
    icon.classList.add('hover-target');
});
// -----------------------------add hover-target class
/*---------------------------------inputFile*/
var uploadElements = document.querySelectorAll('.upload');
uploadElements.forEach(function(upload) {
    var fileInput = upload.querySelector('input[type="file"]');
    var label = upload.querySelector('label');
    var labelText = label.querySelector('span');
    var labelRemove = upload.querySelector('i.remove');
    var labelDefault = labelText.textContent;

    // on file change
    fileInput.addEventListener('change', function(event) {
        var fileName = fileInput.value.split('\\').pop();
        if (fileName) {
            labelText.textContent = fileName;
            labelRemove.style.display = 'block';
        } else {
            labelText.textContent = labelDefault;
            labelRemove.style.display = 'none';
        }
    });

    // Remove file
    labelRemove.addEventListener('click', function(event) {
        fileInput.value = '';
        labelText.textContent = labelDefault;
        labelRemove.style.display = 'none';
    });
});
/*---------------------------------inputFile*/