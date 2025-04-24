let colorData;
let colorChoices = [];

function preload() {
    colorData = loadJSON('./data/colors.json');
}

function setup() {
    createCanvas(500, 500);
    buildColorChoices();
    frameRate(10);
}

function draw() {
    let index = Math.floor(random(0, colorChoices.length));
    let c = color(0);
    if (index >= 0 && index < colorChoices.length) {
        c = colorChoices[index];
    }

    let x = random(width);
    let y = random(height);
    let s = random(10, 150);

    noStroke();
    fill(c);
    ellipse(x, y, s, s);
}

function buildColorChoices() {
    let hexCodes = Object.values(colorData);

    colorChoices = hexCodes.map((hex) => {
        let c = color(hex);
        c.setAlpha(100);
        return c;
    });
}
