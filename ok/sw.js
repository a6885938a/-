this.addEventListener('install', function(event) {
  console.log('test');
  event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
        '/',
        '/index.html',
        '/plugin.js',
        '/jf_wx_01.jpg',
        '/jf_wx_02.jpg',
      ]);
    })
  );
});