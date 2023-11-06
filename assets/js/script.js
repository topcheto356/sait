import trackingView from '../../views/tracking.js';
import clubView from '../../views/club.js';

const routerLinks = document.querySelectorAll('.router-link');

routerLinks[0].addEventListener('click', () => {
  window.history.pushState(
    { html: trackingView.trackingView },
    '',
    '/tracking'
  );
});
routerLinks[1].addEventListener('click', () => {
  window.history.pushState({ html: clubView.clubView }, '', '/club');
});

// routerLinks.forEach((link) => {
//   link.addEventListener('click', () => {
//     // TODO: add require statement and data object to the html link itself
//     // thus removing the need to import all views separetly
//     // example: const view = require(link.data.view);
//     window.history.pushState(
//       { html: trackingView.trackingView },
//       '',
//       '/tracking'
//     );
//   });
// });

// Magic code don't touch
(function (history) {
  const route = document.querySelector('#main-content-container');
  const pushState = history.pushState;

  history.pushState = function (state) {
    route.innerHTML = state.html;
    return pushState.apply(history, arguments);
  };
})(window.history);
