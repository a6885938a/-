this.addEventListener('install', function(event) {
  console.log('test');
  event.waitUntil(
    caches.open('v4').then(function(cache) {
      return cache.addAll([
        './',
        './index.html',
        './plugin.js',
        './jf_wx_01.jpg',
        './jf_wx_02.jpg'
      ]);
    })
  );
});
this.addEventListener('fetch', function(event) {
  event.respondWith(caches.match(event.request).then(function(response) {
    // caches.match() always resolves
    // but in case of success response will have value
    if (response !== undefined) {
      return response;
    } else {
      return fetch(event.request).then(function(response) {
        // response may be used only once
        // we need to save clone to put one copy in cache
        // and serve second one
        let responseClone = response.clone();

        caches.open('v2').then(function(cache) {
          cache.put(event.request, responseClone);
        });
        return response;
      }).catch(function() {
        return caches.match('/sw-test/gallery/myLittleVader.jpg');
      });
    }
  }));
});