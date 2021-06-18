// Utilidades para grabar PouchDB
const db = new PouchDB('fotos');
const Enterprises = new PouchDB('enterprises')
function guardarFotos( foto ) 
{
    foto._id = new Date().toISOString();
    return db.put(foto).then( () => 
    {
        self.registration.sync.register('nueva-foto');
        const newResp = { ok: true, offline: true };
        return new Response( JSON.stringify(newResp) );
    });
}

// Postear mensajes a la API

function postearEmpresa() {
    const posteos = [];
    return Enterprises.allDocs({include_docs: true}).then(docs => {
        docs.rows.forEach(row => {
            const doc = row.doc;
            const fetchPom = fetch('new-enterprise.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                // body: JSON.stringify({
                //     photos, 
                //     info
                // })
                body: JSON.stringify(doc)
            }).then(res => {
                return Enterprises.remove(doc);
            })
            posteos.push(fetchPom);
        })
        return Promise.all(posteos);
    })
}

function guardarEnterprise(enterprise) {
    enterprise._id = new Date().toISOString();
    return Enterprises.put(enterprise).then(() => {
        self.registration.sync.register('nueva-empresa');
        const newResp = { ok: true, offline: true };
        return new Response(JSON.stringify(newResp));
    })
} 


/* fetch(url, {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
        photos, 
        "enterprise": enterprise[5],
    })
      
}) */