const req = new XMLHttpRequest();

function addRecord(e) {
    e.preventDefault();

    let data = new FormData(document.querySelector('form'));

    let url = '../cgi-bin/lab6_post.py';
    
    req.open('POST', url, true);
    req.send(data);
	
    req.onreadystatechange = (e) => {
        if (req.readyState == 4) {
            if (req.status == 200) {
                console.log(req.responseText);
            }
        }
    }
}

function showRecords(e) {
    const table  = document.querySelector('.placeholder');

    e.preventDefault();
    let url = `../cgi-bin/lab6_get.py`;
    req.responseType = XMLDocument;
    req.open('GET', url);
    req.send(null);

    req.onreadystatechange = (e) => {
        if (req.readyState == 4) {
            if (req.status == 200) {
                table.innerHTML = req.responseText;
            }
        }
    }
}


