function draw(e){
    e.preventDefault();

    const formData = new FormData(document.querySelector('.form'))
    
    let data = [];
    
    for (var pair of formData.entries()) {
        data.push(pair[1]);
    }

    let parsedData = {
        x: Number.parseInt(data[0]),
        y: Number.parseInt(data[1]),
        R: Number.parseInt(data[2]),
        color: data[3]
    }

    parsedData = validate(parsedData);

    drawCanvas(parsedData);
    drawSVG(parsedData);
}

function validate(data){

    const container = document.querySelector('.circle-canvas');

    const width = container.clientWidth;
    const height = container.clientHeight;

    let radius = data.R;
    let x = data.x;
    let y = data.y;
    
    // Walidacja 
    if(radius > x){
        data.R = x;
    }
    
    if (radius > y){
        data.R = y;
    } 
    
    if (radius > (width - x) ) {
        data.R = width - x;
    } 
    
    if (radius > (height - y)) {
        data.R = height - y;
    }

    return data;
}

function drawSVG(data){
    const svgContainer = document.querySelector(".circle-svg");
    svgContainer.innerHTML = `<circle cx=${data.x} cy=${data.y} r=${data.R} style="fill:${data.color}" />`
}

function drawCanvas(data){
    let c = document.querySelector("canvas");
    c.width = 400;
    c.height = 300;
    let ctx = c.getContext("2d");
    
    ctx.beginPath();
    ctx.strokeStyle = data.color;

    ctx.arc(data.x, data.y, data.R, 0, 2 * Math.PI);
    ctx.stroke();
}

