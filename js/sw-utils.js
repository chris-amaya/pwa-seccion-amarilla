// Guardar  en el cache dinamico
function actualizaCacheDinamico(dynamicCache, req, res) {
    if (res.ok) {
        return caches.open(dynamicCache).then(cache => {
            cache.put(req, res.clone());
            return res.clone();
        });
    } else {
        return res;
    }

};

function manejoFotos(cacheName, req) {
    if (req.clone().method === 'POST') {
        if (self.registration.sync) 
        {
            return req.clone().text().then(body => {
                const bodyObj = JSON.parse(body);
                console.log(body);
                return guardarFotos(bodyObj);
            });
        } else 
        {
            return fetch(req)
        }
    }
};

function manejoEmpresa(cacheName, req) {
    if(req.clone().method === 'POST') {
        return fetch(req.clone()).then(res => {
            if(res) return res;
        }).catch(err => {
            return req.clone().text().then(body => {
                const bodyObj = JSON.parse(body);
                console.log(bodyObj);
                return guardarEnterprise(bodyObj);
            })

        })
    }
}