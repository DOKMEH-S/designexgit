// const loadingContainer = document.querySelector('.loading-container');
//
// // setTimeout(() => {
// //     loadingContainer.classList.add('getScale');
// // }, 0);
//
// setTimeout(() => {
//     loadingContainer.classList.add('getRotate');
// }, 100);
//
// setTimeout(() => {
//     loadingContainer.classList.add('getNumber');
//
//     // Add loseNumber class after 1 second
//     setTimeout(() => {
//         loadingContainer.classList.add('loseNumber');
//     }, 1000); // 1000 milliseconds = 1 second
//
// }, 100);
//
// setTimeout(() => {
//     const counter = document.querySelectorAll('.percentCounter');
//     counter.forEach(item => {
//         let counterInnerText = parseInt(item.textContent, 10);
//         let count = 1;
//         let speed = item.dataset.speed / counterInnerText;
//
//         function counterUp() {
//             item.textContent = count++ + '%'; // Add % here
//             if (count > counterInnerText) {
//                 clearInterval(stop);
//             }
//         }
//
//         const stop = setInterval(counterUp, speed);
//     });
// }, 500);

// setTimeout(() => {
//     // Add any final class to indicate loading is done
//     document.querySelector('html').classList.add('loadingDone');
// }, 500);