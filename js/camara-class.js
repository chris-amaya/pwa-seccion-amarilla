class Camara {
    constructor( videoNode ) 
    {
        this.videoNode = null;
        this.videoNode = videoNode;
        console.log('Camara Class init');
    }
    encender() 
    {
        navigator.mediaDevices.getUserMedia({
            audio: false,
            video: { width: 1200, height: 720 },
            
        }).then( stream => {
            this.videoNode.srcObject = stream;
            this.stream = stream;
        }).catch(error => {
            console.error(`${error.name} ${error}`);
            
        }) ;
    }
    apagar() 
    {
        this.videoNode.pause();
        if ( this.stream ) { this.stream.getTracks()[0].stop(); }
    }
    tomarFoto() {
        // Crear un elemento canvas para renderizr ahí la foto
        let canvas = document.createElement('canvas');

        // Colocar las dimensiones igual al elemento del video
        canvas.setAttribute('width', 1080 );
        canvas.setAttribute('height', 720 );

        // obtener el contexto del canvas
        let context = canvas.getContext('2d'); // una simple imagen

        // dibujar, la imagen dentro del canvas
        context.drawImage( this.videoNode, 0, 0, canvas.width, canvas.height );

        this.foto = context.canvas.toDataURL('image/png');
        

        // limpieza
        canvas  = null;
        context = null;

        return this.foto;

    }


}


