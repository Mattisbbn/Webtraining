// Canva
window.onload = updateCanvasSize
window.addEventListener('resize', updateCanvasSize);
function updateCanvasSize() {
    const width = signCanva.clientWidth;
    const height = signCanva.clientHeight;
    
    signCanva.width = width;
    signCanva.height = height;
}


const signCanva = document.querySelector("#sign_canvas");
const ctx = signCanva.getContext('2d');
let isDrawing = false;  // Pour suivre si le dessin est en cours

function getMousepostion(event) {
    const rect = signCanva.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;
    return { x: x, y: y };
}

// Commence à dessiner quand la souris est enfoncée
signCanva.addEventListener("mousedown", function(event) {
    isDrawing = true;
    const position = getMousepostion(event);
    ctx.beginPath();  // Commence un nouveau chemin de dessin
    ctx.moveTo(position.x, position.y);  // Positionne le point de départ du dessin
});

// Continue de dessiner quand la souris bouge
signCanva.addEventListener("mousemove", function(event) {
    if (isDrawing) {
        const position = getMousepostion(event);
        ctx.lineTo(position.x, position.y);  // Trace une ligne jusqu'à la position actuelle de la souris
        ctx.stroke();  // Applique le contour (dessine la ligne)
    }
});

signCanva.addEventListener("mouseup", function() {
    isDrawing = false;  // Arrête de dessiner
    ctx.closePath();  // Facultatif : termine le chemin
});

signCanva.addEventListener("mouseleave", function() {
    isDrawing = false;  // Empêche le dessin lorsque la souris quitte le canvas
});


function clearCanvas(){
    ctx.clearRect(0, 0, signCanva.width, signCanva.height); 
}

function saveCanvas() {
    const imageData = signCanva.toDataURL('image/png');
    fetch('controller/fetchSignature.php', {
        method: 'POST',
        body: JSON.stringify({ imageData }), 
        headers: {
            'Content-Type': 'application/json'
        },
    }) .then(response => {
        // Vérifie si la réponse est réussie (status 200)
        if (!response.ok) {
            throw new Error('Erreur HTTP : ' + response.status);
        }
        return response.text(); // Supposant que la réponse est en JSON
    }).then(data => {
        console.log('Réponse reçue :', data); 
        // Traitez ici la réponse envoyée par fetchSignature.php
    })
}