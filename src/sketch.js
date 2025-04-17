function setup() {
    createCanvas(500, 500);
}

function draw() {
    background(0);
    fill(255);
    ellipse(mouseX, mouseY, 100, 100);

    for (let i = 0; i < count; i++) {
        fill(255, 0, 0);
        ellipse(i * width / count, i * height / count, width / count, height / count);
    }
}
