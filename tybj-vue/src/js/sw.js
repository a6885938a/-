this.addEventListener('install', function(event) {

  event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
        '/',
        '/index.html',
        '../images/plugin.js',
        '../images/jf_wx_01.jpg',
        '../images/jf_wx_02.jpg'
      ]);
    })
  );
});