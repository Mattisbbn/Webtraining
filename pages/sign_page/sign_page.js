// Canva
window.onload = updateCanvasSize
window.addEventListener('resize', updateCanvasSize);
function updateCanvasSize() {
    const width = signCanva.clientWidth;
    const height = signCanva.clientHeight;
    
    
    // Ajuster le canvas avec ces dimensions (si nécessaire)
    signCanva.width = width;
    signCanva.height = height;
}

// Appeler cette fonction lorsque la taille du canvas est modifiée

window.onload = updateCanvasSize

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

// Arrête de dessiner quand la souris est relâchée
signCanva.addEventListener("mouseup", function() {
    isDrawing = false;  // Arrête de dessiner
    ctx.closePath();  // Facultatif : termine le chemin
});

// Arrête également si la souris sort du canvas
signCanva.addEventListener("mouseleave", function() {
    isDrawing = false;  // Empêche le dessin lorsque la souris quitte le canvas
});



function clearCanvas(){
    ctx.clearRect(0, 0, signCanva.width, signCanva.height); 
}