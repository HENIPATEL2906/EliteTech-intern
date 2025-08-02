// Register service worker
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('sw.js').then(reg => {
      console.log('Service Worker Registered!', reg);
    }).catch(err => {
      console.log('Service Worker registration failed: ', err);
    });
  });
}

// Notification logic
function notifyMe() {
  if (Notification.permission === 'granted') {
    new Notification('Thanks for your purchase!', {
      body: 'Your product will be shipped soon!',
      icon: 'icons/icon-192.png'
    });
  } else if (Notification.permission !== 'denied') {
    Notification.requestPermission().then(permission => {
      if (permission === 'granted') {
        notifyMe();
      }
    });
  }
}
